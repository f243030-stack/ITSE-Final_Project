<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    public function adminDashboard()
    {
        $user = User::all()->where('role', '!=', 'admin');
        $teachers = User::all()->where('role', 'teacher');
        $courses = Course::join('users', 'courses.teacher_id', '=', 'users.id')
            ->select('courses.*', 'users.name as teacher_name')
            ->get();
        $students = User::all()->where('role', 'student');
        $allCourses = Course::all();
        $enrolled = Enrollment::join('users', 'enrollments.student_id', '=', 'users.id')
            ->join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->select('enrollments.*', 'users.name as student_name', 'courses.title as course_title')
            ->get();
        return view('admin', compact('user', 'teachers', 'courses', 'students', 'allCourses', 'enrolled'));
    }

    public function teacherdashboard()
    {
        $courses = Course::where('teacher_id', Auth::user()->id)->get();
        $students = Enrollment::join('users', 'enrollments.student_id', '=', 'users.id')
            ->join('courses', 'enrollments.course_id', '=', 'courses.id')
            ->where('courses.teacher_id', Auth::user()->id)
            ->select('users.*', 'courses.title as course_title', 'courses.id as course_id')
            ->get();
        return view('teacher', compact('courses', 'students'));
    }
    public function enrollStudent(Request $request)
    {
        // Implementation for enrolling a student in a course
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id'
        ]);

        Enrollment::create([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id
        ]);

        return redirect()->route('admin')->with('success', 'Student enrolled successfully.');
    }
    public function addCourse(Request $request)
    {
        // Implementation for adding a course
        $request->validate([
            'title' => 'required',
            'teacher_id' => 'required|exists:users,id'

        ]);

        Course::create([
            'title' => $request->title,
            'teacher_id' => $request->teacher_id
        ]);

        return redirect()->route('admin')->with('success', 'Course added successfully.');
    }
    /**
     * Store a newly created user from admin panel.
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        // The User model has the password cast set to 'hashed', so assigning
        // the plain password will be hashed automatically. Create the user.
        User::create($data);

        return redirect()->route('admin')->with('success', 'User created successfully.');
    }
    public function login(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect('/admin');
            } elseif ($user->role === 'teacher') {
                // return "teacher";
                return redirect('/teacher');
            } else {
                return redirect('/student');
            }
        } else {
            return back()->withErrors(['login_error' => 'Invalid credentials provided.']);
        }
    }

    public function markAtten(Request $req)
    {
        // dd($req);
        $req->validate([
            'student_id' => 'required',
            'course_id' => 'required',
            'status' => 'required'
            // 'date' => 'required'
        ]);
        $stud = Enrollment::where('student_id', $req->student_id)
            ->where('course_id', $req->course_id)
            ->first();
        // dd($req);
        Attendance::create([
            'enroll_id' => $stud->id,
            'mark_by' => Auth::user()->id,
            'status' => $req->status
            // 'date' => $req->date
        ]);

        return redirect()->route('teacher')->with('success', 'Attendance marked successfully.');
    }

    public function uploadMarks(Request $req)
    {
        // Validate
        $req->validate([
            'course_id' => 'required',
            'type' => 'required',
            'students' => 'required|array',
            'students.*.student_id' => 'required|integer',
            'students.*.obtained'   => 'required|numeric',
            'students.*.total'      => 'required|numeric',
        ]);

        foreach ($req->students as $row) {

            // Find enrollment
            $enrollment = Enrollment::where('student_id', $row['student_id'])
                ->where('course_id', $req->course_id)
                ->first();

            if (!$enrollment) {
                // Skip or handle missing enrollment
                continue;
            }

            // Create mark record
            Mark::create([
                'enroll_id' => $enrollment->id,
                'type' => $req->type,
                'obtained' => $row['obtained'],
                'total' => $row['total'],
                'mark_by' => Auth::id()
            ]);
        }

        return back()->with('success', 'Marks uploaded successfully!');
    }


    public function studentDashboard()
    {
        // Implementation for student dashboard
        $studentId = Auth::id();

        $courses = Enrollment::where('student_id', $studentId)
            ->with('course.teacher')
            ->get()
            ->pluck('course');

        $marks = Mark::whereHas('enrollment', function ($q) use ($studentId) {
            $q->where('student_id', $studentId);
        })
            ->with('course')
            ->get();

        $attendance = Attendance::whereHas('enrollment', function ($q) use ($studentId) {
            $q->where('student_id', $studentId);
        })
            ->with('course')
            ->get();

        return view('student', compact('courses', 'marks', 'attendance'));
    }
}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f5f6fa;
    }
    .sidebar {
      height: 100vh;
      background: #343a40;
      padding-top: 20px;
      position: fixed;
      width: 250px;
    }
    .sidebar a {
      color: #cfd2d6;
      padding: 15px;
      display: block;
      text-decoration: none;
    }
    .sidebar a:hover {
      background: #495057;
      color: #fff;
    }
    .content {
      margin-left: 260px;
      padding: 20px;
    }
    .card {
      border-radius: 10px;
    }
  </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
  <h4 class="text-white text-center mb-4">Admin Panel</h4>
  <a href="#users">Manage Users</a>
  <a href="#courses">Manage Courses</a>
  <a href="#enroll">Enroll Courses</a>
</div>

<!-- Main Content -->
<div class="content">

  <!-- USERS SECTION -->
  <section id="users" class="mb-5">
    <h3 class="mb-3">Manage Users</h3>
    <div class="card p-4 shadow-sm">
      <h5>Create New User</h5>
      <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
      <?php endif; ?>
      <form method="POST" action="<?php echo e(route('users.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="row mt-3">
          <div class="col-md-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
          </div>
          <div class="col-md-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
          </div>
          <div class="col-md-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
          </div>
          <div class="col-md-3">
            <label>Role</label>
            <select name="role" class="form-control">
              <option value="admin">admin</option>
              <option value="teacher">teacher</option>
              <option value="student">student</option>
            </select>
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create User</button>
      </form>

      <hr>

      <h5>User List</h5>
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
            <tr>
                <td><?php echo e($u->id); ?></td><td><?php echo e($u->name); ?></td><td><?php echo e($u->email); ?></td><td><?php echo e($u->role); ?></td>
                <td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <button class="btn btn-warning btn-sm">Edit</button>
              <button class="btn btn-danger btn-sm">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- COURSES SECTION -->
  <section id="courses" class="mb-5">
    <h3 class="mb-3">Manage Courses</h3>
    <div class="card p-4 shadow-sm">
      <h5>Add Course</h5>
      <form method="post" action=<?php echo e(route('course.add')); ?>>
        <?php echo csrf_field(); ?>
        <div class="row mt-3">
          <div class="col-md-6">
            <label>Course Name</label>
            <input type="text" name="title" class="form-control" placeholder="Course Title">
          </div>
          <div class="col-md-6">
            <label>Assign Teacher</label>
            <select class="form-control" name="teacher_id">
                <option selected disabled>Select Teacher</option>
                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value=<?php echo e($t->id); ?>><?php echo e($t->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              
              
            </select>
          </div>
        </div>

        <button class="btn btn-primary mt-3">Add Course</button>
      </form>

      <hr>

      <h5>Course List</h5>
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th>#</th>
            <th>Course Name</th>
            <th>Teacher</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
            <tr>
                <td><?php echo e($t->id); ?></td><td><?php echo e($c->title); ?></td><td><?php echo e($c->teacher_name); ?></td>
                <td>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <!-- ENROLL COURSES SECTION -->
  <section id="enroll" class="mb-5">
    <h3 class="mb-3">Enroll Courses</h3>
    <div class="card p-4 shadow-sm">
      <h5>Enroll Student in Course</h5>
      <form method="post" action=<?php echo e(route('student.enroll')); ?>>
        <?php echo csrf_field(); ?>
        <div class="row mt-3">
          <div class="col-md-4">
            <label>Select Student</label>
            <select class="form-control" name="student_id">
                <option selected disabled>Select</option>
<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value=<?php echo e($s->id); ?>><?php echo e($s->name); ?> - <?php echo e($s->id); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
             
            </select>
          </div>
          <div class="col-md-4">
            <label>Select Course</label>
            <select class="form-control" name="course_id">
                <option selected disabled>Select</option>
                <?php $__currentLoopData = $allCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value=<?php echo e($ac->id); ?>><?php echo e($ac->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </select>
          </div>
          <div class="col-md-4">
            <label>Enroll</label>
            <button class="btn btn-success w-100 mt-1">Enroll</button>
          </div>
        </div>
      </form>

      <hr>

      <h5>Enrollment Records</h5>
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th>#</th>
            <th>Student</th>
            <th>Course</th>
          
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $enrolled; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
            <tr>
                <td><?php echo e($e->id); ?></td><td><?php echo e($e->student_name); ?></td><td><?php echo e($e->course_title); ?></td>
                <td><button class="btn btn-danger btn-sm">Remove</button></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </section>

</div>

</body>
</html>
<?php /**PATH C:\Users\zohaib\Desktop\BS SE\3rd Semester\ISE\abdullah\myapp\resources\views\admin.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teacher Portal</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body { background: #f5f6fa; }
    .sidebar {
      height: 100vh;
      width: 250px;
      background: #283046;
      position: fixed;
      padding-top: 20px;
    }
    .sidebar a {
      color: #d6d6d6;
      display: block;
      padding: 14px;
      text-decoration: none;
    }
    .sidebar a:hover {
      background: #3b4253;
      color: #fff;
    }
    .content {
      margin-left: 260px;
      padding: 20px;
    }
    .card {
      border-radius: 12px;
    }
  </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
  <h4 class="text-center text-white mb-4">Teacher Portal</h4>
  <a href="#courses">My Courses</a>
  <a href="#attendance">Mark Attendance</a>
  <a href="#marks">Upload Marks</a>
</div>

<!-- Content -->
<div class="content">

  <!-- MY COURSES -->
  <section id="courses" class="mb-5">
    <h2>My Courses</h2>
  <ul class="border rounded">
<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <li class="h4 text-success"><?php echo e($c->id); ?> - <?php echo e($c->title); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
  </section>


  <!-- MARK ATTENDANCE SECTION -->
<section id="attendance" class="mb-5">
  <h3 class="mb-3">Mark Attendance</h3>

  <div class="card p-4 shadow-sm">

    <h5>Select Course</h5>
    <select id="courseSelect" class="form-control mt-2 mb-4">
      <option selected disabled>Select</option>
      <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($c->id); ?>"><?php echo e($c->title); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <h5 class="mt-4">Attendance for Today</h5>

    <table class="table table-bordered mt-3">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Student</th>
          <th>Status</th>
        </tr>
      </thead>

      <tbody>
        <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($s->id); ?></td>
          <td><?php echo e($s->name); ?> - <?php echo e($s->id); ?></td>

          <td>

            <!-- Auto Submit Form for Each Student -->
            <form method="POST" action=<?php echo e(route('mark.atten')); ?>>
              <?php echo csrf_field(); ?>

              <input type="hidden" name="student_id" value="<?php echo e($s->id); ?>">
              <input type="hidden" name="course_id" id="course_id_hidden" value="">
              <input type="hidden" name="date" value="<?php echo e(date('Y-m-d')); ?>">

              <select name="status" class="form-control" onchange="this.form.submit()">
                <option disabled selected>-</option>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
                <option value="Leave">Leave</option>
              </select>
            </form>

          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>

  </div>
</section>

<script>
  // When course changes, update hidden inputs inside each form
  document.getElementById("courseSelect").addEventListener("change", function () {
    const courseId = this.value;
    document.querySelectorAll("#course_id_hidden").forEach(input => {
      input.value = courseId;
    });
  });
</script>

  <!-- UPLOAD MARKS SECTION -->
  <section id="marks" class="mb-5">
    <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="alert alert-danger"><?php echo e($error); ?></div>
      
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <form method="POST" action=<?php echo e(route('upload.marks')); ?>>
      <?php echo csrf_field(); ?>
    <h3 class="mb-3">Upload Marks</h3>

    <div class="card p-4 shadow-sm">
      <h5>Select Course</h5>
      <select class="form-control mt-2 mb-4" name="course_id">
        <option selected disabled >-</option>
        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($c->id); ?>"><?php echo e($c->title); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </select>

      <h5>Select Assessment Type</h5>
      <select class="form-control mt-2 mb-4" name="type">
        <option value="Exam">Exam</option>
        <option value="Quiz">Quiz</option>
        <option value="Assignment">Assignment</option>
        <option value="Project">Project</option>
      </select>

      <table class="table table-striped mt-3">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Student</th>
            <th>Obtained Marks</th>
            <th>Total Marks</th>
          </tr>
        </thead>

                        <tbody>
                  <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($s->id); ?></td>

                    <td><?php echo e($s->name); ?> - <?php echo e($s->id); ?></td>

                    <td>
                      <input type="hidden" name="students[<?php echo e($index); ?>][student_id]" value="<?php echo e($s->id); ?>">
                      <input type="number" name="students[<?php echo e($index); ?>][obtained]" class="form-control" placeholder="Marks">
                    </td>

                    <td>
                      <input type="number" name="students[<?php echo e($index); ?>][total]" class="form-control" value="100">
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>

      </table>

      <button type="submit" class="btn btn-success">Submit Marks</button>
    </div>
  </form>
  </section>

</div>

</body>
</html>
<?php /**PATH C:\Users\zohaib\Desktop\BS SE\3rd Semester\ISE\abdullah\myapp\resources\views\teacher.blade.php ENDPATH**/ ?>
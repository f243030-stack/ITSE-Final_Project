<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Portal</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f5f6fa;
    }
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
  <h4 class="text-center text-white mb-4">Student Portal</h4>

  <a href="#courses">My Courses</a>
  <a href="#marks">My Marks</a>
  <a href="#attendance">My Attendance</a>
</div>

<!-- Content -->
<div class="content">

  <!-- My COURSES -->
  <section id="courses" class="mb-5">
    <h3 class="mb-3">My Courses</h3>

    <div class="card p-4 shadow-sm">
      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Course Title</th>
            <th>Teacher</th>
          </tr>
        </thead>

        <tbody>
          <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($c->id); ?></td>
            <td><?php echo e($c->title); ?></td>
            <td><?php echo e($c->teacher->name); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </section>


  <!-- MARKS SECTION -->
  <section id="marks" class="mb-5">
    <h3 class="mb-3">My Marks</h3>

    <div class="card p-4 shadow-sm">

      <table class="table table-bordered">
        <thead class="table-dark">
          <tr>
            <th>Course</th>
            <th>Assessment Type</th>
            <th>Obtained</th>
            <th>Total</th>
          </tr>
        </thead>

        <tbody>
          <?php $__currentLoopData = $marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($m->course->title); ?></td>
            <td><?php echo e($m->type); ?></td>
            <td><?php echo e($m->obtained); ?></td>
            <td><?php echo e($m->total); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>

    </div>
  </section>


  <!-- ATTENDANCE SECTION -->
  <section id="attendance" class="mb-5">
    <h3 class="mb-3">My Attendance</h3>

    <div class="card p-4 shadow-sm">

      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th>Course</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
        </thead>

        <tbody>
          <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($a->course->title); ?></td>
            <td>
              <?php if($a->status == "Present"): ?>
                <span class="badge bg-success">Present</span>
              <?php elseif($a->status == "Absent"): ?>
                <span class="badge bg-danger">Absent</span>
              <?php else: ?>
                <span class="badge bg-warning text-dark">Leave</span>
              <?php endif; ?>
            </td>
            <td><?php echo e($a->created_at->format('d M, Y')); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>

    </div>
  </section>

</div>

</body>
</html>
<?php /**PATH C:\Users\zohaib\Desktop\BS SE\3rd Semester\ISE\abdullah\myapp\resources\views\student.blade.php ENDPATH**/ ?>
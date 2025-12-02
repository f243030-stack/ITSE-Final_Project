<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Dashboard</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    :root {
      --primary-purple: #7b2ff7;
      --primary-purple-dark: #5a1cb0;
      --primary-purple-light: #9d5af9;
      --secondary-purple: #9c27b0;
      --accent-purple: #e1bee7;
      --sidebar-bg: #1e1b2e;
      --sidebar-text: #b0a8c9;
      --card-bg: #ffffff;
      --text-dark: #2d264b;
      --text-light: #6c6b7e;
      --success: #4caf50;
      --warning: #ff9800;
      --danger: #f44336;
      --info: #2196f3;
      --border-color: #eae8f2;
      --bg-light: #f8f7fc;
    }
    
    body {
      background-color: var(--bg-light);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--text-dark);
      overflow-x: hidden;
    }
    
    /* Sidebar Styles */
    .sidebar {
      height: 100vh;
      background: var(--sidebar-bg);
      padding-top: 30px;
      position: fixed;
      width: 260px;
      box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
      z-index: 100;
      transition: all 0.3s;
    }
    
    .sidebar-header {
      padding: 0 20px 25px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      margin-bottom: 20px;
      text-align: center;
    }
    
    .student-avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 32px;
      margin: 0 auto 15px;
      border: 3px solid rgba(255, 255, 255, 0.2);
    }
    
    .student-info h4 {
      color: white;
      font-weight: 700;
      font-size: 18px;
      margin-bottom: 5px;
    }
    
    .student-info p {
      color: var(--sidebar-text);
      font-size: 14px;
      margin: 0;
    }
    
    .sidebar-menu {
      padding: 0 15px;
    }
    
    .sidebar-menu a {
      color: var(--sidebar-text);
      padding: 14px 18px;
      display: flex;
      align-items: center;
      text-decoration: none;
      border-radius: 10px;
      margin-bottom: 8px;
      transition: all 0.2s;
      font-weight: 500;
    }
    
    .sidebar-menu a:hover, .sidebar-menu a.active {
      background: rgba(123, 47, 247, 0.2);
      color: white;
      transform: translateX(5px);
    }
    
    .sidebar-menu a i {
      margin-right: 12px;
      width: 24px;
      text-align: center;
      font-size: 18px;
    }
    
    /* Main Content */
    .content {
      margin-left: 260px;
      padding: 30px;
      transition: all 0.3s;
    }
    
    @media (max-width: 992px) {
      .sidebar {
        width: 70px;
      }
      
      .sidebar-header h4, .sidebar-header p, .sidebar-menu a span, .student-info {
        display: none;
      }
      
      .sidebar-menu a {
        justify-content: center;
        padding: 15px 0;
      }
      
      .sidebar-menu a i {
        margin-right: 0;
        font-size: 20px;
      }
      
      .content {
        margin-left: 70px;
      }
    }
    
    /* Header */
    .page-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      padding-bottom: 20px;
      border-bottom: 1px solid var(--border-color);
    }
    
    .page-header h2 {
      color: var(--text-dark);
      font-weight: 700;
      margin: 0;
      font-size: 28px;
    }
    
    .header-info {
      display: flex;
      align-items: center;
      gap: 15px;
    }
    
    .date-badge {
      background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
      color: white;
      padding: 8px 15px;
      border-radius: 20px;
      font-weight: 600;
      font-size: 14px;
    }
    
    /* Cards */
    .card {
      border-radius: 15px;
      border: none;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      background: var(--card-bg);
      margin-bottom: 30px;
      overflow: hidden;
    }
    
    .card-header {
      background: linear-gradient(135deg, var(--primary-purple), var(--primary-purple-dark));
      color: white;
      border: none;
      padding: 20px 25px;
      font-weight: 600;
      font-size: 18px;
      display: flex;
      align-items: center;
    }
    
    .card-header i {
      margin-right: 12px;
      font-size: 20px;
    }
    
    .card-body {
      padding: 25px;
    }
    
    /* Table Styles */
    .table {
      color: var(--text-dark);
      border-collapse: separate;
      border-spacing: 0;
    }
    
    .table thead th {
      background-color: #f9f8fd;
      border-bottom: 2px solid var(--border-color);
      font-weight: 700;
      color: var(--text-dark);
      padding: 18px 15px;
      position: sticky;
      top: 0;
    }
    
    .table tbody td {
      padding: 18px 15px;
      vertical-align: middle;
      border-color: var(--border-color);
    }
    
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(248, 247, 252, 0.5);
    }
    
    .table tbody tr:hover {
      background-color: rgba(123, 47, 247, 0.05);
      transform: translateY(-2px);
      transition: all 0.2s;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
    }
    
    /* Stats Cards */
    .stats-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }
    
    .stat-card {
      background: white;
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
      display: flex;
      align-items: center;
      transition: all 0.3s;
      border: 1px solid transparent;
    }
    
    .stat-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      border-color: var(--primary-purple-light);
    }
    
    .stat-icon {
      width: 60px;
      height: 60px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
      font-size: 24px;
    }
    
    .stat-icon.courses {
      background: rgba(123, 47, 247, 0.1);
      color: var(--primary-purple);
    }
    
    .stat-icon.marks {
      background: rgba(33, 150, 243, 0.1);
      color: var(--info);
    }
    
    .stat-icon.attendance {
      background: rgba(76, 175, 80, 0.1);
      color: var(--success);
    }
    
    .stat-info h5 {
      font-size: 28px;
      font-weight: 700;
      margin: 0;
      color: var(--text-dark);
    }
    
    .stat-info p {
      margin: 5px 0 0;
      color: var(--text-light);
      font-size: 14px;
    }
    
    /* Badge Styles */
    .badge {
      padding: 8px 14px;
      border-radius: 20px;
      font-weight: 600;
      font-size: 13px;
    }
    
    .badge-present {
      background-color: rgba(76, 175, 80, 0.15);
      color: var(--success);
    }
    
    .badge-absent {
      background-color: rgba(244, 67, 54, 0.15);
      color: var(--danger);
    }
    
    .badge-leave {
      background-color: rgba(255, 152, 0, 0.15);
      color: var(--warning);
    }
    
    /* Progress Bars */
    .progress-container {
      margin-top: 5px;
    }
    
    .progress {
      height: 8px;
      border-radius: 4px;
      background-color: #f0f0f0;
      overflow: hidden;
    }
    
    .progress-bar {
      border-radius: 4px;
    }
    
    /* Welcome Banner */
    .welcome-banner {
      background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
      color: white;
      border-radius: 15px;
      padding: 25px;
      margin-bottom: 30px;
      box-shadow: 0 5px 15px rgba(123, 47, 247, 0.2);
    }
    
    .welcome-banner h3 {
      font-weight: 700;
      margin-bottom: 10px;
    }
    
    .welcome-banner p {
      opacity: 0.9;
      margin-bottom: 0;
    }
    
    /* Marks Visualization */
    .marks-visual {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .marks-bar {
      flex: 1;
      height: 8px;
      background-color: #f0f0f0;
      border-radius: 4px;
      overflow: hidden;
    }
    
    .marks-fill {
      height: 100%;
      border-radius: 4px;
      background: linear-gradient(90deg, var(--primary-purple), var(--secondary-purple));
    }
    
    /* Course Cards */
    .course-card {
      background: white;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.04);
      border-left: 5px solid var(--primary-purple);
      transition: all 0.3s;
    }
    
    .course-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }
    
    .course-title {
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 5px;
    }
    
    .course-teacher {
      color: var(--text-light);
      font-size: 14px;
      margin-bottom: 15px;
    }
    
    /* Attendance Chart */
    .attendance-summary {
      display: flex;
      gap: 15px;
      margin-top: 15px;
    }
    
    .attendance-item {
      text-align: center;
      flex: 1;
    }
    
    .attendance-count {
      font-size: 24px;
      font-weight: 700;
      display: block;
    }
    
    .attendance-label {
      font-size: 13px;
      color: var(--text-light);
    }
    
    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 40px 20px;
    }
    
    .empty-state i {
      font-size: 60px;
      color: var(--border-color);
      margin-bottom: 20px;
    }
    
    .empty-state h5 {
      color: var(--text-light);
      margin-bottom: 10px;
    }
    
    .empty-state p {
      color: var(--text-light);
      max-width: 400px;
      margin: 0 auto;
    }
  </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
  <div class="sidebar-header">
    <div class="student-avatar">
      <i class="fas fa-user-graduate"></i>
    </div>
    <div class="student-info">
      <h4><?php echo e(Auth::user()->name ?? 'Student'); ?></h4>
      <p>ID: <?php echo e(Auth::user()->id ?? 'STU001'); ?></p>
    </div>
  </div>
  
  <div class="sidebar-menu">
    <a href="#courses" class="active" id="courses-tab">
      <i class="fas fa-book-open"></i>
      <span>My Courses</span>
    </a>
    <a href="#marks" id="marks-tab">
      <i class="fas fa-chart-line"></i>
      <span>My Marks</span>
    </a>
    <a href="#attendance" id="attendance-tab">
      <i class="fas fa-clipboard-check"></i>
      <span>My Attendance</span>
    </a>
  </div>
</div>

<!-- Content -->
<div class="content">
  <!-- Welcome Banner -->
  <div class="welcome-banner">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3>Welcome back, <?php echo e(Auth::user()->name ?? 'Student'); ?>!</h3>
        <p>Track your academic progress and stay updated with your courses.</p>
      </div>
      <div class="date-badge">
        <i class="fas fa-calendar-alt me-2"></i>
        <?php echo e(date('F j, Y')); ?>

      </div>
    </div>
  </div>
  
  <!-- Stats Overview -->
  <div class="stats-container">
    <div class="stat-card">
      <div class="stat-icon courses">
        <i class="fas fa-book"></i>
      </div>
      <div class="stat-info">
        <h5><?php echo e(count($courses)); ?></h5>
        <p>Enrolled Courses</p>
      </div>
    </div>
    
    <div class="stat-card">
      <div class="stat-icon marks">
        <i class="fas fa-star"></i>
      </div>
      <div class="stat-info">
        <h5><?php echo e(count($marks)); ?></h5>
        <p>Graded Assessments</p>
      </div>
    </div>
    
    <div class="stat-card">
      <div class="stat-icon attendance">
        <i class="fas fa-calendar-check"></i>
      </div>
      <div class="stat-info">
        <?php
          $presentCount = $attendance->where('status', 'Present')->count();
          $totalAttendance = $attendance->count();
          $attendancePercentage = $totalAttendance > 0 ? round(($presentCount / $totalAttendance) * 100) : 0;
        ?>
        <h5><?php echo e($attendancePercentage); ?>%</h5>
        <p>Attendance Rate</p>
      </div>
    </div>
  </div>
  
  <!-- Page Header -->
  <div class="page-header">
    <h2 id="section-title">My Courses</h2>
    <div class="header-info">
      <div class="date-badge d-none d-md-block">
        <i class="fas fa-clock me-2"></i>
        <?php echo e(date('h:i A')); ?>

      </div>
    </div>
  </div>

  <!-- COURSES SECTION -->
  <section id="courses" class="mb-5">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-book-open me-2"></i>My Enrolled Courses
      </div>
      <div class="card-body">
        <?php if(count($courses) > 0): ?>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th width="80">Course ID</th>
                  <th>Course Title</th>
                  <th>Instructor</th>
                  <th width="120">Progress</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $courseAttendance = $attendance->where('course_id', $c->id)->count();
                  $coursePresent = $attendance->where('course_id', $c->id)->where('status', 'Present')->count();
                  $attendanceRate = $courseAttendance > 0 ? round(($coursePresent / $courseAttendance) * 100) : 0;
                ?>
                <tr>
                  <td>
                    <span class="badge bg-purple px-3 py-2">#<?php echo e($c->id); ?></span>
                  </td>
                  <td>
                    <div class="course-title"><?php echo e($c->title); ?></div>
                    <small class="text-muted">Course Code: <?php echo e(substr(strtoupper($c->title), 0, 3)); ?><?php echo e($c->id); ?></small>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="teacher-avatar-small me-2">
                        <?php echo e(substr($c->teacher->name ?? 'Teacher', 0, 1)); ?>

                      </div>
                      <div>
                        <div><?php echo e($c->teacher->name ?? 'Not Assigned'); ?></div>
                        <small class="text-muted">Instructor</small>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="progress-container">
                      <div class="d-flex justify-content-between mb-1">
                        <small class="text-muted"><?php echo e($attendanceRate); ?>%</small>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo e($attendanceRate); ?>%" aria-valuenow="<?php echo e($attendanceRate); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <div class="empty-state">
            <i class="fas fa-book-open"></i>
            <h5>No courses enrolled</h5>
            <p>You are not currently enrolled in any courses. Please contact your academic advisor.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- MARKS SECTION -->
  <section id="marks" class="mb-5" style="display: none;">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-chart-line me-2"></i>My Academic Performance
      </div>
      <div class="card-body">
        <?php if(count($marks) > 0): ?>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Course</th>
                  <th>Assessment Type</th>
                  <th>Obtained Marks</th>
                  <th>Total Marks</th>
                  <th>Percentage</th>
                  <th>Grade</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $percentage = $m->total > 0 ? round(($m->obtained / $m->total) * 100) : 0;
                  
                  // Determine grade
                  if ($percentage >= 90) $grade = 'A+';
                  elseif ($percentage >= 85) $grade = 'A';
                  elseif ($percentage >= 80) $grade = 'A-';
                  elseif ($percentage >= 75) $grade = 'B+';
                  elseif ($percentage >= 70) $grade = 'B';
                  elseif ($percentage >= 65) $grade = 'B-';
                  elseif ($percentage >= 60) $grade = 'C+';
                  elseif ($percentage >= 55) $grade = 'C';
                  elseif ($percentage >= 50) $grade = 'C-';
                  elseif ($percentage >= 45) $grade = 'D';
                  else $grade = 'F';
                  
                  // Determine grade color
                  if ($percentage >= 80) $gradeColor = 'success';
                  elseif ($percentage >= 60) $gradeColor = 'warning';
                  else $gradeColor = 'danger';
                ?>
                <tr>
                  <td>
                    <strong><?php echo e($m->course->title ?? 'N/A'); ?></strong>
                  </td>
                  <td>
                    <span class="badge bg-purple"><?php echo e($m->type); ?></span>
                  </td>
                  <td>
                    <strong><?php echo e($m->obtained); ?></strong>
                  </td>
                  <td><?php echo e($m->total); ?></td>
                  <td>
                    <div class="marks-visual">
                      <div class="marks-bar">
                        <div class="marks-fill" style="width: <?php echo e($percentage); ?>%"></div>
                      </div>
                      <span class="percentage-value fw-bold"><?php echo e($percentage); ?>%</span>
                    </div>
                  </td>
                  <td>
                    <span class="badge bg-<?php echo e($gradeColor); ?> p-2"><?php echo e($grade); ?></span>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
          
          <!-- Overall Performance Summary -->
          <?php
            $totalObtained = $marks->sum('obtained');
            $totalPossible = $marks->sum('total');
            $overallPercentage = $totalPossible > 0 ? round(($totalObtained / $totalPossible) * 100) : 0;
          ?>
          <div class="mt-4 p-3" style="background-color: rgba(123, 47, 247, 0.05); border-radius: 10px;">
            <div class="row">
              <div class="col-md-6">
                <h5>Overall Performance</h5>
                <p class="text-muted">Based on all graded assessments</p>
              </div>
              <div class="col-md-6 text-end">
                <h2 class="mb-0" style="color: var(--primary-purple);"><?php echo e($overallPercentage); ?>%</h2>
                <div class="progress mt-2" style="height: 10px;">
                  <div class="progress-bar bg-purple" role="progressbar" style="width: <?php echo e($overallPercentage); ?>%" aria-valuenow="<?php echo e($overallPercentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        <?php else: ?>
          <div class="empty-state">
            <i class="fas fa-chart-line"></i>
            <h5>No marks available</h5>
            <p>Your marks will appear here once your instructors have graded your assessments.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- ATTENDANCE SECTION -->
  <section id="attendance" class="mb-5" style="display: none;">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-clipboard-check me-2"></i>My Attendance Record
      </div>
      <div class="card-body">
        <?php if(count($attendance) > 0): ?>
          <!-- Attendance Summary -->
          <?php
            $presentCount = $attendance->where('status', 'Present')->count();
            $absentCount = $attendance->where('status', 'Absent')->count();
            $leaveCount = $attendance->where('status', 'Leave')->count();
            $totalAttendance = $attendance->count();
            $attendancePercentage = $totalAttendance > 0 ? round(($presentCount / $totalAttendance) * 100) : 0;
          ?>
          
          <div class="row mb-4">
            <div class="col-md-8">
              <div class="attendance-summary">
                <div class="attendance-item">
                  <span class="attendance-count text-success"><?php echo e($presentCount); ?></span>
                  <span class="attendance-label">Present</span>
                </div>
                <div class="attendance-item">
                  <span class="attendance-count text-danger"><?php echo e($absentCount); ?></span>
                  <span class="attendance-label">Absent</span>
                </div>
                <div class="attendance-item">
                  <span class="attendance-count text-warning"><?php echo e($leaveCount); ?></span>
                  <span class="attendance-label">Leave</span>
                </div>
                <div class="attendance-item">
                  <span class="attendance-count" style="color: var(--primary-purple);"><?php echo e($totalAttendance); ?></span>
                  <span class="attendance-label">Total</span>
                </div>
              </div>
            </div>
            <div class="col-md-4 text-end">
              <h3 class="mb-0" style="color: var(--primary-purple);"><?php echo e($attendancePercentage); ?>%</h3>
              <p class="text-muted">Overall Attendance Rate</p>
            </div>
          </div>
          
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Course</th>
                  <th>Status</th>
                  <th>Day</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $attendance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $date = \Carbon\Carbon::parse($a->created_at);
                  $dayOfWeek = $date->format('l');
                  $formattedDate = $date->format('d M, Y');
                ?>
                <tr>
                  <td>
                    <strong><?php echo e($formattedDate); ?></strong>
                  </td>
                  <td><?php echo e($a->course->title ?? 'N/A'); ?></td>
                  <td>
                    <?php if($a->status == "Present"): ?>
                      <span class="badge badge-present">
                        <i class="fas fa-check-circle me-1"></i>Present
                      </span>
                    <?php elseif($a->status == "Absent"): ?>
                      <span class="badge badge-absent">
                        <i class="fas fa-times-circle me-1"></i>Absent
                      </span>
                    <?php else: ?>
                      <span class="badge badge-leave">
                        <i class="fas fa-calendar-minus me-1"></i>Leave
                      </span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <span class="text-muted"><?php echo e($dayOfWeek); ?></span>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <div class="empty-state">
            <i class="fas fa-clipboard-check"></i>
            <h5>No attendance records</h5>
            <p>Your attendance records will appear here once your instructors start marking attendance.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Tab switching functionality
    const coursesTab = document.getElementById('courses-tab');
    const marksTab = document.getElementById('marks-tab');
    const attendanceTab = document.getElementById('attendance-tab');
    
    const coursesSection = document.getElementById('courses');
    const marksSection = document.getElementById('marks');
    const attendanceSection = document.getElementById('attendance');
    const sectionTitle = document.getElementById('section-title');
    
    // Function to activate a tab and show corresponding section
    function activateTab(tab, section, title) {
      // Remove active class from all tabs
      coursesTab.classList.remove('active');
      marksTab.classList.remove('active');
      attendanceTab.classList.remove('active');
      
      // Hide all sections
      coursesSection.style.display = 'none';
      marksSection.style.display = 'none';
      attendanceSection.style.display = 'none';
      
      // Activate the selected tab and show its section
      tab.classList.add('active');
      section.style.display = 'block';
      sectionTitle.textContent = title;
    }
    
    // Initially show the courses section
    activateTab(coursesTab, coursesSection, 'My Courses');
    
    // Add click event listeners to tabs
    coursesTab.addEventListener('click', function(e) {
      e.preventDefault();
      activateTab(this, coursesSection, 'My Courses');
    });
    
    marksTab.addEventListener('click', function(e) {
      e.preventDefault();
      activateTab(this, marksSection, 'My Marks');
    });
    
    attendanceTab.addEventListener('click', function(e) {
      e.preventDefault();
      activateTab(this, attendanceSection, 'My Attendance');
    });
    
    // Add some additional styling
    const style = document.createElement('style');
    style.textContent = `
      .teacher-avatar-small {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--info), #03a9f4);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 14px;
      }
      
      .bg-purple {
        background-color: var(--primary-purple) !important;
      }
      
      .progress-bar.bg-purple {
        background-color: var(--primary-purple) !important;
      }
      
      .percentage-value {
        min-width: 50px;
        text-align: right;
      }
      
      .badge.bg-purple {
        padding: 6px 12px;
      }
      
      .badge.bg-success, .badge.bg-warning, .badge.bg-danger {
        font-size: 13px;
        padding: 8px 12px;
      }
    `;
    document.head.appendChild(style);
    
    // Add animation to table rows
    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach((row, index) => {
      row.style.animationDelay = `${index * 0.05}s`;
    });
  });
</script>

</body>
</html><?php /**PATH C:\Users\zohaib\Desktop\BS SE\3rd Semester\ISE\abdullah\myapp\resources\views/student.blade.php ENDPATH**/ ?>
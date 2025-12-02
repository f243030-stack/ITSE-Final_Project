<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teacher Portal</title>

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
      padding: 0 20px 30px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      margin-bottom: 20px;
      text-align: center;
    }
    
    .sidebar-header h4 {
      color: white;
      font-weight: 700;
      font-size: 22px;
      margin-bottom: 5px;
    }
    
    .sidebar-header p {
      color: var(--sidebar-text);
      font-size: 14px;
      margin: 0;
    }
    
    .teacher-avatar {
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
      
      .sidebar-header h4, .sidebar-header p, .sidebar-menu a span, .teacher-name {
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
    
    /* Form Styles */
    .form-label {
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 8px;
    }
    
    .form-control, .form-select {
      border: 1px solid var(--border-color);
      border-radius: 10px;
      padding: 12px 15px;
      transition: all 0.3s;
    }
    
    .form-control:focus, .form-select:focus {
      border-color: var(--primary-purple-light);
      box-shadow: 0 0 0 0.25rem rgba(123, 47, 247, 0.15);
    }
    
    /* Button Styles */
    .btn-primary {
      background-color: var(--primary-purple);
      border-color: var(--primary-purple);
      padding: 10px 25px;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s;
    }
    
    .btn-primary:hover, .btn-primary:focus {
      background-color: var(--primary-purple-dark);
      border-color: var(--primary-purple-dark);
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(123, 47, 247, 0.3);
    }
    
    .btn-success {
      background-color: var(--success);
      border-color: var(--success);
      border-radius: 10px;
      padding: 12px 25px;
      font-weight: 600;
    }
    
    .btn-success:hover {
      background-color: #3d8b40;
      border-color: #3d8b40;
      transform: translateY(-2px);
    }
    
    /* Table Styles */
    .table {
      color: var(--text-dark);
    }
    
    .table thead th {
      background-color: #f9f8fd;
      border-bottom: 2px solid var(--border-color);
      font-weight: 700;
      color: var(--text-dark);
      padding: 15px;
    }
    
    .table tbody td {
      padding: 15px;
      vertical-align: middle;
      border-color: var(--border-color);
    }
    
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgba(248, 247, 252, 0.5);
    }
    
    .table tbody tr:hover {
      background-color: rgba(123, 47, 247, 0.05);
    }
    
    /* Course List */
    .course-list {
      list-style: none;
      padding: 0;
    }
    
    .course-item {
      background: white;
      border-radius: 10px;
      padding: 18px 20px;
      margin-bottom: 15px;
      border-left: 5px solid var(--primary-purple);
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.04);
      display: flex;
      align-items: center;
      transition: all 0.3s;
    }
    
    .course-item:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }
    
    .course-icon {
      width: 50px;
      height: 50px;
      border-radius: 10px;
      background: rgba(123, 47, 247, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
      color: var(--primary-purple);
      font-size: 22px;
    }
    
    .course-info h5 {
      font-weight: 700;
      margin: 0;
      color: var(--text-dark);
    }
    
    .course-info p {
      margin: 5px 0 0;
      color: var(--text-light);
      font-size: 14px;
    }
    
    /* Status Badges */
    .status-badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-weight: 600;
      font-size: 13px;
    }
    
    .status-present {
      background-color: rgba(76, 175, 80, 0.15);
      color: var(--success);
    }
    
    .status-absent {
      background-color: rgba(244, 67, 54, 0.15);
      color: var(--danger);
    }
    
    .status-leave {
      background-color: rgba(255, 152, 0, 0.15);
      color: var(--warning);
    }
    
    /* Alert Styles */
    .alert {
      border-radius: 10px;
      border: none;
      padding: 15px 20px;
      margin-bottom: 20px;
    }
    
    .alert-danger {
      background-color: rgba(244, 67, 54, 0.1);
      color: var(--danger);
      border-left: 4px solid var(--danger);
    }
    
    /* Attendance Select */
    .attendance-select {
      min-width: 130px;
      border-radius: 8px;
      padding: 8px 12px;
      font-weight: 500;
      border: 1px solid var(--border-color);
      transition: all 0.2s;
    }
    
    .attendance-select:focus {
      border-color: var(--primary-purple);
      outline: none;
    }
    
    /* Marks Input */
    .marks-input {
      width: 100px;
      border-radius: 8px;
      padding: 8px 12px;
      border: 1px solid var(--border-color);
      text-align: center;
    }
    
    .marks-input:focus {
      border-color: var(--primary-purple);
      outline: none;
      box-shadow: 0 0 0 0.2rem rgba(123, 47, 247, 0.1);
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
  </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
  <div class="sidebar-header">
    <div class="teacher-avatar">
      <i class="fas fa-chalkboard-teacher"></i>
    </div>
    <h4>Teacher Portal</h4>
    <p class="teacher-name">Prof. <?php echo e(Auth::user()->name ?? 'Teacher'); ?></p>
  </div>
  
  <div class="sidebar-menu">
    <a href="#courses" class="active" id="courses-tab">
      <i class="fas fa-book-open"></i>
      <span>My Courses</span>
    </a>
    <a href="#attendance" id="attendance-tab">
      <i class="fas fa-clipboard-check"></i>
      <span>Mark Attendance</span>
    </a>
    <a href="#marks" id="marks-tab">
      <i class="fas fa-chart-line"></i>
      <span>Upload Marks</span>
    </a>
  </div>
</div>

<!-- Content -->
<div class="content">
  <!-- Welcome Banner -->
  <div class="welcome-banner">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <h3>Welcome back, Professor!</h3>
        <p>You have <?php echo e(count($courses)); ?> active courses and <?php echo e(count($students)); ?> students to manage.</p>
      </div>
      <div class="date-badge">
        <i class="fas fa-calendar-alt me-2"></i>
        <?php echo e(date('F j, Y')); ?>

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

  <!-- MY COURSES SECTION -->
  <section id="courses" class="mb-5">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-book-open me-2"></i>My Teaching Courses
      </div>
      <div class="card-body">
        <?php if(count($courses) > 0): ?>
          <div class="row">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="course-item">
                <div class="course-icon">
                  <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="course-info">
                  <h5><?php echo e($c->title); ?></h5>
                  <p>Course ID: <?php echo e($c->id); ?></p>
                  <p><small class="text-muted">Enrolled Students: <?php echo e(rand(15, 45)); ?></small></p>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php else: ?>
          <div class="text-center py-5">
            <div class="mb-3">
              <i class="fas fa-book fa-3x text-muted"></i>
            </div>
            <h5 class="text-muted">No courses assigned yet</h5>
            <p class="text-muted">You haven't been assigned to any courses yet.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- MARK ATTENDANCE SECTION -->
  <section id="attendance" class="mb-5" style="display: none;">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-clipboard-check me-2"></i>Mark Student Attendance
      </div>
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-md-6">
            <label class="form-label">Select Course</label>
            <select id="courseSelect" class="form-select">
              <option selected disabled>Choose a course</option>
              <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($c->id); ?>"><?php echo e($c->title); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Attendance Date</label>
            <input type="date" class="form-control" value="<?php echo e(date('Y-m-d')); ?>" readonly>
          </div>
        </div>

        <div class="alert alert-info">
          <i class="fas fa-info-circle me-2"></i>
          Select attendance status for each student. Changes are saved automatically.
        </div>

        <?php if(count($students) > 0): ?>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th width="60">ID</th>
                  <th>Student Name</th>
                  <th>Email</th>
                  <th width="180">Attendance Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><strong><?php echo e($s->id); ?></strong></td>
                  <td>
                    <div class="d-flex align-items-center">
                      <div class="student-avatar-small me-2">
                        <?php echo e(substr($s->name, 0, 1)); ?>

                      </div>
                      <?php echo e($s->name); ?>

                    </div>
                  </td>
                  <td>
                    <small class="text-muted"><?php echo e($s->email ?? 'N/A'); ?></small>
                  </td>
                  <td>
                    <!-- Auto Submit Form for Each Student -->
                    <form method="POST" action="<?php echo e(route('mark.atten')); ?>" class="attendance-form">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="student_id" value="<?php echo e($s->id); ?>">
                      <input type="hidden" name="course_id" class="course_id_hidden" value="">
                      <input type="hidden" name="date" value="<?php echo e(date('Y-m-d')); ?>">
                      
                      <select name="status" class="attendance-select" onchange="this.form.submit()">
                        <option value="" disabled selected>Select</option>
                        <option value="Present" class="text-success">Present</option>
                        <option value="Absent" class="text-danger">Absent</option>
                        <option value="Leave" class="text-warning">Leave</option>
                      </select>
                    </form>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <div class="text-center py-5">
            <div class="mb-3">
              <i class="fas fa-user-graduate fa-3x text-muted"></i>
            </div>
            <h5 class="text-muted">No students found</h5>
            <p class="text-muted">There are no students enrolled in your courses.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- UPLOAD MARKS SECTION -->
  <section id="marks" class="mb-5" style="display: none;">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-chart-line me-2"></i>Upload Student Marks
      </div>
      <div class="card-body">
        <?php if(count($errors) > 0): ?>
          <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger">
              <i class="fas fa-exclamation-circle me-2"></i><?php echo e($error); ?>

            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        
        <form method="POST" action="<?php echo e(route('upload.marks')); ?>" id="marksForm">
          <?php echo csrf_field(); ?>
          
          <div class="row mb-4">
            <div class="col-md-6">
              <label class="form-label">Select Course</label>
              <select class="form-select" name="course_id" required>
                <option selected disabled value="">Choose a course</option>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($c->id); ?>"><?php echo e($c->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Assessment Type</label>
              <select class="form-select" name="type" required>
                <option value="Exam">Final Exam</option>
                <option value="Quiz">Quiz</option>
                <option value="Assignment">Assignment</option>
                <option value="Project">Project</option>
                <option value="Midterm">Midterm</option>
              </select>
            </div>
          </div>

          <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>
            Enter obtained marks for each student. Total marks are set to 100 by default.
          </div>

          <?php if(count($students) > 0): ?>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th width="60">ID</th>
                    <th>Student Name</th>
                    <th width="150">Obtained Marks</th>
                    <th width="150">Total Marks</th>
                    <th width="100">Percentage</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><strong><?php echo e($s->id); ?></strong></td>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="student-avatar-small me-2">
                          <?php echo e(substr($s->name, 0, 1)); ?>

                        </div>
                        <?php echo e($s->name); ?>

                      </div>
                    </td>
                    <td>
                      <input type="hidden" name="students[<?php echo e($index); ?>][student_id]" value="<?php echo e($s->id); ?>">
                      <input type="number" name="students[<?php echo e($index); ?>][obtained]" 
                             class="marks-input obtained-marks" 
                             placeholder="0" 
                             min="0" 
                             max="100"
                             oninput="calculatePercentage(this, <?php echo e($index); ?>)">
                    </td>
                    <td>
                      <input type="number" name="students[<?php echo e($index); ?>][total]" 
                             class="marks-input total-marks" 
                             value="100"
                             min="1"
                             oninput="calculatePercentage(this, <?php echo e($index); ?>)">
                    </td>
                    <td>
                      <span id="percentage-<?php echo e($index); ?>" class="percentage-badge">0%</span>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
            
            <div class="d-flex justify-content-between align-items-center mt-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="confirmMarks" required>
                <label class="form-check-label" for="confirmMarks">
                  I confirm that all marks are entered correctly
                </label>
              </div>
              <button type="submit" class="btn btn-success px-4">
                <i class="fas fa-paper-plane me-2"></i>Submit Marks
              </button>
            </div>
          <?php else: ?>
            <div class="text-center py-5">
              <div class="mb-3">
                <i class="fas fa-user-graduate fa-3x text-muted"></i>
              </div>
              <h5 class="text-muted">No students found</h5>
              <p class="text-muted">There are no students enrolled to upload marks for.</p>
            </div>
          <?php endif; ?>
        </form>
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
    const attendanceTab = document.getElementById('attendance-tab');
    const marksTab = document.getElementById('marks-tab');
    
    const coursesSection = document.getElementById('courses');
    const attendanceSection = document.getElementById('attendance');
    const marksSection = document.getElementById('marks');
    const sectionTitle = document.getElementById('section-title');
    
    // Function to activate a tab and show corresponding section
    function activateTab(tab, section, title) {
      // Remove active class from all tabs
      coursesTab.classList.remove('active');
      attendanceTab.classList.remove('active');
      marksTab.classList.remove('active');
      
      // Hide all sections
      coursesSection.style.display = 'none';
      attendanceSection.style.display = 'none';
      marksSection.style.display = 'none';
      
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
    
    attendanceTab.addEventListener('click', function(e) {
      e.preventDefault();
      activateTab(this, attendanceSection, 'Mark Attendance');
    });
    
    marksTab.addEventListener('click', function(e) {
      e.preventDefault();
      activateTab(this, marksSection, 'Upload Marks');
    });
    
    // When course changes in attendance, update hidden inputs inside each form
    const courseSelect = document.getElementById("courseSelect");
    if (courseSelect) {
      courseSelect.addEventListener("change", function () {
        const courseId = this.value;
        document.querySelectorAll(".course_id_hidden").forEach(input => {
          input.value = courseId;
        });
      });
    }
    
    // Calculate percentage for marks
    window.calculatePercentage = function(input, index) {
      const row = input.closest('tr');
      const obtained = row.querySelector('.obtained-marks').value;
      const total = row.querySelector('.total-marks').value;
      
      if (obtained && total && total > 0) {
        const percentage = Math.round((obtained / total) * 100);
        const percentageBadge = document.getElementById(`percentage-${index}`);
        
        percentageBadge.textContent = `${percentage}%`;
        
        // Color code the percentage
        if (percentage >= 80) {
          percentageBadge.className = 'percentage-badge text-success fw-bold';
        } else if (percentage >= 60) {
          percentageBadge.className = 'percentage-badge text-warning fw-bold';
        } else if (percentage >= 40) {
          percentageBadge.className = 'percentage-badge text-primary fw-bold';
        } else {
          percentageBadge.className = 'percentage-badge text-danger fw-bold';
        }
      } else {
        document.getElementById(`percentage-${index}`).textContent = '0%';
      }
    };
    
    // Initialize all percentages
    document.querySelectorAll('.obtained-marks').forEach((input, index) => {
      calculatePercentage(input, index);
    });
    
    // Form validation
    const marksForm = document.getElementById('marksForm');
    if (marksForm) {
      marksForm.addEventListener('submit', function(e) {
        const confirmCheckbox = document.getElementById('confirmMarks');
        if (!confirmCheckbox.checked) {
          e.preventDefault();
          alert('Please confirm that all marks are entered correctly before submitting.');
          confirmCheckbox.focus();
        }
      });
    }
    
    // Add some styling for the student avatar badges
    const style = document.createElement('style');
    style.textContent = `
      .student-avatar-small {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 14px;
      }
      
      .percentage-badge {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 8px;
        background-color: #f5f5f5;
        min-width: 60px;
        text-align: center;
      }
      
      .attendance-form {
        margin: 0;
      }
      
      select.attendance-select option.text-success {
        color: var(--success) !important;
      }
      
      select.attendance-select option.text-danger {
        color: var(--danger) !important;
      }
      
      select.attendance-select option.text-warning {
        color: var(--warning) !important;
      }
    `;
    document.head.appendChild(style);
  });
</script>

</body>
</html><?php /**PATH C:\Users\zohaib\Desktop\BS SE\3rd Semester\ISE\abdullah\myapp\resources\views/teacher.blade.php ENDPATH**/ ?>
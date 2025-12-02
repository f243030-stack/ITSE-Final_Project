<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

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
      --bg-light: #f8f7fc;
      --sidebar-bg: #1e1b2e;
      --sidebar-text: #b0a8c9;
      --card-bg: #ffffff;
      --text-dark: #2d264b;
      --text-light: #6c6b7e;
      --success: #4caf50;
      --warning: #ff9800;
      --danger: #f44336;
      --border-color: #eae8f2;
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
      padding-top: 20px;
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
    
    .sidebar-menu {
      padding: 0 15px;
    }
    
    .sidebar-menu a {
      color: var(--sidebar-text);
      padding: 14px 15px;
      display: flex;
      align-items: center;
      text-decoration: none;
      border-radius: 8px;
      margin-bottom: 8px;
      transition: all 0.2s;
    }
    
    .sidebar-menu a:hover, .sidebar-menu a.active {
      background: rgba(123, 47, 247, 0.2);
      color: white;
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
      padding: 25px;
      transition: all 0.3s;
    }
    
    @media (max-width: 992px) {
      .sidebar {
        width: 70px;
      }
      
      .sidebar-header h4, .sidebar-header p, .sidebar-menu a span {
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
      padding-bottom: 15px;
      border-bottom: 1px solid var(--border-color);
    }
    
    .page-header h3 {
      color: var(--text-dark);
      font-weight: 700;
      margin: 0;
      font-size: 28px;
    }
    
    .user-info {
      display: flex;
      align-items: center;
    }
    
    .user-avatar {
      width: 45px;
      height: 45px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 600;
      margin-right: 10px;
    }
    
    /* Cards */
    .card {
      border-radius: 12px;
      border: none;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      background: var(--card-bg);
      margin-bottom: 25px;
      overflow: hidden;
    }
    
    .card-header {
      background-color: white;
      border-bottom: 1px solid var(--border-color);
      padding: 20px;
      font-weight: 600;
      color: var(--text-dark);
      font-size: 18px;
      display: flex;
      align-items: center;
    }
    
    .card-header i {
      color: var(--primary-purple);
      margin-right: 10px;
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
      border-radius: 8px;
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
      border-radius: 8px;
      font-weight: 600;
      transition: all 0.3s;
    }
    
    .btn-primary:hover, .btn-primary:focus {
      background-color: var(--primary-purple-dark);
      border-color: var(--primary-purple-dark);
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(123, 47, 247, 0.3);
    }
    
    .btn-warning {
      background-color: var(--warning);
      border-color: var(--warning);
      border-radius: 6px;
    }
    
    .btn-danger {
      background-color: var(--danger);
      border-color: var(--danger);
      border-radius: 6px;
    }
    
    .btn-success {
      background-color: var(--success);
      border-color: var(--success);
      border-radius: 8px;
      padding: 12px;
      font-weight: 600;
    }
    
    .btn-success:hover {
      background-color: #3d8b40;
      border-color: #3d8b40;
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
    
    /* Alert Styles */
    .alert {
      border-radius: 8px;
      border: none;
      padding: 15px 20px;
    }
    
    .alert-success {
      background-color: rgba(76, 175, 80, 0.1);
      color: var(--success);
      border-left: 4px solid var(--success);
    }
    
    /* Divider */
    .divider {
      height: 1px;
      background-color: var(--border-color);
      margin: 25px 0;
    }
    
    /* Stats Cards */
    .stats-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }
    
    .stat-card {
      background: white;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
      display: flex;
      align-items: center;
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
    
    .stat-icon.users {
      background: rgba(123, 47, 247, 0.1);
      color: var(--primary-purple);
    }
    
    .stat-icon.courses {
      background: rgba(156, 39, 176, 0.1);
      color: var(--secondary-purple);
    }
    
    .stat-icon.enrollments {
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
    
    /* Action buttons */
    .action-buttons .btn {
      margin-right: 8px;
      padding: 6px 15px;
      font-size: 14px;
    }
  </style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
  <div class="sidebar-header">
    <h4><i class="fas fa-crown me-2"></i>Admin Panel</h4>
    <p>Dashboard v2.0</p>
  </div>
  
  <div class="sidebar-menu">
    <a href="#users" class="active" id="users-tab">
      <i class="fas fa-users"></i>
      <span>Manage Users</span>
    </a>
    <a href="#courses" id="courses-tab">
      <i class="fas fa-book-open"></i>
      <span>Manage Courses</span>
    </a>
    <a href="#enroll" id="enroll-tab">
      <i class="fas fa-clipboard-list"></i>
      <span>Enroll Courses</span>
    </a>
  </div>
</div>

<!-- Main Content -->
<div class="content">
  <!-- Page Header -->
  <div class="page-header">
    <h3>Dashboard Overview</h3>
    <div class="user-info">
      <div class="user-avatar">AD</div>
      <div>
        <h6 class="mb-0">Admin User</h6>
        <small class="text-muted">Super Administrator</small>
      </div>
    </div>
  </div>
  
  <!-- Stats Cards -->
  <div class="stats-container">
    <div class="stat-card">
      <div class="stat-icon users">
        <i class="fas fa-users"></i>
      </div>
      <div class="stat-info">
        <h5><?php echo e(count($user)); ?></h5>
        <p>Total Users</p>
      </div>
    </div>
    
    <div class="stat-card">
      <div class="stat-icon courses">
        <i class="fas fa-book-open"></i>
      </div>
      <div class="stat-info">
        <h5><?php echo e(count($courses)); ?></h5>
        <p>Available Courses</p>
      </div>
    </div>
    
    <div class="stat-card">
      <div class="stat-icon enrollments">
        <i class="fas fa-clipboard-check"></i>
      </div>
      <div class="stat-info">
        <h5><?php echo e(count($enrolled)); ?></h5>
        <p>Active Enrollments</p>
      </div>
    </div>
  </div>

  <!-- USERS SECTION -->
  <section id="users" class="mb-5">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-users me-2"></i>Manage Users
      </div>
      <div class="card-body">
        <?php if(session('success')): ?>
          <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        
        <h5 class="mb-3">Create New User</h5>
        <form method="POST" action="<?php echo e(route('users.store')); ?>">
          <?php echo csrf_field(); ?>
          <div class="row mt-3">
            <div class="col-md-3 mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
            </div>
            <div class="col-md-3 mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email address" required>
            </div>
            <div class="col-md-3 mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" placeholder="Create password" required>
            </div>
            <div class="col-md-3 mb-3">
              <label class="form-label">Role</label>
              <select name="role" class="form-select">
                <option value="admin">Administrator</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
              </select>
            </div>
          </div>

          <button type="submit" class="btn btn-primary mt-2">
            <i class="fas fa-user-plus me-2"></i>Create User
          </button>
        </form>

        <div class="divider"></div>

        <h5 class="mb-3">User List</h5>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($u->id); ?></td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="user-avatar-small me-2" style="width: 35px; height: 35px; font-size: 14px;">
                      <?php echo e(substr($u->name, 0, 1)); ?>

                    </div>
                    <?php echo e($u->name); ?>

                  </div>
                </td>
                <td><?php echo e($u->email); ?></td>
                <td>
                  <span class="badge 
                    <?php if($u->role == 'admin'): ?> bg-purple 
                    <?php elseif($u->role == 'teacher'): ?> bg-warning 
                    <?php else: ?> bg-info <?php endif; ?> p-2">
                    <?php echo e(ucfirst($u->role)); ?>

                  </span>
                </td>
                <td class="action-buttons">
                  <button class="btn btn-warning btn-sm">
                    <i class="fas fa-edit me-1"></i>Edit
                  </button>
                  <button class="btn btn-danger btn-sm">
                    <i class="fas fa-trash me-1"></i>Delete
                  </button>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- COURSES SECTION -->
  <section id="courses" class="mb-5">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-book-open me-2"></i>Manage Courses
      </div>
      <div class="card-body">
        <h5 class="mb-3">Add New Course</h5>
        <form method="post" action="<?php echo e(route('course.add')); ?>">
          <?php echo csrf_field(); ?>
          <div class="row mt-3">
            <div class="col-md-6 mb-3">
              <label class="form-label">Course Name</label>
              <input type="text" name="title" class="form-control" placeholder="Enter course title">
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Assign Teacher</label>
              <select class="form-select" name="teacher_id">
                <option selected disabled>Select Teacher</option>
                <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($t->id); ?>"><?php echo e($t->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>

          <button class="btn btn-primary mt-2">
            <i class="fas fa-plus-circle me-2"></i>Add Course
          </button>
        </form>

        <div class="divider"></div>

        <h5 class="mb-3">Course List</h5>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Teacher</th>
                <th>Students</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($c->id); ?></td>
                <td>
                  <strong><?php echo e($c->title); ?></strong>
                </td>
                <td><?php echo e($c->teacher_name); ?></td>
                <td>
                  <span class="badge bg-secondary p-2">
                    <?php echo e(rand(5, 30)); ?> students
                  </span>
                </td>
                <td class="action-buttons">
                  <button class="btn btn-warning btn-sm">
                    <i class="fas fa-edit me-1"></i>Edit
                  </button>
                  <button class="btn btn-danger btn-sm">
                    <i class="fas fa-trash me-1"></i>Delete
                  </button>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <!-- ENROLL COURSES SECTION -->
  <section id="enroll" class="mb-5">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-clipboard-list me-2"></i>Enroll Courses
      </div>
      <div class="card-body">
        <h5 class="mb-3">Enroll Student in Course</h5>
        <form method="post" action="<?php echo e(route('student.enroll')); ?>">
          <?php echo csrf_field(); ?>
          <div class="row mt-3">
            <div class="col-md-4 mb-3">
              <label class="form-label">Select Student</label>
              <select class="form-select" name="student_id">
                <option selected disabled>Select Student</option>
                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($s->id); ?>"><?php echo e($s->name); ?> - ID: <?php echo e($s->id); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <label class="form-label">Select Course</label>
              <select class="form-select" name="course_id">
                <option selected disabled>Select Course</option>
                <?php $__currentLoopData = $allCourses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($ac->id); ?>"><?php echo e($ac->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="col-md-4 mb-3 d-flex align-items-end">
              <button class="btn btn-success w-100">
                <i class="fas fa-user-graduate me-2"></i>Enroll Student
              </button>
            </div>
          </div>
        </form>

        <div class="divider"></div>

        <h5 class="mb-3">Enrollment Records</h5>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Course</th>
                <th>Enrolled Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $enrolled; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($e->id); ?></td>
                <td><?php echo e($e->student_name); ?></td>
                <td><?php echo e($e->course_title); ?></td>
                <td><?php echo e(date('Y-m-d')); ?></td>
                <td>
                  <span class="badge bg-success p-2">Active</span>
                </td>
                <td>
                  <button class="btn btn-danger btn-sm">
                    <i class="fas fa-user-times me-1"></i>Remove
                  </button>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Tab switching functionality
    const usersTab = document.getElementById('users-tab');
    const coursesTab = document.getElementById('courses-tab');
    const enrollTab = document.getElementById('enroll-tab');
    
    const usersSection = document.getElementById('users');
    const coursesSection = document.getElementById('courses');
    const enrollSection = document.getElementById('enroll');
    
    // Function to activate a tab and show corresponding section
    function activateTab(tab, section) {
      // Remove active class from all tabs
      usersTab.classList.remove('active');
      coursesTab.classList.remove('active');
      enrollTab.classList.remove('active');
      
      // Hide all sections
      usersSection.style.display = 'none';
      coursesSection.style.display = 'none';
      enrollSection.style.display = 'none';
      
      // Activate the selected tab and show its section
      tab.classList.add('active');
      section.style.display = 'block';
    }
    
    // Initially show the users section
    activateTab(usersTab, usersSection);
    
    // Add click event listeners to tabs
    usersTab.addEventListener('click', function(e) {
      e.preventDefault();
      activateTab(this, usersSection);
    });
    
    coursesTab.addEventListener('click', function(e) {
      e.preventDefault();
      activateTab(this, coursesSection);
    });
    
    enrollTab.addEventListener('click', function(e) {
      e.preventDefault();
      activateTab(this, enrollSection);
    });
    
    // Add some styling for the user avatar badges
    const style = document.createElement('style');
    style.textContent = `
      .user-avatar-small {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-purple), var(--secondary-purple));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
      }
      
      .bg-purple {
        background-color: var(--primary-purple) !important;
      }
      
      .badge {
        border-radius: 6px;
        font-weight: 500;
      }
    `;
    document.head.appendChild(style);
    
    // Form validation feedback
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
      form.addEventListener('submit', function(e) {
        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
          if (!field.value.trim()) {
            field.style.borderColor = 'var(--danger)';
            isValid = false;
          } else {
            field.style.borderColor = '';
          }
        });
        
        if (!isValid) {
          e.preventDefault();
          alert('Please fill all required fields.');
        }
      });
    });
  });
</script>

</body>
</html><?php /**PATH C:\Users\zohaib\Desktop\BS SE\3rd Semester\ISE\abdullah\myapp\resources\views/admin.blade.php ENDPATH**/ ?>
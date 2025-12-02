<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Portal Login</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    :root {
      --primary-color: purple;
      --text-color: #333;
      --light-gray: #f8f9fa;
      --border-color: #ddd;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #fbf9fb;
      color: var(--text-color);
      height: 100vh;
      overflow: hidden;
    }
    
    .container-fluid {
      height: 100%;
    }
    
    .row {
      height: 100%;
    }
    
    /* Left panel styling */
    .left-panel {
      background-color: black;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }
    
    .logo {
      font-size: 24px;
      font-weight: 700;
      color: var(--primary-color);
      margin-bottom: 60px;
      text-align: center;
    }
    
    .welcome-text {
      text-align: center;
      max-width: 400px;
    }
    
    .welcome-text h1 {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 20px;
      color: purple;
    }
    
    .welcome-text p {
      font-size: 18px;
      color: #666;
      line-height: 1.6;
    }
    
    .welcome-icon {
      font-size: 120px;
      color: var(--primary-color);
      margin-bottom: 30px;
      opacity: 0.8;
    }
    
    /* Right panel styling */
    .right-panel {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px;
      background-color: rgb(99, 99, 99);
    }
    
    .login-form-container {
      width: 100%;
      max-width: 400px;
    }
    
    .login-header {
      margin-bottom: 30px;
      text-align: left;
      color: white;
    }
    
    .login-header h2 {
      font-size: 28px;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 10px;
    }
    
    .login-header p {
      color: #ffffff;
      font-size: 16px;
    }
    
    /* Form styling */
    .form-label {
      font-weight: 600;
      margin-bottom: 8px;
      color: #ffffff;
    }
    
    .form-control {
      padding: 12px 15px;
      border-radius: 8px;
      border: 1px solid var(--border-color);
      font-size: 16px;
      transition: all 0.3s;
    }
    
    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 0.2rem rgba(74, 107, 255, 0.25);
    }
    
    .input-group {
      margin-bottom: 20px;
    }
    
    .input-group .form-control {
      border-right: 0;
    }
    
    .input-group-text {
      background-color: white;
      border-left: 0;
      border-color: var(--border-color);
      color: #777;
    }
    
    .password-container {
      position: relative;
    }
    
    .toggle-password {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #777;
      cursor: pointer;
    }
    
    .forgot-password {
      text-align: right;
      margin-bottom: 25px;
    }
    
    .forgot-password a {
      color: var(--primary-color);
      text-decoration: none;
      font-size: 15px;
    }
    
    .forgot-password a:hover {
      text-decoration: underline;
    }
    
    /* Button styling */
    .btn-login {
      background-color: var(--primary-color);
      color: white;
      border: none;
      padding: 14px;
      font-size: 16px;
      font-weight: 600;
      border-radius: 8px;
      width: 100%;
      transition: all 0.3s;
      margin-bottom: 25px;
    }
    
    .btn-login:hover {
      background-color: purple;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .signup-link {
      text-align: center;
      color: #ffffff;
      font-size: 16px;
    }
    
    .signup-link a {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 600;
    }
    
    .signup-link a:hover {
      text-decoration: underline;
    }
    
    /* Divider */
    .divider {
      display: flex;
      align-items: center;
      margin: 25px 0;
      color: #777;
    }
    
    .divider::before, .divider::after {
      content: "";
      flex: 1;
      border-bottom: 1px solid var(--border-color);
    }
    
    .divider span {
      padding: 0 15px;
      font-size: 14px;
    }
    
    /* Social login buttons */
    .social-login {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-bottom: 25px;
    }
    
    .social-btn {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid var(--border-color);
      background-color: white;
      color: #555;
      font-size: 18px;
      transition: all 0.3s;
    }
    
    .social-btn:hover {
      background-color: #f8f9fa;
      transform: translateY(-2px);
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
      .left-panel {
        display: none;
      }
      
      .right-panel {
        padding: 30px 20px;
      }
    }
    
    @media (max-width: 576px) {
      .login-form-container {
        padding: 0 10px;
      }
      
      .login-header h2 {
        font-size: 24px;
      }
    }
    
    /* Error message styling */
    .error-message {
      color: #dc3545;
      font-size: 14px;
      margin-top: 5px;
      display: none;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Left Panel -->
      <div class="col-lg-6 left-panel d-none d-lg-block text-center">
        <div class="logo">
          <i class="fas fa-graduation-cap"></i> StudentPortal
        </div>
        
        <div class="welcome-icon text-center mb-4">
          <i class="fas fa-user-graduate"></i>
        </div>
        <div class="d-flex justify-content-center">
        <div class="welcome-text">
          <h1>Welcome to student portal</h1>
          <p>Login to access your account and explore all the features designed to enhance your learning experience.</p>
        </div>
        </div>
      </div>
      
      <!-- Right Panel -->
      <div class="col-lg-6 right-panel">
        <div class="login-form-container">
          <div class="login-header">
            <h2>Login</h2>
            <p>Enter your account details</p>

            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="alert alert-danger"><?php echo e($e); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          
          <form method="POST" action="<?php echo e(url('/login')); ?>" id="loginForm">
            <?php echo csrf_field(); ?>
            
            <div class="mb-3">
              <label class="form-label">Email</label>
              <div class="input-group">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
                <input type="text" name="email" class="form-control" placeholder="Enter username" value="<?php echo e(old('username')); ?>" required>
              </div>
              <div class="error-message" id="username-error">Please enter a valid username</div>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group password-container">
                <span class="input-group-text">
                  <i class="fas fa-lock"></i>
                </span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                <button type="button" class="toggle-password" id="togglePassword">
                  <i class="fas fa-eye"></i>
                </button>
              </div>
              <div class="error-message" id="password-error">Password must be at least 6 characters</div>
            </div>
            
            <div class="forgot-password">
              <a href="#" id="forgotPassword">Forgot Password?</a>
            </div>
            
            <button type="submit" class="btn btn-login">Login</button>
          </form>
          
          <div class="divider">
            <span>Or continue with</span>
          </div>
          
          <div class="social-login">
            <button type="button" class="social-btn">
              <i class="fab fa-google"></i>
            </button>
            <button type="button" class="social-btn">
              <i class="fab fa-facebook-f"></i>
            </button>
            <button type="button" class="social-btn">
              <i class="fab fa-twitter"></i>
            </button>
          </div>
          
          <p class="signup-link">
            Don't have an account? <a href="#" id="signupLink">Sign up</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Toggle password visibility
      const togglePassword = document.getElementById('togglePassword');
      const passwordInput = document.getElementById('password');
      
      togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        // Toggle eye icon
        const icon = this.querySelector('i');
        if (type === 'password') {
          icon.classList.remove('fa-eye-slash');
          icon.classList.add('fa-eye');
        } else {
          icon.classList.remove('fa-eye');
          icon.classList.add('fa-eye-slash');
        }
      });
      
      // Form validation
      const loginForm = document.getElementById('loginForm');
      const usernameInput = loginForm.querySelector('input[name="username"]');
      const passwordInput = document.getElementById('password');
      const usernameError = document.getElementById('username-error');
      const passwordError = document.getElementById('password-error');
      
      loginForm.addEventListener('submit', function(e) {
        let isValid = true;
        
        // Reset error messages
        usernameError.style.display = 'none';
        passwordError.style.display = 'none';
        
        // Validate username
        if (!usernameInput.value.trim()) {
          usernameError.textContent = 'Username is required';
          usernameError.style.display = 'block';
          isValid = false;
        } else if (usernameInput.value.trim().length < 3) {
          usernameError.textContent = 'Username must be at least 3 characters';
          usernameError.style.display = 'block';
          isValid = false;
        }
        
        // Validate password
        if (!passwordInput.value) {
          passwordError.textContent = 'Password is required';
          passwordError.style.display = 'block';
          isValid = false;
        } else if (passwordInput.value.length < 6) {
          passwordError.textContent = 'Password must be at least 6 characters';
          passwordError.style.display = 'block';
          isValid = false;
        }
        
        if (!isValid) {
          e.preventDefault();
        } else {
          // In a real application, this would submit to the server
          console.log('Form submitted successfully');
          // For demo purposes, we'll show an alert
          alert('Login form submitted successfully!');
        }
      });
      
      // Forgot password link
      document.getElementById('forgotPassword').addEventListener('click', function(e) {
        e.preventDefault();
        alert('Forgot password functionality would open a password reset form.');
      });
      
      // Sign up link
      document.getElementById('signupLink').addEventListener('click', function(e) {
        e.preventDefault();
        alert('Sign up functionality would redirect to a registration page.');
      });
      
      // Social login buttons
      document.querySelectorAll('.social-btn').forEach(button => {
        button.addEventListener('click', function() {
          const platform = this.querySelector('i').className.includes('google') ? 'Google' :
                         this.querySelector('i').className.includes('facebook') ? 'Facebook' : 'Twitter';
          alert(`${platform} login would be implemented here.`);
        });
      });
    });
  </script>
</body>
</html><?php /**PATH C:\Users\zohaib\Desktop\BS SE\3rd Semester\ISE\abdullah\myapp\resources\views/welcome.blade.php ENDPATH**/ ?>
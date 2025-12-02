<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f0f2f5;
      height: 100vh;
    }
    .login-box {
      max-width: 400px;
      margin: auto;
      margin-top: 10%;
      padding: 30px;
      background: white;
      border-radius: 10px;
      box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

  <div class="login-box">
    <h3 class="text-center mb-4">Login</h3>

    <form method="POST" action="<?php echo e(url('/login')); ?>">
        <?php echo csrf_field(); ?>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php echo e(old('email')); ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>

    <p class="text-center mt-3">
      Don't have an account? <a href="#">Register</a>
    </p>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php /**PATH C:\Users\zohaib\Desktop\BS SE\3rd Semester\ISE\abdullah\myapp\resources\views\welcome.blade.php ENDPATH**/ ?>
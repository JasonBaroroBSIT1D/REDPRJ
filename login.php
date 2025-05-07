<?php
session_start();

// Better security practices
$valid_username = "admin";
// In production, use a properly hashed password instead of plaintext
$valid_password_hash = password_hash("password123", PASSWORD_DEFAULT);
$error = "";
$success = "";

// CSRF protection
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $error = "Invalid request. Please try again.";
    } else {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING) ?? "";
        $password = $_POST["password"] ?? "";
        
        if ($username === $valid_username && password_verify($password, $valid_password_hash)) {
            $_SESSION["username"] = $username;
            $_SESSION["login_time"] = time();
            
            // Prevent session fixation
            session_regenerate_id(true);
            
            header("Location: index.php");
            exit();
        } else {
            // Use generic error message for security
            $error = "Invalid credentials. Please try again.";
            
            // Add a slight delay to prevent timing attacks
            usleep(rand(100000, 500000));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Red Cross Council</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      background-color: #f9f9f9;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      background-image: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
    }
    
    .login-container {
      background: white;
      padding: 2.5rem;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.08);
      width: 100%;
      max-width: 420px;
      transition: all 0.3s ease;
    }
    
    .login-container:hover {
      box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }
    
    .logo-container {
      text-align: center;
      margin-bottom: 1.5rem;
    }
    
    .logo {
      max-width: 100px;
      margin-bottom: 1rem;
    }
    
    h2 {
      color: #d32f2f;
      font-weight: 600;
      margin-bottom: 1.5rem;
      text-align: center;
    }
    
    .form-control {
      height: 50px;
      padding: 10px 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      margin-bottom: 1rem;
      transition: border-color 0.3s;
    }
    
    .form-control:focus {
      border-color: #d32f2f;
      box-shadow: 0 0 0 0.2rem rgba(211, 47, 47, 0.25);
    }
    
    .input-group {
      position: relative;
      margin-bottom: 1.5rem;
    }
    
    .input-icon {
      position: absolute;
      top: 17px;
      left: 15px;
      color: #999;
    }
    
    .has-icon {
      padding-left: 45px;
    }
    
    .btn-red {
      background-color: #d32f2f;
      color: white;
      border: none;
      height: 50px;
      border-radius: 8px;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: all 0.3s;
    }
    
    .btn-red:hover, .btn-red:focus {
      background-color: #b71c1c;
      box-shadow: 0 5px 15px rgba(211, 47, 47, 0.3);
    }
    
    .error-msg {
      color: #d32f2f;
      text-align: center;
      margin-bottom: 1rem;
      padding: 10px;
      background-color: rgba(211, 47, 47, 0.1);
      border-radius: 5px;
      font-size: 0.9rem;
    }
    
    .success-msg {
      color: #388e3c;
      text-align: center;
      margin-bottom: 1rem;
      padding: 10px;
      background-color: rgba(56, 142, 60, 0.1);
      border-radius: 5px;
      font-size: 0.9rem;
    }
    
    .forgot-password {
      text-align: right;
      margin-bottom: 1.5rem;
    }
    
    .forgot-password a {
      color: #666;
      font-size: 0.9rem;
      text-decoration: none;
    }
    
    .forgot-password a:hover {
      color: #d32f2f;
    }
    
    .footer-text {
      text-align: center;
      font-size: 0.85rem;
      color: #777;
      margin-top: 1.5rem;
    }
    
    .toggle-password {
      position: absolute;
      right: 15px;
      top: 17px;
      cursor: pointer;
      color: #999;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="logo-container">
      <img src="Red Cross.jpg" alt="Red Cross Logo" class="logo">
      <h2>Red Cross Council</h2>
    </div>
    
    <?php if (!empty($error)): ?>
      <div class="error-msg">
        <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
      <div class="success-msg">
        <i class="fas fa-check-circle"></i> <?= htmlspecialchars($success) ?>
      </div>
    <?php endif; ?>
    
    <form method="post" autocomplete="off">
      <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
      
      <div class="input-group">
        <i class="fas fa-user input-icon"></i>
        <input type="text" name="username" class="form-control has-icon" placeholder="Username" required autofocus>
      </div>
      
      <div class="input-group">
        <i class="fas fa-lock input-icon"></i>
        <input type="password" name="password" id="password" class="form-control has-icon" placeholder="Password" required>
        <i class="fas fa-eye toggle-password" id="togglePassword"></i>
      </div>
      
      <div class="forgot-password">
        <a href="forgot-password.php">Forgot Password?</a>
      </div>
      
      <button type="submit" class="btn btn-red w-100">
        <i class="fas fa-sign-in-alt"></i> Login
      </button>
      
      <div class="footer-text">
        &copy; <?= date('Y') ?> BSIT2A. All rights reserved.
      </div>
    </form>
  </div>
  
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    
    togglePassword.addEventListener('click', function() {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
    
    // Simple form validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
      const username = form.querySelector('input[name="username"]').value.trim();
      const password = form.querySelector('input[name="password"]').value.trim();
      
      if (!username || !password) {
        e.preventDefault();
        alert('Please fill in all fields');
      }
    });
  });
  </script>
</body>
</html>
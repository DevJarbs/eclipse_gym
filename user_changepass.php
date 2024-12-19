<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  <script src="https://kit.fontawesome.com/e525f445a9.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      height: 100vh;
      background-image: url(img/bg.jpg);
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      color: white;
      font-family: Arial, sans-serif;
    }
    .password-box {
      background: rgba(0, 0, 0, 0.7);
      padding: 20px 30px;
      border-radius: 8px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
      width: 100%;
      max-width: 400px;
    }
    .password-box h3 {
      font-size: 2rem;
      font-family: "League Spartan", sans-serif;
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
      color: rgb(255, 255, 255);
    }
    .input-group {
      position: relative;
      margin-bottom: 2.5rem;
    }
    .form-control {
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: #fff;
      height: 45px;
      border-radius: 5px;
      width: 97%
    }
    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.7);
      font-family: "Cairo", sans-serif;
    }
    .btn-change {
      background: linear-gradient(to right, #008090, #731A6C);
      color: #fff;
      font-size: 1rem;
      font-family: "Cairo", sans-serif;
      border: none;
      height: 45px;
      border-radius: 25px;
      width: 100%;
    }
    .btn-change:hover {
      background-color: #6a1b9a;
    }
    .eye-icon {
      position: absolute;
      top: 50%;
      left: 90%;
      transform: translateY(-50%);
      color: rgba(255, 255, 255, 0.7);
      cursor: pointer;
    }
  </style>
</head>
<body>
  <!-- Change Password Box -->
  <div class="password-box">
    <h3>Change Password</h3>
    <form action="userchangepass.php" method="POST" name="cpassform" id="cpassform">
      <!-- Current Password -->
      <div class="input-group">
        <input type="password" name="current_password" class="form-control" id="currentPassword" placeholder="Enter current password" required>
        <span class="eye-icon" onclick="togglePassword('currentPassword', this)">
          <i class="fa-solid fa-eye"></i>
        </span>
      </div>

      <!-- New Password -->
      <div class="input-group">
        <input type="password" name="new_password" class="form-control" id="newPassword" placeholder="Enter new password" required>
        <span class="eye-icon" onclick="togglePassword('newPassword', this)">
          <i class="fa-solid fa-eye"></i>
        </span>
      </div>

      <!-- Re-enter Password -->
      <div class="input-group">
        <input type="password" name="confirm_password" class="form-control" id="retypePassword" placeholder="Re-enter new password" required>
        <span class="eye-icon" onclick="togglePassword('retypePassword', this)">
          <i class="fa-solid fa-eye"></i>
        </span>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-change">Change Password</button>
      </div>
    </form>
  </div>
  <script src="JS/changepass.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  <script>
    function togglePassword(inputId, eyeIcon) {
      const passwordInput = document.getElementById(inputId);
      const icon = eyeIcon.querySelector("i");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        passwordInput.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>
</body>
</html>
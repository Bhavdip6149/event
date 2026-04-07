<?php
session_start();
require 'db_connect.php';

$message = '';
$show_otp_form = false;

// STEP 1: Enter email → Generate OTP
if (isset($_POST['get_otp'])) {
  $email = trim($_POST['email']);

  $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $_SESSION['reset_email'] = $email;
    $_SESSION['otp'] = rand(1000, 9999);
    $message = "✅ OTP generated successfully! (Demo OTP: <b>" . $_SESSION['otp'] . "</b>)";
    $show_otp_form = true;
  } else {
    $message = "❌ No account found with this email.";
  }
}

// STEP 2: Verify OTP and Reset Password
if (isset($_POST['reset_password'])) {
  $otp = trim($_POST['otp']);
  $new_pass = trim($_POST['new_password']);
  $confirm = trim($_POST['confirm_password']);

  if ($otp == $_SESSION['otp']) {
    if ($new_pass === $confirm) {
      $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
      $email = $_SESSION['reset_email'];

      $update = $conn->prepare("UPDATE users SET password_hash=? WHERE email=?");
      $update->bind_param("ss", $hashed, $email);

      if ($update->execute()) {
        $message = "✅ Password reset successfully! <a href='login.php'>Login now</a>";
        session_unset();
      } else {
        $message = "❌ Failed to update password.";
      }
    } else {
      $message = "❌ Passwords do not match.";
      $show_otp_form = true;
    }
  } else {
    $message = "❌ Invalid OTP. Try again.";
    $show_otp_form = true;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Forgot Password | EventHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #F0FFF4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .card {
      background: #fff;
      padding: 30px 35px;
      border-radius: 12px;
      width: 380px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h1 {
      color: #1F2937;
      font-size: 24px;
      margin-bottom: 15px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border-radius: 8px;
      border: 1px solid #ccc;
    }

    button {
      width: 100%;
      padding: 10px;
      background: #059669;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
    }

    button:hover {
      background: #047857;
    }

    .message {
      margin-top: 10px;
      color: #1f2937;
    }

    a {
      color: #059669;
      text-decoration: none;
      font-weight: 600;
    }
  </style>
</head>

<body>
  <div class="card">
    <h1>Forgot Password</h1>

    <?php if (!$show_otp_form): ?>
      <form method="POST">
        <input type="email" name="email" placeholder="Enter your registered email" required>
        <button type="submit" name="get_otp">Get OTP</button>
      </form>
    <?php else: ?>
      <form method="POST">
        <input type="text" name="otp" placeholder="Enter OTP" required>
        <input type="password" name="new_password" placeholder="New Password" required minlength="6">
        <input type="password" name="confirm_password" placeholder="Confirm Password" required minlength="6">
        <button type="submit" name="reset_password">Reset Password</button>
      </form>
    <?php endif; ?>

    <?php if ($message): ?>
      <p class="message"><?= $message ?></p>
    <?php endif; ?>

    <p style="margin-top:15px;">
      <a href="login.php">Back to Login</a>
    </p>
  </div>
</body>

</html>
\
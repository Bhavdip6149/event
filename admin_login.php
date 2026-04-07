<?php
session_start();
require 'db_connect.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $username = trim($_POST['username']);
  $password = $_POST['password'];

  // ✅ Prepare statement (ONLY username)
  $stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");

  if ($stmt) {
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $admin = $result->fetch_assoc();

      // ✅ Verify hashed password
      if (password_verify($password, $admin['password'])) {

        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $admin['id'];
        $_SESSION['username'] = $admin['username'];
        $_SESSION['name'] = $admin['name'] ?? '';

        echo "<script>
                        alert('Login Successfully');
                        window.location.href='admin_dashboard.php';
                      </script>";
        exit;
      } else {
        $error = "Invalid Username or Password.";
      }
    } else {
      $error = "Invalid Username or Password.";
    }
  } else {
    $error = "Database Error!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Admin Login | EventHub</title>

  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;

      background: linear-gradient(135deg, #ff7e5f, #feb47b, #86a8e7, #91eae4);
      background-size: 400% 400%;
      animation: gradientBG 8s ease infinite;
    }

    @keyframes gradientBG {
      0% {
        background-position: 0% 50%
      }

      50% {
        background-position: 100% 50%
      }

      100% {
        background-position: 0% 50%
      }
    }

    .login-box {
      background: rgba(255, 255, 255, 0.9);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      width: 350px;
      text-align: center;
    }

    .login-box input {
      width: 90%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .login-box button {
      background: #ff7e5f;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    .login-box button:hover {
      background: #feb47b;
    }

    .error {
      color: red;
      font-size: 14px;
    }
  </style>
</head>

<body>

  <div class="login-box">
    <h2>Admin Login</h2>

    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>

    <?php if ($error): ?>
      <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

  </div>

</body>

</html>
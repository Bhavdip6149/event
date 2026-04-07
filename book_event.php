<?php
// book_event.php
session_start();
require_once 'db_connect.php';

$error_message = '';
$success_message = '';

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Sanitize user inputs
  $event_type = trim($_POST['event']);
  $service_choice = trim($_POST['service']);
  $client_name = trim($_POST['name']);
  $client_email = trim($_POST['email']);
  $client_phone = trim($_POST['phone']);
  $event_date = trim($_POST['date']);
  $booking_date = date("Y-m-d H:i:s"); // Current timestamp

  // Validation
  if (empty($client_name) || empty($client_email) || empty($event_date)) {
    $error_message = "⚠️ Name, Email, and Event Date are required fields.";
  } elseif (!filter_var($client_email, FILTER_VALIDATE_EMAIL)) {
    $error_message = "❌ Invalid email format.";
  } elseif (!preg_match("/^[0-9]{10}$/", $client_phone)) {
    $error_message = "📱 Please enter a valid 10-digit phone number.";
  } else {
    // Insert booking data
    $stmt = $conn->prepare("
            INSERT INTO bookings 
            (user_id, event_type, service_choice, client_name, client_email, client_phone, event_date, booking_date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
    if ($stmt) {
      $stmt->bind_param(
        "isssssss",
        $user_id,
        $event_type,
        $service_choice,
        $client_name,
        $client_email,
        $client_phone,
        $event_date,
        $booking_date
      );

      if ($stmt->execute()) {
        $success_message = "🎉 Booking confirmed successfully! Check your profile for booking history.";
      } else {
        $error_message = "❌ Booking failed. Please try again later.";
      }
      $stmt->close();
    } else {
      $error_message = "❌ Database query failed: " . $conn->error;
    }
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Your Event | EventHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --color-primary: #1F2937;
      --color-accent: #059669;
      --color-highlight: #F59E0B;
      --color-bg-subtle: #F0FFF4;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, var(--color-bg-subtle), #E5E7EB);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background: #fff;
      padding: 35px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
      width: 420px;
      max-width: 90%;
      text-align: center;
    }

    h2 {
      color: var(--color-primary);
      font-weight: 700;
      margin-bottom: 20px;
    }

    /* Inputs & Selects */
    input,
    select {
      width: 100%;
      padding: 12px;
      margin-bottom: 18px;
      border: 1px solid #ddd;
      border-radius: 8px;
      outline: none;
      font-size: 15px;
      transition: 0.3s;
    }

    input:focus,
    select:focus {
      border-color: var(--color-highlight);
      box-shadow: 0 0 5px rgba(245, 158, 11, 0.4);
    }

    /* Buttons */
    button {
      width: 100%;
      padding: 14px;
      background: var(--color-accent);
      border: none;
      color: white;
      font-size: 17px;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 6px 15px rgba(5, 150, 105, 0.4);
    }

    button:hover {
      background: #047857;
      transform: translateY(-1px);
    }

    /* Back button */
    .back-btn {
      display: inline-block;
      background: var(--color-highlight);
      color: white;
      font-weight: 600;
      padding: 10px 18px;
      border-radius: 8px;
      text-decoration: none;
      margin-bottom: 20px;
      box-shadow: 0 4px 10px rgba(245, 158, 11, 0.4);
      transition: 0.3s;
    }

    .back-btn:hover {
      background: #d97706;
      transform: translateY(-2px);
    }

    /* Message Styles */
    .message {
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 8px;
      font-weight: 600;
    }

    .error {
      background-color: #fee2e2;
      color: #ef4444;
    }

    .success {
      background-color: #d1fae5;
      color: #059669;
    }
  </style>
</head>

<body>
  <div class="form-container">
    <a href="index.php" class="back-btn">← Back to Home</a>
    <h2>Book Your Event</h2>

    <?php if ($error_message): ?>
      <div class="message error"><?= htmlspecialchars($error_message) ?></div>
    <?php elseif ($success_message): ?>
      <div class="message success"><?= htmlspecialchars($success_message) ?></div>
    <?php endif; ?>

    <form action="book_event.php" method="POST">
      <label for="event">Event</label>
      <select id="event" name="event" required>
        <option value="">-- Select Event --</option>
        <option value="Wedding">Wedding</option>
        <option value="Birthday">Birthday Party</option>
        <option value="Seminar">Seminar</option>
        <option value="Engagement">Engagement</option>
      </select>

      <label for="service">Choose Service</label>
      <select id="service" name="service" required>
        <option value="">-- Select Service --</option>
        <option value="Balloon decor">Balloon Decor</option>
        <option value="Flower decor">Flower Decor</option>
        <option value="Lighting decor">Lighting Decor</option>
      </select>

      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" placeholder="Enter your name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>

      <label for="phone">Phone</label>
      <input type="tel" id="phone" name="phone" placeholder="Enter your 10-digit phone number" required>

      <label for="date">Event Date</label>
      <input type="date" id="date" name="date" required>

      <button type="submit">Confirm Booking</button>
    </form>
  </div>
</body>

</html>
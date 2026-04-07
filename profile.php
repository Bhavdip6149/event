<?php
session_start();
require 'db_connect.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit();
}

$user_id = $_SESSION['user_id'];
$message = "";

// ✅ Fetch user info
$stmt = $conn->prepare("SELECT fullname, email, profile_photo FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc() ?? ['fullname' => '', 'email' => '', 'profile_photo' => 'default.png'];

// ✅ Update profile
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['update_profile'])) {
  $fullname = trim($_POST['fullname']);
  $email = trim($_POST['email']);
  $photo = $user['profile_photo'];
  $target_dir = "uploads/profile_photos/";

  if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
  }

  if (!empty($_FILES['profile_photo']['name'])) {
    $file_name = time() . "_" . basename($_FILES["profile_photo"]["name"]);
    $target_file = $target_dir . $file_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($imageFileType, $allowed_types)) {
      if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
        if (!empty($user['profile_photo']) && $user['profile_photo'] !== 'default.png' && file_exists($target_dir . $user['profile_photo'])) {
          unlink($target_dir . $user['profile_photo']);
        }
        $photo = $file_name;
      } else {
        $message = "❌ Error uploading photo.";
      }
    } else {
      $message = "❌ Only JPG, JPEG, PNG, or GIF allowed.";
    }
  }

  $update = $conn->prepare("UPDATE users SET fullname=?, email=?, profile_photo=? WHERE id=?");
  $update->bind_param("sssi", $fullname, $email, $photo, $user_id);
  if ($update->execute()) {
    $message = "✅ Profile updated successfully!";
    $user['fullname'] = $fullname;
    $user['email'] = $email;
    $user['profile_photo'] = $photo;
  } else {
    $message = "❌ Failed to update profile.";
  }
}

// ✅ Cancel booking by user
if (isset($_GET['cancel_id'])) {
  $cancel_id = intval($_GET['cancel_id']);
  $cancel_stmt = $conn->prepare("UPDATE bookings SET status='Cancelled' WHERE id=? AND user_id=? AND status='Pending'");
  $cancel_stmt->bind_param("ii", $cancel_id, $user_id);
  $cancel_stmt->execute();
  $message = "🚫 Booking cancelled successfully!";
}

// ✅ Fetch booking history safely
$bookings = $conn->prepare("
    SELECT id, event_type, service_choice, event_date, booking_date, status 
    FROM bookings 
    WHERE user_id=? 
    ORDER BY booking_date DESC
");
$bookings->bind_param("i", $user_id);
$bookings->execute();
$booking_result = $bookings->get_result();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>My Profile | EventHub</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #91eae4, #86a8e7);
      margin: 0;
      padding: 0;
    }

    .container {
      width: 90%;
      max-width: 1000px;
      margin: 40px auto;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
      padding: 30px;
    }

    .profile {
      text-align: center;
      border-bottom: 2px solid #eee;
      padding-bottom: 20px;
    }

    .profile img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #10b981;
    }

    .profile h2 {
      color: #111827;
      margin: 10px 0;
    }

    .profile p {
      color: #6b7280;
    }

    form input,
    form button {
      width: 90%;
      margin: 8px 0;
      padding: 10px;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-family: 'Poppins', sans-serif;
    }

    form button {
      background: #10b981;
      color: white;
      border: none;
      cursor: pointer;
      font-weight: 600;
    }

    form button:hover {
      background: #059669;
    }

    .table-container {
      margin-top: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
    }

    table th,
    table td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }

    table th {
      background: #10b981;
      color: white;
    }

    .status-pending {
      color: #f59e0b;
      font-weight: bold;
    }

    .status-approved {
      color: #16a34a;
      font-weight: bold;
    }

    .status-rejected {
      color: #dc2626;
      font-weight: bold;
    }

    .status-cancelled {
      color: #6b7280;
      font-weight: bold;
    }

    .cancel-btn {
      background: #ef4444;
      color: white;
      padding: 6px 10px;
      border-radius: 5px;
      text-decoration: none;
      font-size: 13px;
    }

    .cancel-btn:hover {
      background: #b91c1c;
    }

    .message {
      text-align: center;
      font-weight: 600;
      color: #374151;
      margin-top: 10px;
    }

    .logout {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #e11d48;
      font-weight: 600;
      text-decoration: none;
    }

    .logout:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="profile">
      <img src="<?= htmlspecialchars('uploads/profile_photos/' . ($user['profile_photo'] ?: 'default.png')) ?>" alt="Profile">
      <h2><?= htmlspecialchars($user['fullname']) ?></h2>
      <p><?= htmlspecialchars($user['email']) ?></p>
    </div>

    <form method="POST" enctype="multipart/form-data">
      <input type="text" name="fullname" value="<?= htmlspecialchars($user['fullname']) ?>" placeholder="Full Name" required><br>
      <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" placeholder="Email" required><br>
      <input type="file" name="profile_photo" accept="image/*"><br>
      <button type="submit" name="update_profile">Update Profile</button>
    </form>

    <?php if (!empty($message)): ?>
      <p class="message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <div class="table-container">
      <h3>📅 My Booking History</h3>
      <table>
        <tr>
          <th>ID</th>
          <th>Event Type</th>
          <th>Service</th>
          <th>Event Date</th>
          <th>Booking Date</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        <?php if ($booking_result->num_rows > 0): ?>
          <?php while ($row = $booking_result->fetch_assoc()): ?>
            <tr>
              <td><?= htmlspecialchars($row['id']) ?></td>
              <td><?= htmlspecialchars($row['event_type']) ?></td>
              <td><?= htmlspecialchars($row['service_choice']) ?></td>
              <td><?= htmlspecialchars($row['event_date']) ?></td>
              <td><?= htmlspecialchars($row['booking_date']) ?></td>
              <td class="status-<?= strtolower($row['status']) ?>">
                <?= htmlspecialchars($row['status']) ?>
              </td>
              <td>
                <?php if ($row['status'] === 'Pending'): ?>
                  <a class="cancel-btn" href="?cancel_id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to cancel this booking?')">Cancel</a>
                <?php elseif ($row['status'] === 'Cancelled'): ?>
                  🚫
                <?php elseif ($row['status'] === 'Approved'): ?>
                  ✅
                <?php elseif ($row['status'] === 'Rejected'): ?>
                  ❌
                <?php endif; ?>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" style="text-align:center;">No bookings found.</td>
          </tr>
        <?php endif; ?>
      </table>
    </div>

    <a href="User_logout.php" class="logout">Logout</a>
  </div>

</body>

</html>
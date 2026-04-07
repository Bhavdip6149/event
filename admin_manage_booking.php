<?php
session_start();
require_once 'db_connect.php';

// 🔒 Security Check
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Initialize variables
$mode = 'list';
$error_message = '';
$edit_id = null;
$booking_data = [
    'client_name' => '', 'client_email' => '', 'client_phone' => '',
    'event_type' => '', 'service_choice' => '', 'event_date' => '', 'status' => 'Pending'
];

// 🧭 Handle Actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    // Approve Booking
    if ($action === 'approve' && $id) {
        $conn->query("UPDATE bookings SET status='Approved' WHERE id=$id");
        header("Location: admin_manage_booking.php");
        exit();
    }

    // Reject Booking
    if ($action === 'reject' && $id) {
        $conn->query("UPDATE bookings SET status='Rejected' WHERE id=$id");
        header("Location: admin_manage_booking.php");
        exit();
    }

    // Delete Booking
    if ($action === 'delete' && $id) {
        $conn->query("DELETE FROM bookings WHERE id=$id");
        header("Location: admin_manage_booking.php");
        exit();
    }

    // Edit Mode
    if ($action === 'edit' && $id) {
        $mode = 'edit';
        $edit_id = $id;
        $res = $conn->query("SELECT * FROM bookings WHERE id=$id");
        if ($res->num_rows === 1) {
            $booking_data = $res->fetch_assoc();
        } else {
            $error_message = "Booking not found!";
        }
    }

    // Add Mode
    if ($action === 'add') {
        $mode = 'add';
    }
}

// 💾 Handle Add/Edit Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_name = trim($_POST['client_name']);
    $client_email = trim($_POST['client_email']);
    $client_phone = trim($_POST['client_phone']);
    $event_type = trim($_POST['event_type']);
    $service_choice = trim($_POST['service_choice']);
    $event_date = trim($_POST['event_date']);
    $status = isset($_POST['status']) ? $_POST['status'] : 'Pending';

    if (empty($client_name) || empty($event_type) || empty($event_date)) {
        $error_message = "Client Name, Event Type, and Event Date are required.";
    } else {
        if (isset($_POST['edit_id']) && !empty($_POST['edit_id'])) {
            // 🔁 Update Booking
            $edit_id = (int)$_POST['edit_id'];
            $stmt = $conn->prepare("UPDATE bookings SET client_name=?, client_email=?, client_phone=?, event_type=?, service_choice=?, event_date=?, status=? WHERE id=?");
            $stmt->bind_param("sssssssi", $client_name, $client_email, $client_phone, $event_type, $service_choice, $event_date, $status, $edit_id);
            $stmt->execute();
            $stmt->close();
        } else {
            // ➕ Add New Booking
            $stmt = $conn->prepare("INSERT INTO bookings (client_name, client_email, client_phone, event_type, service_choice, event_date, status) VALUES (?, ?, ?, ?, ?, ?, 'Pending')");
            $stmt->bind_param("ssssss", $client_name, $client_email, $client_phone, $event_type, $service_choice, $event_date);
            $stmt->execute();
            $stmt->close();
        }

        header("Location: admin_manage_booking.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Manage Bookings</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body { font-family:'Poppins',sans-serif; background:#f9fafb; padding:30px; }
.container { max-width:1100px; margin:auto; background:white; padding:25px; border-radius:10px; box-shadow:0 5px 15px rgba(0,0,0,0.1); }
h1 { text-align:center; color:#1f2937; border-bottom:3px solid #059669; padding-bottom:10px; margin-bottom:20px; }
table { width:100%; border-collapse:collapse; margin-top:20px; }
th, td { padding:10px 12px; border-bottom:1px solid #ddd; text-align:left; }
th { background:#059669; color:white; }
tr:hover { background:#f1f5f9; }
.actions a, .actions button {
  text-decoration:none; color:white; padding:6px 10px; border-radius:5px; margin:2px;
  display:inline-block; font-size:14px; border:none; cursor:pointer;
}
.btn-add { background:#2563eb; padding:8px 15px; font-weight:600; border-radius:5px; color:white; text-decoration:none; }
.btn-approve { background:#059669; }
.btn-reject { background:#dc2626; }
.btn-edit { background:#2563eb; }
.btn-delete { background:#6b7280; }
.status { padding:5px 10px; border-radius:5px; font-weight:bold; }
.status.Pending { background:#fef3c7; color:#92400e; }
.status.Approved { background:#d1fae5; color:#065f46; }
.status.Rejected { background:#fee2e2; color:#991b1b; }
.form-group { margin-bottom:15px; }
label { font-weight:600; display:block; margin-bottom:5px; color:#374151; }
input, select { width:100%; padding:10px; border:1px solid #ddd; border-radius:5px; }
button.submit { background:#059669; color:white; padding:10px 20px; border:none; border-radius:5px; cursor:pointer; font-weight:600; }
.error { background:#fee2e2; color:#b91c1c; padding:10px; border-radius:5px; margin-bottom:15px; }
.back { display:inline-block; margin-bottom:10px; color:#2563eb; text-decoration:none; font-weight:600; }
</style>
</head>
<body>

<div class="container">
<h1>Admin Manage Bookings</h1>

<?php if ($error_message): ?>
<div class="error"><?= htmlspecialchars($error_message) ?></div>
<?php endif; ?>

<?php if ($mode === 'list'): ?>

<a href="?action=add" class="btn-add">+ Add New Booking</a>

<table>
<thead>
<tr>
<th>ID</th><th>Client</th><th>Email</th><th>Phone</th>
<th>Event</th><th>Service</th><th>Date</th><th>Status</th><th>Actions</th>
</tr>
</thead>
<tbody>
<?php
$res = $conn->query("SELECT * FROM bookings ORDER BY created_at DESC");
if ($res->num_rows > 0):
while ($row = $res->fetch_assoc()):
?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= htmlspecialchars($row['client_name']) ?></td>
<td><?= htmlspecialchars($row['client_email']) ?></td>
<td><?= htmlspecialchars($row['client_phone']) ?></td>
<td><?= htmlspecialchars($row['event_type']) ?></td>
<td><?= htmlspecialchars($row['service_choice']) ?></td>
<td><?= htmlspecialchars($row['event_date']) ?></td>
<td><span class="status <?= $row['status'] ?>"><?= $row['status'] ?></span></td>
<td class="actions">
<?php if ($row['status'] === 'Pending'): ?>
<a href="?action=approve&id=<?= $row['id'] ?>" class="btn-approve">Approve</a>
<a href="?action=reject&id=<?= $row['id'] ?>" class="btn-reject">Reject</a>
<?php endif; ?>
<a href="?action=edit&id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
<a href="?action=delete&id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
</td>
</tr>
<?php endwhile; else: ?>
<tr><td colspan="9" style="text-align:center;">No bookings found.</td></tr>
<?php endif; ?>
</tbody>
</table>

<?php elseif ($mode === 'add' || $mode === 'edit'): ?>
<a href="admin_manage_booking.php" class="back">← Back to Bookings</a>
<h2><?= $mode === 'edit' ? 'Edit Booking' : 'Add New Booking' ?></h2>
<form method="POST">
<?php if ($mode === 'edit'): ?>
<input type="hidden" name="edit_id" value="<?= $edit_id ?>">
<?php endif; ?>
<div class="form-group">
<label>Client Name *</label>
<input type="text" name="client_name" value="<?= htmlspecialchars($booking_data['client_name']) ?>" required>
</div>
<div class="form-group">
<label>Client Email</label>
<input type="email" name="client_email" value="<?= htmlspecialchars($booking_data['client_email']) ?>">
</div>
<div class="form-group">
<label>Client Phone</label>
<input type="text" name="client_phone" value="<?= htmlspecialchars($booking_data['client_phone']) ?>">
</div>
<div class="form-group">
<label>Event Type *</label>
<input type="text" name="event_type" value="<?= htmlspecialchars($booking_data['event_type']) ?>" required>
</div>
<div class="form-group">
<label>Service Choice</label>
<input type="text" name="service_choice" value="<?= htmlspecialchars($booking_data['service_choice']) ?>">
</div>
<div class="form-group">
<label>Event Date *</label>
<input type="date" name="event_date" value="<?= htmlspecialchars($booking_data['event_date']) ?>" required>
</div>
<?php if ($mode === 'edit'): ?>
<div class="form-group">
<label>Status</label>
<select name="status">
<option value="Pending" <?= $booking_data['status']=='Pending'?'selected':'' ?>>Pending</option>
<option value="Approved" <?= $booking_data['status']=='Approved'?'selected':'' ?>>Approved</option>
<option value="Rejected" <?= $booking_data['status']=='Rejected'?'selected':'' ?>>Rejected</option>
</select>
</div>
<?php endif; ?>
<button type="submit" class="submit"><?= $mode === 'edit' ? 'Update Booking' : 'Add Booking' ?></button>
</form>
<?php endif; ?>
</div>

</body>
</html>

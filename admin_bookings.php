<?php
// admin_bookings.php - Logic for managing event bookings
// NOTE: This file is included within admin_dashboard.php.

// ------------------------------------
// 1. DELETE BOOKING LOGIC
// ------------------------------------
if (isset($_GET['action']) && $_GET['action'] == 'delete_booking' && isset($_GET['id'])) {
    $booking_id = (int)$_GET['id'];
    $status_message = "";

    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $booking_id);
        if ($stmt->execute()) {
            $status_message = "✅ Booking ID {$booking_id} deleted successfully.";
        } else {
            $status_message = "❌ Error deleting booking: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $status_message = "❌ Database Error: " . $conn->error;
    }

    // Instead of header redirect, use JavaScript (avoids header already sent)
    echo "<script>
            alert('{$status_message}');
            window.location.href = 'admin_dashboard.php?page=bookings';
          </script>";
    exit();
}

// ------------------------------------
// 2. FETCH ALL BOOKINGS 
// ------------------------------------
$bookings_query = "
    SELECT 
        b.*, 
        u.fullname AS registered_user_name 
    FROM 
        bookings b 
    LEFT JOIN 
        users u ON b.user_id = u.id 
    ORDER BY 
        b.booking_date DESC
";

$bookings_result = $conn->query($bookings_query);
?>

<h1>Manage Bookings</h1>

<a href="admin_manage_booking.php" class="create-btn">➕ Add New Booking</a>

<?php if ($bookings_result && $bookings_result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Client Details</th>
                <th>Booking Info</th>
                <th>Event Date</th>
                <th>Booking Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($booking = $bookings_result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($booking['id']) ?></td>
                    <td>
                        <strong>Name:</strong> <?= htmlspecialchars($booking['client_name']) ?><br>
                        <strong>Email:</strong> <?= htmlspecialchars($booking['client_email']) ?><br>
                        <strong>Phone:</strong> <?= htmlspecialchars($booking['client_phone']) ?>
                        <?php if ($booking['registered_user_name']): ?>
                           <br><span style="color: #059669; font-weight: 600;">(Registered User)</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <strong>Event:</strong> <?= htmlspecialchars($booking['event_type']) ?><br>
                        <strong>Service:</strong> <?= htmlspecialchars($booking['service_choice']) ?>
                    </td>
                    <td><?= date("d M Y", strtotime($booking['event_date'])) ?></td>
                    <td><?= date("d M Y H:i", strtotime($booking['booking_date'])) ?></td>
                    <td>
                        <a href="admin_manage_booking.php?id=<?= $booking['id'] ?>" class="action-btn edit-btn">Edit</a>
                        <button onclick="confirmDelete(<?= $booking['id'] ?>)" class="action-btn delete-btn">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No event bookings found.</p>
<?php endif; ?>

<script>
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this booking? This action cannot be undone.")) {
        window.location.href = `admin_dashboard.php?page=bookings&action=delete_booking&id=${id}`;
    }
}
</script>

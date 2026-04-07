<?php
// admin_feedback.php - Logic for managing user feedback
// NOTE: This file is included within admin_dashboard.php.

// ------------------------------------
// 1. DELETE FEEDBACK LOGIC
// ------------------------------------
if (isset($_GET['action']) && $_GET['action'] == 'delete_feedback' && isset($_GET['id'])) {
    $feedback_id = (int)$_GET['id'];
    $status_message = "";

    $stmt = $conn->prepare("DELETE FROM feedback WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $feedback_id);
        if ($stmt->execute()) {
            $status_message = "✅ Feedback ID {$feedback_id} deleted successfully.";
        } else {
            $status_message = "❌ Error deleting feedback: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $status_message = "❌ Database Error: " . $conn->error;
    }

    // Use JavaScript for redirect instead of header()
    echo "<script>
            alert('{$status_message}');
            window.location.href = 'admin_dashboard.php?page=feedback';
          </script>";
    exit();
}

// ------------------------------------
// 2. FETCH ALL FEEDBACK
// ------------------------------------
$feedback_result = $conn->query("SELECT * FROM feedback ORDER BY submission_time DESC");
?>

<h1>Manage Feedback</h1>

<a href="admin_manage_feedback.php" class="create-btn">➕ Add New Feedback</a>

<?php if ($feedback_result && $feedback_result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name & Contact</th>
                <th>Details</th>
                <th>Comments</th>
                <th>Submission Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($feedback = $feedback_result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($feedback['id']) ?></td>
                    <td>
                        <strong>Name:</strong> <?= htmlspecialchars($feedback['name']) ?><br>
                        <small>
                            Email: <?= htmlspecialchars($feedback['email']) ?><br>
                            Phone: <?= htmlspecialchars($feedback['phone']) ?>
                        </small>
                    </td>
                    <td>
                        <strong>City:</strong> <?= htmlspecialchars($feedback['city']) ?><br>
                        <strong>FB Date:</strong> <?= date("d M Y", strtotime($feedback['fb_date'])) ?><br>
                        <strong>Type:</strong> <?= htmlspecialchars($feedback['fb_type']) ?>
                    </td>
                    <td><?= htmlspecialchars(substr($feedback['comments'], 0, 75)) ?>...</td>
                    <td><?= date("d M Y H:i", strtotime($feedback['submission_time'])) ?></td>
                    <td>
                        <a href="admin_manage_feedback.php?id=<?= $feedback['id'] ?>" class="action-btn edit-btn">Edit</a>
                        <button onclick="confirmDelete(<?= $feedback['id'] ?>)" class="action-btn delete-btn">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No user feedback found.</p>
<?php endif; ?>

<script>
function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this feedback? This action cannot be undone.")) {
        window.location.href = `admin_dashboard.php?page=feedback&action=delete_feedback&id=${id}`;
    }
}
</script>

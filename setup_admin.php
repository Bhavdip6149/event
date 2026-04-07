<?php
// setup_admin.php - Run this ONCE to add is_admin column and create admin user
require_once 'db_connect.php';

echo "<h2>Database Setup Script</h2>";

// Step 1: Add is_admin column if it doesn't exist
$check_column = $conn->query("SHOW COLUMNS FROM users LIKE 'is_admin'");
if ($check_column->num_rows == 0) {
    $sql = "ALTER TABLE users ADD COLUMN is_admin TINYINT DEFAULT 0";
    if ($conn->query($sql)) {
        echo "<p style='color: green;'>✓ Added 'is_admin' column to users table</p>";
    } else {
        echo "<p style='color: red;'>✗ Error adding column: " . $conn->error . "</p>";
    }
} else {
    echo "<p style='color: blue;'>ℹ 'is_admin' column already exists</p>";
}

// Step 2: Create admin user if doesn't exist
$admin_email = 'admin@eventhub.com';
$check_admin = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check_admin->bind_param("s", $admin_email);
$check_admin->execute();
$check_admin->store_result();

if ($check_admin->num_rows == 0) {
    $password = 'admin123';
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $fullname = 'Admin User';
    
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password_hash, is_admin) VALUES (?, ?, ?, 1)");
    $stmt->bind_param("sss", $fullname, $admin_email, $password_hash);
    
    if ($stmt->execute()) {
        echo "<p style='color: green;'>✓ Created admin user:</p>";
        echo "<ul>";
        echo "<li><strong>Email:</strong> admin@eventhub.com</li>";
        echo "<li><strong>Password:</strong> admin123</li>";
        echo "</ul>";
        echo "<p style='color: orange;'><strong>⚠ Please change this password after logging in!</strong></p>";
    } else {
        echo "<p style='color: red;'>✗ Error creating admin: " . $stmt->error . "</p>";
    }
    $stmt->close();
} else {
    echo "<p style='color: blue;'>ℹ Admin user already exists</p>";
}
$check_admin->close();

echo "<p><a href='login.php'>Go to Login Page</a></p>";
?>

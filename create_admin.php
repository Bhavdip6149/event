<?php
$conn = new mysqli("localhost", "root", "", "EventHub_db");

$username = "admin";
$password = password_hash("123456", PASSWORD_DEFAULT);
$name = "Admin User";

$sql = "INSERT INTO admins (username, password, name) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $password, $name);
$stmt->execute();

echo "Admin Created Successfully!";

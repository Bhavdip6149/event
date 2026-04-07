<?php
session_start();

// Destroy all user session data
$_SESSION = [];
session_unset();
session_destroy();

// Redirect user to login page (not admin)
header("Location: login.php");
exit();
?>

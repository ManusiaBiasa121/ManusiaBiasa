<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body bgcolor="black">
    <div class="admin-container">
        <h2>Welcome, Admin!</h2>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>

<?php
session_start();

// Check if the user is an admin
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome to the Admin Dashboard</h2>

    <!-- Add admin functionalities and links here -->

    <br><br>
    <a href="logout.php">Logout</a>
</body>
</html>

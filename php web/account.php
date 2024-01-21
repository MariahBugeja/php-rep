<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>

    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #ececec;
            text-align: center;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
            margin: 10px 0;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php
session_start();
require_once 'dp.php';

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
    header("Location: login.php");
    exit();
}

// Retrieve user information from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    // User not found, redirect to login
    header("Location: login.php");
    exit();
}
?>

<h2>Welcome, <?php echo $user['Email']; ?>!</h2>

<p>Email: <?php echo $user['Email']; ?></p>

<p><a href="logout.php">Logout</a></p>

</body>
</html>

<?php
session_start();
require_once 'dp.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['admin_login'])) {
    $adminUsername = $_POST['admin_username'];
    $adminPassword = $_POST['admin_password'];

    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $adminUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $adminData = $result->fetch_assoc();

        if (password_verify($adminPassword, $adminData['password'])) {
            $_SESSION['admin'] = true;
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $errors[] = "Invalid password!";
        }
    } else {
        $errors[] = "Admin not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>

    <form method="post" action="">
        <label>Username:</label>
        <input type="text" name="admin_username" required><br>

        <label>Password:</label>
        <input type="password" name="admin_password" required><br>

        <input type="submit" name="admin_login" value="Login">
    </form>

    <?php
    foreach ($errors as $error) {
        echo "<div style='color: red;'>$error</div>";
    }
    ?>
</body>
</html>

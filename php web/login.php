<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

   
</head>

<body class="custom-body">
<?php

session_start();
require_once 'dp.php';
include 'includes/header.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $login_statement = $conn->prepare($sql);
    $login_statement->bind_param('s', $email);
    $login_statement->execute();
    $result = $login_statement->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['User_id']; 

            // Redirect to index.php after successful login
            header("Location: index.php");
            exit();
        } else {
            $errors[] = "Invalid password!";
        }
    } else {
        $errors[] = "User not found!";
    }
}
?>

<div class="custom-container">
    <div class="custom-split custom-left">
        <!-- Left side photo -->
    </div>
    <div class="custom-split custom-right">
        <!-- Login form on the right side -->
        <form class="custom-form-container" method="post" action="#">
            <h2>Login to Your Account</h2>
            <label for="login_email">Email:</label>
            <input type="text" name="login_email" required>

            <label for="login_password">Password:</label>
            <input type="password" name="login_password" required>

            <div class="custom-error-container">
                <?php
                foreach ($errors as $error) {
                    echo "<div class='custom-error'>$error</div>";
                }
                ?>
            </div>

            <div>
                <button class="custom-submit-btn" type="submit" name="login">Login</button>
            </div>

            <!-- Signup link -->
            <div class="custom-link">
                <a href="signup.php">Don't have an account? Sign up here</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
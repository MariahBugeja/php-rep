<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
<meta http-equiv="pragma" content="no-cache" />
<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <?php
    require_once 'dp.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];

        // Additional input validation
        if (strlen($password) < 8) {
            echo "<div class='error'>Password must be at least 8 characters long.</div>";
        } elseif ($password !== $confirmPassword) {
            echo "<div class='error'>Passwords do not match. Please try again.</div>";
        } else {
            // Check if the username already exists
            $check_sql = "SELECT * FROM users WHERE username = ?";
            $check_statement = $conn->prepare($check_sql);
            $check_statement->bind_param('s', $username);
            $check_statement->execute();
            $check_result = $check_statement->get_result();

            if ($check_result->num_rows > 0) {
                echo "<div class='error'>Username '$username' already exists. Please choose a different username.</div>";
            } else {
                // Insert the new user using prepared statement
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $insert_sql = "INSERT INTO users (username, password) VALUES (?, ?)";
                $insert_statement = $conn->prepare($insert_sql);
                $insert_statement->bind_param('ss', $username, $hashedPassword);

                if ($insert_statement->execute()) {
                    echo "<div style='color: #4caf50;'>Registration successful!</div>";
                    header("Location: success.php");
                    exit();
                } else {
                    echo "<div class='error'>An error occurred during registration. Please try again later.</div>";
                }
            }
        }
    }
    ?>

    <form class="registration-container" method="post" action="register.php">
        <label class="registration-label" for="username">Username:</label>
        <input class="registration-input" type="text" name="username" required>

        <label class="registration-label" for="password">Password:</label>
        <input class="registration-input" type="password" name="password" required>

        <label class="registration-label" for="confirm_password">Confirm Password:</label>
        <input class="registration-input" type="password" name="confirm_password" required>

        <input class="registration-submit" type="submit" value="Register">
    </form>
</body>
</html>

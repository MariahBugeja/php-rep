
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css"> 

</head>
<body class="custom-body">
<?php
require_once 'dp.php';
include 'includes/header.php';


$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    } elseif ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match. Please try again.";
    } else {
        $check_sql = "SELECT * FROM users WHERE email = ?";
        $check_statement = $conn->prepare($check_sql);
        $check_statement->bind_param('s', $email);
        $check_statement->execute();
        $check_result = $check_statement->get_result();

        if ($check_result->num_rows > 0) {
            $errors[] = "Email '$email' already exists. Please choose a different email.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $insert_sql = "INSERT INTO users (email, password) VALUES (?, ?)";
            $insert_statement = $conn->prepare($insert_sql);
            $insert_statement->bind_param('ss', $email, $hashedPassword);

            if ($insert_statement->execute()) {
                echo "<div class='custom-success'>Registration successful!</div>";
            } else {
                $errors[] = "An error occurred during registration. Please try again later.";
            }
        }
    }
}
?>

<div class="custom-container">
    <div class="custom-split custom-left">
        <!-- Image on the left side -->
    </div>
    <div class="custom-split custom-right">
        <!-- Signup form on the right side -->
        <form class="custom-form-container" method="post" action="#">
            <h2>Create an Account</h2>
            <label for="email">Email:</label>
            <input type="text" name="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" required>

            <?php
            foreach ($errors as $error) {
                echo "<div class='custom-error'>$error</div>";
            }
            ?>

            <input type="hidden" name="signup" value="1">
            <button class="custom-submit-btn" type="submit">Register</button>
            <div class="custom-link">
                <a href="login.php">Already have an account? Login here</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
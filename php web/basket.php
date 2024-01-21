<?php
session_start();
include 'dp.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$basketQuery = "SELECT b.basket_id, p.Name, b.quantity, p.Price
                FROM basket b
                JOIN products p ON b.product_id = p.productsid
                WHERE b.user_id = $user_id";

$basketResult = $conn->query($basketQuery);

if (!$basketResult) {
    echo "Error: " . $conn->error;
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Basket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container mt-5">
    <h2>Your Basket</h2>
    <?php
    if ($basketResult->num_rows > 0) {
        while ($item = $basketResult->fetch_assoc()) {
            echo '<p>Basket ID: ' . $item['basket_id'] . ' - Product: ' . $item['Name'] . ' - Quantity: ' . $item['quantity'] . ' - Price: $' . $item['Price'] . '</p>';
        }
    } else {
        echo '<p>Your basket is empty.</p>';
    }
    ?>
</div>


</body>
</html>

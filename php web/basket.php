<?php
session_start();

include 'dp.php';

// Retrieve the shopping cart array from the session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h2>Your Shopping Cart</h2>
            <?php
            // Display the cart content
            if (!empty($cart)) {
                foreach ($cart as $productId => $item) {
                    echo '<p>Name: ' . $item['name'] . ', Quantity: ' . $item['quantity'] . ', Price: $' . $item['price'] . '</p>';
                }
            } else {
                echo '<p>Your shopping cart is empty.</p>';
            }
            ?>
        </div>
    </div>
</div>


</body>
</html>

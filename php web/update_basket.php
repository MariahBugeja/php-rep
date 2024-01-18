<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];

    // Update the quantity in the session
    $_SESSION['basket'][$productId] = $quantity;

    // Save the session to ensure changes are persisted
    session_write_close();

    echo 'Quantity updated successfully.';
} else {
    echo 'Invalid request.';
}
?>

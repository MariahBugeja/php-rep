<?php
session_start();
include 'dp.php';

if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Handle updating quantity
    if (isset($_POST['basket_id']) && isset($_POST['new_quantity'])) {
        $basketId = $_POST['basket_id'];
        $newQuantity = $_POST['new_quantity'];

        $updateQuery = "UPDATE basket SET quantity = $newQuantity WHERE basket_id = $basketId AND user_id = $user_id";
        $updateResult = $conn->query($updateQuery);

        if (!$updateResult) {
            echo "Error updating quantity: " . $conn->error;
            exit();
        }

        echo "Quantity updated successfully.";
    } else {
        echo "Invalid request parameters.";
    }
} else {
    echo "Invalid request method.";
}
?>

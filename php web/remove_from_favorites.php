<?php
session_start();

include 'dp.php'; 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Remove from favorites
    $removeFavorite = "DELETE FROM favorites WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $conn->query($removeFavorite);

    header("Location: favorites.php");
    exit();
} else {
    echo 'Invalid request.';
}
?>

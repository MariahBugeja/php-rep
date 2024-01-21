<?php
session_start();

include 'dp.php'; // Include your database connection

if (isset($_SESSION['user_id']) && isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $user_id = $_SESSION['user_id'];
    $product_id = $_GET['id'];

    // Check if the product is not already in favorites
    $checkFavorite = "SELECT * FROM favorites WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $resultFavorite = $conn->query($checkFavorite);

    if ($resultFavorite->num_rows == 0) {
        // Add to favorites
        $addFavorite = "INSERT INTO favorites (user_id, product_id) VALUES ('$user_id', '$product_id')";
        $conn->query($addFavorite);
        echo 'Added to Favorites successfully!';
    } else {
        echo 'Product is already in Favorites.';
    }
} else {
    echo 'Invalid request.';
}
?>

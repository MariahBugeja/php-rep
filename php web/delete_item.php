<?php
session_start();
include 'dp.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['basket_id'])) {
    $basketId = $_GET['basket_id'];

    $deleteQuery = "DELETE FROM basket WHERE basket_id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $basketId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Item with Basket ID $basketId is deleted.";
    } else {
        echo "Error deleting item: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

?>

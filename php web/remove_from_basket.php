<?php
session_start();

if (isset($_GET['id'])) {
    $itemId = $_GET['id'];

    // Remove the item from the session
    unset($_SESSION['basket'][$itemId]);


    echo 'Item removed from the basket.';
} else {
    echo 'Invalid request.';
}
?>

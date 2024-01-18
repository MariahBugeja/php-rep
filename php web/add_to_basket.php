<?php
session_start(); 

if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = array();
}

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $item_id = $_GET['id'];

    include 'dp.php';

    //  item details from the database based on the item ID
    $sqlItemDetails = "SELECT * FROM Products WHERE productsid = '$item_id'";
    $resultItemDetails = $conn->query($sqlItemDetails);

    if ($resultItemDetails->num_rows > 0) {
        $itemDetails = $resultItemDetails->fetch_assoc();
        $itemName = $itemDetails['Name'];

        switch ($action) {
            case 'add':
                // Add the item to the basket array
                array_push($_SESSION['basket'], $item_id);
                echo 'Item "' . $itemName . '" added to basket.';
                
                if (isset($_GET['redirect'])) {
                    // Redirect to the specified page
                    header('Location: ' . $_GET['redirect']);
                    exit();
                }
                break;


            default:
                echo 'Invalid action.';
                break;
        }
    } else {
        echo 'Item not found.';
    }

    $conn->close();
} else {
    echo 'Invalid request.';
}
?>

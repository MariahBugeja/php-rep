<?php
session_start();
include 'dp.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['id'])) {
        $productId = intval($_GET['id']);

        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            // Check if the product is already in the basket
            $checkQuery = "SELECT * FROM basket WHERE user_id = $user_id AND product_id = $productId";
            $checkResult = $conn->query($checkQuery);

            if ($checkResult) {
                if ($checkResult->num_rows > 0) {
                    //  update quantity of product
                    $updateQuery = "UPDATE basket SET quantity = quantity + 1 WHERE user_id = $user_id AND product_id = $productId";
                    $updateResult = $conn->query($updateQuery);

                    if ($updateResult) {
                        echo "success";
                    } else {
                        echo "update_failure";
                    }
                } else {
                    // add a new product
                    $insertQuery = "INSERT INTO basket (user_id, product_id, quantity, price) 
                                    SELECT $user_id, productsid, 1, Price FROM products WHERE productsid = $productId";
                    $insertResult = $conn->query($insertQuery);

                    if ($insertResult) {
                        echo "success";
                    } else {
                        echo "insert_failure";
                    }
                }
            } else {
                echo "database_error";
            }
        } else {
            echo "not_logged_in";
        }
    } else {
        echo "invalid_request";
    }
} else {
    header('HTTP/1.1 405 Method Not Allowed', true, 405);
    echo 'Method Not Allowed';
}
?>
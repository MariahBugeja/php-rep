<?php
session_start();
include 'dp.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $postalCode = mysqli_real_escape_string($conn, $_POST['postal_code']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $paymentMethod = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $totalPrice = $_POST['total_price'];

    // Insert order into the orders table
    $user_id = $_SESSION['user_id'];
    $insertOrderQuery = "INSERT INTO orders (User_id, Totalammount, orderdate) VALUES ($user_id, $totalPrice, NOW())";

    if ($conn->query($insertOrderQuery)) {
        $orderId = $conn->insert_id; 

        // Move items from the basket to order_details table
        $moveItemsQuery = "INSERT INTO order_details (orderid, productsid, stockquantity)
                          SELECT $orderId, product_id, quantity FROM basket WHERE user_id = $user_id";
        $conn->query($moveItemsQuery);

        // Clear the user's basket
        $clearBasketQuery = "DELETE FROM basket WHERE user_id = $user_id";
        $conn->query($clearBasketQuery);

        $insertAddressQuery = "INSERT INTO address (street, City, postal_code, Country)
                               VALUES ('$street', '$city', '$postalCode', '$country')";
        $conn->query($insertAddressQuery);
        $addressId = $conn->insert_id;

        $updateOrderWithAddressQuery = "UPDATE orders SET address_id = $addressId WHERE order_id = $orderId";
        $conn->query($updateOrderWithAddressQuery);

        // Insert payment information
        $insertPaymentQuery = "INSERT INTO payments (order_id, payment_method, amount)
                               VALUES ($orderId, '$paymentMethod', $totalPrice)";
        $conn->query($insertPaymentQuery);

        header("Location: thank_you_page.php?orderid=$orderId");
        exit();
    } else {
        echo "Error: " . $conn->error;
        exit();
    }
} else {
    header('HTTP/1.1 405 Method Not Allowed', true, 405);
    echo 'Method Not Allowed';
    exit();
}
?>
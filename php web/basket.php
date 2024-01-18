<?php
session_start(); 

if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = array();
}
include 'includes/header.php';
include 'dp.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Basket</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<h2>Basket Contents:</h2>

<?php
// Check if there are items in the basket
if (!empty($_SESSION['basket'])) {
    // Create an array to store quantities for each product
    $quantityMap = array();

    foreach ($_SESSION['basket'] as $item_id) {
        if (isset($quantityMap[$item_id])) {
            // If the product is already in the map, increment the quantity
            $quantityMap[$item_id]++;
        } else {
            // If the product is not in the map, set the quantity to 1
            $quantityMap[$item_id] = 1;
        }
    }

    foreach ($quantityMap as $item_id => $quantity) {
        $sqlItemDetails = "SELECT * FROM Products WHERE productsid = '$item_id'";
        $resultItemDetails = $conn->query($sqlItemDetails);

        if ($resultItemDetails->num_rows > 0) {
            $itemDetails = $resultItemDetails->fetch_assoc();
            $itemName = $itemDetails['Name'];
            $itemPrice = $itemDetails['Price'];

            echo '<div class="basket-item">';
            echo '<img src="' . $itemDetails['Imageurl'] . '" alt="' . $itemName . '" class="product-img">';
            echo '<div>';
            echo '<h3>' . $itemName . '</h3>';
            echo '<div>Quantity: <input type="number" class="quantity" value="' . $quantity . '" min="1"></div>';
            echo '<p>Price: $' . ($itemPrice * $quantity) . '</p>';
            echo '</div>';
            echo '<button class="delete-btn">Delete</button>';
            echo '</div>';
        } else {
            // If the product is not found, remove it from the basket
            $key = array_search($item_id, $_SESSION['basket']);
            if ($key !== false) {
                unset($_SESSION['basket'][$key]);
            }
        }
    }
} else {
    echo '<p>Your basket is empty.</p>';
}

$conn->close();
?>

</body>
</html>

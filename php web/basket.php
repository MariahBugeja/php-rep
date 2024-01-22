<?php
session_start();
include 'dp.php';
include 'includes/header.php';


// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle quantity updates
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_quantity'])) {
        $basketId = $_POST['basket_id'];
        $newQuantity = $_POST['new_quantity'];

        $updateQuery = "UPDATE basket SET quantity = $newQuantity WHERE basket_id = $basketId AND user_id = $user_id";
        $updateResult = $conn->query($updateQuery);

        if (!$updateResult) {
            echo "Error updating quantity: " . $conn->error;
            exit();
        }
    }
}

$basketQuery = "SELECT b.basket_id, p.productsid, p.Name, p.Price, p.Imageurl, b.quantity
                FROM basket b
                JOIN products p ON b.product_id = p.productsid
                WHERE b.user_id = $user_id";

$basketResult = $conn->query($basketQuery);

if (!$basketResult) {
    echo "Error: " . $conn->error;
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Basket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="basket-container mt-5">
    <div class="basket-summary">
        <h2>Your Cart</h2>
    </div>

    <div class="basket">
        <?php
        $totalPrice = 0; 
        if ($basketResult->num_rows > 0) {
            while ($item = $basketResult->fetch_assoc()) {
                echo '<div class="basket-item" id="basket-item-' . $item['basket_id'] . '">';
                echo '<div class="product-info">';
                echo '<img src="' . $item['Imageurl'] . '" alt="' . $item['Name'] . '" class="product-image">';
                echo '<div class="title-description">';
                echo '<p><strong>Title: </strong>' . $item['Name'] . '</p>';
                echo '</div>'; 
                echo '<form method="post">';
                echo '<p><strong>Quantity: </strong>';
                echo '<input type="number" name="new_quantity" value="' . $item['quantity'] . '" min="1" max="5" class="quantity-input">';
                echo '<input type="hidden" name="basket_id" value="' . $item['basket_id'] . '">';
                echo '<input type="submit" name="update_quantity" value="confirm" class="update-btn">';
                echo '</p>';
                echo '</form>';
                echo '</div>'; 

                echo '<div class="quantity-price-delete">';
                echo '<p><strong>Price: </strong><span id="total-price-' . $item['basket_id'] . '" data-price="' . $item['Price'] . '">$' . ($item['Price'] * $item['quantity']) . '</span></p>';
                echo '<button class="delete-btn" onclick="deleteItem(' . $item['basket_id'] . ')">Delete</button>';
                echo '</div>'; 

                echo '</div>'; 

                // Accumulate the total price
                $totalPrice += ($item['Price'] * $item['quantity']);
            }
        } else {
            echo '<p>Your basket is empty.</p>';
        }
        ?>
    </div>

    <div class="basket-total">
    <p><strong>Total: </strong><span id="basket-total-price">$<?php echo number_format($totalPrice, 2); ?></span></p>
    <a href="checkout.php?total_price=<?php echo $totalPrice; ?>" class="checkout-btn">Proceed to Checkout</a>
</div>

<script src="script.js"></script>


<script src="script.js"></script>

<script>
function deleteItem(basketId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var deletedItem = document.getElementById('basket-item-' + basketId);
                if (deletedItem) {
                    deletedItem.remove();
                    recalculateTotal(); // Call the function to recalculate the total after deletion
                } else {
                    console.error('Deleted item not found in the DOM.');
                }
            } else {
                console.error('Error deleting item:', xhr.responseText);
            }
        }
    };
    xhr.open('GET', 'delete_item.php?basket_id=' + basketId, true);
    xhr.send();
}

function recalculateTotal() {
    var totalPrice = 0;
    var items = document.getElementsByClassName('basket-item');

    for (var i = 0; i < items.length; i++) {
        var quantity = items[i].querySelector('.quantity-input').value;
        var price = parseFloat(items[i].querySelector('.quantity-price-delete span').dataset.price);
        totalPrice += quantity * price;
    }

    var totalElement = document.getElementById('basket-total-price');
    if (totalElement) {
        totalElement.innerText = '$' + totalPrice.toFixed(2);
    }
}
</script>



</body>
</html>
<?php include 'includes/footer.php'; ?>

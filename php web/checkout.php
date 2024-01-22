<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Your Cart</h2>
                </div>
                <div class="card-body">
                    <?php
$totalPrice = isset($_GET['total_price']) ? floatval($_GET['total_price']) : 0;


                if ($basketResult->num_rows > 0) {
            while ($item = $basketResult->fetch_assoc()) {
                echo '<div class="basket-item" id="basket-item-' . $item['basket_id'] . '">';
                echo '<div class="product-info">';
                echo '<img src="' . $item['Imageurl'] . '" alt="' . $item['Name'] . '" class="product-image">';
                echo '<div class="title-description">';
                echo '<p><strong>Title: </strong>' . $item['Name'] . '</p>';
                echo '</div>'; 
                echo '<p><strong>Quantity: </strong>';
                echo '<input type="number" value="' . $item['quantity'] . '" min="1" max="5" class="quantity-input" onchange="updateTotal(' . $item['basket_id'] . ', this.value)" data-price="' . $item['Price'] . '">';
                echo '</p>';
                echo '</div>';
                
            }
        }
                ?>

                    <div class="checkout-total mt-4">
                        <p><strong>Total: </strong>$<?php echo number_format($totalPrice, 2); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Checkout</h2>
                </div>
                <div class="card-body">
                    <form action="process_checkout.php" method="post">
                        <!-- Shipping Information -->
                        <div class="form-group">
                            <label for="street">Street:</label>
                            <input type="text" class="form-control" name="street" id="street" required>
                        </div>

                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" name="city" id="city" required>
                        </div>

                        <div class="form-group">
                            <label for="postal_code">Postal Code:</label>
                            <input type="text" class="form-control" name="postal_code" id="postal_code" required>
                        </div>

                        <div class="form-group">
                            <label for="country">Country:</label>
                            <input type="text" class="form-control" name="country" id="country" required>
                        </div>

                        <!-- Payment Information -->
                        <div class="form-group">
                            <label for="payment_method">Payment Method:</label>
                            <select class="form-control" name="payment_method" id="payment_method" required>
                                <option value="credit_card">Card</option>
                                <option value="paypal">Paypal</option>
                            </select>
                        </div>

                        <input type="hidden" name="total_price" value="<?php echo $totalPrice; ?>">

                        <button type="submit" class="btn btn-primary btn-block">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="script.js"></script> 
</body>
</html>

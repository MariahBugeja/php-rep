<?php
include 'includes/header.php';
include 'dp.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> 
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }

        .product-img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product-details {
            margin-top: 20px;
        }

        .quantity-container {
            display: flex;
            align-items: center;
        }

        .quantity-label {
            margin-right: 10px;
        }

        .btn-add-to-basket {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
// Get product ID from the URL
$productId = isset($_GET['id']) ? $_GET['id'] : 0;

// Fetch product details from the database
$sqlProduct = "SELECT * FROM products WHERE productsid = $productId";
$resultProduct = $conn->query($sqlProduct);

// Display product details
if ($resultProduct->num_rows > 0) {
    $row = $resultProduct->fetch_assoc();
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="<?php echo $row['Imageurl']; ?>" alt="<?php echo $row['Name']; ?>" class="img-fluid product-img">
            </div>
            <div class="col-md-7 product-details">
                <h2><?php echo $row['Name']; ?></h2>
                <p>Description: <?php echo $row['description']; ?></p>
                <p>Price: $<?php echo $row['Price']; ?></p>
                <div class="quantity-container">
                    <label for="quantity" class="quantity-label">Quantity:</label>
                    <input type="number" id="quantity" class="form-control" value="1" min="1" max="5">
                </div>
                <button type="button" class="btn btn-primary btn-add-to-basket" onclick="addToBasket('<?php echo $row['productsid']; ?>')">Add to Basket</button>
            </div>
        </div>
    </div>

    <?php
} else {
    echo "Product not found";
}

include 'includes/footer.php';
?>

</body>
</html>

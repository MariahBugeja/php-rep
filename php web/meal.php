
<?php
include 'includes/header.php';
include 'dp.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meals</title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="script.js"></script> 
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mb-4 text-center oinktext">
            <h2>Chef Oink's Little Tastemakers: Build Your Own Culinary Adventure!</h2>
            <p>Create a customized culinary adventure for your little ones with Chef Oink's delightful offerings! Craft your own menu by choosing from our diverse selection of mouthwatering savory and sweet items. The minimum order is 15 pieces per item, and for added convenience, opt for individual packaging per child by adding the 'Chef Oink's Box' to your cart. Let us take care of the details while you enjoy a hassle-free and delicious experience!</p>
        </div>
    </div>
</div>

<div class="container mt-5 text-center mb-4" id="nav-links-container">
    <a href="#" class="nav-link category-link selected" data-category="Savoury">Savoury</a>
    <span class="divider">|</span>
    <a href="#" class="nav-link category-link" data-category="Dessert">Desserts</a>
</div>


<div class="container">
    <div class="row">

        <?php
        //  items based on selected category
        $selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'Savoury';
        $sqlItems = "SELECT * FROM Products WHERE category = '$selectedCategory'";
        $resultItems = $conn->query($sqlItems);

        if ($resultItems->num_rows > 0) {
            while ($row = $resultItems->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<a href="product.php?id=' . $row['id'] . '">';
                
                echo '<img src="' . $row['Imageurl'] . '" alt="' . $row['Name'] . '" class="img-fluid productimg" style="border-radius: 20px;">';
                echo '</a>';
                echo '<h5 class="producttitle">' . $row['Name'] . '</h5>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<p>$' . $row['Price'] . '</p>';
echo '<a href="add_to_basket.php?action=add&id=' . $row['productsid'] . '&redirect=basket.php">Add to Basket</a>';
                echo '</div>';
            }
        } else {
            echo "No products found for category: $selectedCategory";
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>
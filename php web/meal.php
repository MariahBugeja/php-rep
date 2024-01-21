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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="script.js"></script>
</head>

<body>

<?php
session_start();
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mb-4 text-center oinktext">
            <h2>Chef Oink's Little Tastemakers: Build Your Own Culinary Adventure!</h2>
            <p>Create a customized culinary adventure for your little ones with Chef Oink's delightful offerings! Craft your own menu by choosing from our diverse selection of mouthwatering savory and sweet items. The minimum order is 15 pieces per item, and for added convenience, opt for individual packaging per child by adding the 'Chef Oink's Box' to your cart. Let us take care of the details while you enjoy a hassle-free and delicious experience!</p>
        </div>
    </div>
</div>

<div class="container mt-5 text-center mb-4" id="nav-links-container">
    <!-- Update the category links to include the 'category' parameter -->
    <a href="?category=Savoury" class="nav-link category-link <?php echo ($_GET['category'] == 'Savoury' || !isset($_GET['category'])) ? 'selected' : ''; ?>" data-category="Savoury">Savoury</a>
    <span class="divider">|</span>
    <a href="?category=Dessert" class="nav-link category-link <?php echo ($_GET['category'] == 'Dessert') ? 'selected' : ''; ?>" data-category="Dessert">Desserts</a>
</div>

<div class="container">
    <div class="row">

        <?php
        // items based on the selected category
        $selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'Savoury';
        $sqlItems = "SELECT * FROM Products WHERE category = '$selectedCategory'";
        $resultItems = $conn->query($sqlItems);

        if ($resultItems->num_rows > 0) {
            while ($row = $resultItems->fetch_assoc()) {
            }
        } else {
            echo "No products found for category: $selectedCategory";
        }

        
        ?>
    </div>

<div class="container">
    <div class="row">

        <?php
        // items based on the selected category
        $selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'Savoury';
        $sqlItems = "SELECT * FROM Products WHERE category = '$selectedCategory'";
        $resultItems = $conn->query($sqlItems);

        if ($resultItems->num_rows > 0) {
            while ($row = $resultItems->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">';
                echo '<a href="product.php?id=' . $row['productsid'] . '">';
                echo '<img src="' . $row['Imageurl'] . '" alt="' . $row['Name'] . '" class="img-fluid productimg" style="border-radius: 20px;">';
                echo '</a>';
                echo '<h5 class="producttitle">' . $row['Name'] . '</h5>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<p>$' . $row['Price'] . '</p>';
                
                if (isset($_SESSION['user_id'])) {
                    // User is logged in
                    echo '<a href="add_to_basket.php?action=add&id=' . $row['productsid'] . '&redirect=basket.php" class="add-to-basket-btn">Add to Basket</a>';
                
                    // Add to Favorites button
                    echo '<a href="add_to_favorites.php?action=add&id=' . $row['productsid'] . '" class="add-to-favorites-btn"><i class="fas fa-heart"></i></a>';
                } else {
                    // User is not logged in, provide a login link or redirect to the login page
                    echo '<a href="login.php">Add to Basket</a>';
                }
                
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
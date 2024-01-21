<?php
session_start();

include 'includes/header.php'; 
include 'dp.php'; 

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sqlFavorites = "SELECT Products.* FROM favorites 
                 JOIN Products ON favorites.product_id = Products.productsid
                 WHERE favorites.user_id = '$user_id'";

$resultFavorites = $conn->query($sqlFavorites);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Favorites</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php include 'includes/favorites.php';  ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mb-4 text-center">
            <h2>My Favorites</h2>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        <?php
        if ($resultFavorites->num_rows > 0) {
            while ($row = $resultFavorites->fetch_assoc()) {
                // Display favorite items similar to how you display products
                echo '<div class="col-md-4 mb-4">';
                echo '<a href="product.php?id=' . $row['productsid'] . '">';
                echo '<img src="' . $row['Imageurl'] . '" alt="' . $row['Name'] . '" class="img-fluid productimg" style="border-radius: 20px;">';
                echo '</a>';
                echo '<h5 class="producttitle">' . $row['Name'] . '</h5>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<p>$' . $row['Price'] . '</p>';
                echo '<a href="add_to_favorites.php?action=add&id=' . $row['productsid'] . '" class="add-to-favorites-btn ' . (isFavorite($row['productsid']) ? 'selected' : '') . '"><i class="fas fa-heart"></i></a>';
                echo '</div>';
            }
        } else {
            echo "You haven't added any items to your favorites yet.";
        }
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>

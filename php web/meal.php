<?php
include 'includes/header.php';
$servername = "localhost:8889";
$username = "Mariah03";
$password = "School2024";
$dbname = "Mariah03";



$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$products = [
    ['Fish Fingers', 'Tasty fish fingers', 2.99, 'savoury ', 'fish,png', 30],
    ['Sweet Potato and Chicken Patty', 'Tasty Patties', 2.00, 'savoury', '1.png', 15],
    ['Rainbow fitters', 'Tasty Fitters', 1.50, 'savoury', '2.png', 10],
    ['Chia seeds Crackers', 'Tasty Crackers', 2.50, 'savoury', '2.png', 22],
    ['Spinach Muffin', 'Tasty Muffin', 2.10, 'savoury', '22.png', 12],
    ['Sausage rolls', 'Tasty Muffin', 3.10, 'savoury', '33.png', 45],



];

insertProducts($products);
?>



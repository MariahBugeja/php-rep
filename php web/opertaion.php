<?php

$servername = "localhost:8889";
$username = "Mariah03";
$password = "qN49i_WTUeCQZO1r";
$dbname = "Mariah03";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function closeDatabaseConnection($conn) {
    $conn->close();
}

function insertProducts($products) {
    $conn = connectToDatabase();

    foreach ($products as $product) {
        $name = mysqli_real_escape_string($conn, $product[0]);
        $description = mysqli_real_escape_string($conn, $product[1]);
        $price = floatval($product[2]);
        $category = mysqli_real_escape_string($conn, $product[3]);
        $imageurl = mysqli_real_escape_string($conn, $product[4]);
        $stockquantity = intval($product[5]);

        $sql = "INSERT INTO products (Name, description, Price, category, Imageurl, stockquantity) 
                VALUES ('$name', '$description', $price, '$category', '$imageurl', $stockquantity)";

        if ($conn->query($sql) === TRUE) {
            echo "Record added successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    closeDatabaseConnection($conn);
}
?>

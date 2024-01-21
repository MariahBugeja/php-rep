<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You Page</title>
</head>
<body>
    <h1>Thank You for Your Order!</h1>

    <?php
    $orderid = isset($_GET['orderid']) ? $_GET['orderid'] : 'N/A';
    ?>

    <p>Your order ID is: <?php echo $orderid; ?></p>
</body>
</html>

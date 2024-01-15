<?php
include 'includes/header.php';
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css"> 
</head>
    <body>
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mb-4 text-center oinktext">
                <h2>Chef Oinks Little Tastemakers: Build Your Own Culinary Adventure!</h2>
                <p>Create a customized culinary adventure for your little ones with Chef Oink's delightful offerings! Craft your own menu by choosing from our diverse selection of mouthwatering savory and sweet items. The minimum order is 15 pieces per item, and for added convenience, opt for individual packaging per child by adding the 'Chef Oink's Box' to your cart. Let us take care of the details while you enjoy a hassle-free and delicious experience!</p>
            </div>
        </div>
    </div>
    <div class="container mt-5 text-center mb-4" id="nav-links-container">
        <a href="" class="nav-link selected">Meals</a>
        <span class="divider">|</span>
        <a href="shopping copy.html" class="nav-link">Customize Meals</a>
    </div>


    <div class="container mt-5">
        <!-- First Row of Products -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <a href="product1.html">
                    <img src="assets/1.png" alt="Product 1" class="img-fluid productimg">
                </a>
                <h5>Food Product 1</h5>
                <p>Description of Food Product 1.</p>
                <p>$19.99</p>
                <button type="button" class="btn btn-primary" onclick="window.location.href = 'shoppingfull.html'">add to basket</button>
            </div>

            <div class="col-md-4 mb-4">
                <a href="product1.html"> 
                    <img src="assets/1.png" alt="Product 2" class="img-fluid productimg">
                </a>
                <h5>Food Product 2</h5>
                <p>Description of Food Product 2.</p>
                <p>$29.99</p>
                <button class="btn btn-primary">Add to Basket</button>
            </div>

            <div class="col-md-4 mb-4">
                <a href="product1.html"> 
                    <img src="assets/1.png" alt="Product 3" class="img-fluid productimg">
                </a>
                <h5>Food Product 3</h5>
                <p>Description of Food Product 3.</p>
                <p>$24.99</p>
                <button class="btn btn-primary">Add to Basket</button>
            </div>
        </div>

        <!-- Second Row of Products -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <a href="product1.html">
                    <img src="assets/1.png" alt="Product 4" class="img-fluid productimg">
                </a>
                <h5>Food Product 4</h5>
                <p>Description of Food Product 4.</p>
                <p>$17.99</p>
                <button class="btn btn-primary">Add to Basket</button>
            </div>

            <div class="col-md-4 mb-4">
                <a href="product1.html">
                    <img src="assets/1.png" alt="Product 5" class="img-fluid productimg">
                </a>
                <h5>Food Product 5</h5>
                <p>Description of Food Product 5.</p>
                <p>$14.99</p>
                <button class="btn btn-primary">Add to Basket</button>
            </div>

            <div class="col-md-4 mb-4">
                <a href="product1.html">
                    <img src="assets/1.png" alt="Product 6" class="img-fluid productimg">
                </a>
                <h5>Food Product 6</h5>
                <p>Description of Food Product 6.</p>
                <p>$22.99</p>
                <button class="btn btn-primary">Add to Basket</button>
            </div>
        </div>

        <!-- Additional Rows of Products (copy and paste as needed) -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <a href="product1.html">
                    <img src="assets/1.png" alt="Product 7" class="img-fluid productimg">
                </a>
                <h5>Food Product 7</h5>
                <p>Description of Food Product 7.</p>
                <p>$19.99</p>
                <button class="btn btn-primary">Add to Basket</button>
            </div>

            <div class="col-md-4 mb-4">
                <a href="product1.html">
                    <img src="assets/1.png" alt="Product 8" class="img-fluid productimg">
                </a>
                <h5>Food Product 8</h5>
                <p>Description of Food Product 8.</p>
                <p>$27.99</p>
                <button class="btn btn-primary">Add to Basket</button>
            </div>

        </div>
    </div>

    <section class="colored-background2">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Our Services</h2>
            <div class="row">
                <!-- Service 1 -->
                <div class="col-md-4 mb-4 text-center">
                    <img src="assets/plate.png" alt="Service 1" class="img-fluid service-img">
                    <h3>Step 1: A World of Tasty Choices</h3>
                    <p>Start your culinary journey by exploring a delectable range of snacks and meals specially crafted for your kiddo's taste buds.
                        Select from a variety of mouthwatering options and give your child the power to customize their meal just the way they like.</p>
                </div>
        
                <!-- Service 2 -->
                <div class="col-md-4 mb-4 text-center">
                    <img src="assets/loc.png" alt="Service 2" class="img-fluid service-img">
                    <h3>Step 2: Delivery </h3>
                    <p>Meals delivered with enchantment! Select the magic childcare center, where your child enjoys Chef Oink's delights in a fun environment. Or have the deliciousness brought right to your doorstep at your preferred time. Wherever you choose childcare center or home we're here to make mealtime enchanting and hassle free.</p>
                </div>
        
                <!-- Service 3 -->
                <div class="col-md-4 mb-4 text-center">
                    <img src="assets/food.png" alt="Service 3" class="img-fluid service-img">
                    <h3>Step 3: Relax and Recharge</h3>
                    <p>On delivery day, we work our magic by preparing your little one's food fresh, ensuring it's full of flavor and goodness.
                        Sit back, unwind, and enjoy some well-deserved extra free time. It's your opportunity to reconnect and create cherished moments with your child, while they savor their culinary adventure.</p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
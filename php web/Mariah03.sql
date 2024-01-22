-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 22, 2024 at 04:58 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Mariah03`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `postal_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `email`, `password`) VALUES
(1, 'Admin1@gmail.com', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `basket_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`basket_id`, `User_id`, `product_id`, `quantity`, `price`) VALUES
(3, 6, 1, 1, '2.00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `	stockquantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favorite_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`favorite_id`, `User_id`, `product_id`) VALUES
(1, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order details`
--

CREATE TABLE `order details` (
  `orderid` int(11) NOT NULL,
  `productsid` int(11) NOT NULL,
  `stockquantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Totalammount` decimal(10,2) NOT NULL,
  `orderdate` date NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `order_status` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `User_id`, `Totalammount`, `orderdate`, `address_id`, `order_status`) VALUES
(2, 6, '0.00', '2024-01-21', NULL, NULL),
(3, 6, '0.00', '2024-01-21', NULL, NULL),
(4, 6, '0.00', '2024-01-21', NULL, NULL),
(5, 6, '0.00', '2024-01-21', NULL, NULL),
(6, 6, '6.00', '2024-01-21', NULL, NULL),
(7, 6, '6.00', '2024-01-21', NULL, NULL),
(8, 6, '6.00', '2024-01-21', NULL, NULL),
(9, 6, '6.00', '2024-01-21', NULL, NULL),
(10, 6, '6.00', '2024-01-21', NULL, NULL),
(11, 6, '2.00', '2024-01-21', NULL, NULL),
(12, 6, '2.00', '2024-01-21', NULL, NULL),
(13, 6, '0.00', '2024-01-21', NULL, NULL),
(14, 6, '0.00', '2024-01-21', NULL, NULL),
(15, 6, '0.00', '2024-01-21', NULL, NULL),
(16, 6, '0.00', '2024-01-21', NULL, NULL),
(17, 6, '0.00', '2024-01-21', NULL, NULL),
(20, 6, '4.00', '2024-01-21', NULL, NULL),
(21, 6, '4.00', '2024-01-21', NULL, NULL),
(22, 6, '4.00', '2024-01-21', NULL, NULL),
(23, 6, '4.00', '2024-01-21', NULL, NULL),
(24, 6, '4.00', '2024-01-21', NULL, NULL),
(25, 6, '4.00', '2024-01-21', NULL, NULL),
(26, 6, '4.00', '2024-01-21', NULL, NULL),
(29, 6, '4.00', '2024-01-21', NULL, NULL),
(30, 6, '2.00', '2024-01-21', NULL, NULL),
(31, 6, '5.30', '2024-01-21', NULL, NULL),
(32, 6, '0.00', '2024-01-21', NULL, NULL),
(33, 6, '0.00', '2024-01-21', NULL, NULL),
(34, 6, '5.30', '2024-01-21', NULL, NULL),
(35, 6, '5.30', '2024-01-21', NULL, NULL),
(36, 6, '5.30', '2024-01-21', NULL, NULL),
(37, 6, '5.30', '2024-01-21', NULL, NULL),
(38, 6, '7.50', '2024-01-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `orderid` int(11) NOT NULL,
  `orderstatus` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `ammount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `productsid` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `category` varchar(500) NOT NULL,
  `Imageurl` varchar(255) NOT NULL,
  `stockquantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`productsid`, `Name`, `description`, `Price`, `category`, `Imageurl`, `stockquantity`) VALUES
(1, 'Chicken Patties', 'Tasty Patties', '2.00', 'Savoury', 'assets/2.png', 2),
(2, 'Fish Fingers', 'Tasty Fingers', '2.00', 'Savoury', 'assets/Fish.png', 30),
(3, 'Spinach Muffin', 'Tasty Muffin', '1.30', 'Savoury', 'assets/2.png', 13),
(4, 'Sweet Potato and chicken Patty', 'Tasty Patty', '2.60', 'Savoury', 'assets/1.png', 30),
(5, 'chia seeds crackers', 'Tasty Crackers', '1.80', 'Savoury', 'assets/w.png', 12),
(6, 'Sausage rolls', 'Tasty Rolls', '2.80', 'Savoury', 'assets/33.png', 33),
(7, 'Beetroot Patties', 'Tasty Patties', '1.23', 'Savoury', 'assets/44.png', 8),
(8, 'Chicken Pies', 'Tasty Pies', '3.30', 'Savoury', 'assets/335.png', 50),
(9, 'Banana Muffin', 'Tasty Muffin', '1.50', 'Dessert', 'assets/3333.png', 20);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `Address_id` int(11) NOT NULL,
  `shipping_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role_user` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `Email`, `password`, `created_at`, `role_user`) VALUES
(5, 'Mariahbugeja82@gmail.com', '$2y$10$Q9HUXYWezf.Kd.9KctGsSup32PCO2iPT9C5/j0OEheb0wVaUIvlOa', '2024-01-20 17:55:12', NULL),
(6, 'mariahbugeja8@gmail.com', '$2y$10$56A8OcT9jGyDEMqz3ITF1OrT/UZJOoIMyzK86nuQ4KR85h4BOVrMa', '2024-01-20 19:17:14', NULL),
(7, 'mariahbugeja@hotmail.com', '$2y$10$GJDSDFeuqrKW4uUOoniKI.OKrHHgcYJ3XXY5nbl6E1EaVWmQFT/we', '2024-01-20 22:02:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_authentication`
--

CREATE TABLE `user_authentication` (
  `User_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `your_table_name`
--

CREATE TABLE `your_table_name` (
  `postal_code` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`basket_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order details`
--
ALTER TABLE `order details`
  ADD KEY `order details_ibfk_2` (`productsid`),
  ADD KEY `order details_ibfk_3` (`orderid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `orders_ibfk_1` (`address_id`),
  ADD KEY `orders_ibfk_3` (`User_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`productsid`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `Address_id` (`Address_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `username` (`Email`);

--
-- Indexes for table `user_authentication`
--
ALTER TABLE `user_authentication`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `basket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `productsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_authentication`
--
ALTER TABLE `user_authentication`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `orders` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Products` (`productsid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `Products` (`productsid`) ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Products` (`productsid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order details`
--
ALTER TABLE `order details`
  ADD CONSTRAINT `order details_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `cart` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order details_ibfk_2` FOREIGN KEY (`productsid`) REFERENCES `cart` (`productid`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `users` (`User_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_2` FOREIGN KEY (`Address_id`) REFERENCES `address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

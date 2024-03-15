-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 12:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `Order_Id` int(255) UNSIGNED NOT NULL,
  `Full_Name` varchar(255) NOT NULL,
  `Phone_No` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `Pay_Mode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `rating` int(2) UNSIGNED NOT NULL,
  `detail` text NOT NULL,
  `imageName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `rating`, `detail`, `imageName`) VALUES
(1, 'White Shirt', 800, 'clothing', 5, 'Great Value for money clothing product in shop, designed specially only for Men.', 'clothing1.jpg'),
(2, 'Yellow Top', 990, 'clothing', 4, 'Great Value for money product, designed for girls', 'clothing2.jpg'),
(3, 'Winter Top', 899, 'clothing', 5, 'Great Value for money product, designed specially for girls', 'clothing3.jpg'),
(4, 'Blue Top', 799, 'clothing', 4, 'Great Value for money product, designed specially for girls', 'clothing4.jpg'),
(5, 'Blue Jeans', 749, 'clothing', 5, 'Great Value for money clothing product in shop, designed specially for Men. Girls can also use this.', 'clothing5.jpg'),
(6, 'Black Jeans', 879, 'clothing', 5, 'Great Value for money product, designed only for girls', 'clothing6.jpg'),
(7, 'Black Hat', 489, 'clothing', 4, 'Daily Purpose Hat', 'clothing7.jpg'),
(8, 'Burger', 89, 'food', 5, 'A tasty food item for true food lovers.', 'food1.jpg'),
(9, 'Pizza', 259, 'food', 5, 'A tasty food item for true food lovers.', 'food2.jpg'),
(10, 'Fries', 99, 'food', 3, 'A tasty food item for true food lovers.', 'food3.jpg'),
(11, 'Veg Momos', 79, 'food', 5, 'A tasty chinese food item for true food lovers.', 'food4.jpg'),
(12, 'Pasta', 129, 'food', 3, 'A tasty food item for true food lovers.', 'food5.jpg'),
(13, 'Noodles', 99, 'food', 4, 'A tasty food item for true food lovers.', 'food6.jpg'),
(14, 'MacBook Pro', 89999, 'tech', 5, 'Laptop for Professionals', 'tech1.jpg'),
(15, 'Gaming Headphones', 1299, 'tech', 4, 'Accessories for gaming professionals', 'tech2.jpg'),
(16, 'iPhone 13', 70999, 'tech', 5, 'phone for Professional who\'s privacy matters.', 'tech3.jpg'),
(17, 'Keyboard Mouse Set', 1499, 'tech', 4, 'Keyboard and Mouse set for long term usage', 'tech4.jpg'),
(18, 'Apple Watch 2', 39999, 'tech', 4, 'A good watch for health monitering', 'tech5.jpg'),
(19, 'Airpod Pro', 33999, 'tech', 4, 'Nice and latest airpod provided by Apple', 'tech6.jpg'),
(20, 'OnePlus 9R', 59990, 'tech', 5, 'Phone with brilliant features like camera.', 'tech7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(10) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `uname`, `age`, `email`, `password`, `dt`) VALUES
(1, 'Manjeet', 18, 'manjeet@kmv.com', '$2y$10$pOyyry5Gy8xnq5isGTnN6erMqMlmcxdQfvFECBuXruwCu7wauHBXK', '2021-12-02 14:13:59'),
(2, 'Anuj', 20, 'anuj@kmv.com', '$2y$10$s5fcxskS7cn6bjelyTLX7et4iDNN4W.Trg8ijD3u8DWfNLQEkkp4y', '2021-12-02 14:14:18'),
(3, 'Chinmay', 18, 'chinmay@kmv.com', '$2y$10$3fkDYnsUWF20X/hRpKIB7.yRiMpDuKRS9OC2c800hzWoLrU5LLKI.', '2021-12-02 14:14:48'),
(4, 'Manish', 18, 'manish@kmv.com', '$2y$10$amHBI7dH4MD8oze1seGtj.WOSRvIqJmLY8OdlXagxZ6FCgy3Vf6nG', '2021-12-02 14:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `id` int(255) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_message`
--

INSERT INTO `user_message` (`id`, `username`, `full_name`, `email`, `subject`, `message`) VALUES
(1, 'anuj', 'anuj kumar', 'hello@helo', 'sgfgfgfgfg', 'fgdkfgdkhjgfhdgfhdgfhkgdhfkgdhfgdshkjbce gveurbvug');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `Order_Id` int(255) UNSIGNED NOT NULL,
  `Item_Name` varchar(255) NOT NULL,
  `Price` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_message`
--
ALTER TABLE `user_message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `Order_Id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_message`
--
ALTER TABLE `user_message`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 06:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tres marias`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `name`, `description`, `price`, `stock`, `created_at`) VALUES
(1, 'Cookies and Cream Cake with Oreo Buttercream', 'Cookies and Cream Cake – Dark chocolate cake layers with cookies and cream filling, Oreo buttercream and chocolate drip.', 1000, 4, '2024-01-12 13:00:22'),
(2, 'Raspberry Oreo Cake with Cookies and Cream Filling', 'Raspberry Oreo Cake is stacked with moist and flavorful raspberry cake layers baked on Oreo cookie crusts, and filled with Oreo cream filling and raspberry Oreo buttercream.', 1200, 2, '2024-01-12 13:42:37'),
(3, 'Light and Fluffy Lemon Oreo Cake', 'Bringing on the spring vibes with my new light and fluffy Lemon Oreo Cake, made with tender lemon Oreo cake layers, lemon Oreo cream cheese filling, and lemon buttercream.\r\n\r\n', 1500, 2, '2024-01-12 15:13:42'),
(4, 'Light and Fluffy Coconut Lemon Raspberry Cake', 'Coconut Lemon Raspberry Cake – creamy coconut cake layers with lemon curd, raspberry cream filling and coconut buttercream.', 1200, 3, '2024-01-12 15:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_pics`
--

CREATE TABLE `product_pics` (
  `product_picsID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_pics`
--

INSERT INTO `product_pics` (`product_picsID`, `productID`, `filename`) VALUES
(1, 1, 'cookies-and-cream-cake.JPG'),
(2, 2, 'rasberry-oreo-cake.JPG'),
(3, 3, 'lemon-cake.JPG'),
(4, 4, 'coconut-lemon-cake.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `username`, `password`) VALUES
(1, 'Aedrian Dave Udarbe', 'aedrian529@gmail.com', '09666443944', 'aeudarbe', 'qwerty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `product_pics`
--
ALTER TABLE `product_pics`
  ADD PRIMARY KEY (`product_picsID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_pics`
--
ALTER TABLE `product_pics`
  MODIFY `product_picsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

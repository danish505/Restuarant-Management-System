-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 11:01 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ras`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `table_name` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `items` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `items`, `price`, `image`) VALUES
(2, 'V pizza', 750, 'vegge-lover.jpg'),
(3, 'Pepperoni Pizza', 750, 'pepperoni-pizza.png'),
(4, 'apricot chicken', 200, 'apricot-chicken.png'),
(5, 'Blueberry Shake', 120, 'blueberry-shake.jpg'),
(6, 'cola drink', 60, 'cola-drink.jpg'),
(7, 'lime drink', 60, 'lime-drink.jpg'),
(8, 'iced tea', 60, 'iced-tea.jpg'),
(9, 'cheese burger', 150, 'cheese-burger.png'),
(10, 'chicken burger', 150, 'chicken-burger.png'),
(11, 'country burger', 150, 'country-burger.png'),
(12, 'original burger', 150, 'original-burger.png'),
(17, 'Summer pizza', 750, 'summer-pizza.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `item_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `table` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `order_key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `item_id`, `user_id`, `qty`, `table`, `created_at`, `order_key`) VALUES
(11, '4', 2, '4', 'table1', '1542841200', '5bf6b20da7245'),
(12, '2', 2, '2', 'table3', '1542841200', '5bf6b557e0560'),
(13, '2', 2, '2', 'table2', '1542841200', '5bf6b566c66d0'),
(14, '3', 2, '3', 'table2', '1542841200', '5bf6b566c66d0'),
(17, '4', 2, '4', 'table3', '1542841200', '5bf6b622beeb9'),
(18, '4', 2, '2', 'Table1', '1543467600', '5bff973b1a39a'),
(20, '4', 2, '2', 'Table2', '1543467600', '5bff99a90edd6'),
(21, '5', 2, '3', 'Table2', '1543467600', '5bff99fa0ca7b'),
(22, '7', 2, '3', 'Table1', '1543446000', '5c0048b3a8193'),
(23, '6', 2, '5', 'Table1', '1541631600', '5c004cb4344e0'),
(24, '5', 2, '3', 'Table6', '1543446000', '5c004e98726a4'),
(25, '4', 2, '7', 'Table6', '1543446000', '5c004eacbcb19'),
(26, '11', 2, '2', 'Table6', '1543446000', '5c004eb946430'),
(27, '7', 2, '5', 'Table5', '1543446000', '5c00616b88da2'),
(28, '6', 2, '2', 'Table5', '1543446000', '5c00617b7299a'),
(29, '12', 2, '3', 'Table5', '1543446000', '5c006183f1442');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'user', 'user@gmail.com', '2a6c6f068a5b40a96ff790c0594a1fb5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

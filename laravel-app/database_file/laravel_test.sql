-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 02:34 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int NOT NULL,
  `cate_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(10, 'Category 1'),
(20, 'Category 2'),
(30, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord_id` int NOT NULL,
  `ord_no` varchar(10) NOT NULL,
  `ord_by` int NOT NULL,
  `ord_date` datetime NOT NULL,
  `ord_price` double NOT NULL,
  `ord_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `ord_its` int NOT NULL,
  `ord_id` int NOT NULL,
  `prod_id` int NOT NULL,
  `prod_quan` smallint NOT NULL,
  `prod_price` double NOT NULL,
  `prod_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_cate` int NOT NULL,
  `prod_price` double NOT NULL,
  `prod_amount` int NOT NULL,
  `prod_balance` int NOT NULL,
  `prod_status` tinyint NOT NULL,
  `prod_supplier` int NOT NULL,
  `user_added` int NOT NULL,
  `date_added` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_desc`, `prod_cate`, `prod_price`, `prod_amount`, `prod_balance`, `prod_status`, `prod_supplier`, `user_added`, `date_added`) VALUES
(1, 'สินค้าทดสอบ 1', 'สินค้าทดสอบ 1', 10, 45, 100, 80, 10, 10, 1, '2024-01-08 00:52:30'),
(2, 'สินค้าทดสอบ 3', 'รายละเอียดสินค้าทดสอบ 3', 30, 55, 100, 65, 10, 30, 1, '2024-01-12 05:00:41'),
(3, 'สินค้าทดสอบ 2', 'รายละเอียดสินค้าทดสอบ 2', 20, 50, 120, 90, 10, 20, 1, '2024-01-08 00:58:23'),
(4, 'สินค้าทดสอบ 4', 'รายละเอียดสินค้าทดสอบ 4', 30, 35, 130, 115, 10, 30, 1, '2024-01-08 01:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_id` int NOT NULL,
  `supp_name` varchar(200) NOT NULL,
  `supp_address` text NOT NULL,
  `supp_email` varchar(200) NOT NULL,
  `supp_tel` varchar(20) NOT NULL,
  `supp_other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_id`, `supp_name`, `supp_address`, `supp_email`, `supp_tel`, `supp_other`) VALUES
(10, 'Supplier 1', '', '', '', ''),
(20, 'Supplier 2', '', '', '', ''),
(30, 'Supplier 3', '', '', '', ''),
(40, 'Supplier 4', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'storage/images/users/default.png',
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` enum('10','20') DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(255) NOT NULL,
  `email_verified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `profile`, `email`, `password`, `role`, `active`, `remember_token`, `email_verified_at`) VALUES
(1, 'Alex', 'storage/images/users/default.png', 'alex@mail.com', 'pass@1234', '20', 1, '', '2023-12-18 16:20:21'),
(2, 'Banana', 'storage/images/users/default.png', 'banana', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(3, 'Choosen', 'storage/images/users/default.png', 'choose@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(4, 'Cats', 'storage/images/users/default.png', 'cats@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(5, 'Downny', 'storage/images/users/default.png', 'downny@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(6, 'Foo foo', 'storage/images/users/default.png', 'foo.foo@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(7, 'Gunny', 'storage/images/users/default.png', 'gunny@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(8, 'Foo foo', 'storage/images/users/default.png', 'foo.foo@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(9, 'Gunny', 'storage/images/users/default.png', 'gunny@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(10, 'Foo foo', 'storage/images/users/default.png', 'foo.foo@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(11, 'Gunny', 'storage/images/users/default.png', 'gunny@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(12, 'Foo foo', 'storage/images/users/default.png', 'foo.foo@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(13, 'Gunny', 'storage/images/users/default.png', 'gunny@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(14, 'Foo foo', 'storage/images/users/default.png', 'foo.foo@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21'),
(15, 'Gunny', 'storage/images/users/default.png', 'gunny@mail.com', 'pass@1234', '10', 1, '', '2023-12-18 16:20:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`ord_its`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `ord_its` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

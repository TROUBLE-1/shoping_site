-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 01:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `emailId` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `emailId`) VALUES
(1, 'trouble1', '34344f61ba9a1e9c15754ff95307502f', 'asfasfasfasfasvawsef@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `product_name`, `image`, `price`) VALUES
(31, 'trouble1', 'Dell Vostro 14 3000 Core i5 8th Gen', 'Dell-Vostro-14-3000-Core-i5-8th-Gen.jpg', 43500),
(32, 'trouble1', 'Nikon D5600 DSLR Cameras', 'Nikon_D5600_DSLR_Cameras.jpg', 25000),
(33, 'trouble1', '2080-GL New Gold Platted Day', '2080-GL-New-Gold-Platted-Day.jpg', 1499),
(34, 'trouble1', 'WD Elements 1 TB Wired External Hard Disk Drive', 'external-hard-drive.jpg', 3889),
(35, '', 'WD Elements 1 TB Wired External Hard Disk Drive', 'external-hard-drive.jpg', 3889);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `electronics` varchar(50) NOT NULL,
  `tv_appliances` varchar(50) NOT NULL,
  `home_furniture` varchar(50) NOT NULL,
  `sports_more` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `electronics`, `tv_appliances`, `home_furniture`, `sports_more`) VALUES
(1, 'external-hard-drive.jpg', 'cooker.jpg', 'bottel.jpg', 'batmintan.jpg'),
(2, 'Dell-Vostro-14-3000-Core-i5-8th-Gen.jpg', 'fridge.jpg', 'dinning.jpg', 'football.jpg'),
(3, 'smart_watch.jpg', 'tv.webp', 'dogs.jpg', 'shoes.jpg'),
(4, 'mobile.jpg', 'washing.jpg', 'drawers.jpg', 'treadmill.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `emailId` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `file` text,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `emailId`, `msg`, `file`, `date`) VALUES
(60, 'raunak', 'raunakparmar@gmail.com', 'hi, my name is Raunak.\r\nI am trying to use the coupon but it is not working.\r\nIt shows i have already used it but I have not used it.\r\nSo just want to know whats going wrong?', NULL, '2019-11-20 02:37pm');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `product_name`) VALUES
(1, 'offer.jpg'),
(4, 'offer2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `categories` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `product_name`, `categories`, `price`) VALUES
(1, 'Nikon_D5600_DSLR_Cameras.jpg', 'Nikon D5600 DSLR Cameras', 'electronics', 25000),
(2, 'external-hard-drive.jpg', 'WD Elements 1 TB Wired External Hard Disk Drive', 'electronics', 3889),
(3, 'Dell-Vostro-14-3000-Core-i5-8th-Gen.jpg', 'Dell Vostro 14 3000 Core i5 8th Gen', 'electronics', 43500),
(4, '2080-GL-New-Gold-Platted-Day.jpg', '2080-GL New Gold Platted Day', 'electronics', 1499);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sign_up` text NOT NULL,
  `coupon` text NOT NULL,
  `upload_dir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sign_up`, `coupon`, `upload_dir`) VALUES
(1, 'on', '5235', 'tmp/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `emailId` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `emailId`, `mobile`, `address`) VALUES
(1, 'trouble1', '34344f61ba9a1e9c15754ff95307502f', 'trouble1@gmail.com', 0, ''),
(10, 'raunak', '34344f61ba9a1e9c15754ff95307502f', 'raunak@gmail.com', 445522, 'fasf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`password`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

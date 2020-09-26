-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 11:05 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `insert_by` varchar(100) DEFAULT NULL,
  `update_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `update_by` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`id`, `product_id`, `user_id`, `quantity`, `insert_date`, `insert_by`, `update_date`, `update_by`, `status`) VALUES
(1, 1, 1, 200, '2020-09-26 14:11:47', 'admin', '2020-09-26 14:28:19', NULL, 1),
(2, 2, 1, 223, '2020-09-26 14:11:47', 'admin', '2020-09-26 14:11:55', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` double NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `insert_by` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `update_by` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `product_name`, `product_price`, `insert_date`, `insert_by`, `update_date`, `update_by`, `status`) VALUES
(1, 'product1', 500, '2020-09-25 15:16:17', 'admin', '2020-09-25 15:17:02', '', 1),
(2, 'product2', 200, '2020-09-25 15:49:24', 'admin', '0000-00-00 00:00:00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct_images`
--

CREATE TABLE `tblproduct_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(50) NOT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `insert_by` varchar(100) DEFAULT NULL,
  `update_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `update_by` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct_images`
--

INSERT INTO `tblproduct_images` (`id`, `product_id`, `image_name`, `image_path`, `insert_date`, `insert_by`, `update_date`, `update_by`, `status`) VALUES
(1, 1, '1203_suzi_bo_fondo_1601027177.jpg', 'uploads/1203_suzi_bo_fondo_1601027177.jpg', '2020-09-25 15:16:17', NULL, '2020-09-25 15:50:00', NULL, 1),
(2, 1, '1203_victor_bo_fondo_1601027177.jpg', 'uploads/1203_victor_bo_fondo_1601027177.jpg', '2020-09-25 15:16:17', NULL, '2020-09-25 15:49:50', NULL, 1),
(3, 2, '2_1601029164.jpg', 'uploads/2_1601029164.jpg', '2020-09-25 15:49:24', NULL, '0000-00-00 00:00:00', NULL, 1),
(4, 2, '03gd_1601029164.jpg', 'uploads/03gd_1601029164.jpg', '2020-09-25 15:49:24', NULL, '0000-00-00 00:00:00', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct_images`
--
ALTER TABLE `tblproduct_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproduct_images`
--
ALTER TABLE `tblproduct_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD CONSTRAINT `tblcart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tblproducts` (`id`);

--
-- Constraints for table `tblproduct_images`
--
ALTER TABLE `tblproduct_images`
  ADD CONSTRAINT `tblproduct_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tblproducts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

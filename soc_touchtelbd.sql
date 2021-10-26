-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 02:26 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soc_touchtelbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(50) DEFAULT NULL,
  `categories_status` varchar(10) NOT NULL DEFAULT 'N',
  `create_info` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_status`, `create_info`) VALUES
(11440000, 'Mobile Phone', 'A', '2021-10-26 14:18:30'),
(11440001, 'asdasd', 'A', '2021-10-26 16:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `Categorie_id` int(11) NOT NULL,
  `shot_decs` varchar(50) DEFAULT 'N',
  `decs` varchar(500) NOT NULL DEFAULT 'N',
  `dp_unit` int(100) NOT NULL,
  `rp_unit` int(100) NOT NULL,
  `mrp_unit` int(100) NOT NULL,
  `product_br_code` varchar(200) DEFAULT 'N',
  `product_sku_code` varchar(50) DEFAULT 'N',
  `product_image` varchar(500) NOT NULL DEFAULT 'N',
  `product_status` varchar(50) DEFAULT 'N',
  `create_by` varchar(50) DEFAULT 'N',
  `update_by` varchar(50) DEFAULT 'N',
  `create_info` datetime DEFAULT current_timestamp(),
  `update_info` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL,
  `product_type_name` varchar(50) DEFAULT NULL,
  `product_type_status` varchar(10) NOT NULL DEFAULT 'N',
  `create_info` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`, `product_type_status`, `create_info`) VALUES
(11330000, 'Mobile Phone', 'A', '2021-10-25 18:53:09'),
(11330001, 'Mobile Back Cover', 'A', '2021-10-25 18:58:01'),
(11330002, 'Adapter', 'A', '2021-10-25 18:58:28'),
(11330004, 'AAAAaaa', 'I', '2021-10-26 16:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_info_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_photo` varchar(255) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `create_info` datetime DEFAULT current_timestamp(),
  `update_info` varchar(30) DEFAULT NULL,
  `user_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_info_id`, `user_name`, `user_phone`, `user_email`, `user_photo`, `user_password`, `user_type_id`, `user_address`, `create_info`, `update_info`, `user_status`) VALUES
(11220000, 'Dhali Abir', '01315007287', 'dhaliabir404@gmail.com', 'allImages/UserPicture/dHi6CUser_.01315007287jpg', 'mTfetQIr', 11110000, 'Kollapur,Mirpur,Dhaka', '2021-10-25 16:04:23', 'AAA', 'Active'),
(11220006, 'Md Jahidul Islam', '01721950179', 'jahidulislam@gmail.com', 'allImages/UserPicture/HXvqnUser_.01721950179jpg', 'mTfetQIr', 11110001, 'Shantinagor,Dhaka', '2021-10-26 15:56:33', 'AAA', 'Active'),
(11220007, 'Abir', '01955375749', 'abir@gmail.com', 'allImages/UserPicture/vkyjzUser_.01955375749jpg', 'mTfetQIr', 11110002, 'Dhaka', '2021-10-26 15:57:26', 'AAA', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(50) DEFAULT NULL,
  `user_type_status` varchar(10) NOT NULL DEFAULT 'N',
  `create_info` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_name`, `user_type_status`, `create_info`) VALUES
(11110000, 'ADMIN', 'A', '2021-10-25 15:14:46'),
(11110001, 'Admin', 'A', '2021-10-25 15:24:35'),
(11110002, 'Shop User', 'A', '2021-10-25 15:25:52'),
(11110003, 'AAAaaa', 'I', '2021-10-25 15:32:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_info_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11440002;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11330006;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11220008;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11110006;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

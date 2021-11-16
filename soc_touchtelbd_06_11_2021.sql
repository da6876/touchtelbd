-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2021 at 11:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

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
(11440001, 'asdasd', 'D', '2021-10-26 16:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `company_id` int(10) NOT NULL,
  `company_name` varchar(500) DEFAULT NULL,
  `company_phone` varchar(20) DEFAULT NULL,
  `company_address` varchar(500) NOT NULL DEFAULT 'N',
  `status` varchar(10) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`company_id`, `company_name`, `company_phone`, `company_address`, `status`) VALUES
(11100011, 'Samsung Brand', '017852369', 'Dhaka,Bangladesh', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer_info_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_photo` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `create_by` varchar(100) DEFAULT NULL,
  `create_date` datetime DEFAULT current_timestamp(),
  `update_info` varchar(30) DEFAULT NULL,
  `customer_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`customer_info_id`, `customer_name`, `customer_phone`, `customer_email`, `customer_photo`, `customer_address`, `create_by`, `create_date`, `update_info`, `customer_status`) VALUES
(11660000, 'Rahat Hasan', '0158963255', 'rahat@gmail.com', 'allImages/ProductImages/GodezjaHBukTxPP.png', 'Rampura,Dhaka', 'Dhali Abir', '2021-11-02 17:00:18', NULL, 'Active'),
(11660003, 'AAaaaaaa', 'sas', 'asdasd', 'No Image', 'asda', 'Dhali Abir', '2021-11-02 17:30:23', '11220000', 'Active'),
(11660005, 'Badol Islam', '01684924339', 'badol@gmail.com', 'No Image', '4,Chamilibag,Dhaka', 'Dhali Abir', '2021-11-02 20:00:04', NULL, 'Active'),
(11660006, 'Sabikun Nahar', '01684577855', 'sabikun@gmail.com', 'No Image', 'Hatirpul,Dhaka', 'Dhali Abir', '2021-11-03 13:27:27', NULL, 'Active'),
(11660007, 'Dhali Abir', '01955375749', 'dhali@gmail.com', 'No Image', 'Kollanpur,Dhaka', 'Dhali Abir', '2021-11-07 11:17:00', NULL, 'Active'),
(11660008, 'Ashraf Uddin Dhali', '01712740406', 'audhali@gmail.com', 'No Image', '284 south,paik para,Mirpur,Dhaka,bangladesh', 'Dhali Abir', '2021-11-13 16:17:58', NULL, 'Active'),
(11660010, 'Ashif Dhali', '0131522552', 'ashif@gmail.com', 'No Image', 'Kollapur,Mipur,Dhaka', 'Dhali Abir', '2021-11-16 11:11:01', NULL, 'Active'),
(11660011, 'AAAA', 'sas', 'asdasd', 'No Image', 'asda', NULL, '2021-11-16 11:14:01', '11220000', 'D'),
(11660012, 'AAaa', 'sas', 'asdasd', 'No Image', 'asda', NULL, '2021-11-16 11:14:51', '11220000', 'D'),
(11660013, 'AAaaa', 'sas', 'asdasd', 'No Image', 'asda', NULL, '2021-11-16 11:15:25', '11220000', 'D'),
(11660014, 'AAaaa', 'sas', 'asdasd', 'No Image', 'asda', NULL, '2021-11-16 11:16:48', '11220000', 'D'),
(11660015, 'fffffff', 'sas', 'asdasd', 'No Image', 'asda', NULL, '2021-11-16 11:17:07', '11220000', 'D'),
(11660016, 'AAasdsadadasd', 'sas', 'asdasd', 'No Image', 'asda', NULL, '2021-11-16 11:19:29', '11220000', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `color_id` int(10) NOT NULL,
  `color_name` varchar(500) DEFAULT NULL,
  `staus` varchar(50) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `Categorie_id` int(11) NOT NULL,
  `decs` varchar(900) NOT NULL DEFAULT 'N',
  `product_image` varchar(500) NOT NULL DEFAULT 'N',
  `product_status` varchar(50) DEFAULT 'N',
  `create_by` varchar(50) DEFAULT 'N',
  `update_by` varchar(50) DEFAULT 'N',
  `create_info` datetime DEFAULT current_timestamp(),
  `update_info` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`product_id`, `product_name`, `product_type_id`, `Categorie_id`, `decs`, `product_image`, `product_status`, `create_by`, `update_by`, `create_info`, `update_info`) VALUES
(11220002, 'Samsung Galaxy A03s', 11330000, 11440000, 'Samsung Galaxy A03s comes with 6.5 inches HD+ screen. It has a Full-View waterdrop notch design. The back camera is of triple 13+2+2 MP with Autofocus, LED flash, depth sensor, dedicated macro camera etc. and Full HD video recording. The front camera is of 5 MP. Galaxy A03s comes with 5000 mAh battery with 15W fast charging. It has 4 GB RAM, 2.35 GHz octa-core CPU and PowerVR GE8320. It is powered by a MediaTek Helio P35 (12nm) chipset. The device comes with 64 GB internal storage and a dedicated MicroSD slot. There is a side-mounted fingerprint sensor in this phone.', 'allImages/ProductImages/dp0sB5hiZiIHfhh.jpg', 'Active', '11220000', '11220000', '2021-11-01 12:49:01', '2021-11-01 12:49:01'),
(11220003, 'Samsung Galaxy A52s 5G', 11330000, 11440000, 'Samsung Galaxy A52s 5G comes with 6.5 inches Full HD+ Super AMOLED screen. It has a center punch-hole front camera design. The back camera is of Quad 64+12+5+5 with PDAF, OIS, ultrawide, depth sensor, dedicated macro camera etc. and Ultra HD video recording. The front camera is of 32 MP. Galaxy A52s 5G comes with 4500 mAh battery with 25W fast charging. It has 8 GB RAM, up to 2.3 GHz octa-core CPU and Adreno 618 GPU. It is powered by a Qualcomm Snapdragon 720G (8 nm) chipset. The device comes with 128 GB internal storage and shared MicroSD slot. There is an in-display optical fingerprint sensor in this phone.', 'allImages/ProductImages/hYk9OFIKgIsGZWq.jpg', 'Active', '11220000', 'N', '2021-11-01 12:50:38', '2021-11-01 12:50:38'),
(11220004, 'Samsung Galaxy A22', 11330000, 11440000, 'Samsung Galaxy A22 comes with 6.4 inches HD+ Super AMOLED screen. It has a waterdrop notch front camera design. The back camera is of Quad 48+8+2+2 with PDAF, OIS, f/1.8 aperture, ultrawide, depth sensor, dedicated macro camera etc. and Full HD video recording. The front camera is of 13 MP. Galaxy A22 comes with 5000 mAh battery with 15W fast charging. It has 6 GB RAM, up to 2.0 GHz octa-core CPU and Mali-G52 MC2 GPU. It is powered by a Mediatek Helio G80 (12 nm) chipset. The device comes with 128 GB internal storage and dedicated MicroSD slot. There is a side-mounted fingerprint sensor in this phone.', 'allImages/ProductImages/6jdpDiuiBbxhMqv.jpg', 'Active', '11220000', 'N', '2021-11-01 12:51:19', '2021-11-01 12:51:19'),
(11220005, 'Samsung Galaxy A72', 11330000, 11440000, 'Samsung Galaxy A72 comes with 6.7 inches Full HD+ Super AMOLED screen. It has a center punch-hole front camera design. The back camera is of Quad 64+8+12+5 with PDAF, OIS, ultrawide, telephoto lens, dedicated macro camera etc. and Ultra HD video recording. The front camera is of 32 MP. Galaxy A72 comes with 5000 mAh battery with 25W fast charging. It has 8 GB RAM, up to 2.3 GHz octa-core CPU and Adreno 618 GPU. It is powered by a Qualcomm Snapdragon 720G (8 nm) chipset. The device comes with 256 GB internal storage and shared MicroSD slot. There is an in-display optical fingerprint sensor in this phone.', 'allImages/ProductImages/tryDozuNeJWalBG.jpg', 'Active', '11220000', 'N', '2021-11-01 12:51:54', '2021-11-01 12:51:54'),
(11220006, 'Samsung Galaxy A52', 11330000, 11440000, 'Samsung Galaxy A52 comes with 6.5 inches Full HD+ Super AMOLED screen. It has a center punch-hole front camera design. The back camera is of Quad 64+12+5+5 with PDAF, OIS, ultrawide, depth sensor, dedicated macro camera etc. and Ultra HD video recording. The front camera is of 32 MP. Galaxy A52 comes with 4500 mAh battery with 25W fast charging. It has 8 GB RAM, up to 2.3 GHz octa-core CPU and Adreno 618 GPU. It is powered by a Qualcomm Snapdragon 720G (8 nm) chipset. The device comes with 128 GB internal storage and shared MicroSD slot. There is an in-display optical fingerprint sensor in this phone.', 'allImages/ProductImages/nznxhguP5fKhAWi.jpg', 'Active', '11220000', 'N', '2021-11-01 12:52:27', '2021-11-01 12:52:27'),
(11220007, 'Samsung Galaxy A32', 11330000, 11440000, 'Samsung Galaxy A32 comes with 6.4 inches Full HD+ Super AMOLED screen. It has a center punch-hole front camera design. The back camera is of Quad 64+8+5+5 with PDAF, ultrawide, depth sensor, dedicated macro camera etc. and Full HD video recording. The front camera is of 20 MP. Galaxy A32 comes with 5000 mAh battery with 15W fast charging. It has 6 GB RAM, up to 2.0 GHz octa-core CPU and Mali-G52 MC2 GPU. It is powered by a Mediatek Helio G80 (12 nm) chipset. The device comes with 128 GB internal storage and dedicated MicroSD slot. There is an in-display optical fingerprint sensor in this phone.', 'allImages/ProductImages/md0LNQgrLMJhsyD.jpg', 'Active', '11220000', 'N', '2021-11-01 12:52:57', '2021-11-01 12:52:57'),
(11220008, 'Samsung Galaxy A12', 11330000, 11440000, 'Samsung Galaxy A12 comes with 6.5 inches PLS IPS HD+ screen. It has a Full-View waterdrop notch design. The back camera is of quad 48+5+2+2 MP with Autofocus, LED flash, depth sensor, dedicated macro camera etc. and Full HD video recording. The front camera is of 8 MP. Galaxy A12 comes with 5000 mAh battery with 15W fast charging. It has 3, 4 or 6 GB RAM, up to 2.35 GHz octa-core CPU and PowerVR GE8320 GPU. It is powered by a Mediatek Helio P35 (12nm) chipset. The device comes with 32, 64 or 128 GB internal storage and dedicated MicroSD slot. There is a side-mounted fingerprint sensor in this phone.', 'allImages/ProductImages/Hh5Rtlmirjx2kJU.jpg', 'Active', '11220000', 'N', '2021-11-01 12:53:41', '2021-11-01 12:53:41'),
(11220009, 'Samsung Galaxy M31', 11330000, 11440000, 'Samsung Galaxy M31 comes with 6.4 inches Full HD+ Super AMOLED screen. The display is protected by a 3rd generation Corning Gorilla Glass. It has a Full-View waterdrop notch design. The back camera is of quad 64+8+5+5 MP with PDAF, LED flash, depth sensor, macro, ultrawide etc. and UHD 4K video recording. The front camera is of 32 MP. Samsung Galaxy M31 comes with 6000 mAh huge battery with 15W fast charging. It has 6 GB RAM, 2.3 GHz octa-core CPU and Mali-G72 MP3 GPU. It is powered by Exynos 9611 (10nm) chipset. The device comes with 64 or 128 GB UFS 2.1 internal storage and dedicated MicroSD slot. There is a back-mounted fingerprint sensor in this phone.', 'allImages/ProductImages/wkyCEjmYyRCEwBO.jpg', 'Active', '11220000', 'N', '2021-11-01 12:55:31', '2021-11-01 12:55:31'),
(11220010, 'Samsung Galaxy M01', 11330000, 11440000, 'Samsung Galaxy M01 comes with 5.26 inches HD+ screen. It has a Full-View waterdrop notch design. The back camera is of dual 13+2 MP with Autofocus, LED flash, depth sensor etc. and Full HD video recording. The front camera is of 5 MP. Galaxy M01 comes with 4000 mAh battery with no fast charging. It has 3 GB RAM, up to 1.95 GHz octa-core CPU and Adreno 505 GPU. It is powered by a Qualcomm Snapdragon 439 (12 nm) chipset. The device comes with 32 GB internal storage and dedicated MicroSD slot. There is no fingerprint sensor in this phone.', 'allImages/ProductImages/S7S02Qo6plEwpJ3.jpg', 'Active', '11220000', 'N', '2021-11-01 12:56:19', '2021-11-01 12:56:19'),
(11220011, 'Samsung Galaxy M21', 11330000, 11440000, 'Samsung Galaxy M21 comes with 6.4 inches Full HD+ Super AMOLED screen. It has a Full-View waterdrop notch design. The front side is protected by a 3rd generation Gorilla Glass. The back camera is of triple 48+8+5 MP with PDAF, LED flash, depth sensor, ultrawide etc. and UHD 4K video recording. The front camera is of 20 MP. Samsung Galaxy M21 comes with 6000 mAh huge battery with 15W fast charging. It has 4 or 6 GB RAM, 2.3 GHz octa-core CPU and Mali-G72 MP3 GPU. It is powered by Exynos 9611 (10nm) chipset. The device comes with 64 or 128 GB UFS 2.1 internal storage and dedicated MicroSD slot. There is a back-mounted fingerprint sensor in this phone.', 'allImages/ProductImages/MFe3juARPN2MpFb.jpg', 'Active', '11220000', 'N', '2021-11-01 12:56:56', '2021-11-01 12:56:56'),
(11220012, 'Samsung Galaxy M01 Core', 11330000, 11440000, 'Samsung Galaxy M01 Core comes with 5.3 inches HD+ screen. It has a Full-View design. The back camera is of single 8 MP with Autofocus, LED flash, f/2.2 aperture etc. and Full HD video recording. The front camera is of 5 MP. Galaxy M01 Core comes with 3000 mAh battery with no fast charging. It has 1 or 2 GB RAM, up to 1.5 GHz quad-core CPU and PowerVR GE8100 GPU. It is powered by a Mediatek MT6739 (28 nm) chipset. The device comes with 16 or 32 GB internal storage and dedicated MicroSD slot. There is no fingerprint sensor in this phone.', 'allImages/ProductImages/Y59BZtyYEKYhk2U.jpg', 'Active', '11220000', 'N', '2021-11-01 12:57:24', '2021-11-01 12:57:24'),
(11220013, 'Samsung Galaxy M51', 11330000, 11440000, 'Samsung Galaxy M51 comes with 6.7 inches Full HD+ Super AMOLED screen. It has a punch-hole front camera design. The back camera is of quad 64+12+5+5 with PDAF, ultrawide, depth sensor, dedicated macro camera, LED flash etc. and Ultra HD video recording. The front camera is of 32 MP. Galaxy M51 comes with 7000 mAh massive battery with 25W fast charging. It has 8 GB RAM, up to 2.2 GHz octa-core CPU and Adreno 618 GPU. It is powered by Qualcomm Snapdragon 730G (8 nm) chipset. The device comes with 128 GB internal storage and dedicated MicroSD slot. There is a side-mounted fingerprint sensor in this phone.', 'allImages/ProductImages/Oas8LhGfMTtc4OR.jpg', 'Active', '11220000', 'N', '2021-11-01 12:57:53', '2021-11-01 12:57:53'),
(11220014, 'Samsung Galaxy M01s', 11330000, 11440000, 'Samsung Galaxy M01s comes with 6.2 inches HD+ screen. It has a Full-View waterdrop notch design. The back camera is of dual 13+2 MP with Autofocus, LED flash, depth sensor etc. and Full HD video recording. The front camera is of 8 MP. Galaxy M01s comes with 4000 mAh battery with no fast charging. It has 3 GB RAM, up to 2 GHz octa-core CPU and PowerVR GE8320 GPU. It is powered by a Mediatek Helio P22 (12 nm) chipset. The device comes with 32 GB internal storage and dedicated MicroSD slot. There is a back-mounted fingerprint sensor in this phone.', 'allImages/ProductImages/9eq71ZQglaRzmWC.jpg', 'Active', '11220000', 'N', '2021-11-01 12:58:20', '2021-11-01 12:58:20'),
(11220015, 'Samsung Galaxy M02s', 11330000, 11440000, 'Samsung Galaxy M02s comes with 6.5 inches HD+ screen. It has a Full-View waterdrop notch design. The back camera is of triple 13+2+2 MP with Autofocus, LED flash, depth sensor, dedicated macro camera etc. and Full HD video recording. The front camera is of 5 MP. Galaxy M02s comes with 5000 mAh battery with 15W fast charging. It has 4 GB RAM, 1.8 GHz octa-core CPU and Adreno 506 GPU. It is powered by a Qualcomm Snapdragon 450 (14 nm) chipset. The device comes with 64 GB internal storage and dedicated MicroSD slot. There is no fingerprint sensor in this phone.', 'allImages/ProductImages/IKXzS4tDATyxjES.jpg', 'Active', '11220000', 'N', '2021-11-01 12:59:02', '2021-11-01 12:59:02'),
(11220016, 'Samsung Galaxy M02', 11330000, 11440000, 'Samsung Galaxy M02 comes with 6.5 inches HD+ screen. It has a Full-View waterdrop notch design. The back camera is of dual 13+2 MP with Autofocus, LED flash, dedicated macro camera etc. and Full HD video recording. The front camera is of 5 MP. Galaxy M02 comes with 5000 mAh battery. It has 2 or 3 GB RAM, 1.5 GHz quad-core CPU and PowerVR GE8100 GPU. It is powered by a Mediatek MT6739W (28 nm) chipset. The device comes with 32 GB internal storage and dedicated MicroSD slot. There is no fingerprint sensor in this phone.', 'allImages/ProductImages/IlaNqA0mUDvD36f.jpg', 'Active', '11220000', 'N', '2021-11-01 12:59:28', '2021-11-01 12:59:28'),
(11220017, 'Samsung Galaxy M12', 11330000, 11440000, 'Samsung Galaxy M12 comes with 6.5 inches PLS IPS HD+ screen. It has a Full-View waterdrop notch design. The back camera is of quad 48+5+2+2 MP with PDAF, LED flash, depth sensor, dedicated macro camera etc. and Full HD video recording. The front camera is of 8 MP. Galaxy M12 comes with 6000 mAh battery with 15W fast charging. It has 6 GB RAM, up to 2.0 GHz octa-core CPU and Mali-G52 GPU. It is powered by a Exynos 850 (8nm) chipset. The device comes with 128 GB internal storage and dedicated MicroSD slot. There is a side-mounted fingerprint sensor in this phone.', 'allImages/ProductImages/eG0lHyraP34NdwO.jpg', 'Active', '11220000', 'N', '2021-11-01 12:59:54', '2021-11-01 12:59:54'),
(11220018, 'Samsung Galaxy M62', 11330000, 11440000, 'Samsung Galaxy M62 comes with 6.5 inches Full HD+ Super AMOLED screen. It has a center punch-hole front camera design. The back camera is of Quad 64+12+5+5 with PDAF, ultrawide, depth sensor, dedicated macro camera etc. and Ultra HD video recording. The front camera is of 32 MP. Galaxy M62 comes with 7000 mAh massive battery with 25W fast charging and reverse charging option. It has 8 GB RAM, up to 2.73 GHz octa-core CPU and Mali-G76 MP12 GPU. It is powered by a Exynos 9825 (7 nm) chipset. The device comes with 128 GB internal storage and dedicated MicroSD slot. There is a side-mounted fingerprint sensor in this phone.', 'allImages/ProductImages/3z24OgN6V6INKBy.jpg', 'Active', '11220000', 'N', '2021-11-01 13:00:24', '2021-11-01 13:00:24'),
(11220019, 'Samsung Galaxy M32', 11330000, 11440000, 'Samsung Galaxy M32 comes with 6.4 inches Full HD+ Super AMOLED screen. It has a waterdrop notch front camera design. The back camera is of Quad 64+8+2+2 with PDAF, f/1.8 aperture, ultrawide, depth sensor, dedicated macro camera etc. and Full HD video recording. The front camera is of 20 MP. Galaxy M32 comes with 6000 mAh battery with 25W fast charging. It has 6 GB RAM, up to 2.0 GHz octa-core CPU and Mali-G52 MC2 GPU. It is powered by a Mediatek Helio G80 (12 nm) chipset. The device comes with 128 GB internal storage and dedicated MicroSD slot. There is a side-mounted fingerprint sensor in this phone.', 'allImages/ProductImages/uWxYMx4v3nqRNXj.jpg', 'Active', '11220000', 'N', '2021-11-01 13:01:09', '2021-11-01 13:01:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `product_order_id` int(11) NOT NULL,
  `invoice_no` varchar(50) DEFAULT 'N',
  `customer_info_id` int(11) NOT NULL,
  `service_price` int(100) NOT NULL DEFAULT 0,
  `discount_price` int(100) NOT NULL DEFAULT 0,
  `recive_amount` int(100) NOT NULL DEFAULT 0,
  `deu_amount` int(100) DEFAULT 0,
  `grand_total` int(100) NOT NULL,
  `payment_type` varchar(100) DEFAULT NULL,
  `product_order_status` varchar(100) NOT NULL,
  `create_by` varchar(50) DEFAULT 'N',
  `update_by` varchar(50) DEFAULT 'N',
  `create_Date` varchar(50) DEFAULT 'N',
  `update_date` varchar(50) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`product_order_id`, `invoice_no`, `customer_info_id`, `service_price`, `discount_price`, `recive_amount`, `deu_amount`, `grand_total`, `payment_type`, `product_order_status`, `create_by`, `update_by`, `create_Date`, `update_date`) VALUES
(8, '4HF9A3T', 11660008, 500, 1000, 47000, 0, 47000, NULL, '', '11220000', 'N', '2021/11/13', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `product_order_invoice`
--

CREATE TABLE `product_order_invoice` (
  `product_order_invoice_id` int(11) NOT NULL,
  `invoice_no` varchar(50) DEFAULT 'N',
  `product_id` int(10) NOT NULL,
  `bar_code` varchar(100) NOT NULL,
  `create_by` varchar(50) DEFAULT 'N',
  `create_date` varchar(50) DEFAULT 'N',
  `update_by` varchar(50) DEFAULT 'N',
  `update_date` varchar(50) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_order_invoice`
--

INSERT INTO `product_order_invoice` (`product_order_invoice_id`, `invoice_no`, `product_id`, `bar_code`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(8, '4HF9A3T', 11220004, 'AA66', '11220000', '2021/11/13', 'N', 'N'),
(9, '4HF9A3T', 11220002, 'AA11', '11220000', '2021/11/13', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE `product_stock` (
  `product_stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `invice_no` varchar(150) NOT NULL,
  `shot_decs` varchar(500) NOT NULL DEFAULT 'N',
  `qty` int(100) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `unit_price` int(100) NOT NULL,
  `sell_price` int(100) NOT NULL,
  `product_br_code` varchar(200) DEFAULT 'N',
  `product_ime` varchar(50) DEFAULT 'N',
  `product_stock_status` varchar(50) DEFAULT 'N',
  `create_by` varchar(50) DEFAULT 'N',
  `update_by` varchar(50) DEFAULT 'N',
  `create_info` datetime DEFAULT current_timestamp(),
  `update_info` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`product_stock_id`, `product_id`, `invice_no`, `shot_decs`, `qty`, `color`, `unit_price`, `sell_price`, `product_br_code`, `product_ime`, `product_stock_status`, `create_by`, `update_by`, `create_info`, `update_info`) VALUES
(1, 11220002, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'Red', 15000, 15000, 'GR01', '147852369', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(2, 11220003, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'IndianRed', 17820, 17820, 'GR02', '963258741', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(3, 11220004, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'DarkSalmon', 25550, 25550, 'GR03', '789654123', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(4, 11220005, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'HotPink', 17852, 17852, 'GR05', '321456789', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(5, 11220006, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'LightSalmon', 20000, 20000, 'GR10', '9875214863', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(6, 11220007, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'OrangeRed', 147852, 147852, 'GR11', '852147963', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(7, 11220008, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'DarkOrange', 25800, 25800, 'GR12', '147852369', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(8, 11220009, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'Gold', 65000, 65000, 'DB07', '852147963', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(9, 11220010, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'Plum', 45000, 45000, 'DB08', '987563214', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(10, 11220011, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'SlateBlue', 85000, 85000, 'SB01', '753159642', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(11, 11220012, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'Chartreuse', 75000, 75000, 'SB02', '74125478632', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(12, 11220013, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'GreenYellow', 147852, 147852, 'DT12', '957852143', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(13, 11220014, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'DarkSeaGreen', 78000, 78000, 'DT13', '36985214', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(14, 11220015, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'DarkCyan', 52000, 52000, 'DT14', '987563217', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(15, 11220016, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'Aqua', 30111, 30111, 'DT15', '9587413', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(16, 11220017, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'DarkTurquoise', 96300, 96300, 'DT16', '963258711', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(17, 11220018, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'PowderBlue', 52000, 52000, 'DT17', '4563217896', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09'),
(18, 11220019, '6SHW24J6SCR3FOVEP9KP', '.', 1, 'Navy', 50000, 50000, 'KE01', '632145697', 'Active', '11220000', 'N', '2021-11-03 21:24:09', '2021-11-03 21:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock_dtl`
--

CREATE TABLE `product_stock_dtl` (
  `product_stock_dtl_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `invice_no` varchar(100) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `unit_price` int(100) NOT NULL,
  `sell_price` int(100) NOT NULL,
  `product_brcode` varchar(200) DEFAULT 'N',
  `product_imei` varchar(50) DEFAULT 'N',
  `create_by` varchar(50) DEFAULT 'SYSTEM',
  `create_date` varchar(25) DEFAULT 'u',
  `update_by` varchar(50) DEFAULT 'SYSTEM',
  `create_info` datetime DEFAULT current_timestamp(),
  `update_info` datetime DEFAULT current_timestamp(),
  `sell_status` int(10) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_stock_dtl`
--

INSERT INTO `product_stock_dtl` (`product_stock_dtl_id`, `product_id`, `invice_no`, `color`, `unit_price`, `sell_price`, `product_brcode`, `product_imei`, `create_by`, `create_date`, `update_by`, `create_info`, `update_info`, `sell_status`) VALUES
(1, 11220002, 'ET27BPPVAOK73CUUEZ1E', 'Red', 20000, 21000, 'AA11', '112233', '11220000', '08/11/2021', 'N', '2021-11-08 12:20:24', '2021-11-08 12:20:24', 0),
(2, 11220002, 'ET27BPPVAOK73CUUEZ1E', 'White', 20000, 21000, 'AA22', '332211', '11220000', '08/11/2021', 'N', '2021-11-08 12:20:24', '2021-11-08 12:20:24', 1),
(3, 11220003, 'ET27BPPVAOK73CUUEZ1E', 'White', 22000, 23000, 'AA33', '88008800', '11220000', '08/11/2021', 'N', '2021-11-08 12:22:22', '2021-11-08 12:22:22', 1),
(4, 11220003, 'ET27BPPVAOK73CUUEZ1E', 'Gray', 22000, 23000, 'AA44', '11002200', '11220000', '08/11/2021', 'N', '2021-11-08 12:22:22', '2021-11-08 12:22:22', 1),
(5, 11220004, 'ET27BPPVAOK73CUUEZ1E', 'Red', 25000, 26500, 'AA55', '85230000', '11220000', '08/11/2021', 'N', '2021-11-08 12:27:29', '2021-11-08 12:27:29', 1),
(6, 11220004, 'ET27BPPVAOK73CUUEZ1E', 'Green', 25000, 26500, 'AA66', '75230000', '11220000', '08/11/2021', 'N', '2021-11-08 12:27:29', '2021-11-08 12:27:29', 0),
(7, 11220004, 'ET27BPPVAOK73CUUEZ1E', 'White', 25000, 26500, 'AA77', '45230000', '11220000', '08/11/2021', 'N', '2021-11-08 12:27:29', '2021-11-08 12:27:29', 1),
(8, 11220005, 'ET27BPPVAOK73CUUEZ1E', 'Red', 32000, 33500, 'AA88', '8800000', '11220000', '08/11/2021', 'N', '2021-11-08 12:29:43', '2021-11-08 12:29:43', 1),
(9, 11220005, 'ET27BPPVAOK73CUUEZ1E', 'White', 32000, 33500, 'AA99', '9900000', '11220000', '08/11/2021', 'N', '2021-11-08 12:29:43', '2021-11-08 12:29:43', 1),
(10, 11220005, 'ET27BPPVAOK73CUUEZ1E', 'Light Blue', 32000, 33500, 'AA01', '0100000', '11220000', '08/11/2021', 'N', '2021-11-08 12:29:43', '2021-11-08 12:29:43', 1),
(12, 11220012, 'PJE6EPW7DD08BHRSFWFS', 'White', 24500, 25500, 'BB11', '048080808', '11220000', '08/11/2021', 'N', '2021-11-08 12:31:20', '2021-11-08 12:31:20', 1),
(13, 11220012, 'PJE6EPW7DD08BHRSFWFS', 'Gray', 24500, 25500, 'BB22', '058080808', '11220000', '08/11/2021', 'N', '2021-11-08 12:31:20', '2021-11-08 12:31:20', 1),
(14, 11220012, 'PJE6EPW7DD08BHRSFWFS', 'Pink', 25000, 26000, 'BB23', '038080808', '11220000', '08/11/2021', 'N', '2021-11-08 12:31:20', '2021-11-08 12:31:20', 1),
(15, 11220013, 'PJE6EPW7DD08BHRSFWFS', 'White', 20000, 21000, 'BB99', '70808999', '11220000', '08/11/2021', 'N', '2021-11-08 12:36:48', '2021-11-08 12:36:48', 1),
(16, 11220013, 'PJE6EPW7DD08BHRSFWFS', 'Light Gray', 20000, 21000, 'BB88', '80708999', '11220000', '08/11/2021', 'N', '2021-11-08 12:36:48', '2021-11-08 12:36:48', 1),
(17, 11220010, 'G213112021', 'Blue', 28500, 30000, 'BR01', '147003399', '11220000', '13/11/2021', 'N', '2021-11-13 22:46:31', '2021-11-13 22:46:31', 1),
(18, 11220010, 'G213112021', 'Light Blue', 28500, 30000, 'BR02', '147003366', '11220000', '13/11/2021', 'N', '2021-11-13 22:46:31', '2021-11-13 22:46:31', 1),
(19, 11220010, 'G213112021', 'Drak Blue', 28500, 30000, 'BR03', '147003333', '11220000', '13/11/2021', 'N', '2021-11-13 22:46:31', '2021-11-13 22:46:31', 1),
(20, 11220010, 'QPPF7GCS5KZYPUNAG36E', 'Blue', 28500, 30000, 'BR04', '105099330', '11220000', '2021/11/13', 'N', '2021-11-13 22:50:31', '2021-11-13 22:50:31', 1),
(21, 11220010, 'QPPF7GCS5KZYPUNAG36E', 'Light Blue', 28500, 30000, 'BR05', '105098330', '11220000', '2021/11/13', 'N', '2021-11-13 22:50:31', '2021-11-13 22:50:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_stock_mst`
--

CREATE TABLE `product_stock_mst` (
  `product_stock_mst_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `company_id` int(10) NOT NULL,
  `invice_no` varchar(150) NOT NULL,
  `shot_decs` varchar(500) NOT NULL DEFAULT 'N',
  `qty` int(100) NOT NULL,
  `product_stock_status` varchar(50) DEFAULT 'N',
  `create_by` varchar(50) DEFAULT 'SYSTEM',
  `create_date` varchar(25) NOT NULL DEFAULT 'A',
  `update_by` varchar(50) DEFAULT 'SYSTEM',
  `create_info` datetime DEFAULT current_timestamp(),
  `update_info` datetime DEFAULT current_timestamp(),
  `primaryvalue` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_stock_mst`
--

INSERT INTO `product_stock_mst` (`product_stock_mst_id`, `product_id`, `company_id`, `invice_no`, `shot_decs`, `qty`, `product_stock_status`, `create_by`, `create_date`, `update_by`, `create_info`, `update_info`, `primaryvalue`) VALUES
(1, 11220002, 11100011, 'ET27BPPVAOK73CUUEZ1E', 'New1', 2, 'Active', '11220000', '08/11/2021', 'N', '2021-11-08 12:20:24', '2021-11-08 12:20:24', '8HE226YE9JGOA1SG974S'),
(2, 11220003, 11100011, 'ET27BPPVAOK73CUUEZ1E', 'New2', 2, 'Active', '11220000', '08/11/2021', 'N', '2021-11-08 12:22:21', '2021-11-08 12:22:21', '8HE226YE9JGOA1SG974S'),
(3, 11220004, 11100011, 'ET27BPPVAOK73CUUEZ1E', 'New3', 3, 'Active', '11220000', '08/11/2021', 'N', '2021-11-08 12:27:29', '2021-11-08 12:27:29', '8HE226YE9JGOA1SG974S'),
(4, 11220005, 11100011, 'ET27BPPVAOK73CUUEZ1E', 'New4', 4, 'Active', '11220000', '08/11/2021', 'N', '2021-11-08 12:29:43', '2021-11-08 12:29:43', '8HE226YE9JGOA1SG974S'),
(5, 11220012, 11100011, 'PJE6EPW7DD08BHRSFWFS', 'New Item', 3, 'Active', '11220000', '08/11/2021', 'N', '2021-11-08 12:31:20', '2021-11-08 12:31:20', '8HE226YE9JGOA1SG974S'),
(6, 11220013, 11100011, 'PJE6EPW7DD08BHRSFWFS', 'AA', 2, 'Active', '11220000', '08/11/2021', 'N', '2021-11-08 12:36:47', '2021-11-08 12:36:47', '0KHCENDIABDSFUKKYVJZ'),
(7, 11220010, 11100011, 'G213112021', 'Another', 3, 'Active', '11220000', '13/11/2021', 'N', '2021-11-13 22:46:31', '2021-11-13 22:46:31', '1HLE4ETB5F34W0VAVQKF'),
(8, 11220010, 11100011, 'QPPF7GCS5KZYPUNAG36E', 'Another 2', 2, 'Active', '11220000', '2021/11/13', 'N', '2021-11-13 22:50:31', '2021-11-13 22:50:31', 'XP3GURAVZN2FI07CGLP7');

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
(11330006, 'Mobile Glass 1', 'A', '2021-11-16 09:31:34'),
(11330007, 'Test aaa', 'D', '2021-11-16 10:09:27');

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
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`customer_info_id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`product_order_id`);

--
-- Indexes for table `product_order_invoice`
--
ALTER TABLE `product_order_invoice`
  ADD PRIMARY KEY (`product_order_invoice_id`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`product_stock_id`);

--
-- Indexes for table `product_stock_dtl`
--
ALTER TABLE `product_stock_dtl`
  ADD PRIMARY KEY (`product_stock_dtl_id`);

--
-- Indexes for table `product_stock_mst`
--
ALTER TABLE `product_stock_mst`
  ADD PRIMARY KEY (`product_stock_mst_id`);

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
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `company_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11100012;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `customer_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11660017;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11220020;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `product_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_order_invoice`
--
ALTER TABLE `product_order_invoice`
  MODIFY `product_order_invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `product_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_stock_dtl`
--
ALTER TABLE `product_stock_dtl`
  MODIFY `product_stock_dtl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_stock_mst`
--
ALTER TABLE `product_stock_mst`
  MODIFY `product_stock_mst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11330008;

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

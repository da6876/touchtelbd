-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 08:09 PM
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
(11440001, 'asdasd', 'A', '2021-10-26 16:33:21');

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
(11660003, 'AA', 'sas', 'asdasd', 'No Image', 'asda', 'Dhali Abir', '2021-11-02 17:30:23', NULL, 'Active'),
(11660005, 'Badol Islam', '01684924339', 'badol@gmail.com', 'No Image', '4,Chamilibag,Dhaka', 'Dhali Abir', '2021-11-02 20:00:04', NULL, 'Active'),
(11660006, 'Sabikun Nahar', '01684577855', 'sabikun@gmail.com', 'No Image', 'Hatirpul,Dhaka', 'Dhali Abir', '2021-11-03 13:27:27', NULL, 'Active');

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
(11220002, 'Samsung Galaxy A03s', 11330000, 11440000, 'Samsung Galaxy A03s comes with 6.5 inches HD+ screen. It has a Full-View waterdrop notch design. The back camera is of triple 13+2+2 MP with Autofocus, LED flash, depth sensor, dedicated macro camera etc. and Full HD video recording. The front camera is of 5 MP. Galaxy A03s comes with 5000 mAh battery with 15W fast charging. It has 4 GB RAM, 2.35 GHz octa-core CPU and PowerVR GE8320. It is powered by a MediaTek Helio P35 (12nm) chipset. The device comes with 64 GB internal storage and a dedicated MicroSD slot. There is a side-mounted fingerprint sensor in this phone.', 'allImages/ProductImages/ayMdaLXkTwRpqIg.jpg', 'Active', '11220000', 'N', '2021-11-01 12:49:01', '2021-11-01 12:49:01'),
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
  `product_stock_mst_id` int(11) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `unit_price` int(100) NOT NULL,
  `sell_price` int(100) NOT NULL,
  `product_brcode` varchar(200) DEFAULT 'N',
  `product_imei` varchar(50) DEFAULT 'N',
  `create_by` varchar(50) DEFAULT 'SYSTEM',
  `update_by` varchar(50) DEFAULT 'SYSTEM',
  `create_info` datetime DEFAULT current_timestamp(),
  `update_info` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_stock_dtl`
--

INSERT INTO `product_stock_dtl` (`product_stock_dtl_id`, `product_stock_mst_id`, `color`, `unit_price`, `sell_price`, `product_brcode`, `product_imei`, `create_by`, `update_by`, `create_info`, `update_info`) VALUES
(1, 11770004, 'Light Blue', 25630, 28000, 'A1A12222', '010203', '11220000', 'N', '2021-11-07 00:50:40', '2021-11-07 00:50:40'),
(2, 11770004, 'Black', 25630, 28000, 'B1B12222', '040506', '11220000', 'N', '2021-11-07 00:50:40', '2021-11-07 00:50:40');

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
  `update_by` varchar(50) DEFAULT 'SYSTEM',
  `create_info` datetime DEFAULT current_timestamp(),
  `update_info` datetime DEFAULT current_timestamp(),
  `primaryvalue` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_stock_mst`
--

INSERT INTO `product_stock_mst` (`product_stock_mst_id`, `product_id`, `company_id`, `invice_no`, `shot_decs`, `qty`, `product_stock_status`, `create_by`, `update_by`, `create_info`, `update_info`, `primaryvalue`) VALUES
(11770004, 11220002, 11100011, '7GYJRK757TQ4ZB1WW1XV', 'New Items', 2, 'Active', '11220000', 'N', '2021-11-07 00:50:40', '2021-11-07 00:50:40', 'NYF3OM4LSFGFK1WN3O48');

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
  MODIFY `customer_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11660007;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11220020;

--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `product_stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_stock_dtl`
--
ALTER TABLE `product_stock_dtl`
  MODIFY `product_stock_dtl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_stock_mst`
--
ALTER TABLE `product_stock_mst`
  MODIFY `product_stock_mst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11770005;

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

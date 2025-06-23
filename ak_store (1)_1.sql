-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 05:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ak_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Barcode` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Link_To_CTN` int(11) NOT NULL,
  `Buy_Price` int(11) NOT NULL,
  `Sell_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Barcode`, `Quantity`, `Link_To_CTN`, `Buy_Price`, `Sell_Price`) VALUES
(1, 'Change short', '8851993623019', 24, 5, 0, 2000),
(2, 'tapper Long', '8851994325653', 22, 1, 0, 2800),
(3, 'Chang long', '8851993625013', 14, 3, 0, 3000),
(4, 'Chang Bottle', '8851993616011', 18, 2, 0, 3300),
(5, 'Tapper Short', '8851994323659', 14, 85, 0, 2000),
(6, 'Tiger Short', '8834000174247', 31, 4, 0, 3300),
(7, 'Tiger Long', '8885802013852', 30, 6, 0, 4200),
(8, 'Tiger Bottle', '8834000174285', 16, 7, 0, 4500),
(9, 'Myanmar Short', '8834000130229', 17, 8, 0, 2500),
(10, 'Myanmar Long', '8834000130281', 7, 9, 0, 3300),
(11, 'Myanmar Bottle', '8834000130243', 15, 10, 0, 4000),
(12, 'Adam G Short', '8834000130427', 21, 11, 0, 200),
(13, 'Adam G Long', '8834000130441', 20, 12, 0, 3500),
(14, 'Adam g black long', '8834000130519', 4, 14, 0, 3800),
(15, 'yoma  red short', '8834000009198', 5, 15, 0, 2000),
(16, 'yoma red long', '8834000009204', 13, 16, 0, 3200),
(17, 'yoma yellow short', '8834000009587', 4, 17, 0, 2000),
(18, 'yoma yellow long', '8834000009358', 11, 18, 0, 3300),
(19, 'ABC short', '8834000174186', 22, 20, 0, 4000),
(20, 'dagon super long', '8830000070206', 11, 19, 0, 3200),
(21, 'ABC bot', '8834000174209', 8, 21, 0, 5500),
(22, 'Dagon red Long', '8830000070183', 5, 86, 0, 3300),
(23, 'Black shield short', '8834000130168', 6, 22, 0, 2500),
(24, 'Black shield bot', '8834000130182', 13, 23, 0, 4200),
(25, 'heineken short', '8834000174049', 17, 24, 0, 3200),
(26, 'heineken long', '8834000174063', 23, 25, 0, 4000),
(27, 'heineken bot', '8834000174025', 6, 26, 0, 4500),
(28, 'R-7 blue long', '8834000174124', 6, 28, 0, 3000),
(29, 'tiger soju', '8834000174681', 23, 31, 0, 2500),
(30, 'GR sherrycask', '8886217000604', 6, 32, 0, 16000),
(31, 'GR shwe 0.7', '8886217000123', 5, 33, 0, 14000),
(32, 'GR shwe 8pk', '8886217000222', 17, 34, 0, 7000),
(33, 'GR shwe 4pk', '8886217000024', 18, 35, 0, 3600),
(34, 'GR sig 0.7', '8886217000307', 8, 36, 0, 9000),
(35, 'GR sig 8 pk', '8886217000314', 26, 37, 0, 5000),
(36, 'GR sig 4 pk', '8886217000321', 36, 38, 0, 3000),
(37, 'GR smooth 1L', '8886217100311', 3, 39, 0, 9000),
(38, 'GR smooth 0.7', '8886217000406', 12, 40, 0, 6500),
(39, 'GR smooth 8pk', '8886217000444', 37, 41, 0, 3300),
(40, 'GR smooth 4pk', '8886217000468', 35, 42, 0, 2000),
(41, 'GR smooth 2pk', '8886217002042', 3, 43, 0, 1200),
(42, 'GR black 1L', '8886217100465', 6, 44, 0, 6000),
(43, 'GR Black 0.7', '8886217100496', 6, 45, 0, 5200),
(44, 'GR black 8pk', '8886217100519', 4, 46, 0, 3000),
(45, 'GR black 4pk', '8886217000048', 51, 47, 0, 1800),
(46, 'Glan.m 0.7', '8834000057786', 12, 49, 0, 6200),
(47, 'Glan.M 8pk', '8834000057830', 3, 50, 0, 3300),
(48, 'Glan.M 4pk', '8834000057847', 24, 51, 0, 2000),
(49, 'RC 0.7', '8836000222409', 4, 53, 0, 6200),
(50, 'RC 8pk', '8836000222416', 3, 54, 0, 3300),
(51, 'RC 4pk', '8836000222423', 29, 55, 0, 2000),
(52, 'army rum', '8836000000311', 11, 57, 0, 3300),
(53, 'zayy', '8831350008178', 37, 58, 0, 2000),
(54, 'zayy small', '1001', 20, 60, 0, 1200),
(55, 'ma gyee', '1002', 4, 59, 0, 2000),
(56, 'Carslberg', '8834000009525', 24, 87, 0, 2700),
(57, 'sitt myin', '8836000010013', 22, 62, 0, 2000),
(58, 'max+ orange 1L', '8834000202841', 2, 67, 0, 2700),
(59, 'max+ sprite 1L', '8834000202063', 5, 68, 0, 2700),
(60, 'max+ Cola 1L', '8834000202742', 13, 69, 0, 2700),
(61, 'So Ju', '1003', 0, 64, 0, 4500),
(62, 'full moon red', '8855796005010', 4, 65, 0, 4500),
(63, 'max+ orange 500ml', '8834000202230', 6, 70, 0, 1500),
(64, 'max+ sprite 500ml', '8834000202254', 8, 71, 0, 1500),
(65, 'max+ cola 500ml', '8834000202032', 46, 72, 0, 1500),
(66, 'shark', '8851123215435', 14, 73, 0, 2700),
(67, 'a little speed ', '8834000045868', 41, 74, 0, 1200),
(68, 'speed', '8834000045844', 2, 75, 0, 2700),
(69, 'honey gold', '8836000022474', 24, 76, 0, 1500),
(70, 'sting red', '7482527098136', 9, 77, 0, 1500),
(71, 'v code red', '8830000013180', 20, 80, 0, 1500),
(72, 'v code yellow', '8830000013166', 22, 81, 0, 1500),
(73, 'royal d', '8852612004509', 3, 82, 0, 1500),
(74, 'max+ cream soda 500 ML', '8834000202278', 4, 88, 0, 1500),
(75, 'water', '8834000071324', 61, 84, 0, 800),
(76, 'v code black', '8830000013173', 1, 79, 0, 1500),
(77, 'Mevius Original', '88020761', 0, 0, 0, 6000),
(78, 'Mevius Sky Blue', '88020747', 2, 0, 0, 6000),
(79, 'Winston Blue', '88400976', 6, 0, 0, 5000),
(80, 'Winston Brown', '95510736', 2, 0, 0, 5000),
(81, 'Red and Blue ', '8885014100043', 10, 0, 0, 3000),
(82, 'Lord', '2858394626195', 2, 0, 0, 3000),
(83, 'Mdy rum black', '8836000000335', 3, 0, 0, 0),
(84, 'Mdy Rum White ', '8836000000342', 4, 0, 0, 0),
(85, 'Mevius original 1 late ', '1004 ', 0, 0, 0, 400),
(86, 'Mevius Sky Blue 1 late', '1005', 10, 0, 0, 400),
(87, 'Winston Blue 1 late', '1006', 5, 0, 0, 300),
(88, 'winston Brown 1 late', '1007', 15, 0, 0, 300),
(89, 'Red and Blue 1 late', '1008', 24, 0, 0, 200),
(90, 'Lord 1 late', '1009', 20, 0, 0, 200),
(91, 'shwe pyi soe a htoke', '1010', 10, 0, 0, 1000),
(92, 'shwe pyi soe a late ', '1011', 50, 0, 0, 100),
(93, 'Rose cigg a htoke', '1012', 20, 0, 0, 1200),
(94, 'mel kway', '1013', 36, 0, 0, 600),
(95, 'Dain', '1014', 30, 0, 0, 600),
(96, 'Lighter ', '1015', 5, 0, 0, 800),
(97, 'Apple ciggerate ', '1016', 0, 0, 0, 600),
(98, 'a sone kyw a thy ', '1017', 6, 0, 0, 1000),
(99, 'Fish Skin', '1018', 0, 0, 0, 1000),
(100, 'Fried Corn', '1019', 2, 0, 0, 300),
(101, 'Doe Gyee', '1020', 20, 0, 0, 500),
(102, 'Zee Htoke Gyee', '1021', 18, 0, 0, 1000),
(103, 'Zee Htoke Small', '1022', 37, 0, 0, 400),
(104, 'ATT banana', '1023', 8, 0, 0, 500),
(105, 'Nyunt Nyunt ', '1024', 16, 0, 0, 300),
(106, 'Shan To Fu', '1025', 7, 0, 0, 600),
(107, 'Shuu Shel', '1026', 20, 0, 0, 200),
(108, 'Point sunflower seed', '1027', 3, 0, 0, 1000),
(109, 'Oris Option', '1028', 0, 0, 0, 4000),
(110, 'Oris option 1 late', '1029', 16, 0, 0, 300),
(111, 'mala a pyar', '1030', 26, 0, 0, 500),
(112, 'i-like spicy', '1031', 5, 0, 0, 1000),
(113, 'shel mike (Prawn Moke)', '1032', 0, 0, 0, 0),
(114, 'shauk buu', '1033', 12, 0, 0, 200),
(115, 'Ice(500)', '1034', 0, 0, 0, 500),
(116, 'Ice (1000)', '1035', 0, 0, 0, 1000),
(117, 'R-7 red long', '8834000174148', 22, 0, 0, 3000),
(118, 'mdy rum red', '8836000000397', 4, 0, 0, 0),
(119, 'marbolo', '1036', 20, 0, 0, 7500),
(120, 'burma club 8p', '1037', 19, 0, 0, 3000),
(121, 'burma club 4p', '1038', 14, 0, 0, 1500),
(122, 'oric green ', '1039', 0, 0, 0, 4000),
(123, 'oric green 1 late ', '1040', 20, 0, 0, 300),
(124, 'Bread (1000)', '1041', 7, 0, 0, 1000),
(125, 'Pwint Phyu', '1042', 15, 0, 0, 500),
(126, 'latphet', '1043', 7, 0, 0, 500),
(127, 'noodle (1500)', '1044', 8, 0, 0, 1500),
(128, 'yun yun (1000)', '1045', 5, 0, 0, 1000),
(129, 'Pep', '1046', 10, 0, 0, 600),
(130, 'coffee premier', '1047', 6, 0, 0, 600),
(131, 'Sunday ', '1048', 3, 0, 0, 600);

-- --------------------------------------------------------

--
-- Table structure for table `product_history`
--

CREATE TABLE `product_history` (
  `history_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_history`
--

INSERT INTO `product_history` (`history_id`, `product_id`, `action`, `quantity`, `date_time`) VALUES
(1, 3, 'Add to á€œá€€á€ºá€œá€®', 12, '2025-06-10 04:04:24'),
(2, 2, 'Add to á€œá€€á€ºá€œá€®', 24, '2025-06-10 06:43:26'),
(3, 1, 'Add to á€œá€€á€ºá€œá€®', 24, '2025-06-15 12:52:40'),
(4, 1, 'Add to á€œá€€á€ºá€œá€®', 24, '2025-06-15 12:52:42'),
(5, 2, 'Add to á€œá€€á€ºá€œá€®', 24, '2025-06-15 12:52:45'),
(6, 1, 'Add to á€œá€€á€ºá€œá€®', 24, '2025-06-15 12:53:58'),
(7, 3, 'Add to á€œá€€á€ºá€œá€®', 24, '2025-06-15 12:54:23'),
(8, 2, 'Add to á€œá€€á€ºá€œá€®', 24, '2025-06-20 14:21:20'),
(9, 2, 'Add to á€œá€€á€ºá€œá€®', 24, '2025-06-20 14:23:34'),
(10, 6, 'Add to á€œá€€á€ºá€œá€®', 24, '2025-06-22 14:55:03'),
(11, 7, 'Add to á€œá€€á€ºá€œá€®', 24, '2025-06-22 14:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_latkar`
--

CREATE TABLE `product_latkar` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Barcode` varchar(120) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Quantity_Per_Package` int(11) NOT NULL,
  `Buy_Price` int(11) NOT NULL,
  `Sell_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_latkar`
--

INSERT INTO `product_latkar` (`Product_ID`, `Product_Name`, `Barcode`, `Quantity`, `Quantity_Per_Package`, `Buy_Price`, `Sell_Price`) VALUES
(1, 'Tapper long', '01', 222, 24, 0, 54000),
(2, 'Chang Bottle', '04', 7, 12, 0, 34500),
(3, 'Chang long', '03', 76, 24, 0, 64000),
(4, 'Tiger short', '05', 4, 24, 0, 0),
(5, 'Chang short', '02', 74, 24, 0, 44000),
(6, 'tiger long', '06', 4, 24, 0, 0),
(7, 'tiger bottle', '07', 6, 12, 0, 0),
(8, 'myan short', '08', 1, 24, 0, 0),
(9, 'myan long', '09', 1, 24, 0, 0),
(10, 'myan bot', '010', 13, 24, 0, 0),
(11, 'Adam g red short', '011', 0, 24, 0, 0),
(12, 'Adam g red long', '012', 2, 24, 0, 0),
(13, 'Adam g black short', '013', 0, 24, 0, 0),
(14, 'Adam g black long', '014', 1, 24, 0, 0),
(15, 'yoma  red short', '015', 1, 24, 0, 0),
(16, 'yoma red long', '016', 1, 24, 0, 0),
(17, 'yoma yellow short', '017', 1, 24, 0, 0),
(18, 'yoma yellow long', '018', 2, 24, 0, 0),
(19, 'dagon super long', '019', 1, 24, 0, 0),
(20, 'ABC short', '020', 4, 24, 0, 0),
(21, 'ABC bot', '021', 7, 12, 0, 0),
(22, 'Black shield short', '022', 1, 24, 0, 0),
(23, 'Black shield bot', '023', 0, 12, 0, 0),
(24, 'heineken short ', '024', 0, 24, 0, 0),
(25, 'heineken long', '025', 0, 24, 0, 0),
(26, 'heineken bot', '026', 2, 12, 0, 0),
(27, 'R-7 blue short', '027', 0, 24, 0, 0),
(28, 'R-7 blue long', '028', 1, 24, 0, 0),
(29, 'R-7 red short', '029', 0, 24, 0, 0),
(30, 'R-7 red long', '030', 1, 24, 0, 0),
(31, 'tiger soju', '031', 0, 24, 0, 0),
(32, 'GR sherrycask', '032', 0, 12, 0, 0),
(33, 'GR shwe 0.7', '033', 0, 12, 0, 0),
(34, 'GR shwe 8pk', '034', 0, 24, 0, 0),
(35, 'GR shwe 4pk', '035', 0, 48, 0, 0),
(36, 'GR sig 0.7', '036', 0, 12, 0, 0),
(37, 'GR sig 8 pk', '037', 0, 24, 0, 0),
(38, 'GR sig 4 pk', '038', 0, 48, 0, 0),
(39, 'GR smooth 1L', '039', 0, 12, 0, 0),
(40, 'GR smooth 0.7', '040', 0, 12, 0, 0),
(41, 'GR smooth 8pk', '041', 0, 24, 0, 0),
(42, 'GR smooth 4pk', '042', 0, 48, 0, 0),
(43, 'GR smooth 2pk', '043', 0, 48, 0, 0),
(44, 'GR black 1L', '044', 0, 12, 0, 0),
(45, 'GR black 0.7', '045', 0, 12, 0, 0),
(46, 'GR black 8pk', '046', 0, 24, 0, 0),
(47, 'GR black 4pk', '047', 0, 48, 0, 0),
(48, 'GR black 2pk', '048', 0, 48, 0, 0),
(49, 'Glan.m 0.7', '049', 0, 12, 0, 0),
(50, 'Glan.M 8pk', '050', 0, 24, 0, 0),
(51, 'Glan.M 4pk', '051', 0, 48, 0, 0),
(52, 'Glan.M 2pk', '052', 0, 48, 0, 0),
(53, 'RC 0.7', '053', 0, 12, 0, 0),
(54, 'RC 8pk', '054', 0, 24, 0, 0),
(55, 'RC 4pk', '055', 0, 48, 0, 0),
(56, 'RC 2pk', '056', 0, 48, 0, 0),
(57, 'army rum', '057', 0, 12, 0, 0),
(58, 'zayy', '059', 0, 12, 0, 0),
(59, 'ma gyee', '059', 0, 12, 0, 0),
(60, 'zayy small', '060', 0, 48, 0, 0),
(61, 'yoe yae red long', '061', 0, 12, 0, 0),
(62, 'sitt myin', '062', 0, 30, 0, 0),
(63, 'sitt myin soju', '063', 0, 30, 0, 0),
(64, 'SOJU', '064', 0, 13, 0, 0),
(65, 'full moon red', '065', 0, 12, 0, 0),
(66, 'full moon black', '066', 0, 12, 0, 0),
(67, 'max+ orange 1L', '067', 0, 6, 0, 0),
(68, 'max+ sprite 1L', '068', 0, 6, 0, 0),
(69, 'max+ Cola 1L', '069', 0, 6, 0, 0),
(70, 'max+ orange 500ml', '070', 0, 12, 0, 0),
(71, 'max+ sprite 500ml', '071', 0, 12, 0, 0),
(72, 'max+ cola 500ml', '072', 0, 12, 0, 0),
(73, 'shark', '073', 0, 24, 0, 0),
(74, 'a little speed', '074', 0, 12, 0, 0),
(75, 'speed', '075', 0, 24, 0, 0),
(76, 'honey gold', '076', 0, 12, 0, 0),
(77, 'sting red', '077', 9, 12, 0, 0),
(78, 'sting yellow', '078', 0, 12, 0, 0),
(79, 'v code black', '079', 0, 12, 0, 0),
(80, 'v code red', '080', 0, 12, 0, 0),
(81, 'v code yellow', '081', 0, 12, 0, 0),
(82, 'royal d', '082', 0, 12, 0, 0),
(83, 'M-150', '083', 0, 10, 0, 0),
(84, 'water', '084', 0, 6, 0, 0),
(85, 'Tapper Short', '085', 198, 24, 0, 33500),
(86, 'Dagon red Long', '086', 0, 24, 0, 0),
(87, 'Casrlsberg', '087', 0, 24, 0, 0),
(88, 'max+ cream soda 500 ML', '088', 12, 88, 0, 0),
(89, 'bread (1200)', '', 0, 10, 0, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `Sale_ID` int(11) NOT NULL,
  `Product_ID` decimal(16,0) NOT NULL,
  `Buy_Quantity` int(11) NOT NULL,
  `Total_Amount` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`Sale_ID`, `Product_ID`, `Buy_Quantity`, `Total_Amount`, `Date`, `Time`, `Status`) VALUES
(1, 8834000174209, 1, 5500, '2025-06-22', '20:22:04', 1),
(2, 8834000009358, 1, 3300, '2025-06-22', '20:23:44', 1),
(3, 8885802013852, 3, 12600, '2025-06-22', '20:24:34', 1),
(4, 8834000174209, 2, 11000, '2025-06-22', '21:12:03', 1),
(5, 1027, 2, 2000, '2025-06-22', '21:12:34', 1),
(6, 1024, 2, 600, '2025-06-22', '21:12:55', 1),
(7, 8834000130168, 2, 5000, '2025-06-22', '21:14:05', 1),
(8, 8851993625013, 1, 3000, '2025-06-22', '21:14:44', 1),
(9, 7482527098136, 1, 1500, '2025-06-22', '21:17:47', 1),
(10, 8886217000307, 1, 9000, '2025-06-22', '21:26:34', 1),
(11, 8851993623019, 1, 2000, '2025-06-22', '21:27:08', 1),
(12, 8886217000314, 1, 5000, '2025-06-22', '21:27:35', 1),
(13, 1027, 2, 2000, '2025-06-22', '21:28:11', 1),
(14, 8834000009587, 1, 2000, '2025-06-22', '21:44:19', 1),
(15, 1024, 1, 300, '2025-06-22', '21:44:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_ID` int(11) NOT NULL,
  `Supplier_Name` varchar(50) NOT NULL,
  `Phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_ID`, `Supplier_Name`, `Phone`) VALUES
(1, 'Ko Kyaw', 1423);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `product_history`
--
ALTER TABLE `product_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_latkar`
--
ALTER TABLE `product_latkar`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`Sale_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `product_history`
--
ALTER TABLE `product_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_latkar`
--
ALTER TABLE `product_latkar`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `Sale_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_history`
--
ALTER TABLE `product_history`
  ADD CONSTRAINT `product_history_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`Product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

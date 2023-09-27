-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 05:30 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `autocode`
--

CREATE TABLE `autocode` (
  `auto_id` int(11) NOT NULL,
  `start` int(11) NOT NULL DEFAULT 0,
  `end` int(11) NOT NULL DEFAULT 0,
  `increment` int(11) NOT NULL DEFAULT 0,
  `description` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `autocode`
--

INSERT INTO `autocode` (`auto_id`, `start`, `end`, `increment`, `description`) VALUES
(1, 100, 120, 1, 'order_code'),
(2, 3102, 3, 1, 'trans_code');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`) VALUES
(1, 'Cakes'),
(2, 'Bread'),
(13, 'drinks'),
(14, 'Desserts');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `contact` varchar(50) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL DEFAULT '0',
  `avatar` varchar(50) NOT NULL DEFAULT '0',
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `contact`, `username`, `password`, `address`, `avatar`, `date_created`) VALUES
(1, 'John Cenas', '093948388385', 'john@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Sipalay City', '1682592480_testimonials-4.jpg', '2021-10-30'),
(2, 'Henry', '093888483877', '0', '0', 'China sea', '0', '2022-01-21'),
(5, 'Ryan Psy', '093848838843', '0', '0', 'Sipalay City', '0', '2021-03-19'),
(6, 'Mark Daniel', '029938488288', '0', '0', 'Kabankalan City', '0', '2022-04-20'),
(8, 'James Harden', '0993984833', '0', '0', 'Sipalay City', '0', '2021-08-23'),
(9, 'Layla', '093848833443', '0', '0', 'Bago City', '0', '2022-10-11'),
(10, 'Alex Dixon', '093848838483', '0', '0', 'Cebu City', '0', '2022-10-11'),
(11, 'Mathew Wright', '09388388388', '0', '0', 'Himamaylan City', '0', '2022-10-11'),
(12, 'Judy Ann Santos', '0394993948', '0', '0', 'Cavite', '0', '2022-10-11'),
(13, 'Lebron James', '00993949838', '0', '0', 'USA', '0', '2022-10-11'),
(14, 'Hannah', '09928838828', '0', '0', 'Cauayan', '0', '2022-12-14'),
(15, 'Jedi Diah', '039438848388', 'jedidiah@yahoo.com', '0192023a7bbd73250516f069df18b500', 'San agustin Isabela', '1682954100_messages-1.jpg', '2023-04-03'),
(16, 'Anjo Caram', '093747782873', '0', '0', 'Brgy. 4, Sipalay City', '0', '2023-04-16'),
(23, 'Mikaela Jonson', '09273777288', '0', '0', 'Brgy Kamangyao, Kabankalan City', '0', '2023-04-16'),
(24, 'frinces', ' 093848832343', '0', '0', 'La carlota', '0', '2023-04-20'),
(25, 'melben', '0-30499393', '0', '0', 'bacolod City', '0', '2023-04-20'),
(28, 'Berth Controls', '09938828811', 'birthcontrol@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Sipalay City', '1682592840_testimonials-1.jpg', '2023-04-27'),
(29, 'Bryan Goliath', '09298838288', 'bryanGoliath@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Bago City', '1682675460_messages-3.jpg', '2023-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `prod_id` int(11) NOT NULL DEFAULT 0,
  `qty` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`cart_id`, `customer_id`, `prod_id`, `qty`, `status`) VALUES
(15, 1, 9, '5', '1'),
(16, 1, 3, '1', '1'),
(17, 2, 3, '2', '1'),
(18, 2, 1, '2', '1'),
(19, 2, 9, '4', '1'),
(20, 1, 2, '2', '1'),
(21, 2, 3, '1', '1'),
(26, 1, 2, '1', '1'),
(27, 2, 1, '2', '1'),
(28, 1, 1, '3', '1'),
(29, 1, 9, '1', '1'),
(30, 1, 9, '1', '1'),
(31, 2, 1, '1', '1'),
(32, 7, 1, '1', '1'),
(33, 7, 2, '1', '1'),
(34, 7, 3, '1', '1'),
(35, 7, 9, '3', '1'),
(36, 7, 9, '11', '1'),
(37, 8, 3, '1', '1'),
(38, 8, 9, '1', '1'),
(39, 2, 2, '2', '1'),
(40, 2, 3, '1', '1'),
(41, 2, 9, '1', '1'),
(42, 7, 3, '5', '1'),
(44, 1, 2, '1', '1'),
(45, 7, 3, '1', '1'),
(46, 7, 2, '2', '1'),
(47, 13, 3, '1', '1'),
(49, 2, 3, '1', '1'),
(50, 2, 1, '2', '1'),
(51, 13, 9, '3', '1'),
(52, 13, 2, '1', '1'),
(53, 1, 3, '1', '1'),
(54, 1, 2, '2', '1'),
(55, 7, 3, '1', '1'),
(56, 1, 2, '5', '1'),
(57, 12, 1, '10', '1'),
(58, 12, 3, '2', '1'),
(59, 9, 9, '5', '1'),
(60, 9, 1, '2', '1'),
(61, 9, 1, '1', '1'),
(63, 2, 2, '1', '1'),
(64, 12, 3, '10', '1'),
(65, 12, 1, '20', '1'),
(66, 12, 9, '20', '1'),
(67, 5, 3, '10', '1'),
(68, 5, 1, '6', '1'),
(71, 14, 2, '1', '1'),
(72, 14, 1, '2', '1'),
(73, 5, 3, '1', '1'),
(74, 5, 9, '1', '1'),
(75, 13, 2, '3', '1'),
(76, 13, 3, '2', '1'),
(77, 13, 1, '1', '1'),
(78, 2, 2, '2', '1'),
(79, 2, 3, '1', '1'),
(80, 5, 1, '4', '1'),
(81, 2, 2, '1', '1'),
(82, 1, 1, '1', '1'),
(83, 5, 9, '1', '1'),
(84, 11, 9, '12', '1'),
(85, 11, 1, '1', '1'),
(86, 1, 3, '2', '1'),
(87, 1, 9, '1', '1'),
(88, 9, 3, '10', '1'),
(91, 9, 3, '1', '1'),
(92, 9, 9, '2', '1'),
(93, 9, 1, '1', '1'),
(94, 15, 3, '2', '1'),
(95, 15, 1, '1', '1'),
(96, 15, 2, '2', '1'),
(97, 15, 9, '2', '1'),
(98, 15, 1, '1', '1'),
(99, 2, 3, '1', '1'),
(100, 2, 9, '1', '1'),
(101, 16, 9, '1', '1'),
(102, 16, 2, '2', '1'),
(103, 23, 3, '1', '1'),
(104, 23, 2, '1', '1'),
(105, 23, 3, '2', '1'),
(106, 23, 9, '1', '1'),
(107, 25, 1, '2', '1'),
(109, 9, 2, '3', '1'),
(110, 2, 3, '1', '1'),
(111, 28, 11, '1', '1'),
(112, 28, 18, '2', '1'),
(113, 28, 9, '1', '1'),
(115, 29, 1, '1', '1'),
(116, 29, 3, '2', '1'),
(117, 29, 11, '1', '1'),
(119, 15, 3, '1', '1'),
(120, 15, 10, '2', '1'),
(121, 15, 18, '2', '1'),
(123, 28, 15, '3', '1'),
(124, 28, 11, '1', '1'),
(125, 28, 3, '2', '1'),
(126, 9, 14, '2', '1'),
(127, 9, 12, '1', '1'),
(128, 9, 3, '1', '1'),
(131, 2, 18, '10', '1'),
(133, 1, 1, '2', '1'),
(134, 1, 13, '3', '1'),
(135, 1, 12, '2', '1'),
(136, 1, 18, '1', '1'),
(138, 1, 9, '1', '1'),
(139, 1, 3, '7', '1'),
(140, 29, 18, '2', '1'),
(141, 29, 13, '3', '1'),
(142, 29, 3, '1', '1'),
(143, 29, 10, '1', '1'),
(144, 1, 17, '2', '1'),
(145, 1, 18, '1', '1'),
(146, 2, 10, '1', '1'),
(147, 2, 12, '2', '1'),
(148, 29, 3, '1', '1'),
(149, 29, 13, '2', '1'),
(150, 29, 18, '1', '1'),
(151, 29, 11, '1', '1'),
(152, 29, 1, '1', '1'),
(153, 28, 9, '1', '1'),
(154, 28, 14, '2', '1'),
(155, 28, 12, '1', '1'),
(156, 28, 18, '2', '1'),
(157, 28, 1, '1', '1'),
(159, 28, 3, '2', '1'),
(160, 28, 9, '1', '1'),
(161, 28, 17, '3', '1'),
(162, 23, 15, '2', '1'),
(163, 23, 12, '2', '1'),
(164, 1, 3, '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `order_code` varchar(50) NOT NULL DEFAULT '0',
  `order_date` datetime NOT NULL,
  `order_total` varchar(50) NOT NULL DEFAULT '0',
  `cash` varchar(50) NOT NULL DEFAULT '0',
  `exchange` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_code`, `order_date`, `order_total`, `cash`, `exchange`, `status`) VALUES
(5, 1, '698', '2022-09-18 20:57:12', '1320', '1400', '80', '1'),
(6, 2, '68', '2022-09-18 21:59:07', '1300', '1300', '0', '1'),
(7, 1, '101', '2022-09-18 22:27:37', '120', '120', '0', '1'),
(8, 2, '102', '2022-09-18 22:33:29', '400', '500', '100', '1'),
(10, 8, '107', '2022-10-10 14:37:35', '900', '1000', '100', '2'),
(11, 2, '109', '2022-10-10 20:46:18', '1140', '1150', '10', '2'),
(14, 1, '115', '2022-10-11 09:31:28', '120', '120', '0', '1'),
(16, 13, '118', '2022-10-16 21:15:53', '500', '500', '0', '2'),
(17, 2, '119', '2022-10-19 20:31:13', '1302', '1500', '198', '2'),
(18, 13, '121', '2022-10-19 20:31:58', '1320', '1500', '180', '2'),
(19, 1, '123', '2022-10-19 22:02:02', '740', '800', '60', '1'),
(21, 1, '126', '2022-10-19 22:22:57', '600', '1000', '400', '1'),
(22, 12, '127', '2022-10-19 22:25:47', '5010', '5010', '0', '2'),
(23, 9, '129', '2022-10-19 22:27:04', '2802', '3000', '198', '2'),
(24, 9, '131', '2022-10-20 00:08:08', '401', '401', '0', '1'),
(25, 2, '132', '2022-12-07 22:10:52', '120', '120', '0', '2'),
(26, 12, '133', '2022-12-07 22:12:25', '21020', '22000', '980', '2'),
(27, 5, '136', '2022-12-07 22:13:07', '7406', '8000', '594', '2'),
(28, 14, '138', '2022-12-14 23:03:14', '922', '1000', '78', '2'),
(29, 5, '140', '2022-12-14 23:06:23', '900', '1000', '100', '1'),
(30, 13, '142', '2022-12-14 23:51:00', '1761', '1800', '39', '2'),
(31, 2, '145', '2023-01-07 15:41:52', '740', '1000', '260', '2'),
(32, 5, '147', '2023-01-07 16:19:23', '1604', '1620', '16', '2'),
(33, 2, '148', '2023-01-07 16:20:07', '120', '120', '0', '2'),
(34, 1, '149', '2023-01-07 16:22:18', '401', '401', '0', '1'),
(35, 5, '150', '2023-01-07 16:23:33', '400', '500', '100', '2'),
(36, 11, '151', '2023-01-09 10:23:12', '5201', '5201', '0', '2'),
(37, 1, '153', '2023-01-11 17:52:23', '1400', '1500', '100', '1'),
(38, 9, '155', '2023-01-11 17:56:47', '5000', '5000', '0', '2'),
(39, 9, '156', '2023-03-02 10:27:29', '500', '1000', '500', '1'),
(40, 9, '157', '2023-04-03 16:26:58', '1201', '1500', '299', '1'),
(41, 15, '159', '2023-04-03 18:03:05', '1641', '2000', '359', '2'),
(42, 15, '162', '2023-04-05 20:03:01', '1201', '1500', '299', '1'),
(43, 2, '164', '2023-04-09 15:17:02', '900', '1000', '100', '1'),
(44, 16, '166', '2023-04-16 22:53:51', '640', '1000', '360', '1'),
(45, 23, '168', '2023-04-16 22:54:25', '620', '1000', '380', '2'),
(46, 23, '170', '2023-04-18 14:50:41', '1400', '1500', '100', '2'),
(47, 25, '172', '2023-04-20 12:59:19', '802', '1000', '198', '2'),
(48, 2, '173', '2023-04-26 17:43:52', '500', '500', '0', '2'),
(49, 28, '174', '2023-04-28 16:17:52', '980', '1000', '20', '2'),
(50, 28, '177', '2023-05-04 02:42:51', '1440', '1500', '60', '2'),
(51, 9, '180', '2023-05-04 02:43:53', '1160', '1200', '40', '2'),
(52, 2, '184', '2023-05-14 14:43:05', '2500', '3000', '500', '1'),
(53, 1, '185', '2023-05-26 15:12:18', '1612', '2000', '388', '2'),
(54, 1, '189', '2023-05-26 15:16:31', '400', '500', '100', '2'),
(55, 29, '190', '2023-05-26 16:42:03', '1481', '1500', '19', '1'),
(56, 29, '193', '2023-05-26 16:47:14', '1440', '1500', '60', '2'),
(57, 1, '197', '2023-06-17 18:31:55', '4150', '5000', '850', '2'),
(58, 29, '200', '2023-06-18 15:07:26', '1070', '1100', '30', '1'),
(59, 29, '204', '2023-06-18 15:15:23', '401', '500', '99', '1'),
(60, 28, '205', '2023-06-18 15:32:13', '1200', '1200', '0', '1'),
(61, 28, '209', '2023-06-18 15:40:08', '401', '500', '99', '1'),
(62, 15, '210', '2023-06-20 23:00:17', '1160', '1200', '40', '1'),
(63, 2, '213', '2023-06-21 21:47:50', '280', '300', '20', '2'),
(64, 28, '215', '2023-06-21 21:49:01', '2000', '2000', '0', '1'),
(65, 23, '218', '2023-06-21 22:18:28', '440', '500', '60', '2');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `prod_id` int(11) NOT NULL DEFAULT 0,
  `qty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`details_id`, `order_id`, `prod_id`, `qty`) VALUES
(17, 5, 1, '3'),
(18, 5, 9, '1'),
(19, 6, 1, '2'),
(20, 6, 3, '1'),
(21, 7, 9, '1'),
(22, 8, 1, '1'),
(27, 10, 3, '1'),
(28, 10, 9, '1'),
(29, 11, 2, '2'),
(30, 11, 3, '1'),
(31, 11, 9, '1'),
(35, 14, 2, '1'),
(38, 16, 3, '1'),
(39, 17, 1, '2'),
(40, 17, 3, '1'),
(41, 18, 2, '1'),
(42, 18, 9, '3'),
(43, 19, 2, '2'),
(44, 19, 3, '1'),
(46, 21, 2, '5'),
(47, 22, 1, '10'),
(48, 22, 3, '2'),
(49, 23, 1, '2'),
(50, 23, 9, '5'),
(51, 24, 1, '1'),
(52, 25, 2, '1'),
(53, 26, 1, '20'),
(54, 26, 3, '10'),
(55, 26, 9, '20'),
(56, 27, 1, '6'),
(57, 27, 3, '10'),
(58, 28, 1, '2'),
(59, 28, 2, '1'),
(60, 29, 3, '1'),
(61, 29, 9, '1'),
(62, 30, 1, '1'),
(63, 30, 2, '3'),
(64, 30, 3, '2'),
(65, 31, 2, '2'),
(66, 31, 3, '1'),
(67, 32, 1, '4'),
(68, 33, 2, '1'),
(69, 34, 1, '1'),
(70, 35, 9, '1'),
(71, 36, 1, '1'),
(72, 36, 9, '12'),
(73, 37, 3, '2'),
(74, 37, 9, '1'),
(75, 38, 3, '10'),
(76, 39, 3, '1'),
(77, 40, 1, '1'),
(78, 40, 9, '2'),
(79, 41, 1, '1'),
(80, 41, 2, '2'),
(81, 41, 3, '2'),
(82, 42, 1, '1'),
(83, 42, 9, '2'),
(84, 43, 3, '1'),
(85, 43, 9, '1'),
(86, 44, 2, '2'),
(87, 44, 9, '1'),
(88, 45, 2, '1'),
(89, 45, 3, '1'),
(90, 46, 3, '2'),
(91, 46, 9, '1'),
(92, 47, 1, '2'),
(93, 48, 3, '1'),
(94, 49, 11, '1'),
(95, 49, 18, '2'),
(96, 49, 9, '1'),
(97, 50, 15, '3'),
(98, 50, 11, '1'),
(99, 50, 3, '2'),
(100, 51, 2, '3'),
(101, 51, 14, '2'),
(102, 51, 12, '1'),
(103, 51, 3, '1'),
(104, 52, 18, '10'),
(105, 53, 1, '2'),
(106, 53, 13, '3'),
(107, 53, 12, '2'),
(108, 53, 18, '1'),
(109, 54, 9, '1'),
(110, 55, 1, '1'),
(111, 55, 3, '2'),
(112, 55, 11, '1'),
(113, 56, 18, '2'),
(114, 56, 13, '3'),
(115, 56, 3, '1'),
(116, 56, 10, '1'),
(117, 57, 3, '7'),
(118, 57, 17, '2'),
(119, 57, 18, '1'),
(120, 58, 3, '1'),
(121, 58, 13, '2'),
(122, 58, 18, '1'),
(123, 58, 11, '1'),
(124, 59, 1, '1'),
(125, 60, 9, '1'),
(126, 60, 14, '2'),
(127, 60, 12, '1'),
(128, 60, 18, '2'),
(129, 61, 1, '1'),
(130, 62, 3, '1'),
(131, 62, 10, '2'),
(132, 62, 18, '2'),
(133, 63, 10, '1'),
(134, 63, 12, '2'),
(135, 64, 3, '2'),
(136, 64, 9, '1'),
(137, 64, 17, '3'),
(138, 65, 15, '2'),
(139, 65, 12, '2');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL DEFAULT '0',
  `prod_price` varchar(50) NOT NULL DEFAULT '0',
  `avatar` varchar(50) NOT NULL DEFAULT '0',
  `prod_desc` longtext NOT NULL DEFAULT '0',
  `cat_id` varchar(50) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_price`, `avatar`, `prod_desc`, `cat_id`, `status`) VALUES
(1, 'Red Ribbon Chocolates Cakes', '401', '1671032520_red-ribbon-chocolate-cakes.jpg', 'Red Ribbon Chocolate Cake is a decadent and rich d', '1', 1),
(2, 'American Special Loaf Bread', '120', '1671032280_american_load_bread.jpg', 'Loaf bread is a type of bread that is shaped like  ', '2', 1),
(3, 'Dark Chocolate Cakes', '500', '1671032460_dark_chocolate_cake.jpg', 'Dark chocolate cake is a type of cake that is rich', '1', 1),
(9, 'Dark Caramel Cakes', '400', '1682664720_cake3.jpg', 'Caramel cake is a type of cake that is characteriz', '1', 1),
(10, 'Drinks 1', '80', '1682663520_drinks1.jpg', 'Lemon juice is a type of juice that is made from f', '13', 1),
(11, 'Drinks 2', '80', '1682663580_drinks2.jpg', 'Lemon juice is a type of juice that is made from f', '13', 1),
(12, 'Drinks 3', '100', '1682663580_drinks3.jpeg', 'Lemon juice is a type of juice that is made from f', '13', 1),
(13, 'Bread 1', '120', '1682663640_bread1.avif', 'Loaf bread is a type of bread that is shaped like ', '2', 1),
(14, 'Bread 2', '100', '1682663640_bread2.jpg', 'Loaf bread is a type of bread that is shaped like ', '2', 1),
(15, 'Bread 3', '120', '1682663700_bread3.jpg', 'Loaf bread is a type of bread that is shaped like ', '2', 1),
(16, 'Dessert 1', '200', '1682663700_desserts1.jpg', 'The Golden Opulence Sundae is a dessert offered at', '14', 1),
(17, 'Dessert 2', '200', '1682663760_desserts2.jpg', 'The Golden Opulence Sundae is a dessert offered at', '14', 1),
(18, 'Dessert 3', '250', '1682663760_desserts3.jpeg', 'The Golden Opulence Sundae is a dessert offered at1', '14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `set_id` int(11) NOT NULL,
  `set_code` varchar(50) NOT NULL DEFAULT '0',
  `access` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`set_id`, `set_code`, `access`, `status`) VALUES
(1, 'eb0a191797624dd3a48fa681d3061212', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL DEFAULT '0',
  `lname` varchar(50) NOT NULL DEFAULT '0',
  `uname` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL DEFAULT '0',
  `avatar` varchar(50) NOT NULL DEFAULT '0',
  `job` varchar(50) NOT NULL DEFAULT '0',
  `special_code` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `uname`, `password`, `type`, `avatar`, `job`, `special_code`) VALUES
(1, 'Ryan', 'Wong', 'admin@yahoo.com', '0192023a7bbd73250516f069df18b500', '1', '1664806140_pp.jpg', 'Admin', 'eb0a191797624dd3a48fa681d3061212'),
(4, 'Anna', 'Ledesma', 'annLedesma@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2', '1685973720_princess.jpg', 'Staff', '0'),
(5, 'Adams', 'Patricio', 'adams@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2', '1664806980_received_516907356847842.jpeg', 'Staff', '0'),
(6, 'Jedi Diah', 'Araceli', 'jedidiah@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2', '1687326060_messages-2.jpg', 'Staff', '0'),
(7, 'Tyrone', 'Malocon', 'tyrone@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2', '1687327380_messages-3.jpg', 'Staff', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

CREATE TABLE `user_message` (
  `user_mID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `message` longtext NOT NULL DEFAULT '0',
  `problem_type` char(50) NOT NULL DEFAULT '0',
  `screen_shot` varchar(50) NOT NULL DEFAULT '0',
  `date_message` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_message`
--

INSERT INTO `user_message` (`user_mID`, `user_id`, `message`, `problem_type`, `screen_shot`, `date_message`, `status`) VALUES
(1, 4, 'bakal sud an', 'system error', '1671032460_dark_chocolate_cake.jpg', '2023-04-02 18:42:02', 1),
(5, 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'personal message', '1671032460_dark_chocolate_cake.jpg', '2023-04-03 00:10:14', 1),
(6, 4, '$data[\'time\']a dasd', 'system error', '1671032460_dark_chocolate_cake.jpg', '2023-04-03 01:01:44', 1),
(7, 5, 'as asdklj as jhasd as wq ', 'bug', '1671032460_dark_chocolate_cake.jpg', '2023-04-09 16:08:38', 1),
(13, 5, 'wla lang                              \r\n                            ', 'bug', '1681649160_WIN_20220313_15_56_59_Pro.jpg', '2023-04-16 20:46:50', 1),
(16, 5, 'just a sample message or text', 'sysem error', '0', '2023-04-20 12:49:42', 1),
(17, 5, 'another sample message', 'bug', '0', '2023-04-20 12:50:33', 1),
(18, 6, 'C Jedi Diah na lab2', 'personal message', '1687326240_Planet9_Wallpaper_5000x2813.jpg', '2023-06-21 13:44:43', 1),
(19, 7, 'Manyak ko Ry?', 'personal message', '0', '2023-06-21 14:06:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_message_comments`
--

CREATE TABLE `user_message_comments` (
  `um_com_id` int(11) NOT NULL,
  `user_mID` int(11) NOT NULL DEFAULT 0,
  `comments` varchar(50) NOT NULL DEFAULT '0',
  `date_com` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_message_comments`
--

INSERT INTO `user_message_comments` (`um_com_id`, `user_mID`, `comments`, `date_com`, `user_id`) VALUES
(2, 5, 'wala lang', '2023-06-20 22:57:31', 1),
(3, 6, 'Sorry', '2023-06-20 23:01:59', 1),
(5, 6, 'sige lang ah', '2023-06-21 12:19:30', 4),
(6, 6, 'tuod wala kaso?', '2023-06-21 12:19:44', 1),
(7, 6, 'promise?\r\n', '2023-06-21 12:21:42', 4),
(8, 6, 'oo primise\r\n', '2023-06-21 12:22:45', 1),
(9, 1, 'wala comment bah', '2023-06-21 12:24:46', 1),
(10, 6, 'baw Thank you gd Sir', '2023-06-21 12:27:49', 4),
(11, 6, 'i love you jedi diah', '2023-06-21 13:39:07', 4),
(12, 6, 'i love you too :*', '2023-06-21 13:40:21', 1),
(15, 18, 'Palangga ko C ryan\r\n', '2023-06-21 13:47:43', 6),
(16, 18, 'wee? tuod love?', '2023-06-21 13:47:52', 1),
(17, 18, 'oo love promise Lab2 na C Ryan :*', '2023-06-21 13:48:07', 6),
(18, 19, 'Oo Tol Manyak ka\r\nMayu kay na realize mo sbng tol?', '2023-06-21 14:07:52', 1),
(19, 19, 'kay sbng ko lang b tol na realize na manyak gd ko\r', '2023-06-21 14:08:08', 7),
(20, 19, 'tuod gd na gali?', '2023-06-21 14:08:18', 7),
(21, 19, 'oo tol tuod na!', '2023-06-21 14:08:25', 1),
(22, 19, 'na manyak ka gd', '2023-06-21 14:08:33', 1),
(23, 16, 'commentohan ta', '2023-06-21 21:44:35', 1),
(24, 17, 'Bug Fixed', '2023-06-21 21:44:52', 1),
(25, 1, 'commentuhan ta ah hahaha\r\n', '2023-06-21 22:40:22', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autocode`
--
ALTER TABLE `autocode`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `mycart`
--
ALTER TABLE `mycart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_message`
--
ALTER TABLE `user_message`
  ADD PRIMARY KEY (`user_mID`);

--
-- Indexes for table `user_message_comments`
--
ALTER TABLE `user_message_comments`
  ADD PRIMARY KEY (`um_com_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autocode`
--
ALTER TABLE `autocode`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_message`
--
ALTER TABLE `user_message`
  MODIFY `user_mID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_message_comments`
--
ALTER TABLE `user_message_comments`
  MODIFY `um_com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

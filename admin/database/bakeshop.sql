-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 11:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
(1, 100, 129, 1, 'order_code'),
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
(13, 'Drinks'),
(14, 'Desserts'),
(16, 'Meals'),
(17, 'Donuts');

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
(1, 'John Cenas', '093948388385', 'john@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Sipalay City', '1745875440_princess.jpg', '2021-10-30'),
(37, 'Martin Luther', '09488384833', 'martin@yahoo.com', '7815696ecbf1c96e6894b779456d330e', 'Inbanado St. Brgy Laguna', '1745875800_pps.jfif', '2025-04-28'),
(38, 'sample', 'sample', 'sample@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'sample', '0', '2025-04-29');

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
(165, 30, 19, '1', '1'),
(166, 30, 24, '1', '1'),
(167, 30, 28, '1', '1'),
(168, 30, 32, '1', '1'),
(169, 37, 20, '1', '1'),
(170, 37, 21, '1', '1'),
(171, 37, 29, '2', '1'),
(172, 1, 22, '1', '1'),
(173, 1, 27, '1', '1');

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
(66, 30, '220', '2025-04-27 22:31:47', '427', '500', '73', '1'),
(67, 37, '224', '2025-04-29 05:31:35', '326', '350', '24', '2'),
(68, 1, '227', '2025-04-29 05:34:31', '158', '0', '0', '0');

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
(140, 66, 19, '1'),
(141, 66, 24, '1'),
(142, 66, 28, '1'),
(143, 66, 32, '1'),
(144, 67, 20, '1'),
(145, 67, 21, '1'),
(146, 67, 29, '2'),
(147, 68, 22, '1'),
(148, 68, 27, '1');

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
(19, 'Donuts 1', '50', '1745755500_4f3691ac8509a24fcbf79c9d690fde75.jpg', 'Na', '17', 1),
(20, 'Donuts 2', '99', '1745755500_3827c5f0cca35e094cc941e3de1be997.jpg', 'NA', '17', 1),
(21, 'Donuts 3', '109', '1745755560_d231afecaa32047cfca65b2b42e07f61.jpg', 'NA', '17', 1),
(22, 'Donuts 4', '99', '1745755560_e58254e2f85c4460684d2f2ee565ca2f.jpg', 'NA', '17', 1),
(23, 'Meal 1', '199', '1745756760_4c1a9849b0d6e0ab56747b057fa87f2d.jpg', 'NA', '16', 1),
(24, 'Meal 2', '199', '1745756760_85e37c366e98fd41f88cbe4cfd2aa1c4.jpg', 'NA', '16', 1),
(25, 'Meal 3', '199', '1745756760_765b5be0b4b261fe588c3caec9864938.jpg', 'NA', '16', 1),
(26, 'Meal 4', '199', '1745756820_a7fb4998b7af2dc2fb80795a5b20bff9.jpg', 'NA', '16', 1),
(27, 'Drinks 1', '59', '1745757180_3c5613785756777e58235a58242d4c45.jpg', 'NA', '13', 1),
(28, 'Drinks 2', '79', '1745757180_d6c1ec17cd906d4c7e4c8afa6ae41f5f.jpg', 'NA', '13', 1),
(29, 'Drinks 3', '59', '1745757180_f281d17c0d8c756105678146d52a950f.jpg', 'NA', '13', 1),
(30, 'Drink 4', '99', '1745757240_fd3e0f4ccf60192bf4398007119a1038.jpg', 'NA', '13', 1),
(31, 'Dessert 1', '99', '1745757660_6ba5bd62be665693825e0c66e4ccc493.jpg', 'NA', '14', 1),
(32, 'Dessert 2', '99', '1745757660_8b969e362ba0e79d37468e4fa40eee93.jpg', 'NA', '14', 1),
(33, 'Dessert 3', '99', '1745757720_835a4c1b096442169b4ce42a42601096.jpg', 'NA', '14', 1),
(34, 'Dessert 4', '99', '1745757720_f4cee5e7149731cc9dd440115a194fbf.jpg', 'NA', '14', 1);

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
(1, 'Ryan', 'Wong', 'admin@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1', '1745787480_p2.jfif', 'Admin', 'eb0a191797624dd3a48fa681d3061212'),
(4, 'Anna', 'Ledesma', 'annLedesma@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2', '1745876760_pps.jfif', 'Staff', '0'),
(8, 'sample', 'sample', 'sample@yahoo.com', 'd41d8cd98f00b204e9800998ecf8427e', '2', '1745876820_pps.jfif', 'Staff', '0');

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
(20, 4, 'Something went wrong in my end can you fix this?', 'bug', '1745875140_bugs.jfif', '2025-04-29 05:19:53', 0);

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
(26, 20, 'Ok i will fix this', '2025-04-29 05:20:46', 1);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_message`
--
ALTER TABLE `user_message`
  MODIFY `user_mID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_message_comments`
--
ALTER TABLE `user_message_comments`
  MODIFY `um_com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

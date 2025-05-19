-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 09:48 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `autocode`
--

INSERT INTO `autocode` (`auto_id`, `start`, `end`, `increment`, `description`) VALUES
(1, 100, 161, 1, 'order_code'),
(2, 3102, 3, 1, 'trans_code');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `contact`, `username`, `password`, `address`, `avatar`, `date_created`) VALUES
(1, 'John Cenas', '093948388385', 'john@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Sipalay City', '1745875440_princess.jpg', '2021-10-30'),
(37, 'Martin Luther', '09488384833', 'martin@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Inbanado St. Brgy Laguna', '1745875800_pps.jfif', '2025-04-28'),
(38, 'sample', 'sample', 'sample@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'sample', '0', '2025-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '0',
  `percent` varchar(100) NOT NULL DEFAULT '0',
  `status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_id`, `title`, `percent`, `status`) VALUES
(1, 'PWD', '1', '0'),
(3, 'Student', '2', '0'),
(5, 'Senior', '2', '0');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`cart_id`, `customer_id`, `prod_id`, `qty`, `status`) VALUES
(203, 37, 22, '2', '1'),
(204, 37, 30, '2', '1'),
(205, 37, 24, '2', '1');

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
  `card_id` varchar(100) DEFAULT '0',
  `is_discounted` varchar(50) DEFAULT '0',
  `discount_id` int(11) DEFAULT 0,
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_code`, `order_date`, `order_total`, `cash`, `exchange`, `card_id`, `is_discounted`, `discount_id`, `status`) VALUES
(94, 37, '258', '2025-05-19 03:17:20', '388.08', '0', '0', '113384838', '1', 3, '0'),
(95, 37, '260', '2025-05-19 03:18:04', '398', '0', '0', '', '', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `prod_id` int(11) NOT NULL DEFAULT 0,
  `qty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`details_id`, `order_id`, `prod_id`, `qty`) VALUES
(178, 94, 22, '2'),
(179, 94, 30, '2'),
(180, 95, 24, '2');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_price`, `avatar`, `prod_desc`, `cat_id`, `status`) VALUES
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
(34, 'Dessert 4', '99', '1745757720_f4cee5e7149731cc9dd440115a194fbf.jpg', 'NA', '14', 1),
(35, 'Donuts 1', '50', '1747596120_4f3691ac8509a24fcbf79c9d690fde75.jpg', 'NA', '17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `set_id` int(11) NOT NULL,
  `set_code` varchar(50) NOT NULL DEFAULT '0',
  `access` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `uname`, `password`, `type`, `avatar`, `job`, `special_code`) VALUES
(1, 'Ryan', 'Wong', 'admin@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1', '1747597620_testimonials-4.jpg', 'Admin', 'eb0a191797624dd3a48fa681d3061212'),
(4, 'Anna', 'Ledesma', 'annLedesma@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2', '1745876760_pps.jfif', 'Staff', '0'),
(8, 'sample', 'sample', 'sample@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2', '1745876820_pps.jfif', 'Staff', '0');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_message_comments`
--

INSERT INTO `user_message_comments` (`um_com_id`, `user_mID`, `comments`, `date_com`, `user_id`) VALUES
(26, 20, 'Ok i will fix this', '2025-04-29 05:20:46', 1),
(27, 20, 'hey', '2025-05-19 02:51:30', 4);

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
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `mycart`
--
ALTER TABLE `mycart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `discount_id` (`discount_id`);

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
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mycart`
--
ALTER TABLE `mycart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `um_com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

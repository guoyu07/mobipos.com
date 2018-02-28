-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2017 at 03:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobipos`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_categories`
--

CREATE TABLE `tb_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `client_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_categories`
--

INSERT INTO `tb_categories` (`category_id`, `category_name`, `client_id`, `shop_id`, `active_status`) VALUES
(1, 'Drinks', 1, 1, 1),
(2, 'Fruits', 1, 2, 1),
(3, 'Stationary', 1, 1, 1),
(4, 'Foods', 1, 3, 1),
(5, 'Detergents', 1, 1, 1),
(6, 'Toiletries', 1, 3, 1),
(7, 'Snacks', 1, 3, 1),
(8, 'Bags', 1, 3, 1),
(9, 'Drinks', 1, 3, 1),
(10, 'foods', 28, 6, 1),
(11, 'drinks', 28, 6, 1),
(12, 'dry stuff', 28, 6, 1),
(13, 'Bottles', 29, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_employees`
--

CREATE TABLE `tb_employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `ID_NO` varchar(50) NOT NULL,
  `residence` varchar(50) NOT NULL,
  `outlet_posted` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL,
  `account_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_employees`
--

INSERT INTO `tb_employees` (`id`, `employee_id`, `employee_name`, `email`, `phone_number`, `ID_NO`, `residence`, `outlet_posted`, `client_id`, `active_status`, `account_type`) VALUES
(1, '', 'munialo', 'test@gmail.com', '973434938', '874574', 'test', 0, 26, 1, 0),
(2, '', 'munialo', 'test@gmail.com', '973434938', '8745741', 'test', 0, 26, 1, 2),
(3, '', 'try', 'test.me@g.com', '8475954', '348734', 'teete', 0, 26, 1, 2),
(4, '', 'try me', 'test.me@g.com', '847595', '3487342', 'teete', 0, 26, 1, 2),
(5, '', 'try me', 'test.me@g.com', '847595', '34873', 'teete', 0, 26, 1, 2),
(6, 'try me-mercy-6', 'try me', 'test.me@g.com', '676868', '4646546464', 'teete', 0, 26, 1, 2),
(7, 'y me-rcy-', 'try me', 'test.me@g.com', '676868', '464654', 'teete', 0, 26, 1, 2),
(8, 'tr-rcy-', 'try me', 'test.me@g.com', '676868', '4646', 'teete', 0, 26, 1, 2),
(9, 'tr-me-9', 'try me', 'test.me@g.com', '676868', '464678', 'teete', 0, 26, 1, 2),
(10, 'de-me-10', 'demi', 'tsy@g,s.com', '975657', '46456757', 'yete', 0, 26, 1, 2),
(11, 'sl-me-11', 'sly', 'yest@fkld.com', '08450458', '84735345', 'khrker', 0, 26, 1, 2),
(12, 'te-me-12', 'test this ghuy', 'royya@hjff.com', '0340343', '974574935', 'nairobi', 0, 26, 1, 2),
(13, 'ch-Ro-13', 'chris', 'chris@gmail.com', '0708316154', '12346', 'kahawa', 0, 1, 1, 2),
(14, 'Jo-Mu-14', 'Jon Doe', 'johndoe@gmail.com', '0733656879', '044400', 'Shago', 0, 27, 1, 2),
(15, 'Sl-Ro-15', 'Sly', 'Sly@gmail.com', '0784646184515', '321545184', 'Kitale', 0, 1, 1, 2),
(16, 'br-Ro-16', 'brian Munialo', 'bmunialo@gmail.com', '984594764', '234854588', 'zimmerman', 1, 1, 1, 2),
(17, 'Mw-Ro-17', 'Mwaura', 'mwaura@gmail.com', '00097899', '889898', 'kahawa', 3, 1, 1, 2),
(18, 'jo-ne-18', 'john doe', 'nex@gmail', '2134', '12334', 'naks', 6, 28, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_measurements`
--

CREATE TABLE `tb_measurements` (
  `measurement_id` int(11) NOT NULL,
  `measurement_name` varchar(50) NOT NULL,
  `single_unit` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_measurements`
--

INSERT INTO `tb_measurements` (`measurement_id`, `measurement_name`, `single_unit`, `client_id`, `active_status`) VALUES
(1, 'Kilograms', 1, 1, 1),
(3, 'Pieces', 1, 1, 1),
(4, 'kgs', 1, 28, 1),
(5, 'litres', 1, 28, 1),
(6, 'boxes', 12, 28, 1),
(7, 'Crates', 24, 28, 1),
(8, 'bottles', 1, 28, 1),
(9, 'bottles', 1, 1, 1),
(10, 'Packets', 1, 1, 1),
(11, 'Bottles', 1, 29, 1),
(12, 'carton', 12, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE `tb_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `measurement_type` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`product_id`, `product_name`, `category_id`, `measurement_type`, `client_id`, `active_status`) VALUES
(1, 'KDF Mandazis', 0, 3, 0, 1),
(2, 'KDF Mandazis', 0, 3, 0, 1),
(3, 'KDF Mandazis', 0, 3, 0, 1),
(4, 'KDF Mandazis', 0, 3, 0, 1),
(5, 'Mandazis', 4, 3, 0, 1),
(6, 'Supa Loaf', 4, 3, 0, 1),
(7, 'Manji Buscuits', 7, 1, 0, 1),
(8, 'Ariel 500ml', 5, 3, 0, 1),
(9, 'Toilex tissue papers', 6, 3, 0, 1),
(10, 'cotton  bags small', 8, 3, 0, 1),
(11, 'Highlands Juice 1 litre', 9, 3, 0, 1),
(12, 'Tusker 500ml', 11, 8, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_prices`
--

CREATE TABLE `tb_product_prices` (
  `price_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buying_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `date_of_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_product_prices`
--

INSERT INTO `tb_product_prices` (`price_id`, `product_id`, `buying_price`, `selling_price`, `date_of_update`) VALUES
(1, 0, 8, 10, '0000-00-00 00:00:00'),
(2, 0, 8, 10, '0000-00-00 00:00:00'),
(3, 0, 8, 10, '0000-00-00 00:00:00'),
(4, 0, 8, 10, '0000-00-00 00:00:00'),
(5, 5, 3, 5, '0000-00-00 00:00:00'),
(6, 6, 40, 50, '0000-00-00 00:00:00'),
(7, 7, 15, 20, '0000-00-00 00:00:00'),
(8, 8, 130, 165, '2017-12-18 14:18:19'),
(9, 9, 20, 25, '2017-12-22 07:57:22'),
(10, 10, 5, 10, '2017-12-22 08:00:41'),
(11, 11, 80, 100, '2017-12-22 08:02:58'),
(12, 12, 130, 200, '2017-12-22 19:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_shops`
--

CREATE TABLE `tb_shops` (
  `tb_shop_id` int(11) NOT NULL,
  `tb_shop_name` varchar(50) NOT NULL,
  `client_id` int(11) NOT NULL,
  `active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_shops`
--

INSERT INTO `tb_shops` (`tb_shop_id`, `tb_shop_name`, `client_id`, `active_status`) VALUES
(1, 'Rongai matt', 1, 1),
(2, 'Githurai matt', 1, 1),
(3, 'Kahawa Enterprises', 1, 1),
(4, 'Kahawa Sukari', 1, 1),
(5, 'Ruiru Agrovet', 1, 1),
(6, 'nexxy', 28, 1),
(7, 'Nakumatt', 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stocks`
--

CREATE TABLE `tb_stocks` (
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `opening_stock` int(11) NOT NULL,
  `closing_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stocks`
--

INSERT INTO `tb_stocks` (`stock_id`, `product_id`, `opening_stock`, `closing_stock`) VALUES
(1, 6, 5, 0),
(2, 7, 50, 0),
(3, 8, 20, 0),
(4, 9, 48, 0),
(5, 10, 100, 0),
(6, 11, 25, 0),
(7, 12, 250, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock_movement`
--

CREATE TABLE `tb_stock_movement` (
  `movement_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `movement_type` varchar(50) NOT NULL,
  `quantity_moved` int(11) NOT NULL,
  `time_of_movement` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stock_movement`
--

INSERT INTO `tb_stock_movement` (`movement_id`, `product_id`, `movement_type`, `quantity_moved`, `time_of_movement`) VALUES
(1, 0, 'STOCK_IN', 12, '2017-12-18 13:42:43'),
(2, 0, 'STOCK_IN', 12, '2017-12-18 13:42:55'),
(3, 0, 'STOCK_IN', 12, '2017-12-18 13:43:24'),
(4, 0, 'STOCK_IN', 12, '2017-12-18 13:49:53'),
(5, 5, 'STOCK_IN', 10, '2017-12-18 13:51:56'),
(6, 6, 'STOCK_IN', 5, '2017-12-18 13:54:23'),
(7, 7, 'STOCK_IN', 50, '2017-12-18 14:08:25'),
(8, 8, 'STOCK_IN', 20, '2017-12-18 14:18:19'),
(9, 9, 'STOCK_IN', 48, '2017-12-22 07:57:22'),
(10, 10, 'STOCK_IN', 100, '2017-12-22 08:00:41'),
(11, 11, 'STOCK_IN', 25, '2017-12-22 08:02:58'),
(12, 12, 'STOCK_IN', 250, '2017-12-22 19:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `residence` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `active_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `username`, `phone_number`, `residence`, `email`, `password`, `business_name`, `active_status`) VALUES
(1, 'Roy Wati', '254708691402', 'nairobi', 'royywati@gmail.com', '700c8b805a3e2a265b01c77614cd8b21', 'Atfortech dynamics', 1),
(2, 'Chris Musikoyo', '254708318523', 'Nairobi', 'chrismusikoyo@gmail.com', '700c8b805a3e2a265b01c77614cd8b21', 'Atfortech Dynamics', 1),
(18, 'test', '12234', 'nai', '', '0144712dd81be0c3d9724f5e56ce6685', 'waitu', 1),
(19, 'Chris Curtis', '0723951840', 'Mombasa', '', '0144712dd81be0c3d9724f5e56ce6685', 'AT4', 1),
(20, 'chris', '12345', 'NAIROBI', '', '0144712dd81be0c3d9724f5e56ce6685', 'AT4', 1),
(21, 'chris', '1234', 'NAIROBI', '', '0144712dd81be0c3d9724f5e56ce6685', 'AT4', 1),
(22, 'chris', '12345', 'nairobi', '', '700c8b805a3e2a265b01c77614cd8b21', 'AT$', 1),
(23, 'chris curtis', '0723951840', 'nairobi', '', '9df40980806ec89c04b8e51fff93903a', 'AT4', 1),
(26, 'mercy', '0712066789', 'nairobi', 'mercy@gmail.com', '9df40980806ec89c04b8e51fff93903a', 'daz fashions', 1),
(27, 'Musikoyo', '0700123436', 'New York', 'chriscurtis', 'bd894d47db2d1432f33df852f77adae2', 'MobiT', 1),
(28, 'nex', '345678', 'nai', 'sddas', '6116afedcb0bc31083935c1c262ff4c9', 'faith', 1),
(29, 'data-tester', '1234', 'nai', 'tester@gmail.com', '700c8b805a3e2a265b01c77614cd8b21', 'tester', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_categories`
--
ALTER TABLE `tb_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_employees`
--
ALTER TABLE `tb_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_measurements`
--
ALTER TABLE `tb_measurements`
  ADD PRIMARY KEY (`measurement_id`);

--
-- Indexes for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tb_product_prices`
--
ALTER TABLE `tb_product_prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `tb_shops`
--
ALTER TABLE `tb_shops`
  ADD PRIMARY KEY (`tb_shop_id`);

--
-- Indexes for table `tb_stocks`
--
ALTER TABLE `tb_stocks`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tb_stock_movement`
--
ALTER TABLE `tb_stock_movement`
  ADD PRIMARY KEY (`movement_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_categories`
--
ALTER TABLE `tb_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_employees`
--
ALTER TABLE `tb_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_measurements`
--
ALTER TABLE `tb_measurements`
  MODIFY `measurement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_product_prices`
--
ALTER TABLE `tb_product_prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_shops`
--
ALTER TABLE `tb_shops`
  MODIFY `tb_shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_stocks`
--
ALTER TABLE `tb_stocks`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_stock_movement`
--
ALTER TABLE `tb_stock_movement`
  MODIFY `movement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

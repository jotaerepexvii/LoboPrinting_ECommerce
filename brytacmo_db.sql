-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: 136.145.29.193
-- Generation Time: May 19, 2021 at 08:09 PM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brytacmo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE `Address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(9) NOT NULL,
  `address_1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `address_2` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `zip_code` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `state` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`address_id`, `user_id`, `address_1`, `address_2`, `zip_code`, `city`, `state`) VALUES
(1, 840168316, 'Carr 129 km 22.1', NULL, '00669', 'Lares', 'PR'),
(11, 840151515, 'hc02 box1234', ' ', '00669', 'Lares', 'PR'),
(12, 840175555, 'Carr 149 Km 19.7', ' Po Box 7041', '00638', 'Ciales', 'Puerto Rico'),
(13, 840112, 'Carr 149 Km 19.7', ' ', '00638', 'Puerto Rico', 'Mayaguez'),
(14, 123456789, 'Carr 123 Km 12.3', ' ', '00638', 'Florida', 'Puerto Rico'),
(15, 840796890, 'Carr 123 Km 12.3', ' Po Box 7041', '00638', 'Arecibo', 'Puerto Rico');

-- --------------------------------------------------------

--
-- Table structure for table `Administrator`
--

CREATE TABLE `Administrator` (
  `admin_id` int(9) NOT NULL,
  `name` char(16) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` char(16) COLLATE utf8_spanish_ci NOT NULL,
  `email` char(32) COLLATE utf8_spanish_ci NOT NULL,
  `password` char(16) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `Administrator`
--

INSERT INTO `Administrator` (`admin_id`, `name`, `lastname`, `email`, `password`) VALUES
(1, 'Bryan', 'Tacoronte', 'bryan.tacoronte@upr.edu', 'q/chD7zMHPC.w'),
(2, 'Jonathan', 'Rodriguez', 'jonathan.rodriguez66@upr', 'q/chD7zMHPC.w'),
(840987659, 'Maria', 'Rivera', 'maria.rivera@test.test', 'q/chD7zMHPC.w');

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`category_id`, `product_id`) VALUES
(2, 369258147),
(1, 123456789),
(1, 987654321),
(3, 147258369),
(1, 963852741),
(2, 963852741),
(3, 369258147),
(1, 987456123);

-- --------------------------------------------------------

--
-- Table structure for table `Category_name`
--

CREATE TABLE `Category_name` (
  `category_id` int(11) NOT NULL,
  `categor_name` char(16) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `Category_name`
--

INSERT INTO `Category_name` (`category_id`, `categor_name`) VALUES
(1, 'Escolar'),
(2, 'Laboratorio'),
(3, 'Memorabilia');

-- --------------------------------------------------------

--
-- Table structure for table `Contain`
--

CREATE TABLE `Contain` (
  `contain_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `cost` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `Contain`
--

INSERT INTO `Contain` (`contain_id`, `order_id`, `product_id`, `product_quantity`, `price`, `cost`) VALUES
(25, 1277264392, 369258147, 1, '25.00', '10.00'),
(26, 1277264392, 963852741, 1, '2.25', '1.00'),
(27, 1711035868, 42229244, 1, '3.33', '1.50'),
(28, 1288473698, 369258147, 1, '25.00', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `address_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `track_number` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `pickup` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`order_id`, `user_id`, `order_date`, `address_id`, `payment_id`, `track_number`, `status_id`, `pickup`) VALUES
(1277264392, 123456789, '2021-05-17 10:47:06', 14, 5, 1667823287, 1, 0),
(1288473698, 840796890, '2021-05-17 15:29:44', 15, 6, 2093165649, 3, 0),
(1711035868, 840168316, '2021-05-17 11:31:46', 1, 1, 1615021013, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Payment_method`
--

CREATE TABLE `Payment_method` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_name` char(32) COLLATE utf8_spanish_ci NOT NULL,
  `card_number` char(32) COLLATE utf8_spanish_ci NOT NULL,
  `exp_month` int(11) NOT NULL,
  `exp_year` int(11) NOT NULL,
  `ccv` char(3) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `Payment_method`
--

INSERT INTO `Payment_method` (`payment_id`, `user_id`, `card_name`, `card_number`, `exp_month`, `exp_year`, `ccv`) VALUES
(1, 840168316, 'BRYAN TACORONTE', '123456789', 8, 22, '000'),
(2, 840151515, 'JOSE MORALES', '987654321', 5, 24, '222'),
(3, 840175555, 'Maria Perez', '123456789012', 9, 29, '365'),
(4, 840112, 'Maria Perez', '123456781245', 4, 24, '456'),
(5, 123456789, 'Maria Perez', '123412341234', 5, 22, '123'),
(6, 840796890, 'Aixa Ramirez', '1234123412341234', 2, 22, '123');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `product_id` int(14) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `cost` decimal(6,2) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`product_id`, `name`, `description`, `price`, `cost`, `in_stock`, `sold`, `date`, `image`) VALUES
(35255001, 'Tarjetas Index', 'Sparco Index Cards', '1.99', '0.99', 20, 0, '2021-05-13', '1.png'),
(42229244, 'Plasticina', 'Sargent Modeling Clay', '3.33', '1.50', 11, 1, '2021-05-12', '1.png'),
(87508037, 'Boligrafo', 'Promarx', '1.70', '0.65', 15, 7, '2021-05-12', '1.png'),
(123456789, 'Lapiz', 'Papermate', '0.25', '0.16', 110, 10, '2021-03-23', 'papermate_pencil.jpg'),
(147258368, 'Camisa', 'Lobo UPRA', '15.00', '7.00', 25, 2, '2021-03-30', '1.png'),
(369258147, 'Bata', 'UPRA', '25.00', '10.00', 15, 1, '2021-03-23', 'lab-coat.webp'),
(402670040, 'Pega', 'UHU', '1.19', '0.49', 20, 5, '2021-05-12', '1.png'),
(456123369, 'Lapiz', 'Papermate Mechanical Clearpoint', '3.99', '1.14', 20, 3, '2021-04-14', 'papermate-mechanical-pencs.png'),
(456852147, 'Libreta', 'Composition Journal Notebook', '1.99', '0.50', 25, 5, '2021-04-14', 'notebook-journal.jpg'),
(805120104, 'Pega', 'Quick White School Glue', '0.98', '0.25', 3, 7, '2021-05-12', '1.png'),
(963852741, 'Libreta', 'Cuadriculados 1/4\"', '2.25', '1.00', 45, 5, '2021-03-21', '1.png'),
(987456124, 'Goma', 'Papermate Pink Pearl', '1.09', '0.49', 55, 8, '2021-04-04', 'papermate-pinkPearl.jpg'),
(987654321, 'Marcador', 'Sharpie Fine Point', '1.19', '0.69', 80, 6, '2021-03-21', 'sharpie_fine.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE `Status` (
  `status_id` int(10) NOT NULL,
  `status_name` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `Status`
--

INSERT INTO `Status` (`status_id`, `status_name`) VALUES
(1, 'Pending'),
(2, 'Confirmed'),
(3, 'Shipping'),
(4, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(9) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `student` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `name`, `lastname`, `email`, `password`, `phone`, `student`) VALUES
(840112, 'Jesus', 'Collazo', 'jesus.collazo@upr', 'q/chD7zMHPC.w', '', 1),
(123456789, 'Juan', 'Del Pueblo', 'juandelpueblo@example', 'q/chD7zMHPC.w', '', 1),
(171871118, 'Pablo', 'Rodriguez', 'pablo.rodriguez@test.test', 'q/chD7zMHPC.w', '', 1),
(667045776, 'Flor', 'Martinez', 'flor.martinez@test.test', 'q/chD7zMHPC.w', '', 0),
(840151515, 'Jose', 'Morales', 'jose.morales@example', 'q/chD7zMHPC.w', '7872210120', 1),
(840168316, 'Bryan', 'Tacoronte', 'bryan.tacoronte@upr.edu', 'q/chD7zMHPC.w', '', 1),
(840175555, 'Stephanie', 'Perez Rivera', 'stephanie.perez@test.test', 'q/chD7zMHPC.w', '7875555555', 1),
(840796890, 'Aixa', 'Ramirez', 'aixa.ramirez@upr.edu', 'q/ngR1YyWddl6', '', 1),
(2125670204, 'Lorencio', 'Hernandez', 'lorencio.hernandez@test.test', 'q/chD7zMHPC.w', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Address`
--
ALTER TABLE `Address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Administrator`
--
ALTER TABLE `Administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `Category_name`
--
ALTER TABLE `Category_name`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `Contain`
--
ALTER TABLE `Contain`
  ADD PRIMARY KEY (`contain_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `Payment_method`
--
ALTER TABLE `Payment_method`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Address`
--
ALTER TABLE `Address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Administrator`
--
ALTER TABLE `Administrator`
  MODIFY `admin_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=840987660;
--
-- AUTO_INCREMENT for table `Category_name`
--
ALTER TABLE `Category_name`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Contain`
--
ALTER TABLE `Contain`
  MODIFY `contain_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `Payment_method`
--
ALTER TABLE `Payment_method`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Address`
--
ALTER TABLE `Address`
  ADD CONSTRAINT `Address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

--
-- Constraints for table `Contain`
--
ALTER TABLE `Contain`
  ADD CONSTRAINT `Contain_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`);

--
-- Constraints for table `Payment_method`
--
ALTER TABLE `Payment_method`
  ADD CONSTRAINT `Payment_method_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

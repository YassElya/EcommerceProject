-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 05:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `enabled2fa` tinyint(1) NOT NULL,
  `otpsecretkey` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `enabled2fa`, `otpsecretkey`) VALUES
(1, 'user', '$2y$10$ksEMJudVi9bPFjlUv55ptOLNN3cV3aV1XjAABmIIvn19bsEP5AjTG', 0, NULL),
(5, 'soso', '$2y$10$ooGbkO35X8KG1CxO0BpJ/eYllD7yre0DaocQI0EyV7z8SBGafH5uG', 1, 'SUXMIKONUDQ2LGAT');

-- --------------------------------------------------------

--
-- Table structure for table `balloons`
--

CREATE TABLE `balloons` (
  `balloon_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `size` double NOT NULL,
  `material` varchar(20) NOT NULL,
  `fill_type` varchar(20) DEFAULT NULL,
  `quantity_per_bag` int(11) NOT NULL,
  `price_per_bag` double NOT NULL,
  `price_per_unit` double NOT NULL,
  `total_remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `balloons`
--

INSERT INTO `balloons` (`balloon_id`, `name`, `brand`, `size`, `material`, `fill_type`, `quantity_per_bag`, `price_per_bag`, `price_per_unit`, `total_remaining`) VALUES
(1, 'White Gold Heart', 'Anagram', 17, 'Foil', NULL, 1, 0.74, 0.74, 2),
(2, 'Mickey & Friends Happy Birthday', 'Anagram', 18, 'Foil', NULL, 1, 2.08, 2.08, 1),
(3, 'Mini Pastel Blue Curve', 'Anagram', 19, 'Foil', 'Airfill Only', 1, 1.08, 1.08, 2);

-- --------------------------------------------------------

--
-- Table structure for table `balloons_per_order`
--

CREATE TABLE `balloons_per_order` (
  `balloon_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `num_of_balloons` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `balloons_per_order`
--

INSERT INTO `balloons_per_order` (`balloon_id`, `order_id`, `num_of_balloons`) VALUES
(1, 1, 1),
(3, 1, 1),
(1, 2, 1),
(2, 2, 1),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `phone_num` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `fname`, `lname`, `phone_num`, `email`, `instagram`) VALUES
(1, 'Jye', 'Ming', '514-846-9715', 'jyeming@gmail.com', '@jye_the_best'),
(2, 'Gus', 'Meh', NULL, 'gusmeh@gmail.com', NULL),
(6, 'Sonia', 'Veve', '817-486-7145', 'soso@gmail.com', '@soso');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `size` varchar(10) NOT NULL,
  `quantity_per_bag` int(11) NOT NULL,
  `price_per_bag` double NOT NULL,
  `price_per_unit` double NOT NULL,
  `total_remaining` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `brand`, `size`, `quantity_per_bag`, `price_per_bag`, `price_per_unit`, `total_remaining`) VALUES
(1, 'Twirlz Balloon Tail Elegant', 'Anagram', '36x6', 1, 1.47, 1.47, 5);

-- --------------------------------------------------------

--
-- Table structure for table `items_per_order`
--

CREATE TABLE `items_per_order` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `num_of_items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items_per_order`
--

INSERT INTO `items_per_order` (`item_id`, `order_id`, `num_of_items`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `total_balloons` int(11) DEFAULT NULL,
  `total_items` int(11) DEFAULT NULL,
  `cost` double NOT NULL,
  `net_profit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `status_id`, `client_id`, `total_balloons`, `total_items`, `cost`, `net_profit`) VALUES
(1, 1, 1, 2, 1, 3.29, 16.1),
(2, 2, 2, 3, 0, 3.9, 11.71);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `gross_profit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`, `gross_profit`) VALUES
(1, 'In Progress', 15),
(2, 'In Progress', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balloons`
--
ALTER TABLE `balloons`
  ADD PRIMARY KEY (`balloon_id`);

--
-- Indexes for table `balloons_per_order`
--
ALTER TABLE `balloons_per_order`
  ADD KEY `balloon_id_FK` (`balloon_id`),
  ADD KEY `order_id_FK` (`order_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `items_per_order`
--
ALTER TABLE `items_per_order`
  ADD KEY `item_id_FK` (`item_id`),
  ADD KEY `items_order_id_FK` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `client_id_FK` (`client_id`),
  ADD KEY `status_id_FK` (`status_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `balloons`
--
ALTER TABLE `balloons`
  MODIFY `balloon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balloons_per_order`
--
ALTER TABLE `balloons_per_order`
  ADD CONSTRAINT `balloon_id_FK` FOREIGN KEY (`balloon_id`) REFERENCES `balloons` (`balloon_id`),
  ADD CONSTRAINT `order_id_FK` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `items_per_order`
--
ALTER TABLE `items_per_order`
  ADD CONSTRAINT `item_id_FK` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`),
  ADD CONSTRAINT `items_order_id_FK` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `client_id_FK` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`),
  ADD CONSTRAINT `status_id_FK` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

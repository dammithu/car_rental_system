-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 12:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `car_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `rent_start_date` date NOT NULL,
  `rent_end_date` date NOT NULL,
  `car_return_date` date DEFAULT NULL,
  `fare` double NOT NULL,
  `charge_type` varchar(25) NOT NULL DEFAULT 'days',
  `distance` double DEFAULT NULL,
  `no_of_days` int(11) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `return_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_username`, `car_id`, `booking_date`, `rent_start_date`, `rent_end_date`, `car_return_date`, `fare`, `charge_type`, `distance`, `no_of_days`, `total_amount`, `return_status`) VALUES
(574681346, 'noyel', 19, '2024-04-02', '2024-04-03', '2024-04-04', '2024-04-02', 500, 'km', 10, 1, 5000, 'R'),
(574681349, 'noyel', 20, '2024-04-02', '2024-04-02', '2024-04-05', '2024-04-02', 500, 'km', 12, 3, 6000, 'R'),
(574681350, 'sahan', 26, '2024-04-02', '2024-04-03', '2024-04-06', '2024-04-02', 500, 'km', 10, 3, 5000, 'R'),
(574681351, 'noyel', 20, '2024-04-06', '2024-04-06', '2024-04-08', '2024-04-06', 500, 'km', 30, 2, 15000, 'R');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `car_nameplate` varchar(50) NOT NULL,
  `car_img` varchar(50) DEFAULT 'NA',
  `ac_price` float NOT NULL,
  `non_ac_price` float NOT NULL,
  `ac_price_per_day` float NOT NULL,
  `non_ac_price_per_day` float NOT NULL,
  `car_availability` varchar(10) NOT NULL,
  `client_username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_nameplate`, `car_img`, `ac_price`, `non_ac_price`, `ac_price_per_day`, `non_ac_price_per_day`, `car_availability`, `client_username`) VALUES
(20, 'mghector', '123v', 'assets/img/cars/mghector.jpg', 500, 300, 7000, 5500, 'yes', 'nadith '),
(21, 'Fortuner vx', '123 456', 'assets/img/cars/Fortuner.png', 500, 300, 7000, 5500, 'yes', 'nadith '),
(26, 'tata', '12436', 'assets/img/cars/mcec.jpg', 500, 300, 7000, 5500, 'yes', 'chiran');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `message`) VALUES
(2, 'nice work');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `card_holder_name` varchar(100) DEFAULT NULL,
  `card_type` enum('visa','credit','debit') DEFAULT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `booking_id`, `card_holder_name`, `card_type`, `card_number`, `expire_date`, `payment_date`, `payment_status`) VALUES
(1, 12345, 'kamal', 'credit', '23457689', '2024-04-27', '2024-04-06 10:23:47', 'Success'),
(2, 574681363, 'kamal', 'debit', '324345567', '2024-04-24', '2024-04-06 15:45:06', 'Success'),
(3, 574681364, 'amal', 'credit', '34567878998', '2024-04-25', '2024-04-06 15:50:16', 'Success'),
(4, 574681365, 'dammika', 'visa', '1234556', '2024-04-16', '2024-04-06 15:52:07', 'Success'),
(5, 574681366, 'asa', 'credit', '43455667', '2024-04-26', '2024-04-06 15:55:28', 'Success'),
(6, 574681367, 'kamal', 'visa', '45566778888', '2024-04-15', '2024-04-06 16:12:19', 'Success'),
(7, 574681368, 'kamal', 'credit', '233444', '2024-04-17', '2024-04-06 16:34:46', 'Success'),
(8, 574681369, 'kamal', 'credit', 'r56778', '2024-04-10', '2024-04-07 09:59:47', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `phone`, `email`, `address`, `password`, `role`) VALUES
('admin', 'saman', 1234567890, 'admin@gmail.com', 'matara', 'admin', 'admin'),
('chiran', 'chiran perera', 78784574, 'chiran@gmail.com', 'galle', 'chiran', 'client'),
('nadith ', 'nadith perera', 12345678, 'nadithnew@gmail.com', 'galle', 'nadith', 'client'),
('noyel', 'noyel', 1234567, 'noyel@gmail.com', 'matara', 'noyel', 'customer'),
('sahan', 'sahan perera', 1234567, 'sahan@gmail.com', 'matara', 'sahan', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_username` (`customer_username`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `client_username` (`client_username`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=574681370;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `client_username` FOREIGN KEY (`client_username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2018 at 03:25 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amanentez`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `first_name`, `last_name`, `contact`, `email`, `type`, `username`, `password`) VALUES
(1, 'Juan', 'Dela cruz', '1234567', 'jd@gmail.com', 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'John', 'Doe', '1234567', 'johndoe@gmail.com', 'Front Desk', 'frontdesk', '217cff8dba09af4d091243b2512851eadfdc35f5');

-- --------------------------------------------------------

--
-- Table structure for table `booking_cancelled`
--

CREATE TABLE `booking_cancelled` (
  `reservation_id` int(11) NOT NULL,
  `date_cancelled` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_cancelled`
--

INSERT INTO `booking_cancelled` (`reservation_id`, `date_cancelled`, `reason`) VALUES
(16, '2018-07-07 02:00:44', ''),
(16, '2018-07-07 02:01:08', ''),
(16, '2018-07-07 02:02:06', 'sdasdsa');

-- --------------------------------------------------------

--
-- Table structure for table `booking_check`
--

CREATE TABLE `booking_check` (
  `reservation_id` int(11) NOT NULL,
  `check_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `check_out` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_discount`
--

CREATE TABLE `booking_discount` (
  `reservation_id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_expenses`
--

CREATE TABLE `booking_expenses` (
  `reservation_id` int(11) NOT NULL,
  `expense_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_rooms`
--

CREATE TABLE `booking_rooms` (
  `reservation_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_rooms`
--

INSERT INTO `booking_rooms` (`reservation_id`, `room_id`) VALUES
(7, 1),
(7, 3),
(8, 6),
(9, 6),
(10, 6),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(15, 1),
(15, 3),
(16, 5),
(16, 6),
(17, 2),
(17, 3),
(18, 2),
(18, 3),
(18, 4),
(19, 2),
(19, 3),
(19, 4),
(20, 2),
(21, 1),
(21, 1),
(21, 2),
(21, 2),
(21, 3),
(21, 3),
(22, 1),
(22, 2);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `first_name`, `last_name`, `contact_number`, `email`, `client_address`, `birthday`, `date_registered`) VALUES
(1, 'Rellie', 'Balagat', '1234567', 'relliebalagat@gmail.com', '86-a tandang sora', '1994-08-25', '2018-07-02 02:24:38'),
(2, 'Rellie', 'Balagat', '1234567', 'relliebalagat@gmail.com', '86-a tandang sora', '1994-08-25', '2018-07-02 02:29:06'),
(3, 'Rellie', 'Balagat', '1234567', 'relliebalagat@gmail.com', '86-a tandang sora', '1994-08-25', '2018-07-02 02:32:00'),
(4, 'Rellie', 'Balagat', '1234567', 'relliebalagat@gmail.com', '86-a tandang sora', '1994-08-25', '2018-07-02 02:32:14'),
(5, 'Rellie', 'Balagat', '1234567', 'relliebalagat@gmail.com', '86-a tandang sora', '1994-08-25', '2018-07-02 02:32:57'),
(6, 'Rellie', 'Balagat', '1234567', 'relliebalagat@gmail.com', '86-a tandang sora', '1994-08-25', '2018-07-02 02:33:36'),
(7, 'Rellie', 'Balagat', '1234567', 'relliebalagat@gmail.com', '86-a tandang sora', '1994-08-25', '2018-07-02 02:52:34'),
(8, 'Rellie', 'Balagat', '1123456', 'relliebalagat@gmail.com', '86-a tandang sora', '1994-08-25', '2018-07-02 04:15:03'),
(9, 'Rellie', 'Balagat', '1123456', 'relliebalagat@gmail.com', '86-a tandang sora', '1994-08-25', '2018-07-02 04:15:59'),
(10, 'Rellie', 'Balagat', '1123456', 'relliebalagat@gmail.com', '86-a tandang sora', '1994-08-25', '2018-07-02 04:18:12'),
(11, 'Botnog', 'Balagat', '1234567', 'botnog@gmail.com', '86-a tandang sora', '1994-01-25', '2018-07-02 07:14:16'),
(12, 'Botnog', 'Balagat', '1234567', 'botnog@gmail.com', '86-a tandang sora', '1994-01-25', '2018-07-02 07:36:31'),
(13, 'Botnog', 'Balagat', '1234567', 'botnog@gmail.com', '86-a tandang sora', '1994-01-25', '2018-07-02 07:37:23'),
(14, 'Rellie', 'Balagat', '1234556', 'relliebalagat@gmail.com', '86-a tandang sora', '1994-08-25', '2018-07-04 01:58:53'),
(15, 'Rellie', 'Balagat', '1234556', 'relliebalagat@gmail.com', '86-a tandang sora', '1994-08-25', '2018-07-04 01:59:50'),
(16, 'Juan', 'Dela Cruz', '1234567', 'jd@gmail.com', 'Quezon City Philippines', '2001-01-01', '2018-07-05 13:47:19'),
(17, 'Tandang', 'Sora', '1234567', 'ts@gmail.com', '1 Tandang Sora Avenue', '1991-01-01', '2018-07-07 04:15:17'),
(18, 'Gabriela', 'Silang', '1234567', 'gs@gmail.com', 'Gabriela St.', '1991-01-01', '2018-07-07 04:19:48'),
(19, 'Cherry', 'Balagat', '987654', 'cgr@gmail.com', '91 Tandang Sora', '1993-07-09', '2018-07-07 04:36:01'),
(20, 'Cherry', 'Balagat', '987654', 'cgr@gmail.com', '91 Tandang Sora', '1993-07-09', '2018-07-07 04:37:57'),
(21, 'Leand', 'Viray', '1234567', 'virayleand@gmail.com', 'marikina', '2000-08-01', '2018-07-14 06:38:20'),
(22, 'Juan Dela Cruz', 'Balagat', '123456', 'jd@gmail.com', 'qweqeqwe', '2000-01-01', '2018-07-14 06:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(50) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `person_count` int(11) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'Reservation',
  `status` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `reference_no`, `check_in`, `check_out`, `client_id`, `person_count`, `type`, `status`, `date_created`, `date_updated`) VALUES
(1, 'AMNZ-EEEB00D', '0000-00-00', '0000-00-00', 1, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 02:24:38', '2018-07-02 02:24:38'),
(2, 'AMNZ-C06852C', '2018-07-03', '2018-07-04', 2, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 02:29:07', '2018-07-02 02:29:07'),
(3, 'AMNZ-3B8A930', '2018-07-03', '2018-07-04', 3, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 02:32:00', '2018-07-02 02:32:00'),
(4, 'AMNZ-53B6F09', '2018-07-03', '2018-07-04', 4, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 02:32:15', '2018-07-02 02:32:15'),
(5, 'AMNZ-8BC9EDD', '2018-07-03', '2018-07-04', 5, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 02:32:57', '2018-07-02 02:32:57'),
(6, 'AMNZ-D13CA72', '2018-07-03', '2018-07-04', 6, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 02:33:37', '2018-07-02 02:33:37'),
(7, 'AMNZ-505645B', '2018-07-03', '2018-07-04', 7, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 02:52:35', '2018-07-02 02:52:35'),
(8, 'AMNZ-668CFE5', '2018-07-06', '2018-07-14', 8, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 04:15:04', '2018-07-02 04:15:04'),
(9, 'AMNZ-91AC2E2', '2018-07-06', '2018-07-14', 9, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 04:15:59', '2018-07-02 04:15:59'),
(10, 'AMNZ-FBA5D6D', '2018-07-06', '2018-07-14', 10, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 04:18:13', '2018-07-02 04:18:13'),
(11, 'AMNZ-FC5286F', '2018-08-05', '2018-08-14', 11, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 07:14:16', '2018-07-02 07:14:16'),
(12, 'AMNZ-47907E6', '2018-08-05', '2018-08-14', 12, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 07:36:31', '2018-07-02 07:36:31'),
(13, 'AMNZ-9D7FD9A', '2018-08-05', '2018-08-14', 13, 2, 'Reservation', 'FOR PAYMENT', '2018-07-02 07:37:23', '2018-07-02 07:37:23'),
(14, 'AMNZ-C9A96FD', '2018-07-07', '2018-07-14', 14, 4, 'Reservation', 'FOR PAYMENT', '2018-07-04 01:58:53', '2018-07-04 01:58:53'),
(15, 'AMNZ-98EE1FB', '2018-07-07', '2018-07-14', 15, 4, 'Reservation', 'FOR PAYMENT', '2018-07-04 01:59:50', '2018-07-04 01:59:50'),
(16, 'AMNZ-5BDA757', '2018-08-09', '2018-08-11', 16, 3, 'Reservation', 'CANCELLED', '2018-07-05 13:47:20', '2018-07-07 02:02:06'),
(17, 'AMNZ-906F738', '2018-07-13', '2018-07-14', 17, 4, 'Reservation', 'FOR PAYMENT', '2018-07-07 04:15:17', '2018-07-07 04:15:17'),
(18, 'AMNZ-E2409F7', '2018-07-08', '2018-07-09', 18, 4, 'Reservation', 'FOR PAYMENT', '2018-07-07 04:19:48', '2018-07-07 04:19:48'),
(19, 'AMNZ-8A2D130', '2018-07-08', '2018-07-09', 19, 5, 'Reservation', 'FOR PAYMENT', '2018-07-07 04:36:01', '2018-07-07 04:36:01'),
(20, 'AMNZ-8A80BD9', '0000-00-00', '0000-00-00', 20, 5, 'Reservation', 'FOR PAYMENT', '2018-07-07 04:37:57', '2018-07-07 06:44:55'),
(21, 'AMNZ-974DE63', '2018-08-03', '2018-08-04', 21, 5, 'Reservation', 'FOR PAYMENT', '2018-07-14 06:38:20', '2018-07-14 06:38:20'),
(22, 'AMNZ-107A0E0', '2018-08-03', '2018-08-04', 22, 3, 'Reservation', 'FOR PAYMENT', '2018-07-14 06:52:56', '2018-07-14 06:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `simple_description` varchar(255) NOT NULL,
  `capacity` int(1) NOT NULL,
  `rate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `type`, `description`, `simple_description`, `capacity`, `rate`) VALUES
(1, 'Standard Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, '1650.00'),
(2, 'Standard Deluxe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 2, '2400.00'),
(3, 'Deluxe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.', 2, '3200.00'),
(4, 'Superior Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', ' Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.', 2, '3500.00'),
(5, 'Executive Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4, '4200.00'),
(6, 'VIP Beach Front', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4, '4900.00');

-- --------------------------------------------------------

--
-- Table structure for table `room_status`
--

CREATE TABLE `room_status` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_status`
--

INSERT INTO `room_status` (`id`, `room_id`, `status_id`) VALUES
(1, 6, 1),
(2, 5, 1),
(3, 3, 1),
(4, 5, 1),
(6, 1, 1),
(7, 2, 1),
(8, 4, 1),
(9, 2, 1),
(10, 6, 1),
(11, 2, 1),
(12, 2, 1),
(13, 1, 1),
(14, 1, 1),
(15, 2, 1),
(16, 3, 1),
(17, 2, 1),
(18, 3, 1),
(19, 2, 1),
(20, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Available'),
(2, 'Occupied'),
(3, 'Cleaning'),
(4, 'Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `rating` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `full_name`, `email`, `comment`, `rating`) VALUES
(0, 'Rellie Balagat', 'relliebalagat@gmail.com', 'Maganda ang beach', '5');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `change` decimal(10,2) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_cancelled`
--
ALTER TABLE `booking_cancelled`
  ADD KEY `booking_cancelled_fk0` (`reservation_id`);

--
-- Indexes for table `booking_check`
--
ALTER TABLE `booking_check`
  ADD KEY `booking_check_fk0` (`reservation_id`);

--
-- Indexes for table `booking_discount`
--
ALTER TABLE `booking_discount`
  ADD KEY `booking_discount_fk0` (`reservation_id`),
  ADD KEY `booking_discount_fk1` (`discount_id`);

--
-- Indexes for table `booking_expenses`
--
ALTER TABLE `booking_expenses`
  ADD KEY `booking_expenses_fk0` (`reservation_id`),
  ADD KEY `booking_expenses_fk1` (`expense_id`);

--
-- Indexes for table `booking_rooms`
--
ALTER TABLE `booking_rooms`
  ADD KEY `reservation_id` (`reservation_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_fk0` (`client_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_status`
--
ALTER TABLE `room_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_status_fk0` (`room_id`),
  ADD KEY `room_status_fk1` (`status_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_fk0` (`reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_status`
--
ALTER TABLE `room_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_cancelled`
--
ALTER TABLE `booking_cancelled`
  ADD CONSTRAINT `booking_cancelled_fk0` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`);

--
-- Constraints for table `booking_check`
--
ALTER TABLE `booking_check`
  ADD CONSTRAINT `booking_check_fk0` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`);

--
-- Constraints for table `booking_discount`
--
ALTER TABLE `booking_discount`
  ADD CONSTRAINT `booking_discount_fk0` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`),
  ADD CONSTRAINT `booking_discount_fk1` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`id`);

--
-- Constraints for table `booking_expenses`
--
ALTER TABLE `booking_expenses`
  ADD CONSTRAINT `booking_expenses_fk0` FOREIGN KEY (`reservation_id`) REFERENCES `transaction` (`id`),
  ADD CONSTRAINT `booking_expenses_fk1` FOREIGN KEY (`expense_id`) REFERENCES `expenses` (`id`);

--
-- Constraints for table `booking_rooms`
--
ALTER TABLE `booking_rooms`
  ADD CONSTRAINT `booking_rooms_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`),
  ADD CONSTRAINT `booking_rooms_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_fk0` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Constraints for table `room_status`
--
ALTER TABLE `room_status`
  ADD CONSTRAINT `room_status_fk0` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
  ADD CONSTRAINT `room_status_fk1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_fk0` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

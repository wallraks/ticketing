-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 02:51 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticketing`
--

CREATE TABLE `ticketing` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `verified_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticketing`
--

INSERT INTO `ticketing` (`id`, `name`, `code`, `status`, `amount`, `type`, `phone`, `verified_by`) VALUES
(1, 'Samira  ', '4FQSS7', 'Used', '1,500', 'Advance Ticket', 2147483647, ''),
(2, 'Samira  ', '4FQSS7', 'Used', '1,500', 'Advance Ticket', 2147483647, ''),
(3, 'Eunice   Kaaria', 'W8YH9H', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(4, 'Eunice   Kaaria', 'RRBXZ9', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(5, 'Eunice   Kaaria', 'NASZ4H', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(6, 'Eunice   Kaaria', '4MFZ3R', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(7, 'Eunice   Kaaria', 'TBASVG', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(8, 'Eunice   Kaaria', 'G6DXSJ', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(9, 'Eunice   Kaaria', 'BQYX5N', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(10, 'Martin  Dean.', 'W5M646', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(11, 'Martin  Dean.', '3N6WXZ', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(12, 'Martin  Dean.', '5Y6QEK', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(13, 'Martin  Dean.', 'N2YT7N', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(14, 'Martin  Dean.', 'CU2DDR', 'Used', '1,500', 'Advance Ticket', 2147483647, ''),
(15, 'Martin  Dean.', 'UDMRQ6', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(16, 'Martin  Dean.', 'ZPJHGR', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(17, 'Samantha  Koskey', 'QSFWGF', 'Active', '1,500', 'Advance Ticket', 2147483647, ''),
(18, 'Fatuma  Siko', 'ZBQT9Z', 'Active', '1,500', 'Advance Ticket', 2147483647, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `active`) VALUES
(1, 'tit', 'tity@gmail.com', 'titi', 0),
(2, 'kev', 'kev@gmail.com', 'kev', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ticketing`
--
ALTER TABLE `ticketing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticketing`
--
ALTER TABLE `ticketing`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

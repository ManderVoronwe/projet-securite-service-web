-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2016 at 11:24 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `r_id` int(6) UNSIGNED NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `r_address` varchar(100) NOT NULL,
  `r_by` int(50) DEFAULT NULL,
  `r_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`r_id`, `r_name`, `r_address`, `r_by`, `r_date`) VALUES
(14, 'Tim Hortance (John)', '12 Dundas St', 9, '2016-02-12 09:56:39'),
(15, 'McDonalds (John)', 'Queen St', 9, '2016-02-12 09:58:51'),
(16, 'Wendys', 'Kings Street', 9, '2016-02-12 10:00:11'),
(17, 'Harveys (John)', 'Oxford Street', 9, '2016-02-12 10:01:43'),
(18, 'Tim Hortance (Smith)', 'Toronto', 10, '2016-02-12 10:05:48'),
(19, 'McDonalds(Smith)', '3333 Dundas st', 10, '2016-02-12 10:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `re_id` int(6) UNSIGNED NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `r_address` varchar(100) NOT NULL,
  `review` varchar(500) NOT NULL,
  `r_by` int(50) DEFAULT NULL,
  `re_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`re_id`, `r_name`, `r_address`, `review`, `r_by`, `re_date`) VALUES
(17, 'Tim Hortance (John)', '12 Dundas St', 'Review 1 from John', 9, '2016-02-12 09:56:39'),
(18, 'Tim Hortance (John)', '12 Dundas St', 'Review 2 from John', 9, '2016-02-12 09:57:44'),
(19, 'Tim Hortance (John)', '12 Dundas St', 'Review no 3 from John', 9, '2016-02-12 09:58:06'),
(20, 'McDonalds (John)', 'Queen St', 'Excellent from John', 9, '2016-02-12 09:58:51'),
(21, 'McDonalds (John)', 'Queen St', 'Not Bad from John', 9, '2016-02-12 09:59:06'),
(22, 'McDonalds (John)', 'Queen St', 'Awesome from John', 9, '2016-02-12 09:59:21'),
(23, 'Wendys', 'Kings Street', 'Review 1 John', 9, '2016-02-12 10:00:11'),
(24, 'Wendys', 'Kings Street', 'Review 2 from John', 9, '2016-02-12 10:00:27'),
(25, 'Wendys', 'Kings Street', 'Review 2 for Wendys, John', 9, '2016-02-12 10:00:44'),
(26, 'Harveys (John)', 'Oxford Street', 'Review for harveys from John', 9, '2016-02-12 10:01:43'),
(27, 'Harveys (John)', 'Oxford Street', 'Review 2 for harveys from John', 9, '2016-02-12 10:02:05'),
(28, 'Tim Hortance (Smith)', 'Toronto', 'Best review from smith', 10, '2016-02-12 10:05:48'),
(29, 'Tim Hortance (Smith)', 'Toronto', 'review 1 from smith', 10, '2016-02-12 10:06:13'),
(30, 'McDonalds(Smith)', '3333 Dundas st', 'review 3', 10, '2016-02-12 10:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(6) UNSIGNED NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_password` varchar(30) NOT NULL,
  `u_email` varchar(50) DEFAULT NULL,
  `u_reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_password`, `u_email`, `u_reg_date`) VALUES
(9, 'John', 'qwerty', 'john@gmail.com', '2016-02-12 09:50:53'),
(10, 'Smith', 'asdf', 'smith@gmail.com', '2016-02-12 10:03:28'),
(11, 'Sam ', 'test', 'sam@gmail.com', '2016-02-12 10:07:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`re_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `r_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `re_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 08:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `Addr` varchar(30) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `ema` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `name`, `Addr`, `NIC`, `ema`, `username`, `password`) VALUES
(1, 'sarafath', 'sainthamruthu', '992271582V', 'saraf4545@gmail.com', 'saraf', '123'),
(5, 'zifan', 'gfuifh', '2000430308', 'dapeli1407@pubpng.co', 'zifaaam', '123');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bk_id` int(10) NOT NULL,
  `bu_no` varchar(30) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `m_no` int(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `depart` varchar(30) DEFAULT NULL,
  `arrive` varchar(30) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bk_id`, `bu_no`, `name`, `m_no`, `email`, `depart`, `arrive`, `s_id`, `b_id`) VALUES
(1, '', 'sarafath', 765760556, 'saraf4545@gmail.com', 'galle', 'colombo', 9, NULL),
(2, '', 'zifan', 767788991, 'dapeli1407@pubpng.com', 'galle', 'colombo', 5, NULL),
(3, '', 'saju', 763686309, '', 'galle', 'colombo', 36, NULL),
(4, 'IN-0094', 'hAS', 755889999, 'fffssss@gmail.com', 'galle', 'colombo', 4, NULL),
(5, 'IN-0094', 'Rasleen Mohamed Sara', 752422582, 'hy@gmail.com', 'galle', 'colombo', 24, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `b_id` int(10) NOT NULL,
  `b_no` varchar(10) NOT NULL,
  `T_name` varchar(30) NOT NULL,
  `seat` int(50) NOT NULL,
  `fromb` varchar(20) NOT NULL,
  `too` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`b_id`, `b_no`, `T_name`, `seat`, `fromb`, `too`, `price`, `date`) VALUES
(7, 'TT-4076', 'Zifan Travels', 50, 'kalmunai', 'colombo', 2500, '2023-06-21'),
(8, 'TT-4075', 'joon travels', 50, 'colombo', 'kalmunai', 2500, '2023-06-08'),
(9, 'KK-6677', 'Sarr Travels', 50, 'colombo', 'galle', 1500, '2023-06-22'),
(10, 'MM-0002', 'Soo Travels', 50, 'kalmunai', 'galle', 2200, '2023-06-23'),
(11, 'IN-0094', 'Ins Travels', 50, 'galle', 'colombo', 1500, '2023-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `s_id` int(11) NOT NULL,
  `s_no` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `b_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`s_id`, `s_no`, `status`, `b_id`, `date`) VALUES
(1, NULL, 1, NULL, '0000-00-00'),
(2, NULL, 1, NULL, '0000-00-00'),
(3, NULL, 1, NULL, '0000-00-00'),
(4, NULL, 1, NULL, '0000-00-00'),
(5, NULL, 1, NULL, '0000-00-00'),
(6, NULL, 1, NULL, '0000-00-00'),
(7, NULL, 1, NULL, '0000-00-00'),
(8, NULL, 1, NULL, '0000-00-00'),
(9, NULL, 1, NULL, '0000-00-00'),
(10, NULL, 1, NULL, '0000-00-00'),
(11, NULL, 1, NULL, '0000-00-00'),
(12, NULL, 1, NULL, '0000-00-00'),
(13, NULL, 1, NULL, '0000-00-00'),
(14, NULL, 1, NULL, '0000-00-00'),
(15, NULL, 1, NULL, '0000-00-00'),
(16, NULL, 1, NULL, '0000-00-00'),
(17, NULL, 1, NULL, '0000-00-00'),
(18, NULL, 1, NULL, '0000-00-00'),
(19, NULL, 1, NULL, '0000-00-00'),
(20, NULL, 1, NULL, '0000-00-00'),
(21, NULL, 1, NULL, '0000-00-00'),
(22, NULL, 1, NULL, '0000-00-00'),
(23, NULL, 1, NULL, '0000-00-00'),
(24, NULL, 1, NULL, '0000-00-00'),
(25, NULL, 1, NULL, '0000-00-00'),
(26, NULL, 1, NULL, '0000-00-00'),
(27, NULL, 1, NULL, '0000-00-00'),
(28, NULL, 1, NULL, '0000-00-00'),
(29, NULL, 1, NULL, '0000-00-00'),
(30, NULL, 1, NULL, '0000-00-00'),
(31, NULL, 1, NULL, '0000-00-00'),
(32, NULL, 1, NULL, '0000-00-00'),
(33, NULL, 1, NULL, '0000-00-00'),
(34, NULL, 1, NULL, '0000-00-00'),
(35, NULL, 1, NULL, '0000-00-00'),
(36, NULL, 1, NULL, '0000-00-00'),
(37, NULL, 1, NULL, '0000-00-00'),
(38, NULL, 1, NULL, '0000-00-00'),
(39, NULL, 1, NULL, '0000-00-00'),
(40, NULL, 1, NULL, '0000-00-00'),
(41, NULL, 1, NULL, '0000-00-00'),
(42, NULL, 1, NULL, '0000-00-00'),
(43, NULL, 1, NULL, '0000-00-00'),
(44, NULL, 1, NULL, '0000-00-00'),
(45, NULL, 1, NULL, '0000-00-00'),
(46, NULL, 1, NULL, '0000-00-00'),
(47, NULL, 1, NULL, '0000-00-00'),
(48, NULL, 1, NULL, '0000-00-00'),
(49, NULL, 1, NULL, '0000-00-00'),
(50, NULL, 1, NULL, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bk_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `b_id` (`b_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bk_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `seats` (`s_id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`b_id`) REFERENCES `seats` (`b_id`);

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `buses` (`b_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

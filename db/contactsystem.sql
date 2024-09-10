-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 09:35 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contactsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactlist`
--

CREATE TABLE `tbl_contactlist` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `company` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contactlist`
--

INSERT INTO `tbl_contactlist` (`id`, `name`, `company`, `phone`, `email`, `type`) VALUES
(2, 'johnny bravo', 'clever', '12341234', 'johnny@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(3, 'bravo', 'clever', '12341234', 'bravo@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(4, 'quinz', 'wipro', '12341234', 'quinz@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(5, 'jennyz', 'clever', '12341234', 'jenny@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(7, 'bravozZing', 'clever', '12341234', 'bravo@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(8, 'quinzz', 'wipro', '12341234', 'quinz@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(9, 'setset', 'set', 'setset', 'setset', 'c4ca4238a0b923820dcc509a6f75849b'),
(11, 'verify', 'test', 'serser', 'serser', '1722499728123456789066ab4290b3c9f'),
(12, 'master of maseter', 'test company', '123123123', 'test@mail.com', '1722499728123456789066ab4290b3c9f'),
(13, 'evemil d berdin', 'company', '123123123', 'evemilberdin@mailing.com', '1722501399123456789066ab49178eb5c'),
(15, 'evemilsss', 'test companys', '12312312s', 'evemilberdin@mailing.coms', '1722503122123456789066ab4fd27b847'),
(16, 'test 2', 'test company', '0912345', 'test email', '1722503122123456789066ab4fd27b847');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password`, `user_type`, `email`) VALUES
(36, 'admin', '202cb962ac59075b964b07152d234b70', 'c4ca4238a0b923820dcc509a6f75849b', 'evemilberdin@gmail.com'),
(45, 'colors', '202cb962ac59075b964b07152d234b70', '1722498718123456789066ab3e9e8a3c2', 'evemilberdin@yahoo.com'),
(46, 'ease', '202cb962ac59075b964b07152d234b70', '1722499728123456789066ab4290b3c9f', 'evemil.berdin@gmail.com'),
(50, 'skiny mey', '202cb962ac59075b964b07152d234b70', '1722501399123456789066ab49178eb5c', 'skiny@gmail.com'),
(51, 'fdc', '202cb962ac59075b964b07152d234b70', '1722503122123456789066ab4fd27b847', 'fdc@gmail.com'),
(52, 'fdc2', '202cb962ac59075b964b07152d234b70', '1722503228123456789066ab503ca5249', 'fdc2@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contactlist`
--
ALTER TABLE `tbl_contactlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contactlist`
--
ALTER TABLE `tbl_contactlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 06:33 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_panel`
--

CREATE TABLE `admin_panel` (
  `id` int(10) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `post` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_panel`
--

INSERT INTO `admin_panel` (`id`, `date_time`, `title`, `category`, `author`, `image`, `post`) VALUES
(8, 'April 23, 2019 09:31:41', 'Dragon Ball Super 2018 Movie Official Teaser', 'Math', 'Kartik Nayak', '', 'Guys this is my instant redhhsaction video, Iâ€™ll keep it short and come back with a breakdown real soon! Subscribe if you donâ€™t want to miss that!\r\n\r\nThis teaser shows us a completely new style of Dragon Ball animation! Canâ€™t completely judge it without watching more, but first impression, Iâ€™m impressed, Iâ€™m sold for now.\r\n\r\nIt looks fun, it looks really fluid, I mean this is what you want for an action dominant anime like Dragon Ball. I have a feeling the fights will be super smooth, and greater than ever before.\r\n\r\nAnd oh my god, the character tease is out of the world amazing!                                     '),
(9, 'April 23, 2019 10:00:25', 'Art ', 'Art', 'Kartik Nayak', '614743.png', 'This is art ');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `date_time` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `author` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `date_time`, `name`, `author`) VALUES
(23, 'April 20, 2019 20:43:39', 'Art', 'Kartik Nayak'),
(24, 'April 20, 2019 20:43:43', 'Science', 'Kartik Nayak'),
(27, 'April 20, 2019 20:44:43', 'Finance', 'Kartik Nayak'),
(28, 'April 20, 2019 20:44:55', 'Math', 'Kartik Nayak'),
(100, 'April 20, 2019 20:43:55', 'Pathology', 'Kartik Nayak');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(100) NOT NULL,
  `date_time` varchar(70) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `date_time`, `username`, `password`) VALUES
(3, 'November 15, 2018 15:55:07', 'Kartik', '16'),
(8, 'April 21, 2019 00:10:41', 'shanks', '12'),
(9, 'April 21, 2019 00:10:56', 'Archie', '12'),
(11, 'April 21, 2019 00:43:32', 'Danny', '12'),
(12, 'April 21, 2019 00:44:06', 'Eli', '12'),
(14, 'April 21, 2019 00:44:28', 'Jake', '12'),
(15, 'April 22, 2019 11:13:08', 'Anuj', '16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_panel`
--
ALTER TABLE `admin_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_panel`
--
ALTER TABLE `admin_panel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2018 at 06:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `b_id` int(11) NOT NULL,
  `u_id` int(30) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `accepted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`b_id`, `u_id`, `p_id`, `amount`, `date`, `accepted`) VALUES
(1, 2, 3, 27, '2018-12-16 00:00:00', 0),
(2, 2, 12, 410, '2018-12-16 00:00:00', 0),
(3, 2, 12, 450, '2018-12-17 00:00:00', 0),
(4, 2, 12, 500, '2018-12-17 00:00:01', 0),
(5, 2, 3, 50, '2018-12-14 00:00:00', 0),
(6, 1, 7, 666, '2018-12-16 10:20:49', 0),
(7, 1, 15, 50, '2018-12-16 10:24:21', 1),
(8, 1, 7, 555, '2018-12-16 10:26:37', 0),
(9, 2, 5, 70, '2018-12-22 16:17:50', 1),
(10, 1, 7, 700, '2018-12-22 18:19:17', 0),
(12, 1, 7, 800, '2018-12-22 18:27:42', 0),
(13, 1, 7, 900, '2018-12-22 18:37:57', 0),
(14, 3, 7, 420, '2018-12-22 22:07:41', 0),
(15, 2, 18, 80, '2018-12-23 13:09:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `name`) VALUES
(1, 'PC'),
(2, 'Books'),
(3, 'Furniture'),
(4, 'Hardware'),
(5, 'Lifestyle');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `u_id` int(20) DEFAULT NULL,
  `p_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `category` int(10) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `sold` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`u_id`, `p_id`, `name`, `description`, `category`, `price`, `date`, `sold`) VALUES
(1, 2, 'Dell Laptop', 'Core i5 processor, good graphics', 1, 20, '2018-12-14 12:56:07', 'No'),
(1, 3, 'Asus Laptop', 'Core i3 processor, good graphics', 1, 25, '2018-12-14 12:56:28', 'No'),
(1, 5, 'MSI Laptop', 'Core i7 processor, good graphics', 1, 65, '2018-12-14 13:15:23', 'Yes'),
(2, 7, 'Rare book', 'Written by Einstein', 2, 400, '2018-12-14 13:25:49', 'No'),
(1, 12, 'Sofa', 'Old but good condition', 3, 420, '2018-12-15 17:08:48', 'No'),
(1, 13, 'Recliner', 'Bomb as shit', 3, 22, '2018-12-15 17:16:45', 'No'),
(1, 14, 'Pliers', 'Cheap but effective pliars', 4, 44, '2018-12-15 18:14:04', 'No'),
(2, 15, 'General Math', 'Nyc math hmm', 2, 34, '2018-12-15 19:22:54', 'Yes'),
(1, 16, 'Soldering Iron', 'used but in good condition', 4, 22, '2018-12-22 19:19:08', 'No'),
(3, 17, 'Antique table', 'Made of maplewood', 3, 444, '2018-12-22 22:02:10', 'No'),
(8, 18, 'Shelf', 'Bought from India', 3, 100, '2018-12-23 13:09:06', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `age`, `gender`, `address`) VALUES
(1, 'Sohel@gmail.com', '1234', 123, 'Male', 'Badda'),
(2, 'Nahiyan@gmail.com', '6789', 321, 'Female', 'Bashundhara'),
(3, 'Dulal', 'abcde', 22, 'Male', 'Dhanmondi'),
(8, 'Sohel2@gmail.com', 'carcarcar', 22, 'Male', 'Dhanmondi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

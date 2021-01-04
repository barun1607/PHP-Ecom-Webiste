-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 12:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `uid`) VALUES
(1, 1),
(3, 9),
(4, 10),
(5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `cart_contents`
--

CREATE TABLE `cart_contents` (
  `did` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `number` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_contents`
--

INSERT INTO `cart_contents` (`did`, `cid`, `pid`, `number`) VALUES
(1, 1, 4, 1),
(3, 1, 12, 1),
(4, 1, 2, 1),
(5, 5, 1, 1),
(6, 5, 9, 1),
(7, 3, 4, 1),
(8, 3, 2, 1),
(9, 3, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `pname` varchar(25) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `path` varchar(50) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `price`, `path`, `type`, `description`) VALUES
(1, 'Hypertophy Focus ', '3000.00', 'assets/img/img-2.jpg', 'workout', 'This workout is geared towards muscle gain. Meant for intermediate and advanced lifters.'),
(2, 'Strength Builder', '1500.00', 'assets/img/img-pl.png', 'workout', 'A workout focused on powerlifting. Meant for beginners.'),
(3, 'Max Shredded', '3500.00', 'assets/img/img-4.jpg', 'workout', 'A workout focused on losing as much fat as possible. Meant for advanced lifters.'),
(4, 'Bodyweight Warrior', '2000.00', 'assets/img/img-5.jpeg', 'workout', 'A comprising only of bodyweight exercises with zero equipment. Meant for intermediate lifters.'),
(5, 'Keto Diet', '500.00', 'assets/img/keto.jpg', 'diet', 'A high fat diet meant to reduce body fat percentage through ketosis. '),
(6, 'Vegan Diet', '400.00', 'assets/img/vegan.jpg', 'diet', 'A gluten-free, no animal product muscle building diet.'),
(7, 'Bulking diet', '600.00', 'assets/img/bulk.jpg', 'diet', 'A diet meant to promote weight gain in bodybuilders and powerlifters'),
(8, 'High Performance Diet', '400.00', 'assets/img/highcarb.jpg', 'diet', 'A carbohydrate and protein rich meant for athletes with very high activity levels.'),
(9, 'Whey Protein', '2000.00', 'assets/img/whey.jpg', 'supplement', 'Standard whey protein powder.'),
(10, 'Casein Protein', '2000.00', 'assets/img/casein.jpg', 'supplement', 'Standard casein protein powder.'),
(11, 'Soy Protein', '2000.00', 'assets/img/soy.jpg', 'supplement', 'Vegan soy protein powder.'),
(12, 'Creatine', '2000.00', 'assets/img/creatine.jpg', 'supplement', 'Creatine monohydrate powder.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(35) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `email`, `pass`) VALUES
(1, 'admin', 'admin@gmail.com', 'password'),
(9, 'Varun', 'var@p.com', 'password123'),
(10, 'Barun', 'var@p.com', 'varunp2000'),
(11, 'VarunP', 'varun@gmail.com', 'password345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `cart_contents`
--
ALTER TABLE `cart_contents`
  ADD PRIMARY KEY (`did`),
  ADD KEY `cid` (`cid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_contents`
--
ALTER TABLE `cart_contents`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `cart_contents`
--
ALTER TABLE `cart_contents`
  ADD CONSTRAINT `cart_contents_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `cart` (`cid`),
  ADD CONSTRAINT `cart_contents_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `products` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

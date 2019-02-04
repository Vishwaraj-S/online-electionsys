-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 07:12 AM
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
-- Database: `sepro`
--

-- --------------------------------------------------------

--
-- Table structure for table `anouncement`
--

CREATE TABLE `anouncement` (
  `sno` int(11) NOT NULL,
  `line` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anouncement`
--

INSERT INTO `anouncement` (`sno`, `line`) VALUES
(1, '22-04-2018(11:35:45pm) :The voting for position Mess Secretary is now open.'),
(2, '22-04-2018(11:35:49pm) :The voting for position Sports Secretary is now open.'),
(3, '22-04-2018(11:35:53pm) :The voting for position General Secretary is now open.'),
(4, '22-04-2018(11:35:56pm) :The voting for position Mess Secretary is now closed.'),
(5, '22-04-2018(11:35:59pm) :The voting for position Sports Secretary is now closed.'),
(6, '22-04-2018(11:35:59pm) :The voting for position Sports Secretary is now closed.'),
(7, '22-04-2018(11:36:03pm) :The voting for position General Secretary is now closed.'),
(8, '22-04-2018(11:36:11pm) :The voting for position Mess Secretary is now open.'),
(9, '22-04-2018(11:36:14pm) :The voting for position Sports Secretary is now open.'),
(10, '25-04-2018(10:28:04pm) :The voting for position Sports Secretary is now closed.'),
(11, '25-04-2018(10:28:10pm) :The voting for position Mess Secretary is now closed.'),
(12, 'Vishwaraj Singh(vrajpoot47@gmail.com) is the winner for election:\"Mess Secretary\".'),
(13, 'Vishwaraj Singh(vrajpoot47@gmail.com) is the winner for election:\"Mess Secretary\".'),
(14, 'Vishwaraj Singh(vrajpoot47@gmail.com) is the winner for election:\"Mess Secretary\".'),
(15, 'Vishwaraj Singh(vrajpoot47@gmail.com) is the winner for election:\"Mess Secretary\".'),
(16, 'Vidit  Kavra(viditkavra98@gmail.com) is the winner for election:\"Sports Secretary\".'),
(17, 'Vishwaraj Singh(vrajpoot47@gmail.com) is the winner for election:\"Mess Secretary\".'),
(18, 'Vidit  Kavra(viditkavra98@gmail.com) is the winner for election:\"Sports Secretary\".'),
(19, 'Vishwaraj Singh(vishwarajsinghrajput@gmail.com) is the winner for election:\"General Secretary\".'),
(20, 'Vishwaraj Singh(vrajpoot47@gmail.com) is the winner for election:\"Mess Secretary\".'),
(21, 'Vidit  Kavra(viditkavra98@gmail.com) is the winner for election:\"Sports Secretary\".'),
(22, 'Vishwaraj Singh(vishwarajsinghrajput@gmail.com) is the winner for election:\"General Secretary\".'),
(23, 'Vishwaraj Singh(vrajpoot47@gmail.com) is the winner for election:\"Mess Secretary\".'),
(24, 'Vidit  Kavra(viditkavra98@gmail.com) is the winner for election:\"Sports Secretary\".'),
(25, 'Vidit  Kavra(viditkavra98@gmail.com) is the winner for election:\"Sports Secretary\".'),
(26, '25-04-2018(11:12:34pm)::Vishwaraj Singh(vrajpoot47@gmail.com) is the winner for election:\"Mess Secretary\".'),
(27, '25-04-2018(11:24:41pm) :The voting for position Mess Secretary is now open.'),
(28, '25-04-2018(11:24:54pm) :The voting for position Sports Secretary is now open.'),
(29, '25-04-2018(11:24:54pm) :The voting for position Sports Secretary is now open.'),
(30, '25-04-2018(11:24:57pm) :The voting for position General Secretary is now open.'),
(31, '25-04-2018(11:25:07pm) :The voting for position Mess Secretary is now closed.'),
(32, '25-04-2018(11:25:11pm) :The voting for position Sports Secretary is now closed.'),
(33, '25-04-2018(11:25:14pm) :The voting for position General Secretary is now closed.'),
(34, '25-04-2018(11:25:19pm) :The voting for position Mess Secretary is now open.'),
(35, '25-04-2018(11:30:53pm) :The voting for position General Secretary is now open.'),
(36, '25-04-2018(11:31:08pm) :The voting for position Sports Secretary is now open.'),
(37, '25-04-2018(11:31:23pm) :The voting for position Mess Secretary is now closed.'),
(38, '25-04-2018(11:31:31pm) :The voting for position Mess Secretary is now open.'),
(39, '25-04-2018(11:31:48pm) :The voting for position Mess Secretary is now closed.'),
(40, '05-05-2018(12:12:00pm) :The voting for position General Secretary is now closed.'),
(41, '05-05-2018(12:12:06pm) :The voting for position Sports Secretary is now closed.'),
(42, '05-05-2018(12:12:12pm)::Vidit  Kavra(viditkavra98@gmail.com) is the winner for election:\"Sports Secretary\".'),
(43, '05-05-2018(12:15:22pm) :The voting for position \"Mess Secretary\" is now open.'),
(44, '05-05-2018(12:15:35pm) :The voting for position \"Mess Secretary\" is now closed.'),
(45, '05-05-2018(12:20:24pm) :The voting for position \"Mess Secretary\" is now open.'),
(46, '23-05-2018(08:12:10am) :The voting for position \"Sports Secretary\" is now open.'),
(47, '23-05-2018(08:12:13am) :The voting for position \"General Secretary\" is now open.');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `sno` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `phno` varchar(10) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `election` varchar(50) DEFAULT NULL,
  `verified` int(11) DEFAULT '1',
  `vcount` int(11) DEFAULT '0',
  `sex` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`sno`, `fname`, `lname`, `phno`, `email`, `image`, `election`, `verified`, `vcount`, `sex`) VALUES
(1, 'Vishwaraj', 'Singh', '7309708982', 'vrajpoot47@gmail.com', 'candidates_img/1.jpg', '1', 1, 0, 'M'),
(2, 'Abhishek', 'Agrawal', '9452614064', 'reachabhishekag@gmail.com', 'candidates_img/2.jpg', '1', 1, 0, 'M'),
(3, 'Vidit ', 'Kavra', '8899412378', 'viditkavra98@gmail.com', 'candidates_img/3.jpg', '2', 1, 0, 'M'),
(4, 'Vishwaraj', 'Singh', '7309708982', 'vishwarajsinghrajput@gmail.com', 'candidates_img/4.jpg', '3', 1, 0, 'M'),
(5, 'Amol', 'Rastogi', '7897991291', 'amol6022@gmail.com', 'candidates_img/5.jpg', '1', 1, 0, 'M'),
(6, 'Shubham', 'Dixit', '9192939456', 'shubham.dixit@gmail.com', 'candidates_img/6.jpg', '2', 1, 0, 'M'),
(7, 'Priya', 'Singhania', '8126334556', 'priya9198@gmail.com', 'candidates_img/7.jpg', '3', 1, 0, 'M'),
(8, 'Arpit', 'Gupta', '8931245678', 'guptaarpit21@gmail.com', 'candidates_img/8.jpg', '2', 1, 0, 'M'),
(9, 'Shrey', 'Pandey', '9897343536', 'shreypandeyy@gmail.com', 'candidates_img/9.jpg', '3', 1, 0, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `sno` int(11) NOT NULL,
  `election` varchar(50) DEFAULT NULL,
  `active` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`sno`, `election`, `active`) VALUES
(1, 'Mess Secretary', 1),
(2, 'Sports Secretary', 1),
(3, 'General Secretary', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `usern` varchar(30) NOT NULL,
  `firstn` varchar(20) DEFAULT NULL,
  `lastn` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pass` varchar(35) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phno` varchar(10) NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `image` varchar(60) NOT NULL,
  `verified` int(11) DEFAULT '0',
  `vcast1` int(1) DEFAULT '0',
  `vcast2` int(1) DEFAULT '0',
  `vcast3` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `usern`, `firstn`, `lastn`, `dob`, `pass`, `email`, `phno`, `gender`, `image`, `verified`, `vcast1`, `vcast2`, `vcast3`) VALUES
(1, 'vishu_c', 'Vishwaraj', 'Singh', '1998-11-21', 'd7fb3c87b102ec5f1c8ddb51baeb4cbc', 'vrajpoot47@gmail.com', '7309708982', 'M', 'user_img/1.jpg', 1, 0, 0, 0),
(2, 'vidit_kavra', 'Vidit', 'Kavra', '1998-07-25', '2af9b1ba42dc5eb01743e6b3759b6e4b', 'viditkavra98@gmail.com', '8899412378', 'M', 'user_img/2.jpg', 1, 0, 0, 0),
(3, 'abhishek', 'Abhishek', 'Agrawal', '1996-12-08', '2af9b1ba42dc5eb01743e6b3759b6e4b', 'reachabhishekag@gmail.com', '9452614064', 'M', 'user_img/3.jpg', 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anouncement`
--
ALTER TABLE `anouncement`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anouncement`
--
ALTER TABLE `anouncement`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

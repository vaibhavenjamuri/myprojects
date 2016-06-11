-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2016 at 03:31 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `referencenum` varchar(8) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `mobilenumber` bigint(10) NOT NULL,
  `mailid` varchar(25) NOT NULL,
  `projectdetails` varchar(50) NOT NULL,
  `currentdate` date NOT NULL,
  `expecteddate` date NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`referencenum`, `firstname`, `lastname`, `mobilenumber`, `mailid`, `projectdetails`, `currentdate`, `expecteddate`, `status`) VALUES
('6mNKGV77', 'Jaya', 'Chandra', 9985612240, 'jay@ucmo.edu', 'Jaya Project', '2016-04-18', '2016-04-30', 'In Review'),
('81PAtN57', 'Manoj', 'Prabhakar', 6602386150, 'manoj@gmail.com', 'Manoj Project', '2016-04-18', '2016-04-30', 'Coding'),
('et8W4265', 'Yuthika', 'Bhashyam', 9945117329, 'yuthika@ucmo.edu', 'Yuhtika Project', '2016-04-18', '2016-04-29', 'Analysis'),
('mtQDo925', 'Sravya', 'Gogineni', 6602386105, 'sravya@ucmo.edu', 'Sravya Project', '2016-04-18', '2016-04-30', 'Design'),
('RC1bB759', 'Amar', 'Sandra', 9000370992, 'amar@gmail.com', 'Amar Project', '2016-04-18', '2016-04-30', 'Testing'),
('RuMyDL1S', 'Sandya', 'Rasineni', 9000595770, 'sandy@ucmo.edu', 'Sandya Project', '2016-04-18', '2016-04-19', 'Deployment'),
('rxr04186', 'Ram', 'Manohar', 6602386382, 'ram@gmail.com', 'ram project', '2016-04-11', '2016-04-21', 'Coding'),
('rxr04187', 'Sudha', 'Priya', 9000595774, 'sudha@gmail.com', 'Sudha project', '2016-04-15', '2016-04-25', 'review'),
('rxr04188', 'Keerthi', 'Surya', 9000595775, 'surya@gmail.com', 'Surya', '2016-04-19', '2016-04-26', 'Testing'),
('SL6T7Bx8', 'Nitin', 'Gogineni', 8123356324, 'nitin@ucmo.edu', 'Nitin Project', '2016-04-18', '2016-04-22', 'In Review');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`referencenum`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

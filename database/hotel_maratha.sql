-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2020 at 04:31 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_maratha`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookedroom`
--

DROP TABLE IF EXISTS `bookedroom`;
CREATE TABLE IF NOT EXISTS `bookedroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomNumber` varchar(20) NOT NULL,
  `checkIn` varchar(50) NOT NULL,
  `checkOut` varchar(50) NOT NULL,
  `price` varchar(30) NOT NULL,
  `stat` varchar(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addrs` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `Messages` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Name`, `Email`, `Mobile`, `Messages`) VALUES
('amar', 'londheamar143', '7304141015', 'hi.....');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `Fname` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_detail`
--

DROP TABLE IF EXISTS `room_detail`;
CREATE TABLE IF NOT EXISTS `room_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` varchar(255) DEFAULT NULL,
  `room_name` varchar(255) DEFAULT NULL,
  `room_type` varchar(255) DEFAULT NULL,
  `room_image` varchar(255) DEFAULT NULL,
  `room_price` int(11) DEFAULT NULL,
  `room_seats` varchar(255) DEFAULT NULL,
  `room_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_detail`
--

INSERT INTO `room_detail` (`id`, `room_number`, `room_name`, `room_type`, `room_image`, `room_price`, `room_seats`, `room_status`) VALUES
(1, 'HM0017010', 'Deluxe-Room-Single', NULL, 'image/Deluxe-Room-Single.jpg', 7000, '2', 'Available'),
(2, 'HM0017011', 'Deluxe-Room-Double', NULL, 'image/Executive_room.jpg', 10000, '3', 'Available'),
(3, 'HM0017012', 'Suite-Double-Room', NULL, 'image/Suite-Single-Room.jpg', 12000, '2', 'Available'),
(4, 'HM0017013', 'Suite-Living-Room', NULL, 'image/suite-Living-Room.jpg', 10000, '2', 'Available'),
(7, 'HM0017016', 'smart saver room double', NULL, 'image/smart-saver-room-double.jpg', 10000, '3', 'Available');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

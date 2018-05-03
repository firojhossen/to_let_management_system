-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2018 at 07:47 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_home`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'firoj@gmail.com', '321654');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`) VALUES
(1, 'Dhaka'),
(2, 'Faridpur'),
(3, 'Gazipur'),
(4, 'Gopalgonj'),
(5, 'Jamalpur'),
(6, 'Kishoregonj'),
(7, 'Madaripur'),
(8, 'Manikgonj'),
(9, 'Munshigonj'),
(10, 'Mymensingh'),
(11, 'Narayangonj'),
(12, 'Narsingdi '),
(13, 'Netrakona'),
(14, 'Rajbari'),
(15, 'Shariatpur'),
(16, 'Sherpur'),
(17, 'Tangail'),
(18, 'Dinajpur'),
(19, 'Gaibandha'),
(20, 'Kurigram'),
(21, 'Lalmonirhat'),
(22, 'NIlphamari'),
(23, 'Panchagarh'),
(24, 'Rangpur'),
(25, 'Thakurgaon'),
(26, 'Habigonj'),
(27, 'Mauluvibazar'),
(28, 'Sunamgonj'),
(29, 'Sylhet'),
(30, 'Bogra'),
(31, 'Chapainababgonj'),
(32, 'Joypurhat'),
(33, 'Pabna'),
(34, 'Naogaon'),
(35, 'Natore'),
(36, 'Sirajgonj'),
(37, 'Rajshahi'),
(38, 'Bagerhat'),
(39, 'Chuadanga'),
(40, 'Jessore'),
(41, 'Jhenidah'),
(42, 'Khulna'),
(43, 'Kushtia'),
(44, 'Magura'),
(45, 'Meherpur'),
(46, 'Narail'),
(47, 'Satkhira'),
(48, 'Barguna'),
(49, 'Barishal'),
(50, 'Bhola'),
(51, 'Jhalokathi'),
(52, 'Patuakhali'),
(53, 'Pirojpur'),
(54, 'Bandarban'),
(55, 'Brahmanbaria'),
(56, 'Chandpur'),
(57, 'Chittagong'),
(58, 'Comilla'),
(59, 'Cox\'s Bazar'),
(60, 'Feni'),
(61, 'Khagrachhari'),
(62, 'Lakshmipur'),
(63, 'Noakhali'),
(64, 'Rangamati');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

DROP TABLE IF EXISTS `family`;
CREATE TABLE IF NOT EXISTS `family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `districts` int(11) NOT NULL,
  `upozillas` int(11) NOT NULL,
  `regions` varchar(50) NOT NULL,
  `ranges` varchar(5) NOT NULL,
  `descriptions` text NOT NULL,
  `mobiles` varchar(15) NOT NULL,
  `emails` varchar(50) NOT NULL,
  `user_ids` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`id`, `districts`, `upozillas`, `regions`, `ranges`, `descriptions`, `mobiles`, `emails`, `user_ids`, `date_time`) VALUES
(23, 1, 5, 'Nababgonj', '0 km', 'poribarer jonno ekti 2 room bisishto basa vara dea hoi be. Gas, electricity o panir su byabostha ace. khub sundor monorom poribeshe thakte parben apnara.', '017xxxxxxxxxx', 'raihan@gmail.com', 2, '2018-05-01 19:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fname`, `lname`, `phone`, `email`, `password`) VALUES
(1, 'Firoj', 'Hossen', 1767553062, 'firoj.cse@gmail.com', '123456789'),
(2, 'Firoj', 'Hossen', 1767553062, 'firoj@gmail.com', '123456789'),
(3, 'Raihan', 'Chowdhury', 1935291794, 'raihan@gmail.com', '321654');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `districts` int(11) NOT NULL,
  `upozillas` int(11) NOT NULL,
  `regions` varchar(50) NOT NULL,
  `ranges` varchar(11) NOT NULL,
  `descriptions` varchar(500) NOT NULL,
  `genders` varchar(50) NOT NULL,
  `mobiles` varchar(15) NOT NULL,
  `emails` varchar(50) NOT NULL,
  `user_ids` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `districts`, `upozillas`, `regions`, `ranges`, `descriptions`, `genders`, `mobiles`, `emails`, `user_ids`, `date_time`) VALUES
(5, 1, 6, 'Savar', '3 km', 'i downloaded the soure code.in the upload.php one file error in this ', 'male', '01326569887', 'firoj@gmail.com', 2, '2018-05-01 12:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `upozilla`
--

DROP TABLE IF EXISTS `upozilla`;
CREATE TABLE IF NOT EXISTS `upozilla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uponame` varchar(50) NOT NULL,
  `districtid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upozilla`
--

INSERT INTO `upozilla` (`id`, `uponame`, `districtid`) VALUES
(1, 'Kotoali', 1),
(2, 'Keranigonj', 1),
(3, 'Dohar', 1),
(4, 'Dhamrai', 1),
(5, 'Nababgonj', 1),
(6, 'Savar', 1),
(7, 'Sadar', 2),
(8, 'Boalmari', 2),
(9, 'Alphadanga', 2),
(10, 'Modhukhali', 2),
(11, 'Nagarkanda', 2),
(12, 'Chorvodrason', 2),
(13, 'Sadarpur', 2),
(14, 'Saltha', 2);

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

DROP TABLE IF EXISTS `village`;
CREATE TABLE IF NOT EXISTS `village` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `districtid` int(11) NOT NULL,
  `upozillaid` int(11) NOT NULL,
  `villname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

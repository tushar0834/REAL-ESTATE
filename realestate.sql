-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 17, 2020 at 08:56 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `username` varchar(50) NOT NULL,
  `location` varchar(20) NOT NULL,
  `payment` bigint DEFAULT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`username`, `location`, `payment`, `city`) VALUES
('apy', 'VRINDAVAN COLONY', 4591150053002526, 'LUCKNOW');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cardrent`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `cardrent`;
CREATE TABLE IF NOT EXISTS `cardrent` (
`flat_id` int
,`location` varchar(100)
,`city` varchar(100)
,`rent_amount` int
,`image` varchar(500)
,`time` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cardsale`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `cardsale`;
CREATE TABLE IF NOT EXISTS `cardsale` (
`flat_id` int
,`location` varchar(100)
,`city` varchar(100)
,`totalcost` double
,`image` varchar(500)
,`time` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `feedbackbuilder`
--

DROP TABLE IF EXISTS `feedbackbuilder`;
CREATE TABLE IF NOT EXISTS `feedbackbuilder` (
  `val` int NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `question` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbackuser`
--

DROP TABLE IF EXISTS `feedbackuser`;
CREATE TABLE IF NOT EXISTS `feedbackuser` (
  `val` int NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `question` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

DROP TABLE IF EXISTS `flat`;
CREATE TABLE IF NOT EXISTS `flat` (
  `flat_id` int NOT NULL AUTO_INCREMENT,
  `uid` int DEFAULT NULL,
  `bid` int DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `amenities` varchar(500) NOT NULL,
  `area` double NOT NULL,
  `image` varchar(500) NOT NULL,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `image3` varchar(500) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`flat_id`),
  UNIQUE KEY `address` (`location`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`flat_id`, `uid`, `bid`, `location`, `city`, `description`, `amenities`, `area`, `image`, `image1`, `image2`, `image3`, `time`) VALUES
(1, 1, NULL, 'Hazratganj', 'LUCKNOW', 'awesome', 'SHOPPING MALL', 555, 'd.JPG', 'd.jpg', 'd.jpg', 'd.jpg', '2020-03-17 10:57:03'),
(2, 1, NULL, 'Indira Nagar', 'LUCKNOW', 'METRO STATION AND OTHER FACILITIES', 'WATER ELECTRICITY ', 1200, 'b.jpg', 'b.jpg', 'b.jpg', 'b.jpg', '2020-03-17 17:49:13'),
(5, 1, NULL, 'Jjankipuram', 'LUCKNOW', 'HIGHWAY ', 'ALL BASIC AMENITIES', 600, 'e.jpg', 'e.jpg', 'e.jpg', 'e.jpg', '2020-03-17 17:54:11'),
(6, 1, NULL, 'ALIGANJ', 'LUCKNOW', 'ALIGANJ SQUARE', 'SWIMMING POOL', 500, 'g.jpg', 'g.jpg', 'g.jpg', 'g.jpg', '2020-03-17 17:51:18'),
(12, 1, NULL, 'VRINDAVAN COLONY', 'LUCKNOW', 'NEAR PGI', 'HOSPITALS MALLS', 500, 'c.jpg', 'c.jpg', 'c.jpg', 'c.jpg', '2020-03-17 17:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `UID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` decimal(10,0) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UID`, `username`, `password`, `name`, `surname`, `email`, `phone`) VALUES
(1, 'apy', '@123zAY890', 'aparajita', 'yadav', 'ay@ay.com', '7460882195');

-- --------------------------------------------------------

--
-- Table structure for table `login_builder`
--

DROP TABLE IF EXISTS `login_builder`;
CREATE TABLE IF NOT EXISTS `login_builder` (
  `BID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `lno` int NOT NULL,
  `password` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `phoneno` decimal(10,0) NOT NULL,
  `nameorg` varchar(100) NOT NULL,
  PRIMARY KEY (`BID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_builder`
--

INSERT INTO `login_builder` (`BID`, `username`, `lno`, `password`, `emailid`, `phoneno`, `nameorg`) VALUES
(1, 'kanchan', 120, 'Kanchan@1234', 'K@k.com', '1231231231', 'kanchan builders');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `UID` int NOT NULL,
  `buyer` varchar(100) NOT NULL,
  `cardnumber` varchar(100) NOT NULL,
  `amount` int NOT NULL,
  `expm` year NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`UID`, `buyer`, `cardnumber`, `amount`, `expm`, `name`) VALUES
(1, 'apy', '4591150053002526', 9500000, 2031, 'apy');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

DROP TABLE IF EXISTS `rent`;
CREATE TABLE IF NOT EXISTS `rent` (
  `flat_id` int NOT NULL,
  `rent_amount` int NOT NULL,
  `deposit_amount` int NOT NULL,
  `time_period` int NOT NULL,
  PRIMARY KEY (`flat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`flat_id`, `rent_amount`, `deposit_amount`, `time_period`) VALUES
(3, 15000, 50000, 5),
(4, 20000, 60000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
CREATE TABLE IF NOT EXISTS `sale` (
  `flat_id` int NOT NULL,
  `totalcost` double NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`flat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`flat_id`, `totalcost`, `rate`) VALUES
(1, 1200000, 2.5),
(2, 8500000, 1000),
(6, 6900000, 500),
(12, 9500000, 600);

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_projects`
--

DROP TABLE IF EXISTS `upcoming_projects`;
CREATE TABLE IF NOT EXISTS `upcoming_projects` (
  `upid` int NOT NULL AUTO_INCREMENT,
  `bid` int NOT NULL,
  `location` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `comp_time` int NOT NULL,
  PRIMARY KEY (`upid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upcoming_projects`
--

INSERT INTO `upcoming_projects` (`upid`, `bid`, `location`, `city`, `comp_time`) VALUES
(1, 1, 'mm', 'rrrrrr', 10);

-- --------------------------------------------------------

--
-- Structure for view `cardrent`
--
DROP TABLE IF EXISTS `cardrent`;

DROP VIEW IF EXISTS `cardrent`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cardrent`  AS  select `flat`.`flat_id` AS `flat_id`,`flat`.`location` AS `location`,`flat`.`city` AS `city`,`rent`.`rent_amount` AS `rent_amount`,`flat`.`image` AS `image`,`flat`.`time` AS `time` from (`flat` join `rent` on((`flat`.`flat_id` = `rent`.`flat_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `cardsale`
--
DROP TABLE IF EXISTS `cardsale`;

DROP VIEW IF EXISTS `cardsale`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cardsale`  AS  select `flat`.`flat_id` AS `flat_id`,`flat`.`location` AS `location`,`flat`.`city` AS `city`,`sale`.`totalcost` AS `totalcost`,`flat`.`image` AS `image`,`flat`.`time` AS `time` from (`flat` join `sale` on((`flat`.`flat_id` = `sale`.`flat_id`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`flat_id`) REFERENCES `flat` (`flat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

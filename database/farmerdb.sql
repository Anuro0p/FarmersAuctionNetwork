-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2021 at 11:32 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(20) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `passwd`) VALUES
('admin', 'e6e061838856bf47e1de730719fb2609');

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

DROP TABLE IF EXISTS `auction`;
CREATE TABLE IF NOT EXISTS `auction` (
  `auid` int(10) NOT NULL AUTO_INCREMENT,
  `fid` int(10) NOT NULL,
  `crop` varchar(30) NOT NULL,
  `baseprize` int(10) NOT NULL,
  `currprize` int(10) DEFAULT NULL,
  `rid` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`auid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auid`, `fid`, `crop`, `baseprize`, `currprize`, `rid`, `status`, `date`, `description`, `quantity`) VALUES
(15, 1, 'Coconut', 200, 200, 0, 0, '2021-04-28', 'Best Coconuts in Town', 10),
(7, 1, 'Wheat', 12000, 2530, 0, 1, '2021-04-27', 'Very Good Wheat', 50),
(18, 1, 'Rice', 500, 520, 1, 0, '2021-04-28', 'good quality', 5),
(13, 1, 'Rice', 1500, 2500, 2, 0, '2021-04-27', '', 25),
(14, 1, 'Rice', 2500, 5000, 2, 1, '2021-04-27', 'This is the best rice you can get ...ever!', 50),
(17, 1, 'Rice', 1000, 1050, 1, 0, '2021-04-28', 'Best quality', 20);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

DROP TABLE IF EXISTS `farmer`;
CREATE TABLE IF NOT EXISTS `farmer` (
  `fid` int(20) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `isVerified` tinyint(1) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`fid`, `fname`, `phone`, `passwd`, `address`, `isVerified`) VALUES
(1, 'Anuroop Vijayan', 8557556551, 'a0c6eb4a96aa3821db3e467708c6dfd7', 'SCMS School of technology and management', 1),
(2, 'Anjali Soorej', 9633275944, 'c25d306113d5eca9bcf5c59f07186c82', 'Kakkanad', 1),
(3, 'Mydhily Soorej', 8785434237, 'c25d306113d5eca9bcf5c59f07186c82', 'Infra Hillock Appartments', 0);

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

DROP TABLE IF EXISTS `retailer`;
CREATE TABLE IF NOT EXISTS `retailer` (
  `rid` int(10) NOT NULL AUTO_INCREMENT,
  `rname` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `isVerified` tinyint(1) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`rid`, `rname`, `phone`, `passwd`, `address`, `isVerified`) VALUES
(1, 'Athul Dinesan', 9995774987, 'a0c6eb4a96aa3821db3e467708c6dfd7', 'Mohan Das Karam Chand Gandhi', 1),
(2, 'Logan', 8547043664, 'a0c6eb4a96aa3821db3e467708c6dfd7', 'Maniyamkuzhi', 1),
(3, 'Emmanual Jacob', 7988674543, 'c25d306113d5eca9bcf5c59f07186c82', 'Kalamassery', 0),
(4, 'Soorej Sankaran', 8675443432, 'c25d306113d5eca9bcf5c59f07186c82', 'Infra vantage Appartments', 0);

-- --------------------------------------------------------

--
-- Table structure for table `retailerdemand`
--

DROP TABLE IF EXISTS `retailerdemand`;
CREATE TABLE IF NOT EXISTS `retailerdemand` (
  `did` int(10) NOT NULL AUTO_INCREMENT,
  `rid` int(10) NOT NULL,
  `crop` varchar(50) NOT NULL,
  `bazeprize` int(10) NOT NULL,
  `offerprize` int(10) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL,
  `fid` int(10) DEFAULT NULL,
  `status` int(10) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailerdemand`
--

INSERT INTO `retailerdemand` (`did`, `rid`, `crop`, `bazeprize`, `offerprize`, `message`, `fid`, `status`, `date`, `quantity`, `description`) VALUES
(1, 1, 'Rice', 200, 210, 'take it or leave it', 1, 2, '2021-04-28', 2, 'want best quality'),
(2, 1, 'Wheat', 250, 250, '', 1, 2, '2021-04-28', 2, 'some good quality'),
(3, 1, 'Wheat', 100, NULL, NULL, NULL, 0, '2021-04-29', 1, 'good quality ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

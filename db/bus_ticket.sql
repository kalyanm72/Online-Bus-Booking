-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 08:24 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `password`, `name`) VALUES
('kalyan', '12345', 'Kalyan'),
('Manoj', '12345', 'Manoj'),
('Sandeep', '12345', 'Sandeep');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bid` varchar(11) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `type_ac` char(3) NOT NULL,
  `type_sl` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bid`, `bname`, `type_ac`, `type_sl`) VALUES
('BB001', 'Ganga', 'yes', 'yes'),
('BB002', 'SRS Travels', 'no', 'yes'),
('BB003', 'VOLVO', 'yes', 'yes'),
('BB004', 'Sugama', 'no', 'yes'),
('BB005', 'KALYANA', 'no', 'yes'),
('BB006', 'Durgamba', 'no', 'yes'),
('BB007', 'SLV', 'no', 'yes'),
('BB008', 'KKB', 'no', 'yes'),
('BB009', 'TCS', 'no', 'yes'),
('BB010', 'Jain Travels', 'no', 'yes'),
('BB011', 'VRV', 'no', 'yes'),
('BB012', 'SRA', 'no', 'yes'),
('BB013', 'VRX', 'no', 'yes'),
('BB014', 'Gene', 'no', 'yes'),
('BB015', 'GT', 'yes', 'no'),
('BB016', 'Vani', 'no', 'yes'),
('BB017', 'GRS', 'no', 'yes'),
('BB018', 'VYT', 'yes', 'no'),
('BB019', 'RTT', 'yes', 'no'),
('BB020', 'BTE', 'yes', 'no'),
('BB021', 'Rose', 'yes', 'no'),
('BB022', 'VRDT', 'yes', 'no'),
('BB023', 'Vellore Travels', 'yes', 'no'),
('BB024', 'Vamanur Travels', 'yes', 'no'),
('BB025', 'Varada Travels', 'yes', 'no'),
('BB026', 'Narmada Travels', 'yes', 'no'),
('BB027', 'VYT', 'yes', 'no'),
('BB028', 'KKB Express', 'no', 'yes'),
('BB029', 'PK', 'no', 'yes'),
('BB030', 'Jain Travels', 'no', 'yes'),
('BB031', 'Vardhaman Travels', 'no', 'no'),
('BB032', 'Vaikunta Travels', 'no', 'no'),
('BB033', 'Tirupati Travels', 'no', 'no'),
('BB034', 'Jain Travels', 'no', 'no'),
('BB035', 'Vamanahalli Travels', 'no', 'no'),
('BB036', 'Janata  Travels', 'no', 'no'),
('BB037', 'Janata Express', 'no', 'no'),
('BB038', 'vadra Travels', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `num` varchar(16) NOT NULL,
  `type` varchar(30) NOT NULL,
  `expdate` date NOT NULL,
  `cvv` int(11) NOT NULL,
  `bank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`num`, `type`, `expdate`, `cvv`, `bank`) VALUES
('1234567890123456', 'VISA', '2022-01-01', 333, 'SBI');

-- --------------------------------------------------------

--
-- Table structure for table `nb`
--

CREATE TABLE `nb` (
  `uname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `bank` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nb`
--

INSERT INTO `nb` (`uname`, `password`, `bank`) VALUES
('KSMtest', '1234', 'SBI');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `pid` varchar(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`pid`, `name`, `email`, `mob`) VALUES
('', 'Kalyan', 'pandukalyan2015@gmail.com', '7013976078'),
('1234567', 'test', 'test@test', '123456789'),
('1234568', 'Kalyan', 'pandukalyan2015@gmail.com', '0701397607');

-- --------------------------------------------------------

--
-- Table structure for table `reserves`
--

CREATE TABLE `reserves` (
  `pnr` int(11) NOT NULL,
  `rid` int(11) DEFAULT NULL,
  `pid` varchar(11) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `DOT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserves`
--

INSERT INTO `reserves` (`pnr`, `rid`, `pid`, `status`, `DOT`) VALUES
(35, 12345, '', 'cancelled', '2019-11-21 18:25:15'),
(36, 12348, '1234568', 'cancelled', '2019-11-21 19:39:22'),
(37, 12348, '1234568', 'booked', '2019-11-21 19:39:22'),
(38, 12348, '1234568', 'booked', '2019-11-21 19:39:22'),
(39, 12348, '1234568', 'booked', '2019-11-21 19:39:22'),
(40, 12348, '1234568', 'booked', '2019-11-21 19:39:22'),
(41, 12348, '1234568', 'booked', '2019-11-21 19:39:22'),
(42, 12348, '1234568', 'booked', '2019-11-21 19:39:28'),
(43, 12348, '1234568', 'booked', '2019-11-21 19:39:28'),
(44, 12348, '1234568', 'booked', '2019-11-21 19:39:28'),
(45, 12348, '1234568', 'booked', '2019-11-21 19:39:28'),
(46, 12348, '1234568', 'booked', '2019-11-21 19:39:28'),
(47, 12348, '1234568', 'booked', '2019-11-21 19:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `rid` int(11) NOT NULL,
  `bid` varchar(11) DEFAULT NULL,
  `fromLoc` varchar(10) DEFAULT NULL,
  `toLoc` varchar(10) DEFAULT NULL,
  `fare` double DEFAULT NULL,
  `dep_date` date NOT NULL,
  `dep_time` time DEFAULT NULL,
  `arr_time` time DEFAULT NULL,
  `arr_date` date NOT NULL,
  `avalseats` int(10) NOT NULL DEFAULT '40',
  `maxseats` int(10) NOT NULL DEFAULT '40'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`rid`, `bid`, `fromLoc`, `toLoc`, `fare`, `dep_date`, `dep_time`, `arr_time`, `arr_date`, `avalseats`, `maxseats`) VALUES
(12345, 'BB005', 'Gwalior', 'Indore', 650, '2019-11-26', '14:00:00', '23:00:00', '2019-11-26', 60, 60),
(12347, 'BB007', 'Jabalpur', 'Katni', 100, '2019-11-27', '16:00:00', '20:00:00', '2019-11-27', 60, 60),
(12348, 'BB008', 'Jabalpur', 'Bhopal', 550, '2019-11-27', '15:45:00', '01:45:00', '2019-11-28', 60, 60),
(12349, 'BB010', 'Jabalpur', 'Bhopal', 660, '2019-11-27', '21:00:00', '18:00:00', '2019-11-28', 60, 60),
(12351, 'BB005', 'Indore', 'Bhopal', 800, '2019-11-26', '13:01:00', '15:03:00', '2019-11-27', 60, 60);

-- --------------------------------------------------------

--
-- Table structure for table `today`
--

CREATE TABLE `today` (
  `tod_time` time NOT NULL,
  `tod_date` date NOT NULL,
  `one` date NOT NULL DEFAULT '0000-00-01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `today`
--

INSERT INTO `today` (`tod_time`, `tod_date`, `one`) VALUES
('01:08:25', '2019-11-22', '0000-00-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `nb`
--
ALTER TABLE `nb`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `reserves`
--
ALTER TABLE `reserves`
  ADD PRIMARY KEY (`pnr`),
  ADD KEY `rid` (`rid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`rid`,`dep_date`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `today`
--
ALTER TABLE `today`
  ADD PRIMARY KEY (`tod_time`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reserves`
--
ALTER TABLE `reserves`
  MODIFY `pnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12352;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reserves`
--
ALTER TABLE `reserves`
  ADD CONSTRAINT `reserves_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `route` (`rid`),
  ADD CONSTRAINT `reserves_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `passenger` (`pid`);

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `bus` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

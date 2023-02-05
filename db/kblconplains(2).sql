-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 08:20 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kblconplains`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(11) NOT NULL,
  `CATEGORY` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `DATEADDED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CATEGORY`, `DESCRIPTION`, `DATEADDED`, `STATUS`) VALUES
(1, 'Delivery', 'All complaints about customer delivery.', '2022-11-22 10:14:01', 1),
(2, 'Publishing', 'All complaints about publishing.', '2022-11-23 12:02:22', 0),
(3, 'Printing', 'All complaint about Printing', '2022-11-22 11:43:18', 1),
(4, 'Printing', 'All complaint about Printing', '2022-11-23 12:01:48', 0),
(5, 'Editing', 'All complains about editing', '2022-11-23 12:02:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplains`
--

CREATE TABLE `tblcomplains` (
  `COUNTER` int(11) NOT NULL,
  `ID` varchar(255) NOT NULL,
  `CATEGORYID` varchar(255) NOT NULL,
  `COMPLAIN` varchar(1024) NOT NULL,
  `DATEVIEWED` varchar(55) NOT NULL,
  `DATEADDED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `STATUS` int(1) NOT NULL,
  `DATECONCLUDED` varchar(55) NOT NULL,
  `CONCLUSION` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomplains`
--

INSERT INTO `tblcomplains` (`COUNTER`, `ID`, `CATEGORYID`, `COMPLAIN`, `DATEVIEWED`, `DATEADDED`, `STATUS`, `DATECONCLUDED`, `CONCLUSION`) VALUES
(5, 'jonh@gmail.com', 'Delivery', 'Delivery delay', '02-12-22 09:44:16', '2022-12-02 07:27:16', 1, '02-12-22 09:44:16', 'Delivered'),
(6, 'jonh@gmail.com', 'Printing', 'Printing error', '0000-00-00 00:00:00', '2022-11-29 10:15:26', 2, '0000-00-00 00:00:00', ''),
(7, 'jonh@gmail.com', 'Printing', 'Poor printing', '0000-00-00 00:00:00', '2022-12-02 07:34:35', 1, '0000-00-00 00:00:00', 'Printer fixed');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserdetails`
--

CREATE TABLE `tbluserdetails` (
  `FIRSTNAME` varchar(255) NOT NULL,
  `LASTNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluserdetails`
--

INSERT INTO `tbluserdetails` (`FIRSTNAME`, `LASTNAME`, `EMAIL`, `STATUS`) VALUES
('Jonh', 'willy', 'jonh@gmail.com', 1),
('Daniel', 'kipchirchir', 'kirwadaniel03@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `PRIVILLAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`USERNAME`, `PASSWORD`, `PRIVILLAGE`) VALUES
('jonh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'User'),
('kirwadaniel03@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcomplains`
--
ALTER TABLE `tblcomplains`
  ADD PRIMARY KEY (`COUNTER`),
  ADD KEY `CATCOM` (`CATEGORYID`),
  ADD KEY `COMUSER` (`ID`);

--
-- Indexes for table `tbluserdetails`
--
ALTER TABLE `tbluserdetails`
  ADD PRIMARY KEY (`EMAIL`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblcomplains`
--
ALTER TABLE `tblcomplains`
  MODIFY `COUNTER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcomplains`
--
ALTER TABLE `tblcomplains`
  ADD CONSTRAINT `COMUSER` FOREIGN KEY (`ID`) REFERENCES `tbluserdetails` (`EMAIL`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

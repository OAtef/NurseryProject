-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2018 at 01:07 PM
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
-- Database: `nursery-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `addressID` int(11) NOT NULL,
  `buildingNo` int(11) NOT NULL,
  `StreetName` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `DepartmentNo` int(11) NOT NULL,
  `neigherhoodName` varchar(30) NOT NULL,
  PRIMARY KEY (`addressID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appliers`
--

DROP TABLE IF EXISTS `appliers`;
CREATE TABLE IF NOT EXISTS `appliers` (
  `appling_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `applied_role` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `appliedDate` date NOT NULL,
  PRIMARY KEY (`appling_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cartaker`
--

DROP TABLE IF EXISTS `cartaker`;
CREATE TABLE IF NOT EXISTS `cartaker` (
  `carTaker_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `carNo` varchar(8) NOT NULL,
  `role` varchar(15) NOT NULL,
  PRIMARY KEY (`carTaker_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartaker`
--

INSERT INTO `cartaker` (`carTaker_id`, `first_name`, `last_name`, `mobile_no`, `carNo`, `role`) VALUES
(1, 'habiba', 'hegazy', 1023456789, '8975', 'mother');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categoryName` varchar(20) NOT NULL,
  `categoryNo` int(11) NOT NULL,
  `scheduleCode` int(11) NOT NULL,
  `startingAge` int(2) NOT NULL,
  `endAge` int(2) NOT NULL,
  PRIMARY KEY (`categoryNo`),
  KEY `scheduleCode` (`scheduleCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryName`, `categoryNo`, `scheduleCode`, `startingAge`, `endAge`) VALUES
('pre-school', 1, 123, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ceomanager`
--

DROP TABLE IF EXISTS `ceomanager`;
CREATE TABLE IF NOT EXISTS `ceomanager` (
  `userID` int(11) NOT NULL,
  `officeDays` text NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

DROP TABLE IF EXISTS `children`;
CREATE TABLE IF NOT EXISTS `children` (
  `child_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Bdate` date NOT NULL,
  `invoiceNo` int(11) NOT NULL,
  `categoryNo` int(11) NOT NULL,
  `carTakerID` int(11) NOT NULL,
  `parentID` int(11) NOT NULL,
  `nurseID` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  `interviewdate` date NOT NULL,
  `EduYear` int(11) NOT NULL,
  PRIMARY KEY (`child_id`),
  KEY `parentID` (`parentID`),
  KEY `nurseID` (`nurseID`),
  KEY `invoiceNo` (`invoiceNo`),
  KEY `categoryNo` (`categoryNo`),
  KEY `carTakerID` (`carTakerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commentson`
--

DROP TABLE IF EXISTS `commentson`;
CREATE TABLE IF NOT EXISTS `commentson` (
  `nurseID` int(11) NOT NULL,
  `child id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `behaviour` int(11) NOT NULL,
  PRIMARY KEY (`nurseID`,`child id`),
  KEY `comments on_ibfk_2` (`child id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commentsto`
--

DROP TABLE IF EXISTS `commentsto`;
CREATE TABLE IF NOT EXISTS `commentsto` (
  `nurseID` int(11) NOT NULL,
  `parent id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`nurseID`,`parent id`),
  KEY `parent id` (`parent id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

DROP TABLE IF EXISTS `interviews`;
CREATE TABLE IF NOT EXISTS `interviews` (
  `nurseID` int(11) NOT NULL,
  `parentID` int(11) NOT NULL,
  `childID` int(11) NOT NULL,
  `day` date NOT NULL,
  `childAge` int(11) NOT NULL,
  PRIMARY KEY (`nurseID`,`parentID`),
  KEY `parentID` (`parentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoiceNo` int(11) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `invoiceDate` date NOT NULL,
  `discount` int(4) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`invoiceNo`),
  KEY `payment_type` (`payment_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceNo`, `payment_type`, `invoiceDate`, `discount`) VALUES
(1, 'cash', '2018-12-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nursemanager`
--

DROP TABLE IF EXISTS `nursemanager`;
CREATE TABLE IF NOT EXISTS `nursemanager` (
  `userID` int(11) NOT NULL,
  `workingHours` int(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `userID` int(11) NOT NULL,
  `addressID` int(11) NOT NULL,
  `relativeRelation` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`),
  KEY `addressID` (`addressID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_type` varchar(10) NOT NULL,
  `totalCost` int(11) DEFAULT NULL,
  `Currency` varchar(20) NOT NULL,
  PRIMARY KEY (`payment_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_type`, `totalCost`, `Currency`) VALUES
('cash', 500, 'pound');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `schdule_code` int(11) NOT NULL,
  `arr_Time` int(11) NOT NULL,
  `leave_Time` int(11) NOT NULL,
  `subject_code` int(11) NOT NULL,
  PRIMARY KEY (`schdule_code`),
  KEY `subject_code` (`subject_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schdule_code`, `arr_Time`, `leave_Time`, `subject_code`) VALUES
(123, 8, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`code`, `name`, `description`) VALUES
(1, 'arabic', 'given to pre-school category');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `userID` int(11) NOT NULL,
  `role` varchar(30) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`userID`, `role`) VALUES
(1, 'arabic');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

DROP TABLE IF EXISTS `teaches`;
CREATE TABLE IF NOT EXISTS `teaches` (
  `teacher id` int(11) NOT NULL,
  `child id` int(11) NOT NULL,
  PRIMARY KEY (`teacher id`,`child id`),
  KEY `child id` (`child id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `mobilenumber` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nationalID` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `mobilenumber`, `email`, `password`, `nationalID`, `type`) VALUES
(1, 'omar', 'atef', 11, 'oatef', '123', 0, 1),
(2, 'habiba', 'hegazy', 123, 'habiba@gmail.com', '123', 0, 1),
(5, 'omar', 'atef', 122, 'o@o.com', '123', 123, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `typeID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`typeID`, `type`) VALUES
(1, 'parent'),
(2, 'nurse_manager');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`scheduleCode`) REFERENCES `schedule` (`schdule_code`);

--
-- Constraints for table `ceomanager`
--
ALTER TABLE `ceomanager`
  ADD CONSTRAINT `ceoManager_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`parentID`) REFERENCES `parent` (`userID`),
  ADD CONSTRAINT `children_ibfk_3` FOREIGN KEY (`invoiceNo`) REFERENCES `invoice` (`invoiceNo`),
  ADD CONSTRAINT `children_ibfk_4` FOREIGN KEY (`categoryNo`) REFERENCES `category` (`categoryNo`),
  ADD CONSTRAINT `children_ibfk_5` FOREIGN KEY (`carTakerID`) REFERENCES `cartaker` (`carTaker_id`);

--
-- Constraints for table `commentson`
--
ALTER TABLE `commentson`
  ADD CONSTRAINT `commentson_ibfk_1` FOREIGN KEY (`nurseID`) REFERENCES `nursemanager` (`userID`),
  ADD CONSTRAINT `commentson_ibfk_2` FOREIGN KEY (`child id`) REFERENCES `children` (`child_id`);

--
-- Constraints for table `commentsto`
--
ALTER TABLE `commentsto`
  ADD CONSTRAINT `commentsto_ibfk_1` FOREIGN KEY (`nurseID`) REFERENCES `nursemanager` (`userID`),
  ADD CONSTRAINT `commentsto_ibfk_2` FOREIGN KEY (`parent id`) REFERENCES `parent` (`userID`);

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_ibfk_1` FOREIGN KEY (`nurseID`) REFERENCES `nursemanager` (`userID`),
  ADD CONSTRAINT `interviews_ibfk_2` FOREIGN KEY (`parentID`) REFERENCES `parent` (`userID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`payment_type`) REFERENCES `payment` (`payment_type`);

--
-- Constraints for table `nursemanager`
--
ALTER TABLE `nursemanager`
  ADD CONSTRAINT `nurseManager_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `parent_ibfk_2` FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`subject_code`) REFERENCES `subject` (`code`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`child id`) REFERENCES `children` (`child_id`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`teacher id`) REFERENCES `teacher` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

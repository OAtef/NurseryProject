-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2018 at 08:08 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Nursery-Database`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `parent id` int(11) NOT NULL,
  `buildingNo` int(11) NOT NULL,
  `StreetName` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `DepartmentNo` int(11) NOT NULL,
  `neigherhoodName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appliers`
--

CREATE TABLE `appliers` (
  `appling_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `applied_role` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `appliedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `carTaker`
--

CREATE TABLE `carTaker` (
  `carTaker_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `carNo` varchar(8) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carTaker`
--

INSERT INTO `carTaker` (`carTaker_id`, `first_name`, `last_name`, `mobile_no`, `carNo`, `role`) VALUES
(1, 'habiba', 'hegazy', 1023456789, '8975', 'mother');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryName` varchar(20) NOT NULL,
  `categoryNo` int(11) NOT NULL,
  `scheduleCode` int(11) NOT NULL,
  `startingAge` int(2) NOT NULL,
  `endAge` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryName`, `categoryNo`, `scheduleCode`, `startingAge`, `endAge`) VALUES
('pre-school', 1, 123, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `ceoManager`
--

CREATE TABLE `ceoManager` (
  `userID` int(11) NOT NULL,
  `officeDays` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
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
  `EduYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`child_id`, `first_name`, `last_name`, `Gender`, `Bdate`, `invoiceNo`, `categoryNo`, `carTakerID`, `parentID`, `nurseID`, `accepted`, `interviewdate`, `EduYear`) VALUES
(1, 'yousef', 'methat', 'male', '2018-12-03', 1, 1, 1, 2, 0, 0, '2018-12-01', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `commentson`
--

CREATE TABLE `commentson` (
  `nurseID` int(11) NOT NULL,
  `child id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `behaviour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commentsto`
--

CREATE TABLE `commentsto` (
  `nurseID` int(11) NOT NULL,
  `parent id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `nurseID` int(11) NOT NULL,
  `parentID` int(11) NOT NULL,
  `childID` int(11) NOT NULL,
  `day` date NOT NULL,
  `childAge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceNo` int(11) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `invoiceDate` date NOT NULL,
  `discount` int(4) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceNo`, `payment_type`, `invoiceDate`, `discount`) VALUES
(1, 'cash', '2018-12-01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nurseManager`
--

CREATE TABLE `nurseManager` (
  `userID` int(11) NOT NULL,
  `workingHours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `userID` int(11) NOT NULL,
  `relativeRelation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`userID`, `relativeRelation`) VALUES
(2, 'mother');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_type` varchar(10) NOT NULL,
  `totalCost` int(11) DEFAULT NULL,
  `Currency` varchar(20) NOT NULL
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

CREATE TABLE `schedule` (
  `schdule_code` int(11) NOT NULL,
  `arr_Time` int(11) NOT NULL,
  `leave_Time` int(11) NOT NULL,
  `subject_code` int(11) NOT NULL
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

CREATE TABLE `subject` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(40) DEFAULT NULL
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

CREATE TABLE `teacher` (
  `userID` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
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

CREATE TABLE `teaches` (
  `teacher id` int(11) NOT NULL,
  `child id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `mobilenumber` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nationalID` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `mobilenumber`, `email`, `password`, `nationalID`, `type`) VALUES
(1, 'omar', 'atef', 11, 'oatef', '123', 0, 0),
(2, 'habiba', 'hegazy', 123, 'habiba@gmail.com', '123', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userType`
--

CREATE TABLE `userType` (
  `typeID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userType`
--

INSERT INTO `userType` (`typeID`, `type`) VALUES
(1, 'parent'),
(2, 'nurse_manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`DepartmentNo`,`buildingNo`,`StreetName`),
  ADD UNIQUE KEY `parent id` (`parent id`);

--
-- Indexes for table `appliers`
--
ALTER TABLE `appliers`
  ADD PRIMARY KEY (`appling_id`);

--
-- Indexes for table `carTaker`
--
ALTER TABLE `carTaker`
  ADD PRIMARY KEY (`carTaker_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryNo`),
  ADD KEY `scheduleCode` (`scheduleCode`);

--
-- Indexes for table `ceoManager`
--
ALTER TABLE `ceoManager`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`child_id`),
  ADD KEY `parentID` (`parentID`),
  ADD KEY `nurseID` (`nurseID`),
  ADD KEY `invoiceNo` (`invoiceNo`),
  ADD KEY `categoryNo` (`categoryNo`),
  ADD KEY `carTakerID` (`carTakerID`);

--
-- Indexes for table `commentson`
--
ALTER TABLE `commentson`
  ADD PRIMARY KEY (`nurseID`,`child id`),
  ADD KEY `comments on_ibfk_2` (`child id`);

--
-- Indexes for table `commentsto`
--
ALTER TABLE `commentsto`
  ADD PRIMARY KEY (`nurseID`,`parent id`),
  ADD KEY `parent id` (`parent id`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`nurseID`,`parentID`),
  ADD KEY `parentID` (`parentID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceNo`),
  ADD KEY `payment_type` (`payment_type`);

--
-- Indexes for table `nurseManager`
--
ALTER TABLE `nurseManager`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_type`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schdule_code`),
  ADD KEY `subject_code` (`subject_code`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`teacher id`,`child id`),
  ADD KEY `child id` (`child id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userType`
--
ALTER TABLE `userType`
  ADD PRIMARY KEY (`typeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`parent id`) REFERENCES `parent` (`userID`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`scheduleCode`) REFERENCES `schedule` (`schdule_code`);

--
-- Constraints for table `ceoManager`
--
ALTER TABLE `ceoManager`
  ADD CONSTRAINT `ceoManager_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`parentID`) REFERENCES `parent` (`userID`),
  ADD CONSTRAINT `children_ibfk_3` FOREIGN KEY (`invoiceNo`) REFERENCES `invoice` (`invoiceNo`),
  ADD CONSTRAINT `children_ibfk_4` FOREIGN KEY (`categoryNo`) REFERENCES `category` (`categoryNo`),
  ADD CONSTRAINT `children_ibfk_5` FOREIGN KEY (`carTakerID`) REFERENCES `carTaker` (`carTaker_id`);

--
-- Constraints for table `commentson`
--
ALTER TABLE `commentson`
  ADD CONSTRAINT `commentson_ibfk_1` FOREIGN KEY (`nurseID`) REFERENCES `nurseManager` (`userID`),
  ADD CONSTRAINT `commentson_ibfk_2` FOREIGN KEY (`child id`) REFERENCES `children` (`child_id`);

--
-- Constraints for table `commentsto`
--
ALTER TABLE `commentsto`
  ADD CONSTRAINT `commentsto_ibfk_1` FOREIGN KEY (`nurseID`) REFERENCES `nurseManager` (`userID`),
  ADD CONSTRAINT `commentsto_ibfk_2` FOREIGN KEY (`parent id`) REFERENCES `parent` (`userID`);

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_ibfk_1` FOREIGN KEY (`nurseID`) REFERENCES `nurseManager` (`userID`),
  ADD CONSTRAINT `interviews_ibfk_2` FOREIGN KEY (`parentID`) REFERENCES `parent` (`userID`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`payment_type`) REFERENCES `payment` (`payment_type`);

--
-- Constraints for table `nurseManager`
--
ALTER TABLE `nurseManager`
  ADD CONSTRAINT `nurseManager_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

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

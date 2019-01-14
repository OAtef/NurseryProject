-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2019 at 08:30 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `address` (
  `addressID` int(11) NOT NULL DEFAULT '0',
  `buildingNo` int(11) DEFAULT NULL,
  `StreetName` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `neigherhoodName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `buildingNo`, `StreetName`, `city`, `neigherhoodName`) VALUES
(1, 2, 'joseph Teto', 'cairo', 'sheraton');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryName` varchar(20) NOT NULL,
  `categoryNo` int(11) NOT NULL,
  `scheduleCode` int(11) NOT NULL,
  `startAge` int(2) NOT NULL,
  `endAge` int(2) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryName`, `categoryNo`, `scheduleCode`, `startAge`, `endAge`, `cost`) VALUES
('pre-school', 1, 123, 5, 6, 3000),
('Baby', 2, 123, 0, 3, 1000),
('Toodle', 3, 123, 3, 5, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `ceomanager`
--

CREATE TABLE `ceomanager` (
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
  `Gender` varchar(20) NOT NULL,
  `Bdate` date NOT NULL,
  `categoryNo` int(11) NOT NULL,
  `parentID` int(11) NOT NULL,
  `nurseID` int(11) NOT NULL DEFAULT '0',
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `interviewdate` date DEFAULT NULL,
  `img` mediumblob NOT NULL,
  `reqDelete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`child_id`, `first_name`, `last_name`, `Gender`, `Bdate`, `categoryNo`, `parentID`, `nurseID`, `accepted`, `interviewdate`, `img`, `reqDelete`) VALUES
(1, 'yousef', 'mohsen', 'male', '2018-12-03', 2, 2, 1, 0, NULL, '', 0),
(2, 'kareem', 'methat', 'male', '2018-12-03', 1, 2, 0, 1, '2018-12-01', '', 0);

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
  `messageID` int(11) NOT NULL,
  `ToID` int(11) NOT NULL,
  `FromID` int(11) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentsto`
--

INSERT INTO `commentsto` (`messageID`, `ToID`, `FromID`, `msg`, `date`) VALUES
(1, 1, 2, 'test', '2018-12-04'),
(2, 1, 2, '123', '2018-12-04'),
(4, 1, 2, 'aa', '2018-12-04');

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
-- Table structure for table `nursemanager`
--

CREATE TABLE `nursemanager` (
  `userID` int(11) NOT NULL,
  `workingHours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nursemanager`
--

INSERT INTO `nursemanager` (`userID`, `workingHours`) VALUES
(1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `userID` int(11) NOT NULL,
  `addressID` int(11) DEFAULT NULL,
  `relativeRelation` varchar(50) DEFAULT NULL,
  `img` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`userID`, `addressID`, `relativeRelation`, `img`) VALUES
(2, 1, 'mother', NULL);

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
  `type` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `mobilenumber`, `email`, `password`, `nationalID`, `type`, `gender`) VALUES
(1, 'omar', 'atef', 11, 'o@gmail.com', '123', 0, 2, 'male'),
(2, 'habiba', 'hegazy', 123, 'habiba@gmail.com', '123', 123, 1, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `typeID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`typeID`, `type`) VALUES
(1, 'parent'),
(2, 'nurse_manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryNo`),
  ADD KEY `scheduleCode` (`scheduleCode`);

--
-- Indexes for table `ceomanager`
--
ALTER TABLE `ceomanager`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`child_id`),
  ADD KEY `parentID` (`parentID`),
  ADD KEY `nurseID` (`nurseID`),
  ADD KEY `categoryNo` (`categoryNo`);

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
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `nurseID` (`ToID`),
  ADD KEY `parentID` (`FromID`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`nurseID`,`parentID`),
  ADD KEY `parentID` (`parentID`);

--
-- Indexes for table `nursemanager`
--
ALTER TABLE `nursemanager`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `addressID` (`addressID`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`typeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `commentsto`
--
ALTER TABLE `commentsto`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  ADD CONSTRAINT `children_ibfk_4` FOREIGN KEY (`categoryNo`) REFERENCES `category` (`categoryNo`);

--
-- Constraints for table `commentson`
--
ALTER TABLE `commentson`
  ADD CONSTRAINT `commentson_ibfk_1` FOREIGN KEY (`nurseID`) REFERENCES `nursemanager` (`userID`),
  ADD CONSTRAINT `commentson_ibfk_2` FOREIGN KEY (`child id`) REFERENCES `children` (`child_id`);

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_ibfk_1` FOREIGN KEY (`nurseID`) REFERENCES `nursemanager` (`userID`),
  ADD CONSTRAINT `interviews_ibfk_2` FOREIGN KEY (`parentID`) REFERENCES `parent` (`userID`);

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
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type`) REFERENCES `usertype` (`typeID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

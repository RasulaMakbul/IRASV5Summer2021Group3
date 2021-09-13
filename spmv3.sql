-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 08:14 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spmv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblassessment`
--

CREATE TABLE `tblassessment` (
  `sl` int(11) NOT NULL,
  `assessmentID` varchar(100) NOT NULL,
  `assessmentType` varchar(100) NOT NULL,
  `MarksObtained` varchar(100) NOT NULL,
  `courseID` varchar(100) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `coID` varchar(100) NOT NULL,
  `sectionNo` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblco`
--

CREATE TABLE `tblco` (
  `sl` int(11) NOT NULL,
  `courseID` varchar(100) NOT NULL,
  `ploID` int(11) NOT NULL,
  `co1` tinyint(1) NOT NULL,
  `co2` tinyint(1) NOT NULL,
  `co3` tinyint(1) NOT NULL,
  `co4` tinyint(1) NOT NULL,
  `co5` tinyint(1) NOT NULL,
  `co6` tinyint(1) NOT NULL,
  `co7` tinyint(1) NOT NULL,
  `co8` tinyint(1) NOT NULL,
  `co9` tinyint(1) NOT NULL,
  `co10` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblco`
--

INSERT INTO `tblco` (`sl`, `courseID`, `ploID`, `co1`, `co2`, `co3`, `co4`, `co5`, `co6`, `co7`, `co8`, `co9`, `co10`) VALUES
(0, 'CSE303', 13, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `sl` int(11) NOT NULL,
  `courseID` varchar(100) NOT NULL,
  `courseTitle` varchar(250) NOT NULL,
  `credit` double NOT NULL,
  `totalCO` int(11) NOT NULL,
  `programID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`sl`, `courseID`, `courseTitle`, `credit`, `totalCO`, `programID`) VALUES
(5, 'CSE303', 'DBMS', 3, 4, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `sl` int(11) NOT NULL,
  `departmentID` varchar(100) NOT NULL,
  `departmentName` varchar(200) NOT NULL,
  `schoolID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblenrollment`
--

CREATE TABLE `tblenrollment` (
  `sl` int(11) NOT NULL,
  `enrollmentID` varchar(100) NOT NULL,
  `enrollmentYear` varchar(100) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `programID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblevaluation`
--

CREATE TABLE `tblevaluation` (
  `sl` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `assessmentID` varchar(100) NOT NULL,
  `obtainedMarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblmarks`
--

CREATE TABLE `tblmarks` (
  `sl` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `courseID` varchar(100) NOT NULL,
  `examName` varchar(200) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `section` varchar(5) NOT NULL,
  `q1_mark` int(11) NOT NULL,
  `q1_co` int(11) NOT NULL,
  `q1_max` int(11) NOT NULL,
  `q2_mark` int(11) NOT NULL,
  `q2_co` int(11) NOT NULL,
  `q2_max` int(11) NOT NULL,
  `q3_mark` int(11) NOT NULL,
  `q3_co` int(11) NOT NULL,
  `q3_max` int(11) NOT NULL,
  `q4_mark` int(11) NOT NULL,
  `q4_co` int(11) NOT NULL,
  `q4_max` int(11) NOT NULL,
  `q5_mark` int(11) NOT NULL,
  `q5_co` int(11) NOT NULL,
  `q5_max` int(11) NOT NULL,
  `q6_mark` int(11) NOT NULL,
  `q6_co` int(11) NOT NULL,
  `q6_max` int(11) NOT NULL,
  `q7_mark` int(11) NOT NULL,
  `q7_co` int(11) NOT NULL,
  `q7_max` int(11) NOT NULL,
  `q8_mark` int(11) NOT NULL,
  `q8_co` int(11) NOT NULL,
  `q8_max` int(11) NOT NULL,
  `q9_mark` int(11) NOT NULL,
  `q9_co` int(11) NOT NULL,
  `q9_max` int(11) NOT NULL,
  `q10_mark` int(11) NOT NULL,
  `q10_co` int(11) NOT NULL,
  `q10_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblplo`
--

CREATE TABLE `tblplo` (
  `sl` int(11) NOT NULL,
  `programID` varchar(100) NOT NULL,
  `ploNo` int(11) NOT NULL,
  `ploName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblplo`
--

INSERT INTO `tblplo` (`sl`, `programID`, `ploNo`, `ploName`) VALUES
(13, 'CSE', 1, 'a'),
(14, 'CSE', 2, 'b'),
(15, 'CSE', 3, 'c'),
(16, 'CSE', 4, 'd'),
(17, 'CSE', 5, 'e'),
(18, 'CSE', 6, 'f'),
(19, 'CSE', 7, 'g'),
(20, 'CSE', 8, 'h'),
(21, 'CSE', 9, 'i'),
(22, 'CSE', 10, 'j');

-- --------------------------------------------------------

--
-- Table structure for table `tblprogram2`
--

CREATE TABLE `tblprogram2` (
  `sl` int(11) NOT NULL,
  `ProgramID` varchar(100) NOT NULL,
  `programName` varchar(200) NOT NULL,
  `school` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblprogram2`
--

INSERT INTO `tblprogram2` (`sl`, `ProgramID`, `programName`, `school`) VALUES
(8, 'CSE', 'Computer Science & Engineer', 'SECS');

-- --------------------------------------------------------

--
-- Table structure for table `tblschool`
--

CREATE TABLE `tblschool` (
  `sl` int(11) NOT NULL,
  `SchoolID` varchar(100) NOT NULL,
  `SchoolName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `sl` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `programID` varchar(100) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`sl`, `userID`, `firstName`, `lastName`, `programID`, `email`, `password`, `role`) VALUES
(1, 'admin', 'IUB', 'ADMIN1', '1234', 'admin@iub.edu.bd', 'abc123', 'admin'),
(7, '1730019', 'Rasula', 'Makbul', 'CSE', '1730019@iub.edu.bd', 'abc123', 'student'),
(8, '1234', 'Abu', 'Sayed', 'CSE', 'a.sayed@iub.edu.bd', 'abc123', 'faculty'),
(9, 'hm', 'Higher', 'Management', 'Authority', 'hm@iub.edu.bd', 'abc123', 'hm'),
(10, '1810762', 'Shadman Shakib', 'Talukdar', 'CSE', '1810762@iub.edu.bd', 'abc123', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblassessment`
--
ALTER TABLE `tblassessment`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `assessmentID` (`assessmentID`);

--
-- Indexes for table `tblco`
--
ALTER TABLE `tblco`
  ADD PRIMARY KEY (`sl`),
  ADD KEY `FKCourseID` (`courseID`),
  ADD KEY `fkPLOID` (`ploID`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `courseID` (`courseID`),
  ADD UNIQUE KEY `courseTitle` (`courseTitle`),
  ADD KEY `FK` (`programID`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `departmentID` (`departmentID`);

--
-- Indexes for table `tblenrollment`
--
ALTER TABLE `tblenrollment`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `enrollemntID` (`enrollmentID`);

--
-- Indexes for table `tblevaluation`
--
ALTER TABLE `tblevaluation`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `studentID` (`studentID`,`assessmentID`);

--
-- Indexes for table `tblmarks`
--
ALTER TABLE `tblmarks`
  ADD PRIMARY KEY (`sl`),
  ADD KEY `FKcourse` (`courseID`),
  ADD KEY `fkStudent` (`studentID`);

--
-- Indexes for table `tblplo`
--
ALTER TABLE `tblplo`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `tblprogram2`
--
ALTER TABLE `tblprogram2`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `Program` (`ProgramID`);

--
-- Indexes for table `tblschool`
--
ALTER TABLE `tblschool`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `schoolID` (`SchoolID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`sl`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblassessment`
--
ALTER TABLE `tblassessment`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblenrollment`
--
ALTER TABLE `tblenrollment`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblevaluation`
--
ALTER TABLE `tblevaluation`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblmarks`
--
ALTER TABLE `tblmarks`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblplo`
--
ALTER TABLE `tblplo`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblprogram2`
--
ALTER TABLE `tblprogram2`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblschool`
--
ALTER TABLE `tblschool`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblco`
--
ALTER TABLE `tblco`
  ADD CONSTRAINT `FKCourseID` FOREIGN KEY (`courseID`) REFERENCES `tblcourse` (`courseID`),
  ADD CONSTRAINT `fkPLOID` FOREIGN KEY (`ploID`) REFERENCES `tblplo` (`sl`);

--
-- Constraints for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD CONSTRAINT `FK` FOREIGN KEY (`programID`) REFERENCES `tblprogram2` (`ProgramID`);

--
-- Constraints for table `tblmarks`
--
ALTER TABLE `tblmarks`
  ADD CONSTRAINT `FKcourse` FOREIGN KEY (`courseID`) REFERENCES `tblcourse` (`courseID`),
  ADD CONSTRAINT `fkStudent` FOREIGN KEY (`studentID`) REFERENCES `tbluser` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

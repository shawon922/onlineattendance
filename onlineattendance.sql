-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2015 at 04:16 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlineattendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` tinyint(4) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(128) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `issuperadmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_email`, `issuperadmin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3abcde', 'admin@admin.com', 1),
(2, 'admin1', 'e00cf25ad42683b3df678c61f42c6bdaabcde', 'admin1@admin1.com', 0),
(3, 'abc', '827ccb0eea8a706c4c34a16891f84e7babcde', 'admin12@admin1.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(40) NOT NULL,
  `course_credit` decimal(2,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `course_name`, `course_credit`) VALUES
('101', 'Bangla', '3.0'),
('102', 'English', '3.0'),
('CSE 1102', 'Programming Language and Application-I ', '3.0');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE IF NOT EXISTS `enrollment` (
`enrollment_id` int(10) unsigned NOT NULL,
  `student_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `gpa` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `offeredcourse`
--

CREATE TABLE IF NOT EXISTS `offeredcourse` (
`offer_id` int(11) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester_id` int(2) NOT NULL,
  `semester_year` year(4) NOT NULL,
  `teacher_id` varchar(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `offeredcourse`
--

INSERT INTO `offeredcourse` (`offer_id`, `course_code`, `semester_id`, `semester_year`, `teacher_id`) VALUES
(5, '101', 1, 2015, '10001'),
(6, '102', 1, 2015, '10001'),
(7, 'CSE 1102', 1, 2015, '10001');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
`semester_id` int(2) NOT NULL,
  `semester_name` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `semester_name`) VALUES
(1, 'Spring'),
(2, 'Fall'),
(3, 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `student_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` varchar(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_password` varchar(100) NOT NULL,
  `teacher_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_password`, `teacher_email`) VALUES
('10001', 'Mr. Localhost1', '827ccb0eea8a706c4c34a16891f84e7b', 'localhost@localhost1.com'),
('1002', 'Mr. Internet', '827ccb0eea8a706c4c34a16891f84e7b', 'internet@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
 ADD PRIMARY KEY (`enrollment_id`), ADD KEY `student_id` (`student_id`), ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `offeredcourse`
--
ALTER TABLE `offeredcourse`
 ADD PRIMARY KEY (`offer_id`), ADD KEY `course_code` (`course_code`), ADD KEY `teacher_id` (`teacher_id`), ADD KEY `offeredcourse_ibfk_4` (`semester_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
 ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
MODIFY `enrollment_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offeredcourse`
--
ALTER TABLE `offeredcourse`
MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
MODIFY `semester_id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`offer_id`) REFERENCES `offeredcourse` (`offer_id`);

--
-- Constraints for table `offeredcourse`
--
ALTER TABLE `offeredcourse`
ADD CONSTRAINT `offeredcourse_ibfk_1` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`),
ADD CONSTRAINT `offeredcourse_ibfk_2` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`),
ADD CONSTRAINT `offeredcourse_ibfk_3` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`),
ADD CONSTRAINT `offeredcourse_ibfk_4` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`semester_id`) ON UPDATE CASCADE,
ADD CONSTRAINT `offeredcourse_ibfk_5` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

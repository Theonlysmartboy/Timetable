-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2017 at 02:53 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yuni_yuni`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Department_id` int(11) NOT NULL,
  `Dept_Name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Department_id`, `Dept_Name`) VALUES
(1, 'IT'),
(2, 'Computer Science'),
(3, 'Education'),
(4, 'Sociology');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permisions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permisions`) VALUES
(1, 'Standard user', ''),
(2, 'Administrator', '{"admin": 1}');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `Title` varchar(4) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Middle_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Pf_No` int(11) NOT NULL,
  `Dept_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`Title`, `First_Name`, `Middle_Name`, `Last_Name`, `Pf_No`, `Dept_Id`) VALUES
('Mrs', 'Emmah', 'Namasi', 'Eunice', 2016, 2),
('Mr', 'Joseph', 'Odhiambo', 'Otieno', 2017, 1),
('MRS.', 'Emmah', 'Nambocho', 'Wekesa', 2019, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lecture_halls`
--

CREATE TABLE `lecture_halls` (
  `Id` int(11) NOT NULL,
  `Name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecture_halls`
--

INSERT INTO `lecture_halls` (`Id`, `Name`) VALUES
(1, 'LH_101'),
(2, 'LH_102'),
(3, 'LH_103'),
(4, 'LH_104'),
(6, 'LH_201');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `Prog_name` varchar(255) NOT NULL,
  `Prog_Id` int(11) NOT NULL,
  `Department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`Prog_name`, `Prog_Id`, `Department`) VALUES
('BSCIT', 1, 1),
('CS', 2, 2),
('BED', 3, 3),
('BBA', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `Id` int(11) NOT NULL,
  `Day` varchar(10) NOT NULL,
  `Session` int(10) NOT NULL,
  `Lecture_Hall` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`Id`, `Day`, `Session`, `Lecture_Hall`) VALUES
(1, '1', 1, 1),
(3, '2', 1, 1),
(4, '2', 2, 2),
(5, '3', 1, 1),
(6, '3', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `NAME` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`NAME`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `Id` int(11) NOT NULL,
  `Time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`Id`, `Time`) VALUES
(1, '7-8'),
(2, '8-9'),
(3, '9-10'),
(4, '10-11'),
(5, '11-12'),
(6, '12-13'),
(7, '13-14'),
(8, '14-15'),
(9, '15-16'),
(10, '16-17'),
(11, '17-18'),
(12, '18-19'),
(13, '19-20'),
(14, '20-21');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `Id` int(11) NOT NULL,
  `Schedule` int(11) NOT NULL,
  `Unit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`Id`, `Schedule`, `Unit`) VALUES
(3, 1, 'CIT103');

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `Year` int(11) NOT NULL,
  `timetable` text NOT NULL,
  `times` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`id`, `name`, `Semester`, `Year`, `timetable`, `times`) VALUES
(1, 1, 1, 1, '[[{"lesson":"Pe","teacher":"TAC"},{"lesson":"Te","teacher":"CP","location":"19"},{"lesson":"Ms","teacher":"SRJ","location":"18"},{"lesson":"Cs","teacher":"IW","location":"19"},{"lesson":"-"},{"lesson":"-"}],[{"lesson":"Cs","teacher":"IW","location":"19"},{"lesson":"Te","teacher":"DLB","location":"19"},{"lesson":"Fp","teacher":"TAC","location":"7"},{"lesson":"-"},{"lesson":"-"},{"lesson":"Ms","teacher":"SRJ","location":"18"}],[{"lesson":"Pd","teacher":"SJH","location":"26"},{"lesson":"Ms","teacher":"SRJ","location":"18"},{"lesson":"Te","teacher":"DLB","location":"19"},{"lesson":"Cs","teacher":"IW","location":"19"},{"lesson":"Ye","teacher":"MJC","location":"5"},{"lesson":"Ye","teacher":"MJC","location":"5"}],[{"lesson":"-"},{"lesson":"Cs","teacher":"IW","location":"19"},{"lesson":"Ms","teacher":"SRJ","location":"18"},{"lesson":"Te","teacher":"CP","location":"19"},{"lesson":"Ms","teacher":"SRJ","location":"18"},{"lesson":"Cs","teacher":"IW","location":"19"}],[{"lesson":"-"},{"lesson":"Ms","teacher":"SRJ","location":"18"},{"lesson":"Te","teacher":"CP","location":"19"},{"lesson":"-"},{"lesson":"-"},{"lesson":"CS","teacher":"IW","location":"19"}]]', '[["08:15","10:05"],["10:10","11:00"],["11:25","12:15"],["12:20","13:10"],["14:00","14:50"],["14:55","15:45"]]'),
(2, 2, 1, 2, '[[{"lesson":"Ms","teacher":"SRJ","location":"18"},{"lesson":"-"},{"lesson":"Te","teacher":"CP","location":"19"},{"lesson":"Cs","teacher":"IW","location":"19"},{"lesson":"Ms","teacher":"SRJ","location":"18"},{"lesson":"-"}],[{"lesson":"Te","teacher":"CP","location":"19"},{"lesson":"Ms","teacher":"SRJ","location":"18"},{"lesson":"Cs","teacher":"IW","location":"19"},{"lesson":"-"},{"lesson":"-"},{"lesson":"Te","teacher":"DLB","location":"19"}],[{"lesson":"Ms","teacher":"SRJ","location":"18"},{"lesson":"Pe","teacher":"JJM"},{"lesson":"Cs","teacher":"IW","location":"19"},{"lesson":"Te","teacher":"DLB","location":"15"},{"lesson":"Ye","teacher":"MJC","location":"5"},{"lesson":"Ye","teacher":"MJC","location":"5"}],[{"lesson":"Te","teacher":"CP","location":"19"},{"lesson":"Cs","teacher":"IW","location":"19"},{"lesson":"Pd","teacher":"SJH","location":"24"},{"lesson":"Cs","teacher":"IW","location":"19"},{"lesson":"Te"},{"lesson":"Ms","teacher":"SRJ","location":"18"}],[{"lesson":"-"},{"lesson":"Ms","teacher":"SRJ","location":"18"},{"lesson":"-"},{"lesson":"Cs","teacher":"IW","location":"19"},{"lesson":"Te","teacher":"DLB","location":"15"},{"lesson":"-"}]]', '[["09:15","10:05"],["10:10","11:00"],["11:25","12:15"],["12:20","13:10"],["14:00","14:50"],["14:55","15:45"]]'),
(3, 3, 2, 3, '[[{"lesson":"-"},{"lesson":"U6"},{"lesson":"L6"},{"lesson":"-"},{"lesson":"-"},{"lesson":"-"}],[{"lesson":"U6"},{"lesson":"-"},{"lesson":"-"},{"lesson":"-"},{"lesson":"-"},{"lesson":"L6"}],[{"lesson":"U6"},{"lesson":"L6"},{"lesson":"-"},{"lesson":"Y11"},{"lesson":"Y10"},{"lesson":"-"}],[{"lesson":"-"},{"lesson":"Y11"},{"lesson":"L6"},{"lesson":"-"},{"lesson":"U6"},{"lesson":"Y10"}],[{"lesson":"Y10"},{"lesson":"L6"},{"lesson":"-"},{"lesson":"U6"},{"lesson":"-"},{"lesson":"-"}]]', '[["09:15","10:05"],["10:10","11:00"],["11:25","12:15"],["12:20","13:10"],["14:00","14:50"],["14:55","15:45"]]'),
(4, 4, 2, 4, '[[{"lesson":"L6"},{"lesson":"-"},{"lesson":"-"},{"lesson":"Y11"},{"lesson":"L6"},{"lesson":"U6"}],[{"lesson":"U6"},{"lesson":"L6"},{"lesson":"-"},{"lesson":"-"},{"lesson":"U6"},{"lesson":"-"}],[{"lesson":"L6"},{"lesson":"-"},{"lesson":"U6"},{"lesson":"-"},{"lesson":"Y11"},{"lesson":"Y10"}],[{"lesson":"Y11"},{"lesson":"U6"},{"lesson":"Y10"},{"lesson":"-"},{"lesson":"-"},{"lesson":"L6"}],[{"lesson":"U6"},{"lesson":"L6"},{"lesson":"-"},{"lesson":"-"},{"lesson":"-"},{"lesson":"-"}]]', '[["09:15","10:05"],["10:10","11:00"],["11:25","12:15"],["12:20","13:10"],["14:00","14:50"],["14:55","15:45"]]');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `Unit_Name` varchar(255) NOT NULL,
  `Prog_Id` int(11) NOT NULL,
  `Unit_Code` varchar(12) NOT NULL,
  `Year` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `Lecturer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`Unit_Name`, `Prog_Id`, `Unit_Code`, `Year`, `Semester`, `Lecturer`) VALUES
('Introduction To teaching', 3, 'AED201', 2, 1, 2019),
('Fundamentals Of Programming', 1, 'CIT103', 1, 1, 2016),
('Fundamentals of IT', 1, 'UCI 101', 1, 1, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL,
  `Department` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `joined`, `group`, `Department`) VALUES
(8, 'Tosby', '34ad3d6661c73eaad2768d70af2d118fe0c229585da2a626018960bb05aa21ed', '4­b9ïØã*+\Z×»É‡Òå?d$ŸKENVZäv', 'JosÃ©ph', '2017-07-08 14:46:51', 2, 1),
(9, 'Test', '7b3b042e56173f3274ee91c1eecb3cdb208e07b5f508bdb1c0b6aebec8ff8d94', 'ó\Zb€ÈZt^™›öYÕ!MÓö5x:ô¶L”ï¬²', 'Test', '2017-07-10 08:15:40', 1, 2),
(10, 'uSER', '7e20a5780d6b785c0a1cee73372d435e57f3d1999b7cb77336f387af38db4ea5', ')¯¯Ðï˜ãt(÷+gM¾·š‹¯{Pt)–±£Âm:', 'jOSEPH', '2017-07-20 18:30:16', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_session`
--

CREATE TABLE `user_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `NAME` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`NAME`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Department_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`Pf_No`),
  ADD KEY `Dept_Id` (`Dept_Id`);

--
-- Indexes for table `lecture_halls`
--
ALTER TABLE `lecture_halls`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`Prog_Id`),
  ADD KEY `Department_id` (`Department`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`Day`,`Session`,`Lecture_Hall`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `Session` (`Session`),
  ADD KEY `Lecture_Hall` (`Lecture_Hall`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`NAME`),
  ADD UNIQUE KEY `NAME` (`NAME`),
  ADD UNIQUE KEY `NAME_2` (`NAME`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Unit` (`Unit`),
  ADD KEY `Schedule` (`Schedule`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `Year` (`Year`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`Unit_Code`),
  ADD KEY `Prog_Id` (`Prog_Id`),
  ADD KEY `Lecturer` (`Lecturer`),
  ADD KEY `Year` (`Year`),
  ADD KEY `Semester` (`Semester`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Department` (`Department`);

--
-- Indexes for table `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`NAME`),
  ADD UNIQUE KEY `NAME` (`NAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `Department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lecture_halls`
--
ALTER TABLE `lecture_halls`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `Prog_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_session`
--
ALTER TABLE `user_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_ibfk_1` FOREIGN KEY (`Dept_Id`) REFERENCES `departments` (`Department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `departments` (`Department_id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`Session`) REFERENCES `sessions` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedules_ibfk_2` FOREIGN KEY (`Lecture_Hall`) REFERENCES `lecture_halls` (`Id`);

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `Timetable_ibfk_1` FOREIGN KEY (`Unit`) REFERENCES `units` (`Unit_Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timetable_ibfk` FOREIGN KEY (`Schedule`) REFERENCES `schedules` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timetables`
--
ALTER TABLE `timetables`
  ADD CONSTRAINT `timetables_ibfk_1` FOREIGN KEY (`name`) REFERENCES `programs` (`Prog_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `Units_ibfk_1` FOREIGN KEY (`Prog_Id`) REFERENCES `programs` (`Prog_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idx_unit_CustomizationSet` FOREIGN KEY (`Lecturer`) REFERENCES `lecturers` (`Pf_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `units_ibfk_2` FOREIGN KEY (`Year`) REFERENCES `years` (`NAME`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `units_ibfk_3` FOREIGN KEY (`Semester`) REFERENCES `semesters` (`NAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Department`) REFERENCES `programs` (`Prog_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

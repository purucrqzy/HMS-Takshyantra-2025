-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 05:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `mobile_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `name`, `surname`, `age`, `address`, `postcode`, `state`, `education`, `created_at`, `mobile_no`) VALUES
(12, 'garad', 'garadpurushottam@gmail.com', '$2y$10$7bOijk4dRdzuJT/EperjS.dRQ3F/l1nFGoya7cdj2849j7vzIyyiW', 'Purushottam', 'Garad', 21, 'at. Ambulga, Post. Gharani, Ta. Chakur, Dist. Latur', '413513', 'Maharashtra', 'PHD', '2024-11-25 16:11:51', '1234312435'),
(13, 'shubham', 'shinde.rs2004@gmail.com', '$2y$10$RIODuUVpuQ7svDxjXJeJ1OWHX49zUinfs26QteyHa3lAhncEu0TDm', 'Shubham', 'Gangane', 23, 'at. Ambulga, Post. Gharani, Ta. Chakur, Dist. Latur', '413513', 'Maharashtra', 'btech', '2024-11-25 16:13:24', '1254789632');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `rollno` varchar(50) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `course` varchar(100) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `yearofstudy` varchar(20) NOT NULL,
  `address` text DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `hostel_preference` enum('single','shared') NOT NULL,
  `remark` text DEFAULT NULL,
  `applied_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `rollno` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `room_no` int(11) NOT NULL,
  `issue_type` varchar(50) NOT NULL,
  `remarks` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`rollno`, `name`, `surname`, `room_no`, `issue_type`, `remarks`, `status`, `created_at`) VALUES
('231131', 'Purushottam', 'Garad', 411, 'Table, Fan', 'broken', 'Resolved', '2024-11-27 10:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_manager`
--

CREATE TABLE `hostel_manager` (
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date DEFAULT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `smobile_no` varchar(15) DEFAULT NULL,
  `hostel_code` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_manager`
--

INSERT INTO `hostel_manager` (`username`, `firstname`, `lastname`, `gender`, `dob`, `mobile_number`, `smobile_no`, `hostel_code`, `email`, `address`, `password`, `created_at`) VALUES
('garad', 'purushottam', 'garad', 'male', '2003-06-10', '9356786420', '9356786420', 'ABCD', 'garadpurushottam@gmail.com', 'at. Ambulga, Post. Gharani, Ta. Chakur, Dist. Latur', '$2y$10$OEpIpPtti./Y3W27fCQKi.s906.HX9pIuqeK5decQobetC3ccfSKO', '2024-11-25 16:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_students`
--

CREATE TABLE `hostel_students` (
  `rollno` varchar(50) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `course` varchar(100) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `yearofstudy` varchar(20) NOT NULL,
  `address` text DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `hostel_preference` enum('single','shared') NOT NULL,
  `remark` text DEFAULT NULL,
  `applied_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `room_no` varchar(10) NOT NULL,
  `admitted_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_students`
--

INSERT INTO `hostel_students` (`rollno`, `sname`, `fname`, `surname`, `dob`, `email`, `phone`, `gender`, `course`, `department`, `yearofstudy`, `address`, `postcode`, `state`, `district`, `hostel_preference`, `remark`, `applied_on`, `room_no`, `admitted_on`) VALUES
('231131', 'Purushottam', 'Gopal', 'Garad', '2003-07-31', 'garadpurushottam@gmail.com', '1234312435', 'male', 'Bachelor of Technology', 'CSE', '3', 'at. Ambulga, Post. Gharani, Ta. Chakur, Dist. Latur', '413513', 'Maharashtra', 'latur', 'shared', 'If possible then please allocate the room with other CSE students', '2024-11-25 16:40:36', '411', '2024-11-25 16:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `student_access`
--

CREATE TABLE `student_access` (
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `course` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `year_of_study` varchar(20) DEFAULT NULL,
  `roll_no` varchar(50) DEFAULT NULL,
  `past_education` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `created_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_access`
--

INSERT INTO `student_access` (`username`, `email`, `mobile_no`, `name`, `surname`, `password`, `dob`, `course`, `department`, `year_of_study`, `roll_no`, `past_education`, `gender`, `address`, `postcode`, `state`, `district`, `created_on`) VALUES
('garad', 'garadpurushottam@gmail.com', '1234312435', 'Purushottam', 'Garad', '$2y$10$1UKWG5sxZ2aJSFzDevSO8u2QYIYOWfmoGyzYh42zOzE9/K.CLkRq6', '2003-07-31', 'Bachelor of Technology', 'CSE', '3', '231131', 'diploma', 'male', 'at. Ambulga, Post. Gharani, Ta. Chakur, Dist. Latur', '413513', 'Maharashtra', 'latur', '2024-11-25 22:10:06'),
('ritesh', 'shinde.rs2004@gmail.com', '1254789632', 'Ritesh', 'Shinde', '$2y$10$oomtw2MHlYuM8XMEt8oGfOrY34Ouc1Gwq/2ARsEAlO0sRNXBxdhg6', '2001-07-11', 'Bachelor of Technology', 'ECE', '3', '231052', 'diploma', 'male', 'at. Ambulga, Post. Gharani, Ta. Chakur, Dist. Latur', '413513', 'Maharashtra', 'latur', '2024-11-25 22:15:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `hostel_manager`
--
ALTER TABLE `hostel_manager`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `hostel_students`
--
ALTER TABLE `hostel_students`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `student_access`
--
ALTER TABLE `student_access`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `roll_no` (`roll_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`rollno`) REFERENCES `student_access` (`roll_no`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`rollno`) REFERENCES `hostel_students` (`rollno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostel_students`
--
ALTER TABLE `hostel_students`
  ADD CONSTRAINT `fk_rollno_student_access` FOREIGN KEY (`rollno`) REFERENCES `student_access` (`roll_no`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

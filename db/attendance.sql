-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2018 at 01:17 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attendance_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `username`, `login_date`, `logout_date`, `stud_id`, `status`) VALUES
(1, 'zeddy', '2018-03-29 22:50:38', '', 5, 'Present'),
(2, 'raph', '2018-03-29 23:31:16', '', 6, 'Present'),
(3, 'zeddy', '2018-03-29 23:31:47', '', 5, 'Present'),
(4, 'peter', '2018-03-30 01:45:18', '', 16, 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department`, `course`) VALUES
(1, 'COPAS', 'Clinical '),
(2, 'COHES', 'BBIT'),
(3, 'Finance', 'BCOM'),
(4, 'IT', 'IT'),
(5, 'COPAS', 'Agriculture'),
(6, 'COPAS', 'Agriculture'),
(7, 'COPAS', 'Agriculture'),
(8, 'IT', 'IT'),
(9, 'IT', 'IT'),
(10, 'IT', 'IT'),
(11, 'IT', 'IT'),
(12, 'COHRED', 'BCOM'),
(13, 'COHRED', 'BCOM'),
(16, 'COPAS', 'Clinical '),
(17, 'COHRED', 'BCOM');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `username`, `password`, `f_name`, `l_name`, `email`, `department`, `position`) VALUES
(1, 'mercy', '123', 'Mercy', 'Chemutai', 'chemu@gmail.com', 'COHRED', 'Chairman'),
(2, 'okello', '123', 'Simon', 'Okello', 'simonokello93@gmail.com', 'IT', 'Chairman');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `stud_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `yrOfStudy` varchar(100) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stud_id`, `reg_no`, `username`, `password`, `f_name`, `l_name`, `gender`, `department`, `course`, `yrOfStudy`, `teacher`) VALUES
(5, 'hd232-5560/2014', 'zeddy', '123', 'Zeddy', 'Chemutai', 'Female', 'Cohred', 'Bbit', '2.1', 'Simon Okello'),
(6, 'hd232-4702/2014', 'raph', '123', 'Raphael', 'Wambua', 'Male', 'COPAS', 'Agriculture', '1.1', 'Mercy Chemutai'),
(13, 'hd232-2488/2014', '', '', 'Simon', 'Okello', 'Male', 'IT', 'IT', '1.2', 'Mercy Chemutai'),
(15, 'hd232-2472/2014', '', '', 'Mercy', 'Chemutai', 'Female', 'COPAS', 'Clinical ', '1.2', 'Simon Okello'),
(16, 'hd232-1234/2014', 'peter', '123', 'Peter', 'Mutema', 'Male', 'COHRED', 'BCOM', '1.1', 'Mercy Chemutai');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

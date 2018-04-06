-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2017 at 08:04 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gregpilar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type_of_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `lname`, `fname`, `password`, `type_of_user`) VALUES
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'registrar'),
(5, 'qq', 'ssq', 'qs', 'c20ad4d76fe97759aa27a0c99bff6710', 'principal');

-- --------------------------------------------------------

--
-- Table structure for table `behavior_statements`
--

CREATE TABLE `behavior_statements` (
  `BS_id` int(11) NOT NULL,
  `core_id` int(11) NOT NULL,
  `B_statements` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `behavior_statements`
--

INSERT INTO `behavior_statements` (`BS_id`, `core_id`, `B_statements`) VALUES
(1, 1, 'expresses ones spiritual beliefs while respecting the spiritual beliefs of others'),
(2, 1, 'Show adherence to ethical principles by upholding truth'),
(3, 2, 'Is sensitive to individual social and cultural differences'),
(4, 2, 'Demonsrates contributions toward solidarity'),
(5, 3, 'cares for the environment and utilizes resources wisely,judiciously and economically'),
(6, 4, 'Demostrates pride in being a Filipino; exercises t the rights and responsibilities of filipino citizen'),
(7, 4, 'demonstrates appropiate behavior in carrying out activities in the school,community and country');

-- --------------------------------------------------------

--
-- Table structure for table `core_values`
--

CREATE TABLE `core_values` (
  `core_id` int(11) NOT NULL,
  `core_values` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_values`
--

INSERT INTO `core_values` (`core_id`, `core_values`) VALUES
(1, 'Maka-Diyos'),
(2, 'MakaTao'),
(3, 'MakaKalikasan'),
(4, 'Maka Bansa');

-- --------------------------------------------------------

--
-- Table structure for table `g_level`
--

CREATE TABLE `g_level` (
  `g_id` int(255) NOT NULL,
  `grade_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `g_level`
--

INSERT INTO `g_level` (`g_id`, `grade_name`) VALUES
(1, 'kinder 1'),
(2, 'kinder 2'),
(3, 'Grade 1'),
(4, 'Grade 2'),
(5, 'Grade 3'),
(6, 'Grade 4'),
(7, 'Grade 5'),
(8, 'Grade 6');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `sec_id` int(255) NOT NULL,
  `sec_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sec_id`, `sec_name`) VALUES
(1, 'Love1'),
(2, 'Faith1'),
(3, 'Peace1'),
(4, 'Hope1'),
(5, 'Grace1'),
(6, 'Moses2'),
(7, 'solomon2'),
(8, 'Daniel2'),
(9, 'Joshua2'),
(10, 'jacob2'),
(11, 'Sampaguita3'),
(12, 'Orchids3'),
(13, 'Ilang-Ilang3'),
(14, 'Gumammela3'),
(15, 'Santan3'),
(16, 'Narra4'),
(17, 'Coconut4'),
(18, 'Yakal4'),
(19, 'Mahogany4'),
(20, 'Galileo5'),
(21, 'Newton5'),
(22, 'Einstein5'),
(23, 'Socrates5'),
(24, 'charity6'),
(25, 'humility6'),
(26, 'Piety6'),
(27, 'Purity6');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `studno` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `b_certificate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`studno`, `lname`, `fname`, `mname`, `suffix`, `bdate`, `age`, `gender`, `address`, `fathername`, `mothername`, `b_certificate`) VALUES
('2016-0', 'quintoo', 'ted', 'R', 'II', '1997-12-13', '18', 'male', 'asd', 'asd', 'asd', 'complete'),
('2016-1', 'merillo', 'bossbry', 'S', '', '1996-12-13', '17', 'male', 'asd', 'asd', 'asds', 'complete'),
('2017-10', 'singh', 'juls', 'R', 'II', '1999-02-15', '8', 'female', 'asd', 'asd', 'asd', 'incomplete'),
('2017-11', 'KUKU', 'ttamm', 'T', 'II', '2011-06-21', '5', 'female', 'asd', 'ase', 'asd', 'complete'),
('2017-2', 'Raved', 'gangs', 'Sam', 'Jr', '1999-03-17', '17', 'male', 'asd', 'asd', 'asd', 'complete'),
('2017-3', 'Vamps', 'fred', 'R', 'II', '1997-07-22', '19', 'male', 'asd', 'asd', 'asd', 'complete'),
('2017-4', '', 'ted', 'R', 'II', '1997-12-13', '18', 'male', 'asd', 'asd', 'asd', 'complete'),
('2017-5', 'dens', 'Dendi', 'G', '', '1997-12-14', '19', 'female', 'asd', 'asd', 'asd', 'incomplete'),
('2017-6', 'bagon', 'ems', 'F', 'IV', '2007-06-27', '9', 'female', 'sd', 'sds', 'asd', 'incomplete'),
('2017-7', 'Mandy', 'moore', 'G', 'I', '2005-11-22', '11', 'female', 'asd', 'asd', 'Grweq', 'incomplete'),
('2017-8', 'Moto', 'pick', 'Y', 'III', '1999-07-10', '17', 'female', 'asd', 'asd', 'dsds', 'complete'),
('2017-9', 'Miracle', 'Bert', 'Yasay', 'Sr', '2002-07-17', '14', 'male', 'asd', 'asd', 'asd', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `student_grade`
--

CREATE TABLE `student_grade` (
  `id` int(50) NOT NULL,
  `studno` varchar(255) NOT NULL,
  `glevel_section` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `1st_periodical_test` int(50) NOT NULL,
  `2nd_periodical_test` int(50) NOT NULL,
  `3rd_periodical_test` int(50) NOT NULL,
  `4th_periodical_test` int(50) DEFAULT NULL,
  `gen_avee` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_gradee`
--

CREATE TABLE `student_gradee` (
  `id` int(11) NOT NULL,
  `studno` varchar(50) NOT NULL,
  `glevel_section` varchar(50) NOT NULL,
  `subjects` varchar(50) NOT NULL,
  `grades` int(11) NOT NULL,
  `grading_period` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_gradee`
--

INSERT INTO `student_gradee` (`id`, `studno`, `glevel_section`, `subjects`, `grades`, `grading_period`) VALUES
(1, '2016-0', 'Grade 3-Orchids3 ', 'Filipino', 90, '1'),
(2, '2016-1', 'Grade 3-Orchids3 ', 'Filipino', 99, '1'),
(3, '2016-1', 'Grade 4-Narra4 ', 'Filipino', 88, '1'),
(4, '2016-1', 'Grade 3-Orchids3 ', 'English', 77, '1'),
(5, '2016-1', 'Grade 3-Orchids3 ', 'MAthematics', 90, '1'),
(6, '2016-1', 'Grade 3-Orchids3 ', 'Science', 78, '1'),
(7, '2016-1', 'Grade 3-Orchids3 ', 'Filipino', 67, '2'),
(8, '2016-1', 'Grade 3-Orchids3 ', 'Filipino', 89, '3'),
(9, '2016-1', 'Grade 3-Orchids3 ', 'Filipino', 90, '4'),
(10, '2016-1', 'Grade 3-Orchids3 ', 'English', 67, '2'),
(11, '2016-1', 'Grade 3-Orchids3 ', 'English', 90, '3'),
(12, '2016-1', 'Grade 3-Orchids3', 'English', 90, '4'),
(13, '2016-1', 'Grade 3-Orchids3', 'MAthematics', 77, '2'),
(14, '2016-1', 'Grade 3-Orchids3', 'MAthematics', 90, '3'),
(15, '2016-1', 'Grade 3-Orchids3', 'MAthematics', 90, '4'),
(16, '2016-1', 'Grade 3-Orchids3', 'Science', 89, '2'),
(17, '2016-1', 'Grade 3-Orchids3', 'Science', 90, '3'),
(18, '2016-1', 'Grade 3-Orchids3', 'Science', 77, '4'),
(19, '2016-1', 'Grade 3-Orchids3 ', 'Music', 88, '1'),
(20, '2016-1', 'Grade 3-Orchids3 ', 'Music', 88, '2'),
(21, '2016-1', 'Grade 3-Orchids3 ', 'Music', 90, '3'),
(22, '2016-1', 'Grade 3-Orchids3 ', 'Music', 90, '4'),
(23, '2016-1', 'Grade 3-Orchids3 ', 'Art', 78, '1'),
(24, '2016-1', 'Grade 3-Orchids3 ', 'Art', 77, '2'),
(25, '2016-1', 'Grade 3-Orchids3 ', 'Art', 90, '3'),
(26, '2016-1', 'Grade 3-Orchids3 ', 'Art', 90, '4'),
(27, '2016-1', 'Grade 3-Orchids3 ', 'P.E', 77, '1'),
(28, '2016-1', 'Grade 3-Orchids3 ', 'P.E', 67, '2'),
(29, '2016-1', 'Grade 3-Orchids3 ', 'P.E', 67, '3'),
(30, '2016-1', 'Grade 3-Orchids3 ', 'P.E', 99, '4'),
(31, '2016-1', 'Grade 3-Orchids3 ', 'health', 90, '1'),
(32, '2016-1', 'Grade 3-Orchids3 ', 'health', 89, '2'),
(33, '2016-1', 'Grade 3-Orchids3 ', 'health', 87, '3'),
(34, '2016-1', 'Grade 3-Orchids3 ', 'health', 67, '4'),
(35, '2016-1', 'Grade 3-Orchids3 ', 'Araling Panlipunan', 77, '1'),
(36, '2016-1', 'Grade 3-Orchids3 ', 'Edukasyong sa Pagpapakatao', 77, '1'),
(37, '2016-1', 'Grade 3-Orchids3 ', 'EPP', 77, '1'),
(38, '2016-1', 'Grade 3-Orchids3 ', 'MAPEH', 77, '1'),
(39, '2016-1', 'Grade 3-Orchids3 ', 'Araling Panlipunan', 89, '2'),
(40, '2016-1', 'Grade 3-Orchids3 ', 'Edukasyong sa Pagpapakatao', 77, '2'),
(41, '2016-1', 'Grade 3-Orchids3 ', 'Araling Panlipunan', 90, '3'),
(42, '2016-1', 'Grade 3-Orchids3 ', 'Araling Panlipunan', 90, '4'),
(43, '2016-1', 'Grade 3-Orchids3', 'Edukasyong sa Pagpapakatao', 67, '3'),
(44, '2016-1', 'Grade 3-Orchids3', 'Edukasyong sa Pagpapakatao', 78, '4'),
(45, '2016-1', 'Grade 3-Orchids3', 'EPP', 78, '2'),
(46, '2016-1', 'Grade 3-Orchids3', 'EPP', 90, '3'),
(47, '2016-1', 'Grade 3-Orchids3', 'EPP', 90, '4'),
(48, '2016-1', 'Grade 3-Orchids3', 'MAPEH', 67, '2'),
(49, '2016-1', 'Grade 3-Orchids3', 'MAPEH', 78, '3'),
(50, '2016-1', 'Grade 3-Orchids3', 'MAPEH', 67, '4');

-- --------------------------------------------------------

--
-- Table structure for table `student_record`
--

CREATE TABLE `student_record` (
  `id` int(11) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `studno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_record`
--

INSERT INTO `student_record` (`id`, `grade_level`, `section`, `school_year`, `studno`) VALUES
(1, 'Grade 3', 'Orchids3', '2017-2018', '2016-0'),
(5, 'Grade 3', 'Orchids3', '2016-2017', '2016-2'),
(6, 'Grade 5', 'Mahogany4', '2016-2017', '2016-3'),
(15, 'Grade 3', 'Orchids3', '2016-2017', '2016-1'),
(16, 'Grade 4', 'Narra4', '2017-2018', '2017-2'),
(17, 'Grade 5', 'Mahogany4', '2017-2018', '2017-4'),
(20, 'Grade 4', 'Narra4', '2017-2018', '2017-11'),
(21, 'Grade 1', 'Coconut4', '2017-2018', '2017-12'),
(23, 'Grade 4', 'Narra4', '2017-2018', '2016-1');

-- --------------------------------------------------------

--
-- Table structure for table `student_values`
--

CREATE TABLE `student_values` (
  `id` int(11) NOT NULL,
  `studno` varchar(50) NOT NULL,
  `glevel_section` varchar(50) NOT NULL,
  `BS_id` int(11) NOT NULL,
  `quarter` int(11) NOT NULL,
  `observance_results` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_values`
--

INSERT INTO `student_values` (`id`, `studno`, `glevel_section`, `BS_id`, `quarter`, `observance_results`) VALUES
(1, '2016-1', 'Grade 3-Orchids3', 1, 1, ' AO'),
(2, '2016-1', 'Grade 3-Orchids3', 2, 1, ' AO'),
(3, '2016-1', 'Grade 3-Orchids3', 3, 1, ' AO'),
(4, '2016-1', 'Grade 3-Orchids3', 4, 1, ' AO'),
(5, '2016-1', 'Grade 3-Orchids3', 5, 1, ' AO'),
(6, '2016-1', 'Grade 3-Orchids3', 6, 1, ' AO'),
(7, '2016-1', 'Grade 3-Orchids3', 7, 1, ' AO');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(255) NOT NULL,
  `sub_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_name`) VALUES
(1, 'Filipino'),
(2, 'English'),
(3, 'MAthematics'),
(4, 'Science'),
(5, 'Araling Panlipunan'),
(6, 'Edukasyong sa Pagpapakatao'),
(7, 'EPP'),
(8, 'MAPEH'),
(9, 'Music'),
(10, 'Art'),
(11, 'P.E'),
(12, 'health'),
(13, 'Mother Toungue');

-- --------------------------------------------------------

--
-- Table structure for table `teachersinfo`
--

CREATE TABLE `teachersinfo` (
  `teachers_id` int(11) NOT NULL,
  `teachers_lname` varchar(255) NOT NULL,
  `teachers_fname` varchar(255) NOT NULL,
  `teachers_mname` varchar(255) NOT NULL,
  `teachers_bday` date NOT NULL,
  `teachers_age` int(80) NOT NULL,
  `teachers_gender` varchar(30) NOT NULL,
  `teachers_address` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachersinfo`
--

INSERT INTO `teachersinfo` (`teachers_id`, `teachers_lname`, `teachers_fname`, `teachers_mname`, `teachers_bday`, `teachers_age`, `teachers_gender`, `teachers_address`, `status`) VALUES
(2000160, 'dichoso', 'anamarie', 'R.', '1989-06-13', 27, 'female', 'asd', 'single'),
(2000161, 'bautista', 'nora', 's', '1999-05-17', 17, 'female', 'sdasd', 'married'),
(2000162, 'zamora', 'princess', 'd', '1994-09-19', 22, 'female', 'sad', 'married'),
(2000163, 'reid', 'james', 'd', '1998-12-28', 18, 'male', 'dsa', 'single'),
(2000164, 'sam', 'ww', 'sd', '1990-06-12', 26, 'female', 'dsdsd', 'single'),
(2000165, 'sds', 'asd', 'sad', '1970-06-16', 46, 'male', 'sds', 'single'),
(2000166, 'sdsasd', 'asdasdsa', 'asdasdasd', '2009-01-05', 8, 'female', 'sad', 'married'),
(2000167, 'a', 'a', 'a', '1979-01-01', 38, 'female', 'aa', 'single'),
(2000168, 'ssd', 'dsds', 'asdsd', '2010-01-04', 7, 'male', 'asd', 'single');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_class`
--

CREATE TABLE `teachers_class` (
  `t_id` int(255) NOT NULL,
  `teachers_id` varchar(255) NOT NULL,
  `glevel_section` varchar(255) NOT NULL,
  `type_of_teacher` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL,
  `b_time` varchar(10) NOT NULL,
  `e_time` varchar(10) NOT NULL,
  `day` varchar(15) NOT NULL,
  `school_year` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers_class`
--

INSERT INTO `teachers_class` (`t_id`, `teachers_id`, `glevel_section`, `type_of_teacher`, `subjects`, `b_time`, `e_time`, `day`, `school_year`) VALUES
(1, '2000160', 'Grade 3-Orchids3 ', 'advisor', 'Filipino', '01:30', '02:30', 'M,T,W', '2017-2018'),
(5, '2000160', 'Grade 3-Orchids3 ', 'advisor', 'English', '08:30', '09:30', 'M,W,Fri', '2017-2018'),
(6, '2000160', 'Grade 3-Orchids3 ', 'advisor', 'MAthematics', '09:30', '10:30', 'M,W,Fri', '2017-2018'),
(7, '2000160', 'Grade 3-Orchids3 ', 'advisor', 'Science', '10:30', '11:30', 'M,W,Fri', '2017-2018'),
(13, '2000162', 'Grade 4-Narra4 ', 'advisor', 'MAthematics', '08:30', '09:30', 'T,W', '2017-2018'),
(14, '2000161', 'Grade 3-Orchids3 ', 'Subject_teacher', 'Araling Panlipunan', '07:30', '08:30', 'M,W,Fri', '2017-2018'),
(15, '2000161', 'Grade 3-Orchids3 ', 'Subject_teacher', 'Edukasyong sa Pagpapakatao', '14:30', '15:30', 'M,W,Fri', '2017-2018'),
(16, '2000161', 'Grade 3-Orchids3 ', 'Subject_teacher', 'EPP', '15:30', '16:30', 'M,W,Fri', '2017-2018'),
(17, '2000161', 'Grade 3-Orchids3 ', 'Subject_teacher', 'MAPEH', '07:30', '20:30', 'T,Thu', '2017-2018'),
(18, '2000162', 'Grade 3-Orchids3 ', 'Subject_teacher', 'Music', '08:30', '09:30', 'T,Thu', '2017-2018'),
(19, '2000162', 'Grade 3-Orchids3 ', 'Subject_teacher', 'Art', '09:30', '10:30', 'T,Thu', '2017-2018'),
(20, '2000162', 'Grade 3-Orchids3 ', 'Subject_teacher', 'P.E', '10:30', '11:30', 'W', '2017-2018'),
(21, '2000162', 'Grade 3-Orchids3 ', 'Subject_teacher', 'health', '10:30', '11:30', 'Fri', '2017-2018'),
(46, '2000160', 'Grade 4-Narra4 ', 'Subject_teacher', 'Filipino', '01:00', '14:00', 'Thu', '2017-2018'),
(47, '2000163', 'Grade 4-Narra4 ', 'Subject_teacher', 'P.E', '07:30', '08:30', 'Fri', '2017-2018'),
(48, '2000168', 'Grade 4-Narra4 ', 'Subject_teacher', 'Edukasyong sa Pagpapakatao', '16:30', '17:30', 'Thu', '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_files`
--

CREATE TABLE `teachers_files` (
  `teachers_id` int(11) NOT NULL,
  `bachelor` varchar(255) NOT NULL,
  `masteral` varchar(255) NOT NULL,
  `doctorate` varchar(255) NOT NULL,
  `f_concentration` text NOT NULL,
  `LET_passer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers_files`
--

INSERT INTO `teachers_files` (`teachers_id`, `bachelor`, `masteral`, `doctorate`, `f_concentration`, `LET_passer`) VALUES
(2000160, 'BEED', ' ', ' ', 'general_education,Math', 'yes'),
(2000161, 'BEED', ' ', ' ', 'Science,MAPEH', 'yes'),
(2000162, 'BEED', 'masteral in english Lit', ' ', 'Science,MAPEH', 'yes'),
(2000167, 'BEED', '', 'asd', 'E.C.E', 'yes'),
(2000168, 'dd', '', 'asd', 'English', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `behavior_statements`
--
ALTER TABLE `behavior_statements`
  ADD PRIMARY KEY (`BS_id`),
  ADD KEY `core_id` (`core_id`);

--
-- Indexes for table `core_values`
--
ALTER TABLE `core_values`
  ADD PRIMARY KEY (`core_id`);

--
-- Indexes for table `g_level`
--
ALTER TABLE `g_level`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`studno`);

--
-- Indexes for table `student_grade`
--
ALTER TABLE `student_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_gradee`
--
ALTER TABLE `student_gradee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_record`
--
ALTER TABLE `student_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_values`
--
ALTER TABLE `student_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teachersinfo`
--
ALTER TABLE `teachersinfo`
  ADD PRIMARY KEY (`teachers_id`);

--
-- Indexes for table `teachers_class`
--
ALTER TABLE `teachers_class`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `teachers_files`
--
ALTER TABLE `teachers_files`
  ADD PRIMARY KEY (`teachers_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `behavior_statements`
--
ALTER TABLE `behavior_statements`
  MODIFY `BS_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `core_values`
--
ALTER TABLE `core_values`
  MODIFY `core_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `g_level`
--
ALTER TABLE `g_level`
  MODIFY `g_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sec_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `student_grade`
--
ALTER TABLE `student_grade`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_gradee`
--
ALTER TABLE `student_gradee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `student_record`
--
ALTER TABLE `student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `student_values`
--
ALTER TABLE `student_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `teachers_class`
--
ALTER TABLE `teachers_class`
  MODIFY `t_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `behavior_statements`
--
ALTER TABLE `behavior_statements`
  ADD CONSTRAINT `behavior_statements_ibfk_1` FOREIGN KEY (`core_id`) REFERENCES `core_values` (`core_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

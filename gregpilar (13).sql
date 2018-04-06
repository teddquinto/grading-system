-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 05:50 PM
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
('2016-0', 'quinto', 'ted', 'R', 'II', '1997-12-13', '18', 'male', 'asd', 'asd', 'asd', 'complete'),
('2016-1', 'merello', 'bossbry', 'S              ', 'sd', '1990-06-12', '26', 'male', 'sa', 's', 'we', 'complete'),
('2017-10', 'asd', 'asd', 'dasfq', 'ad', '2008-12-28', '8', 'female', 'sdqs', 'sad', 'sad', 'incomplete'),
('2017-11', 'reid', 'james', 'Quinto', 'Jr', '2009-01-12', '8', 'female', 'aw', 'asd', 'asd', 'complete'),
('2017-2', 'sing', 'juls', 'R', 'ds', '2000-02-15', '16', 'male', 's', 'sd', 'sd', 'incomplete'),
('2017-3', 'merello', 'bossbry', 'R', '', '2008-12-29', '8', 'male', 'sd', 'dsf', 'sdf', 'complete'),
('2017-4', 'john', 'steve', 's', '', '2000-02-07', '16', 'female', 'asd', 'sad', 'dsad', 'incomplete'),
('2017-5', 'adrian', 'asd', 'askd', '', '2000-06-12', '16', 'male', 'asd', 'adsd', 'sad', 'incomplete'),
('2017-6', 'sham', 'askd', 'sadk', 'a', '2009-01-05', '8', 'male', 'asd', 'dasd', 'sad', 'incomplete'),
('2017-7', 'qwe', 'wqe', 'eqwe', 'we', '2008-12-28', '8', 'male', 'sa', 'ds', 'sdd', 'incomplete'),
('2017-8', 'sad', 'dass', 'dass', 'd', '2009-01-05', '8', 'female', 'asd', 'das', 'sd', 'incomplete'),
('2017-9', 'sadddd', 'dwd', 'dwdw', 'wdw', '2009-01-05', '8', 'male', 'wdw', 'wd', 'wdw', 'incomplete');

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

--
-- Dumping data for table `student_grade`
--

INSERT INTO `student_grade` (`id`, `studno`, `glevel_section`, `subject`, `1st_periodical_test`, `2nd_periodical_test`, `3rd_periodical_test`, `4th_periodical_test`, `gen_avee`) VALUES
(1, '2017-2', 'Grade 3-Orchids3 ', 'mathematics', 78, 89, 98, 99, 91),
(2, '2017-2', 'Grade 3-Orchids3 ', 'Filipino', 89, 90, 90, 90, 89.75),
(3, '2017-2', 'Grade 3-Orchids3 ', 'Mother Toungue', 89, 97, 90, 99, 93.75),
(4, '2017-2', 'Grade 3-Orchids3 ', 'Art', 90, 90, 90, 90, 90),
(5, '2017-2', 'Grade 3-Orchids3 ', 'Music', 78, 80, 92, 82, 83),
(6, '2017-2', 'Grade 3-Orchids3 ', 'science', 99, 82, 90, 89, 90),
(7, '2017-2', 'Grade 3-Orchids3 ', 'English', 90, 90, 90, 90, 90),
(8, '2017-2', 'Grade 3-Orchids3 ', 'P.E', 82, 92, 81, 81, 84),
(9, '2017-2', 'Grade 3-Orchids3 ', 'health', 89, 38, 83, 74, 71),
(10, '2017-2', 'Grade 3-Orchids3 ', 'Edukasyong sa Pagpapakatao', 90, 95, 93, 83, 90.25),
(11, '2017-2', 'Grade 3-Orchids3 ', 'MAPEH', 93, 84, 82, 84, 85.75),
(12, '2017-2', 'Grade 3-Orchids3 ', 'EPP', 89, 82, 83, 93, 86.75),
(34, '2016-0', 'Grade 3-Orchids3 ', 'science', 45, 45, 45, 45, 28),
(35, '2016-1', 'Grade 3-Orchids3 ', 'science', 45, 45, 45, 45, 17),
(36, '2016-1', 'Grade 2-Joshua2 ', 'Filipino', 89, 89, 89, 89, 88.75),
(39, '2016-0', 'Grade 3-Orchids3', 'Filipino', 90, 98, 82, 93, 90.75),
(57, '2016-1', 'Grade 3-Orchids3', 'Filipino', 90, 92, 93, 90, 91.25),
(58, '2017-11', 'Grade 4-Narra4', 'Filipino', 90, 90, 90, 90, 90),
(59, '2016-1', 'Grade 3-Orchids3', 'Edukasyong sa Pagpapakatao', 90, 89, 67, 98, 86),
(60, '2016-0', 'Grade 3-Orchids3', 'health', 89, 90, 98, 78, 88.75),
(61, '2016-1', 'Grade 3-Orchids3', 'health', 89, 90, 78, 89, 86.5);

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
(1, 'Grade 3', 'Orchids3', '2016-2018', '2016-0'),
(2, 'Grade 6', 'Piety6', '2016-2018', '2016-1'),
(3, 'Grade 2', 'Joshua2', '2016-2017', '2016-2'),
(4, 'kinder 1', 'Love1', '', ''),
(5, 'Grade 3', 'Orchids3', '2016-2017', '2016-2'),
(6, 'Grade 5', 'Mahogany4', '2016-2017', '2016-3'),
(14, 'Grade 3', 'Orchids3', '', '2016-3'),
(15, 'Grade 3', 'Orchids3', '2016-2017', '2016-1'),
(16, 'Grade 4', 'Narra4', '2017-2018', '2017-2'),
(17, 'Grade 6', 'Purity6', '2016-2017', '2017-4'),
(20, 'Grade 4', 'Narra4', '2017-2018', '2017-11');

-- --------------------------------------------------------

--
-- Table structure for table `student_values`
--

CREATE TABLE `student_values` (
  `id` int(11) NOT NULL,
  `studno` varchar(50) NOT NULL,
  `BS_id` int(11) NOT NULL,
  `quarter` varchar(10) NOT NULL,
  `observance_results` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_values`
--

INSERT INTO `student_values` (`id`, `studno`, `BS_id`, `quarter`, `observance_results`) VALUES
(1, '2017-2', 1, '1', 'SO'),
(2, '2017-2', 2, '1', 'SO'),
(3, '2017-2', 3, '1', 'SO'),
(4, '2017-2', 4, '1', 'SO'),
(5, '2017-2', 5, '1', 'SO'),
(6, '2017-2', 6, '1', 'SO'),
(7, '2017-2', 7, '1', 'SO'),
(22, '2017-2', 1, '2', 'SO'),
(23, '2017-2', 2, '2', 'SO'),
(24, '2017-2', 3, '2', 'SO'),
(25, '2017-2', 4, '2', ' AO'),
(26, '2017-2', 5, '2', ' AO'),
(27, '2017-2', 6, '2', ' AO'),
(28, '2017-2', 7, '2', ' AO');

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
  `teachers_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachersinfo`
--

INSERT INTO `teachersinfo` (`teachers_id`, `teachers_lname`, `teachers_fname`, `teachers_mname`, `teachers_bday`, `teachers_age`, `teachers_gender`, `teachers_address`) VALUES
(2000160, 'dichoso', 'anamarie', 'R.', '1989-06-13', 27, 'female', 'asd'),
(2000161, 'bautista', 'nora', 's', '1999-05-17', 17, 'female', 'sdasd'),
(2000162, 'zamora', 'princess', 'd', '1994-09-19', 22, 'female', 'sad');

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
  `school_year` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers_class`
--

INSERT INTO `teachers_class` (`t_id`, `teachers_id`, `glevel_section`, `type_of_teacher`, `subjects`, `school_year`) VALUES
(1, '2000160', 'Grade 3-Orchids3 ', 'advisor', 'Filipino', '2017-2018'),
(2, '2000160', 'Grade 3-Orchids3 ', 'advisor', 'English', '2017-2018'),
(3, '2000160', 'Grade 3-Orchids3 ', 'advisor', 'Science', '2017-2018'),
(4, '2000160', 'Grade 3-Orchids3 ', 'advisor', 'health', '2017-2018'),
(5, '2000161', 'Grade 3-Orchids3 ', 'Subject_teacher', 'MAthematics', '2017-2018'),
(6, '2000161', 'Grade 3-Orchids3 ', 'Subject_teacher', 'Araling Panlipunan', '2017-2018'),
(7, '2000161', 'Grade 3-Orchids3 ', 'Subject_teacher', 'Edukasyong sa Pagpapakatao', '2017-2018'),
(8, '2000161', 'Grade 3-Orchids3 ', 'Subject_teacher', 'Mother Toungue', '2017-2018'),
(9, '2000162', 'Grade 3-Orchids3 ', 'Subject_teacher', 'Art', '2017-2018'),
(10, '2000162', 'Grade 3-Orchids3 ', 'Subject_teacher', 'Music', '2017-2018'),
(11, '2000162', 'Grade 3-Orchids3 ', 'Subject_teacher', 'MAPEH', '2017-2018'),
(12, '2000162', 'Grade 3-Orchids3 ', 'Subject_teacher', 'EPP', '2017-2018'),
(13, '2000160', 'Grade 5-Mahogany4 ', 'Subject_teacher', 'MAPEH', '2016-2017'),
(14, '2000161', 'Grade 4-Narra4 ', 'advisor', 'Filipino', '2017-2018');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `student_record`
--
ALTER TABLE `student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `student_values`
--
ALTER TABLE `student_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `teachers_class`
--
ALTER TABLE `teachers_class`
  MODIFY `t_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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

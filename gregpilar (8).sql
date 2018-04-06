-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2016 at 05:22 PM
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
  `username` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `type_of_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `lname`, `fname`, `password`, `type_of_user`) VALUES
('admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'registrar'),
('teacher1', 'quinto', 'asd', '8d788385431273d11e8b43bb78f3aa41', 'teacher'),
('tee', 'quinto', 'quinto', 'a04ce4f25ad79ff8ba880390edfb1ab4', ''),
('tee', 'quinto', 'quinto', 'a04ce4f25ad79ff8ba880390edfb1ab4', ''),
('qq', 'ssq', 'qs', 'c20ad4d76fe97759aa27a0c99bff6710', 'principal');

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
('2016-0', 'quinto', 'ted', 'R', 'II', '1997-12-13', '18', 'male', 'sds', 'sdw', 'as', 'incomplete'),
('2016-1', 'merello', 'bossbry', 'S', '', '1990-06-18', '26', 'male', 'sa', 'dmd', 'dm', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `student_grade`
--

CREATE TABLE `student_grade` (
  `id` int(11) NOT NULL,
  `studno` varchar(20) NOT NULL,
  `grade_level` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `1st_periodical_exam` int(11) NOT NULL,
  `2st_periodical_exam` int(11) NOT NULL,
  `3st_periodical_exam` int(11) NOT NULL,
  `4th_periodical_exam` int(11) NOT NULL,
  `average_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Grade 6', 'D', '2016-2017', '2016-0'),
(2, 'Grade 6', 'D', '2016-2017', '2016-1'),
(3, 'Grade 3', 'A', '2016-2017', '2016-1');

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
  `subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers_class`
--

INSERT INTO `teachers_class` (`t_id`, `teachers_id`, `glevel_section`, `type_of_teacher`, `subjects`) VALUES
(1, '2000160', 'Grade 6-D ', 'advisor', 'Filipino'),
(2, '2000161', 'Grade 6-D ', 'Subject_teacher', 'mathematics'),
(3, '2000162', 'Grade 6-D ', 'Subject_teacher', 'Makabayan'),
(4, '2000161', 'Grade 3-A ', 'advisor', 'mathematics');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view1`
--
CREATE TABLE `view1` (
`lname` varchar(50)
,`fname` varchar(50)
,`mname` varchar(255)
,`gender` varchar(50)
,`grade_level` varchar(255)
,`school_year` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view2`
--
CREATE TABLE `view2` (
`studno` varchar(50)
,`lname` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view1`
--
DROP TABLE IF EXISTS `view1`;

CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view1`  AS  select `studinfo`.`lname` AS `lname`,`studinfo`.`fname` AS `fname`,`studinfo`.`mname` AS `mname`,`studinfo`.`gender` AS `gender`,`studrec`.`grade_level` AS `grade_level`,`studrec`.`school_year` AS `school_year` from (`studentinfo` `studinfo` join `student_record` `studrec` on((`studinfo`.`studno` = `studrec`.`studno`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view2`
--
DROP TABLE IF EXISTS `view2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view2`  AS  select `studentinfo`.`studno` AS `studno`,`studentinfo`.`lname` AS `lname` from ((`studentinfo` left join `student_record` on((`student_record`.`studno` = `studentinfo`.`studno`))) left join `teachers_class` on((`teachers_class`.`glevel_section` = (select concat(`student_record`.`grade_level`,' - ',`student_record`.`section`))))) ;

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `student_grade`
--
ALTER TABLE `student_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_record`
--
ALTER TABLE `student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teachers_class`
--
ALTER TABLE `teachers_class`
  MODIFY `t_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

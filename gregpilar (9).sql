-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2016 at 04:25 PM
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
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `when` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('2016-1', 'merello', 'bossbry', 'S', 'sd', '1990-06-12', '26', 'male', 'sa', 's', 'q', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `student_grade`
--

CREATE TABLE `student_grade` (
  `id` int(11) NOT NULL,
  `studno` varchar(20) NOT NULL,
  `glevel_section` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `1st_periodical_exam` int(11) NOT NULL,
  `2st_periodical_exam` int(11) NOT NULL,
  `3st_periodical_exam` int(11) NOT NULL,
  `4th_periodical_exam` int(11) NOT NULL,
  `average_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_grade`
--

INSERT INTO `student_grade` (`id`, `studno`, `glevel_section`, `subject`, `1st_periodical_exam`, `2st_periodical_exam`, `3st_periodical_exam`, `4th_periodical_exam`, `average_grade`) VALUES
(1, '2016-0', 'Grade 3-Orchids3', 'science', 89, 98, 89, 89, 0);

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
(4, 'kinder 1', 'Love1', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(255) NOT NULL,
  `sub_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '2000160', 'Grade 3-Orchids3 ', 'advisor', 'science'),
(2, '2000161', 'Grade 2-Joshua2 ', 'Subject_teacher', 'English'),
(3, '2000162', 'Grade 3-Orchids3 ', 'advisor', 'mathematics');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student_record`
--
ALTER TABLE `student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teachers_class`
--
ALTER TABLE `teachers_class`
  MODIFY `t_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

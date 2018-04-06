-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2017 at 02:33 PM
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
(5, 'qq', 'ssq', 'qs', 'c20ad4d76fe97759aa27a0c99bff6710', 'principal'),
(7, 'principal', 'Perez', 'Claudia', 'e7d715a9b79d263ae527955341bbe9b1', 'principal');

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
  `g_id` int(11) NOT NULL,
  `sec_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sec_id`, `g_id`, `sec_name`) VALUES
(1, 3, 'Love1'),
(2, 3, 'Faith1'),
(3, 3, 'Peace1'),
(4, 3, 'Hope1'),
(5, 3, 'Grace1'),
(6, 4, 'Moses2'),
(7, 4, 'solomon2'),
(8, 4, 'Daniel2'),
(9, 4, 'Joshua2'),
(10, 4, 'jacob2'),
(11, 5, 'Sampaguita3'),
(12, 5, 'Orchids3'),
(13, 5, 'Ilang-Ilang3'),
(14, 5, 'Gumammela3'),
(15, 5, 'Santan3'),
(16, 6, 'Narra4'),
(17, 6, 'Coconut4'),
(18, 6, 'Yakal4'),
(19, 6, 'Mahogany4'),
(20, 7, 'Galileo5'),
(21, 7, 'Newton5'),
(22, 7, 'Einstein5'),
(23, 7, 'Socrates5'),
(24, 8, 'charity6'),
(25, 8, 'humility6'),
(26, 8, 'Piety6'),
(27, 8, 'Purity6'),
(28, 1, 'Red'),
(29, 1, 'blue'),
(30, 2, 'Green'),
(31, 2, 'yellow');

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
('2017-12', 'asdsd', 'asdj', 'sdjsjd', 'siqwiei', '2008-12-29', '8', 'male', 'sdsdwd', 'sad', 'asdsdsd', 'incomplete'),
('2017-13', 'lakanudla', 'lapu', 'Ss', 'II', '1994-06-30', '22', 'male', 'sdw', 'qwe', 'dsd', 'incomplete'),
('2017-14', 'explorer', 'diego', 'S', '', '2010-02-02', '7', 'male', ' sampaloc manila', 'dendenexplorer', 'doraexplorer', 'complete'),
('2017-2', 'Raved', 'gangs', 'Sam', 'Jr', '1999-03-17', '17', 'male', 'asd', 'asd', 'asd', 'complete'),
('2017-3', 'Vamps', 'fred', 'R', 'II', '1997-07-22', '19', 'male', 'asd', 'asd', 'asd', 'complete'),
('2017-4', 'Pascual', 'ted', 'R', 'II', '1997-12-13', '18', 'male', 'asd', 'asd', 'asd', 'complete'),
('2017-5', 'dens', 'Dendi', 'G', '', '1997-12-14', '19', 'female', 'asd', 'asd', 'asd', 'incomplete'),
('2017-6', 'bagon', 'ems', 'F', 'IV', '2007-06-27', '9', 'female', 'sd', 'sds', 'asd', 'incomplete'),
('2017-7', 'Mandy', 'moore', 'G', 'I', '2005-11-22', '11', 'female', 'asd', 'asd', 'Grweq', 'incomplete'),
('2017-8', 'Moto', 'pick', 'Y', 'III', '1999-07-10', '17', 'female', 'asd', 'asd', 'dsds', 'complete'),
('2017-9', 'Miracle', 'Bert', 'Yasay', 'Sr', '2002-07-17', '14', 'male', 'asd', 'asd', 'asd', 'complete');

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
(50, '2016-1', 'Grade 3-Orchids3', 'MAPEH', 67, '4'),
(51, '2016-0', 'Grade 3-Orchids3 ', 'English', 99, '1'),
(52, '2016-0', 'Grade 3-Orchids3 ', 'MAthematics', 90, '1'),
(53, '2016-0', 'Grade 3-Orchids3 ', 'Science', 89, '1'),
(54, '2017-12', 'Grade 3-Orchids3 ', 'Araling Panlipunan', 90, '1'),
(55, '2017-13', 'Grade 3-Orchids3 ', 'Araling Panlipunan', 89, '1'),
(56, '2016-0', 'Grade 3-Orchids3 ', 'Araling Panlipunan', 87, '1'),
(57, '2017-12', 'Grade 3-Orchids3 ', 'Edukasyong sa Pagpapakatao', 78, '1'),
(58, '2017-13', 'Grade 3-Orchids3 ', 'Edukasyong sa Pagpapakatao', 98, '1'),
(59, '2016-0', 'Grade 3-Orchids3 ', 'Edukasyong sa Pagpapakatao', 88, '1'),
(60, '2017-12', 'Grade 3-Orchids3 ', 'EPP', 90, '1'),
(61, '2017-13', 'Grade 3-Orchids3 ', 'EPP', 99, '1'),
(62, '2016-0', 'Grade 3-Orchids3 ', 'EPP', 87, '1'),
(63, '2017-12', 'Grade 3-Orchids3 ', 'MAPEH', 77, '1'),
(64, '2017-13', 'Grade 3-Orchids3 ', 'MAPEH', 88, '1'),
(65, '2016-0', 'Grade 3-Orchids3 ', 'MAPEH', 99, '1'),
(66, '2017-12', 'Grade 3-Orchids3 ', 'Music', 78, '1'),
(67, '2017-13', 'Grade 3-Orchids3 ', 'Music', 89, '1'),
(68, '2016-0', 'Grade 3-Orchids3 ', 'Music', 88, '1'),
(69, '2017-12', 'Grade 3-Orchids3 ', 'Art', 78, '1'),
(70, '2017-13', 'Grade 3-Orchids3 ', 'Art', 99, '1'),
(71, '2016-0', 'Grade 3-Orchids3 ', 'Art', 89, '1'),
(72, '2017-12', 'Grade 3-Orchids3 ', 'health', 50, '1'),
(73, '2017-13', 'Grade 3-Orchids3 ', 'health', 89, '1'),
(74, '2016-0', 'Grade 3-Orchids3 ', 'health', 88, '1'),
(75, '2017-12', 'Grade 3-Orchids3 ', 'P.E', 89, '1'),
(76, '2017-13', 'Grade 3-Orchids3 ', 'P.E', 89, '1'),
(77, '2016-0', 'Grade 3-Orchids3 ', 'P.E', 89, '1'),
(78, '2017-12', 'Grade 3-Orchids3 ', 'Filipino', 60, '1'),
(79, '2017-13', 'Grade 3-Orchids3 ', 'Filipino', 90, '1'),
(80, '2017-12', 'Grade 3-Orchids3 ', 'English', 78, '1'),
(81, '2017-13', 'Grade 3-Orchids3 ', 'English', 78, '1'),
(82, '2017-12', 'Grade 3-Orchids3 ', 'MAthematics', 99, '1'),
(83, '2017-13', 'Grade 3-Orchids3 ', 'MAthematics', 88, '1'),
(84, '2017-12', 'Grade 3-Orchids3 ', 'Science', 78, '1'),
(85, '2017-13', 'Grade 3-Orchids3 ', 'Science', 89, '1'),
(86, '2017-14', 'Grade 2-Moses2 ', 'Filipino', 99, '1'),
(87, '2017-14', 'Grade 2-Moses2 ', 'English', 78, '1'),
(88, '2017-14', 'Grade 2-Moses2 ', 'MAthematics', 88, '1'),
(89, '2017-14', 'Grade 2-Moses2 ', 'Science', 90, '1'),
(90, '2017-14', 'Grade 2-Moses2 ', 'Araling Panlipunan', 78, '1'),
(91, '2017-14', 'Grade 2-Moses2 ', 'Edukasyong sa Pagpapakatao', 87, '1'),
(92, '2017-14', 'Grade 2-Moses2 ', 'MAPEH', 89, '1'),
(93, '2017-14', 'Grade 2-Moses2 ', 'Music', 90, '1'),
(94, '2017-14', 'Grade 2-Moses2 ', 'Art', 78, '1'),
(95, '2017-14', 'Grade 2-Moses2 ', 'P.E', 99, '1'),
(96, '2017-14', 'Grade 2-Moses2 ', 'health', 90, '1'),
(97, '2017-14', 'Grade 2-Moses2 ', 'Mother Toungue', 84, '1'),
(98, '2017-14', 'Grade 2-Moses2 ', 'Filipino', 90, '2'),
(99, '2017-14', 'Grade 2-Moses2 ', 'English', 89, '2'),
(100, '2017-14', 'Grade 2-Moses2 ', 'MAthematics', 90, '2'),
(101, '2017-14', 'Grade 2-Moses2 ', 'Science', 88, '2'),
(102, '2017-14', 'Grade 2-Moses2 ', 'Araling Panlipunan', 83, '2'),
(103, '2017-14', 'Grade 2-Moses2 ', 'Edukasyong sa Pagpapakatao', 90, '2'),
(104, '2017-14', 'Grade 2-Moses2 ', 'MAPEH', 79, '2'),
(105, '2017-14', 'Grade 2-Moses2 ', 'Music', 92, '2'),
(106, '2017-14', 'Grade 2-Moses2 ', 'Art', 99, '2'),
(107, '2017-14', 'Grade 2-Moses2 ', 'P.E', 99, '2'),
(108, '2017-14', 'Grade 2-Moses2 ', 'health', 89, '2'),
(109, '2017-14', 'Grade 2-Moses2 ', 'Mother Toungue', 99, '2'),
(110, '2017-14', 'Grade 2-Moses2 ', 'Filipino', 88, '3'),
(111, '2017-14', 'Grade 2-Moses2 ', 'English', 90, '3'),
(112, '2017-14', 'Grade 2-Moses2 ', 'MAthematics', 90, '3'),
(113, '2017-14', 'Grade 2-Moses2 ', 'Science', 78, '3'),
(114, '2017-14', 'Grade 2-Moses2 ', 'Araling Panlipunan', 90, '3'),
(115, '2017-14', 'Grade 2-Moses2 ', 'Edukasyong sa Pagpapakatao', 93, '3'),
(116, '2017-14', 'Grade 2-Moses2 ', 'MAPEH', 92, '3'),
(117, '2017-14', 'Grade 2-Moses2 ', 'Music', 82, '3'),
(118, '2017-14', 'Grade 2-Moses2 ', 'Art', 95, '3'),
(119, '2017-14', 'Grade 2-Moses2 ', 'P.E', 90, '3'),
(120, '2017-14', 'Grade 2-Moses2 ', 'health', 88, '3'),
(121, '2017-14', 'Grade 2-Moses2 ', 'Mother Toungue', 90, '3'),
(122, '2017-14', 'Grade 2-Moses2 ', 'Filipino', 89, '4'),
(123, '2017-14', 'Grade 2-Moses2 ', 'English', 99, '4'),
(124, '2017-14', 'Grade 2-Moses2 ', 'MAthematics', 80, '4'),
(125, '2017-14', 'Grade 2-Moses2 ', 'Science', 99, '4'),
(126, '2017-14', 'Grade 2-Moses2 ', 'Araling Panlipunan', 82, '4'),
(127, '2017-14', 'Grade 2-Moses2 ', 'Edukasyong sa Pagpapakatao', 79, '4'),
(128, '2017-14', 'Grade 2-Moses2 ', 'MAPEH', 93, '4'),
(129, '2017-14', 'Grade 2-Moses2 ', 'Music', 90, '4'),
(130, '2017-14', 'Grade 2-Moses2 ', 'Art', 92, '4'),
(131, '2017-14', 'Grade 2-Moses2', 'P.E', 90, '4'),
(132, '2017-14', 'Grade 2-Moses2', 'health', 83, '4'),
(133, '2017-14', 'Grade 2-Moses2', 'Mother Toungue', 98, '4'),
(134, '2017-11', 'Grade 2-Moses2 ', 'Filipino', 99, '1'),
(135, '2017-11', 'Grade 2-Moses2 ', 'Filipino', 90, '2'),
(136, '2017-11', 'Grade 2-Moses2 ', 'MAthematics', 78, '1'),
(137, '2017-11', 'Grade 2-Moses2 ', 'English', 89, '1'),
(138, '2017-11', 'Grade 2-Moses2 ', 'Science', 78, '1'),
(139, '2017-11', 'Grade 2-Moses2 ', 'Araling Panlipunan', 84, '1'),
(140, '2017-11', 'Grade 2-Moses2 ', 'Edukasyong sa Pagpapakatao', 90, '1'),
(141, '2017-11', 'Grade 2-Moses2 ', 'MAPEH', 90, '1'),
(142, '2017-11', 'Grade 2-Moses2 ', 'Music', 84, '1'),
(143, '2017-11', 'Grade 2-Moses2 ', 'Art', 90, '1'),
(144, '2017-11', 'Grade 2-Moses2 ', 'P.E', 89, '1'),
(145, '2017-11', 'Grade 2-Moses2 ', 'health', 93, '1'),
(146, '2017-11', 'Grade 2-Moses2 ', 'Mother Toungue', 94, '1'),
(147, '2017-11', 'Grade 2-Moses2 ', 'English', 90, '2'),
(148, '2017-11', 'Grade 2-Moses2 ', 'MAthematics', 93, '2'),
(149, '2017-11', 'Grade 2-Moses2 ', 'Science', 83, '2'),
(150, '2017-11', 'Grade 2-Moses2 ', 'Araling Panlipunan', 87, '2'),
(151, '2017-11', 'Grade 2-Moses2 ', 'Edukasyong sa Pagpapakatao', 95, '2'),
(152, '2017-11', 'Grade 2-Moses2 ', 'MAPEH', 90, '2'),
(153, '2017-11', 'Grade 2-Moses2 ', 'Music', 87, '2'),
(154, '2017-11', 'Grade 2-Moses2 ', 'Art', 85, '2'),
(155, '2017-11', 'Grade 2-Moses2 ', 'P.E', 80, '2'),
(156, '2017-11', 'Grade 2-Moses2 ', 'health', 78, '2'),
(157, '2017-11', 'Grade 2-Moses2 ', 'Mother Toungue', 99, '2'),
(158, '2017-11', 'Grade 2-Moses2 ', 'Filipino', 89, '3'),
(159, '2017-11', 'Grade 2-Moses2 ', 'English', 90, '3'),
(160, '2017-11', 'Grade 2-Moses2 ', 'MAthematics', 89, '3'),
(161, '2017-11', 'Grade 2-Moses2 ', 'Science', 78, '3'),
(162, '2017-11', 'Grade 2-Moses2 ', 'Araling Panlipunan', 90, '3'),
(163, '2017-11', 'Grade 2-Moses2 ', 'Edukasyong sa Pagpapakatao', 87, '3'),
(164, '2017-11', 'Grade 2-Moses2', 'MAPEH', 89, '3'),
(165, '2017-11', 'Grade 2-Moses2', 'Music', 90, '3'),
(166, '2017-11', 'Grade 2-Moses2', 'Art', 94, '3'),
(167, '2017-11', 'Grade 2-Moses2', 'P.E', 89, '3'),
(168, '2017-11', 'Grade 2-Moses2', 'health', 99, '3'),
(169, '2017-11', 'Grade 2-Moses2', 'Mother Toungue', 78, '3'),
(170, '2017-11', 'Grade 2-Moses2', 'Filipino', 84, '4'),
(171, '2017-11', 'Grade 2-Moses2', 'English', 88, '4'),
(172, '2017-11', 'Grade 2-Moses2', 'MAthematics', 88, '4'),
(173, '2017-11', 'Grade 2-Moses2', 'Science', 90, '4'),
(174, '2017-11', 'Grade 2-Moses2', 'Araling Panlipunan', 90, '4'),
(175, '2017-11', 'Grade 2-Moses2', 'Edukasyong sa Pagpapakatao', 88, '4'),
(176, '2017-11', 'Grade 2-Moses2', 'MAPEH', 78, '4'),
(177, '2017-11', 'Grade 2-Moses2', 'Music', 90, '4'),
(178, '2017-11', 'Grade 2-Moses2', 'Art', 78, '4'),
(179, '2017-11', 'Grade 2-Moses2', 'P.E', 99, '4'),
(180, '2017-11', 'Grade 2-Moses2', 'health', 77, '4'),
(181, '2017-11', 'Grade 2-Moses2', 'Mother Toungue', 89, '4');

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
(15, 'Grade 3', 'Orchids3', '2016-2017', '2016-1'),
(16, 'Grade 4', 'Narra4', '2017-2018', '2017-2'),
(17, 'Grade 4', 'Narra4', '2017-2018', '2017-4'),
(20, 'Grade 2', 'Moses2', '2017-2018', '2017-11'),
(21, 'Grade 3', 'Orchids3', '2017-2018', '2017-12'),
(23, 'Grade 4', 'Narra4', '2017-2018', '2016-1'),
(25, 'Grade 3', 'Orchids3', '2017-2018', '2017-13'),
(26, 'Grade 2', 'Moses2', '2017-2018', '2017-14'),
(27, 'Grade 3', 'Sampaguita3', '2017-2018', '2017-5'),
(28, 'Grade 3', 'Sampaguita3', '2017-2018', '2017-6');

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
(7, '2016-1', 'Grade 3-Orchids3', 7, 1, ' AO'),
(8, '2016-0', 'Grade 3-Orchids3', 1, 2, ' NO'),
(9, '2016-0', 'Grade 3-Orchids3', 2, 2, ' NO'),
(10, '2016-0', 'Grade 3-Orchids3', 3, 2, ' NO'),
(11, '2016-0', 'Grade 3-Orchids3', 4, 2, ' NO'),
(12, '2016-0', 'Grade 3-Orchids3', 5, 2, ' NO'),
(13, '2016-0', 'Grade 3-Orchids3', 6, 2, ' NO'),
(14, '2016-0', 'Grade 3-Orchids3', 7, 2, ' NO'),
(15, '2016-0', 'Grade 3-Orchids3', 1, 1, ' AO'),
(16, '2016-0', 'Grade 3-Orchids3', 2, 1, ' AO'),
(17, '2016-0', 'Grade 3-Orchids3', 3, 1, ' AO'),
(18, '2016-0', 'Grade 3-Orchids3', 4, 1, ' AO'),
(19, '2016-0', 'Grade 3-Orchids3', 5, 1, 'SO'),
(20, '2016-0', 'Grade 3-Orchids3', 6, 1, ' AO'),
(21, '2016-0', 'Grade 3-Orchids3', 7, 1, ' AO'),
(22, '2016-0', 'Grade 3-Orchids3 ', 1, 3, ' RO'),
(23, '2016-0', 'Grade 3-Orchids3 ', 2, 3, 'SO'),
(24, '2016-0', 'Grade 3-Orchids3 ', 3, 3, 'SO'),
(25, '2016-0', 'Grade 3-Orchids3 ', 4, 3, ' AO'),
(26, '2016-0', 'Grade 3-Orchids3 ', 5, 3, 'SO'),
(27, '2016-0', 'Grade 3-Orchids3 ', 6, 3, ' AO'),
(28, '2016-0', 'Grade 3-Orchids3 ', 7, 3, ' AO'),
(29, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 1, 1, ' AO'),
(30, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 2, 1, ' AO'),
(31, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 3, 1, ' AO'),
(32, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 4, 1, ' AO'),
(33, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 5, 1, ' AO'),
(34, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 6, 1, ' AO'),
(35, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 7, 1, ' AO'),
(36, '2017-13', 'Grade 3-Orchids3 ', 1, 1, ' AO'),
(37, '2017-13', 'Grade 3-Orchids3 ', 2, 1, ' AO'),
(38, '2017-13', 'Grade 3-Orchids3 ', 3, 1, 'SO'),
(39, '2017-13', 'Grade 3-Orchids3 ', 4, 1, 'SO'),
(40, '2017-13', 'Grade 3-Orchids3 ', 5, 1, ' RO'),
(41, '2017-13', 'Grade 3-Orchids3 ', 6, 1, ' RO'),
(42, '2017-13', 'Grade 3-Orchids3 ', 7, 1, 'SO'),
(43, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 1, 1, ' AO'),
(44, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 2, 1, ' AO'),
(45, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 3, 1, ' AO'),
(46, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 4, 1, ' AO'),
(47, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 5, 1, ' AO'),
(48, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 6, 1, ' AO'),
(49, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 3-Orchids3 ', 7, 1, ' AO'),
(50, '2017-12', 'Grade 3-Orchids3 ', 1, 1, 'SO'),
(51, '2017-12', 'Grade 3-Orchids3 ', 2, 1, ' AO'),
(52, '2017-12', 'Grade 3-Orchids3 ', 3, 1, ' AO'),
(53, '2017-12', 'Grade 3-Orchids3 ', 4, 1, ' AO'),
(54, '2017-12', 'Grade 3-Orchids3 ', 5, 1, ' AO'),
(55, '2017-12', 'Grade 3-Orchids3 ', 6, 1, ' AO'),
(56, '2017-12', 'Grade 3-Orchids3 ', 7, 1, ' AO'),
(57, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 1, 1, ' AO'),
(58, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 2, 1, ' AO'),
(59, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 3, 1, ' AO'),
(60, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 4, 1, ' AO'),
(61, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 5, 1, ' AO'),
(62, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 6, 1, ' AO'),
(63, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 7, 1, ' AO'),
(64, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 1, 2, ' AO'),
(65, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 2, 2, ' AO'),
(66, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 3, 2, ' AO'),
(67, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 4, 2, ' AO'),
(68, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 5, 2, ' AO'),
(69, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 6, 2, ' AO'),
(70, '<br /><b>Notice</b>:  Undefined index: studno in <', 'Grade 2-Moses2 ', 7, 2, ' AO');

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
  `status` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachersinfo`
--

INSERT INTO `teachersinfo` (`teachers_id`, `teachers_lname`, `teachers_fname`, `teachers_mname`, `teachers_bday`, `teachers_age`, `teachers_gender`, `teachers_address`, `status`, `password`) VALUES
(2000160, 'Dichoso', 'anamarie', 'R.', '1989-06-13', 27, 'female', 'asd', 'single', 'dichoso  '),
(2000161, 'bautista', 'nora', 's', '1999-05-17', 17, 'female', 'sdasd', 'married', 'bautista'),
(2000162, 'zamora', 'princess', 'd', '1994-09-19', 22, 'female', 'sad', 'married', 'zamora'),
(2000163, 'reid', 'james', 'd', '1998-12-28', 18, 'male', 'dsa', 'single', 'reid'),
(2000164, 'sam', 'ww', 'sd', '1990-06-12', 26, 'female', 'dsdsd', 'single', 'teacher'),
(2000165, 'sds', 'asd', 'sad', '1970-06-16', 46, 'male', 'sds', 'single', 'teacher'),
(2000166, 'sdsasd', 'asdasdsa', 'asdasdasd', '2009-01-05', 8, 'female', 'sad', 'married', 'teacher'),
(2000167, 'a', 'a', 'a', '1979-01-01', 38, 'female', 'aa', 'single', 'teacher'),
(2000168, 'ssd', 'dsds', 'asdsd', '2010-01-04', 7, 'male', 'asd', 'single', 'teacher');

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
(48, '2000168', 'Grade 4-Narra4 ', 'Subject_teacher', 'Edukasyong sa Pagpapakatao', '16:30', '17:30', 'Thu', '2017-2018'),
(52, '2000163', 'Grade 2-Moses2 ', 'advisor', 'Filipino', '07:30', '08:30', 'M,W,Fri', '2017-2018'),
(54, '2000163', 'Grade 2-Moses2 ', 'advisor', 'English', '08:30', '09:30', 'M,W,Fri', '2017-2018'),
(55, '2000163', 'Grade 2-Moses2 ', 'advisor', 'MAthematics', '09:30', '10:30', 'M,W,Fri', '2017-2018'),
(56, '2000163', 'Grade 2-Moses2 ', 'advisor', 'Science', '10:30', '11:30', 'M,W,Fri', '2017-2018'),
(57, '2000163', 'Grade 2-Moses2 ', 'advisor', 'Araling Panlipunan', '07:30', '09:00', 'T,Thu', '2017-2018'),
(58, '2000163', 'Grade 2-Moses2 ', 'advisor', 'Edukasyong sa Pagpapakatao', '09:00', '11:00', 'T,Thu', '2017-2018'),
(59, '2000163', 'Grade 2-Moses2 ', 'advisor', 'MAPEH', '13:00', '15:00', 'Thu', '2017-2018'),
(60, '2000163', 'Grade 2-Moses2 ', 'advisor', 'Music', '13:00', '14:00', 'M,W,Fri', '2017-2018'),
(61, '2000163', 'Grade 2-Moses2 ', 'advisor', 'Art', '15:00', '16:00', 'Fri', '2017-2018'),
(62, '2000163', 'Grade 2-Moses2 ', 'advisor', 'P.E', '14:00', '16:00', 'W', '2017-2018'),
(63, '2000163', 'Grade 2-Moses2 ', 'advisor', 'health', '07:30', '09:30', 'T', '2017-2018'),
(64, '2000163', 'Grade 2-Moses2 ', 'advisor', 'Mother Toungue', '11:30', '12:30', 'Thu', '2017-2018'),
(67, '2000161', 'Grade 3-Sampaguita3 ', 'advisor', 'MAthematics', '13:30', '14:30', 'Fri', '2017-2018'),
(68, '2000161', 'Grade 3-Sampaguita3 ', 'advisor', 'Science', '09:30', '10:30', 'M, W, Fri', '2017-2018');

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
(2000160, 'BEED', '                                                                                                                    asdsa                                                                                                                                      ', '      ggg                                                                                                                                                                 ', 'general_education', 'yes'),
(2000161, 'BEED', ' ', ' ', 'Science,MAPEH', 'yes'),
(2000162, 'BEED', 'masteral in english Lit', ' ', 'Science,MAPEH', 'yes'),
(2000163, 'BEED', 'asd', 'asd                                                  ', 'general_education', 'No'),
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
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `sec_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `student_gradee`
--
ALTER TABLE `student_gradee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
--
-- AUTO_INCREMENT for table `student_record`
--
ALTER TABLE `student_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `student_values`
--
ALTER TABLE `student_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `teachers_class`
--
ALTER TABLE `teachers_class`
  MODIFY `t_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
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

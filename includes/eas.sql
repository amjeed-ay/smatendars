-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2020 at 11:08 AM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eas`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `student_id` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL,
  `center_id` int(50) NOT NULL,
  `state_id` int(50) NOT NULL,
  `lga_id` int(50) NOT NULL,
  `ward_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`student_id`, `fname`, `lname`, `gender`, `level`, `center_id`, `state_id`, `lga_id`, `ward_id`, `user_id`, `status`, `date`) VALUES
(2, 'AISHA', 'MUHAMMAD', 'F', '2', 1, 1, 1, 1, 16, 'present', '2020-11-17 18:30:12'),
(1, 'SALIM', 'YUNUSA', 'none', '1', 1, 1, 1, 1, 16, 'present', '2020-11-17 18:30:12'),
(2, 'AISHA', 'MUHAMMAD', 'F', '2', 1, 1, 1, 1, 16, 'present', '2020-11-17 19:03:49'),
(1, 'SALIM', 'YUNUSA', 'none', '1', 1, 1, 1, 1, 16, 'present', '2020-11-17 19:03:49'),
(3, 'AHMAD', 'IBRAHIM', 'M', '1', 1, 1, 1, 1, 16, 'present', '2020-11-17 19:12:22'),
(2, 'AISHA', 'MUHAMMAD', 'F', '2', 1, 1, 1, 1, 16, 'present', '2020-11-17 19:12:22'),
(1, 'SALIM', 'YUNUSA', 'none', '1', 1, 1, 1, 1, 16, 'absent', '2020-11-17 19:12:22'),
(3, 'AHMAD', 'IBRAHIM', 'M', '1', 1, 1, 1, 1, 16, 'absent', '2020-11-17 19:16:19'),
(2, 'AISHA', 'MUHAMMAD', 'F', '2', 1, 1, 1, 1, 16, 'present', '2020-11-17 19:16:19'),
(1, 'SALIM', 'YUNUSA', 'none', '1', 1, 1, 1, 1, 16, 'absent', '2020-11-17 19:16:19'),
(4, 'ABDULMAJID', 'YUNUSA', 'M', '2', 2, 2, 2, 2, 17, 'present', '2020-11-19 11:47:23'),
(2, 'AISHA', 'MUHAMMAD', 'F', '2', 1, 1, 1, 1, 17, 'present', '2020-11-19 11:47:23'),
(5, 'SALIM', 'YUNUSA', 'none', '1', 2, 2, 2, 2, 17, 'absent', '2020-11-19 11:47:23'),
(4, 'ABDULMAJID', 'YUNUSA', 'M', '2', 2, 2, 2, 2, 17, 'present', '2020-11-19 11:47:40'),
(2, 'AISHA', 'MUHAMMAD', 'F', '2', 1, 1, 1, 1, 17, 'present', '2020-11-19 11:47:40'),
(5, 'SALIM', 'YUNUSA', 'none', '1', 2, 2, 2, 2, 17, 'absent', '2020-11-19 11:47:40'),
(2, 'AISHA', 'MUHAMMAD', 'F', '2', 1, 1, 1, 1, 17, 'present', '2020-11-19 12:01:05'),
(2, 'AISHA', 'MUHAMMAD', 'F', '2', 1, 1, 1, 1, 17, 'present', '2020-11-19 12:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `biglog`
--

CREATE TABLE `biglog` (
  `bl_id` int(11) NOT NULL,
  `logtype` varchar(100) NOT NULL,
  `action` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `subject` int(11) NOT NULL,
  `ipaddy` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `biglog`
--

INSERT INTO `biglog` (`bl_id`, `logtype`, `action`, `date_time`, `subject`, `ipaddy`) VALUES
(1, 'login', 'user user logs in as user ', '2020-11-15 12:46:58', 2, '127.0.0.1'),
(2, 'login', 'user user logs in as user ', '2020-11-15 14:18:11', 2, '127.0.0.1'),
(3, 'login', 'user user logs in as user ', '2020-11-15 14:42:51', 2, '127.0.0.1'),
(4, 'login', 'user adm logs in as superadmin ', '2020-11-15 15:00:36', 1, '127.0.0.1'),
(5, 'login', 'user adm logs in as superadmin ', '2020-11-15 16:41:44', 1, '127.0.0.1'),
(6, 'create_user', 'user adm creates user amjeed@gmail.com ', '2020-11-15 17:28:57', 1, '127.0.0.1'),
(7, 'create_user', 'user adm creates user amjeed@gmail.com ', '2020-11-15 17:58:47', 1, '127.0.0.1'),
(8, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-15 18:00:30', 5, '127.0.0.1'),
(9, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-15 18:58:25', 5, '127.0.0.1'),
(10, 'create_user', 'user amjeed@gmail.com creates user admin@site.com ', '2020-11-15 20:32:10', 5, '127.0.0.1'),
(11, 'create_user', 'user amjeed@gmail.com creates user aish@gmail.com ', '2020-11-15 20:53:34', 5, '127.0.0.1'),
(12, 'login', 'user admin@site.com logs in as user ', '2020-11-15 22:36:09', 6, '127.0.0.1'),
(13, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-15 22:44:08', 5, '127.0.0.1'),
(14, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-15 23:35:24', 5, '127.0.0.1'),
(15, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 10:42:43', 5, '127.0.0.1'),
(16, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 10:42:55', 5, '127.0.0.1'),
(17, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 10:43:48', 5, '127.0.0.1'),
(18, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 10:44:15', 5, '127.0.0.1'),
(19, 'create_user', 'user amjeed@gmail.com creates user user@site.com ', '2020-11-16 10:44:45', 5, '127.0.0.1'),
(20, 'login', 'user user@site.com logs in as user ', '2020-11-16 10:45:19', 8, '127.0.0.1'),
(21, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 10:47:14', 5, '127.0.0.1'),
(22, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 11:13:33', 5, '127.0.0.1'),
(23, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 11:23:31', 5, '127.0.0.1'),
(24, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 11:37:30', 5, '127.0.0.1'),
(25, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 12:00:42', 5, '127.0.0.1'),
(26, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 12:18:27', 5, '127.0.0.1'),
(27, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 12:35:19', 5, '127.0.0.1'),
(28, 'login', 'user user@site.com logs in as user ', '2020-11-16 12:37:35', 8, '127.0.0.1'),
(29, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 12:38:53', 5, '127.0.0.1'),
(30, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 13:10:32', 5, '127.0.0.1'),
(31, 'create_user', 'user amjeed@gmail.com creates user aisha@site.com ', '2020-11-16 13:21:09', 5, '127.0.0.1'),
(32, 'create_user', 'user amjeed@gmail.com creates user ahme@site.com ', '2020-11-16 13:21:58', 5, '127.0.0.1'),
(33, 'login', 'user aisha@site.com logs in as user ', '2020-11-16 13:51:50', 9, '127.0.0.1'),
(34, 'login', 'user amjeed@gmail.com logs in as superadmin ', '2020-11-16 13:55:14', 5, '127.0.0.1'),
(35, 'login', 'user admin logs in as superadmin ', '2020-11-16 14:59:01', 5, '127.0.0.1'),
(36, 'login', 'user admin logs in as superadmin ', '2020-11-16 15:33:07', 5, '192.168.1.171'),
(37, 'create_user', 'user admin creates user naziralmu@gmail.com ', '2020-11-16 15:34:36', 5, '192.168.1.171'),
(38, 'login', 'user facilitator logs in as user ', '2020-11-16 15:34:48', 9, '192.168.1.151'),
(39, 'login', 'user facilitator logs in as user ', '2020-11-16 15:54:19', 9, '192.168.1.177'),
(40, 'login', 'user facilitator logs in as user ', '2020-11-16 15:57:47', 9, '127.0.0.1'),
(41, 'login', 'user admin logs in as superadmin ', '2020-11-16 15:59:39', 5, '127.0.0.1'),
(42, 'login', 'user admin logs in as superadmin ', '2020-11-16 18:46:59', 5, '127.0.0.1'),
(43, 'login', 'user facilitator logs in as user ', '2020-11-16 20:34:26', 9, '127.0.0.1'),
(44, 'login', 'user admin logs in as superadmin ', '2020-11-16 22:15:21', 5, '127.0.0.1'),
(45, 'create_user', 'user admin creates user ahmad@ga.com ', '2020-11-16 22:30:24', 5, '127.0.0.1'),
(46, 'create_user', 'user admin creates user tj@gm.com ', '2020-11-16 22:32:51', 5, '127.0.0.1'),
(47, 'create_user', 'user admin creates user usman@gmail.com ', '2020-11-16 22:35:03', 5, '127.0.0.1'),
(48, 'create_user', 'user admin creates user admin@gmail.com ', '2020-11-16 22:36:20', 5, '127.0.0.1'),
(49, 'login', 'user admin logs in as superadmin ', '2020-11-17 07:53:19', 5, '127.0.0.1'),
(50, 'create_user', 'user admin creates user admin@site.com ', '2020-11-17 11:43:49', 5, '127.0.0.1'),
(51, 'login', 'user admin logs in as superadmin ', '2020-11-17 12:50:51', 5, '127.0.0.1'),
(52, 'login', 'user admin logs in as superadmin ', '2020-11-17 14:31:37', 5, '127.0.0.1'),
(53, 'login', 'user admin logs in as superadmin ', '2020-11-17 14:57:19', 5, '127.0.0.1'),
(54, 'login', 'user admin logs in as superadmin ', '2020-11-17 14:58:25', 5, '127.0.0.1'),
(55, 'login', 'user admin logs in as superadmin ', '2020-11-17 14:58:43', 5, '127.0.0.1'),
(56, 'login', 'user admin logs in as superadmin ', '2020-11-17 14:59:39', 5, '127.0.0.1'),
(57, 'login', 'user admin logs in as superadmin ', '2020-11-17 15:01:41', 5, '127.0.0.1'),
(58, 'login', 'user admin logs in as superadmin ', '2020-11-17 15:11:52', 5, '127.0.0.1'),
(59, 'login', 'user admin logs in as superadmin ', '2020-11-17 15:12:15', 5, '127.0.0.1'),
(60, 'login', 'user admin logs in as superadmin ', '2020-11-17 15:12:26', 5, '127.0.0.1'),
(61, 'login', 'user admin logs in as superadmin ', '2020-11-17 16:44:59', 5, '127.0.0.1'),
(62, 'login', 'user admin logs in as superadmin ', '2020-11-17 16:45:18', 5, '127.0.0.1'),
(63, 'login', 'user admin@site.com logs in as user ', '2020-11-17 17:40:36', 16, '127.0.0.1'),
(64, 'login', 'user admin@site.com logs in as user ', '2020-11-17 17:40:50', 16, '127.0.0.1'),
(65, 'login', 'user admin logs in as superadmin ', '2020-11-17 17:42:05', 5, '127.0.0.1'),
(66, 'login', 'user admin@site.com logs in as user ', '2020-11-17 17:44:01', 16, '127.0.0.1'),
(67, 'login', 'user admin@site.com logs in as user ', '2020-11-17 17:44:18', 16, '127.0.0.1'),
(68, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 19:21:58', 16, '127.0.0.1'),
(69, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 19:23:53', 16, '127.0.0.1'),
(70, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 19:25:18', 16, '127.0.0.1'),
(71, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 19:25:42', 16, '127.0.0.1'),
(72, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 19:26:38', 16, '127.0.0.1'),
(73, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 19:39:14', 16, '127.0.0.1'),
(74, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 19:49:58', 16, '127.0.0.1'),
(75, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 19:50:34', 16, '127.0.0.1'),
(76, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 19:52:09', 16, '127.0.0.1'),
(77, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 20:01:18', 16, '127.0.0.1'),
(78, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 20:01:31', 16, '127.0.0.1'),
(79, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 20:02:10', 16, '127.0.0.1'),
(80, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 20:04:05', 16, '127.0.0.1'),
(81, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 20:04:25', 16, '127.0.0.1'),
(82, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 20:08:46', 16, '127.0.0.1'),
(83, 'create_user', 'user admin@site.com creates user admin1@site.com ', '2020-11-17 20:10:05', 16, '127.0.0.1'),
(84, 'create_user', 'user admin@site.com creates user amjeed@gmail.com ', '2020-11-17 20:10:55', 16, '127.0.0.1'),
(85, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-17 20:11:09', 18, '127.0.0.1'),
(86, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-17 20:11:57', 18, '127.0.0.1'),
(87, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-17 20:13:27', 18, '127.0.0.1'),
(88, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 20:21:20', 16, '127.0.0.1'),
(89, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-17 20:22:10', 18, '127.0.0.1'),
(90, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-17 20:27:18', 16, '127.0.0.1'),
(91, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-17 22:40:42', 18, '127.0.0.1'),
(92, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-18 15:06:57', 18, '::1'),
(93, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-18 15:07:09', 18, '::1'),
(94, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:07:52', 16, '::1'),
(95, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:08:08', 16, '::1'),
(96, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-18 15:08:28', 18, '::1'),
(97, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:09:26', 16, '::1'),
(98, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:09:38', 16, '::1'),
(99, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:10:37', 16, '::1'),
(100, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:13:30', 16, '::1'),
(101, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-18 15:34:08', 18, '::1'),
(102, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:38:00', 16, '::1'),
(103, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:38:14', 16, '::1'),
(104, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:38:50', 16, '::1'),
(105, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:39:31', 16, '::1'),
(106, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:40:27', 16, '::1'),
(107, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:50:37', 16, '::1'),
(108, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 15:53:12', 16, '::1'),
(109, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 16:13:00', 16, '::1'),
(110, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 16:32:57', 16, '::1'),
(111, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 16:36:20', 16, '::1'),
(112, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 16:40:56', 16, '::1'),
(113, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 16:48:07', 16, '::1'),
(114, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-18 16:48:24', 18, '::1'),
(115, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 16:49:02', 16, '::1'),
(116, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-18 17:04:35', 18, '::1'),
(117, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 17:05:38', 16, '::1'),
(118, 'login', 'user amjeed@gmail.com logs in as user ', '2020-11-18 17:05:51', 18, '::1'),
(119, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 17:14:59', 16, '::1'),
(120, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 17:16:14', 16, '::1'),
(121, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 17:17:27', 16, '::1'),
(122, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-18 18:47:41', 16, '::1'),
(123, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-19 08:27:42', 16, '::1'),
(124, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-19 11:25:45', 16, '::1'),
(125, 'login', 'user admin1@site.com logs in as user ', '2020-11-19 11:47:10', 17, '::1'),
(126, 'login', 'user admin@site.com logs in as superadmin ', '2020-11-19 12:00:04', 16, '::1'),
(127, 'login', 'user admin1@site.com logs in as user ', '2020-11-19 12:00:41', 17, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `centre`
--

CREATE TABLE `centre` (
  `center_id` int(50) NOT NULL,
  `center_name` varchar(50) DEFAULT NULL,
  `GPS_location` varchar(50) DEFAULT NULL,
  `state_id` varchar(50) DEFAULT NULL,
  `LGA_id` varchar(50) DEFAULT NULL,
  `Ward_id` tinyint(1) DEFAULT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centre`
--

INSERT INTO `centre` (`center_id`, `center_name`, `GPS_location`, `state_id`, `LGA_id`, `Ward_id`, `date`) VALUES
(1, 'ALHIKMA PRIMARY SCHOOL', '', '1', '1', 1, '2020-11-17 11:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `facilitator`
--

CREATE TABLE `facilitator` (
  `facilitator_id` int(50) NOT NULL,
  `facilitator_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `access` varchar(50) NOT NULL,
  `school_id` varchar(50) DEFAULT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facilitator`
--

INSERT INTO `facilitator` (`facilitator_id`, `facilitator_name`, `password`, `phone`, `email`, `access`, `school_id`, `date`) VALUES
(8, 'ABUBAKAR YUSUF ZWALL', '1231', '0912813913', 'abubakaryusufzwall01@gmail.com', '', 'JAHUN', '2020-11-11 02:34:31'),
(7, 'AHMAD MAIDAWA', '11213', '0912813913', 'amjeed@gmail.com', '', 'MAKAMA', '2020-11-11 02:10:23'),
(9, 'SALIM YUNUSA', '', '0912813913', 'amjeed@gmail.com', '', 'MAKAMA', '2020-11-12 12:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `lga`
--

CREATE TABLE `lga` (
  `lga_id` int(50) NOT NULL,
  `lga_name` varchar(50) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lga`
--

INSERT INTO `lga` (`lga_id`, `lga_name`, `state_id`, `date`) VALUES
(1, 'BAUCHI', 1, '2020-11-17 11:23:31'),
(2, 'KALTUNGO', 2, '2020-11-17 20:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) DEFAULT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `date`) VALUES
(1, 'BAUCHI', '2020-11-12 17:46:00'),
(2, 'GOMBE', '2020-11-12 17:47:33'),
(3, 'KANO', '2020-11-17 11:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL,
  `center_id` int(50) NOT NULL,
  `state_id` int(50) NOT NULL,
  `lga_id` int(50) NOT NULL,
  `ward_id` int(50) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `fname`, `lname`, `gender`, `level`, `center_id`, `state_id`, `lga_id`, `ward_id`, `date`) VALUES
(6, 'AISHA', 'MUHAMMAD', 'F', '2', 1, 1, 1, 1, '2020-11-19 12:01:57'),
(2, 'AISHA', 'MUHAMMAD', 'F', '2', 1, 1, 1, 1, '2020-11-17 12:51:11'),
(5, 'SALIM', 'YUNUSA', 'none', '1', 2, 2, 2, 2, '2020-11-19 11:29:20'),
(4, 'ABDULMAJID', 'YUNUSA', 'M', '2', 2, 2, 2, 2, '2020-11-17 20:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `center_id` int(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `state_id` int(50) NOT NULL,
  `lga_id` varchar(50) NOT NULL,
  `ward_id` varchar(50) NOT NULL,
  `level` int(10) NOT NULL,
  `access` varchar(10) NOT NULL,
  `acctype` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `center_id`, `fname`, `lname`, `username`, `password`, `phone`, `email`, `state_id`, `lga_id`, `ward_id`, `level`, `access`, `acctype`, `date`, `active`) VALUES
(17, 1, 'ADMIN1', 'ADMIN1', 'admin1@site.com', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19', 912813913, 'admin1@site.com', 1, '1', '1', 1, 'fullaccess', 'user', '2020-11-17 20:10:05', 1),
(16, 1, 'ADMIN', 'ADMIN', 'admin@site.com', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19', 829812172, 'admin@site.com', 1, '1', '1', 1, 'fullaccess', 'superadmin', '2020-11-17 11:43:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `ward_id` int(50) NOT NULL,
  `ward_name` varchar(50) DEFAULT NULL,
  `lga_id` varchar(11) DEFAULT NULL,
  `state_id` int(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`ward_id`, `ward_name`, `lga_id`, `state_id`, `date`) VALUES
(1, 'MAKAMA A', '1', 1, '2020-11-17 11:33:55'),
(2, 'MAINA', '2', 2, '2020-11-17 20:28:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `student_name` (`fname`);

--
-- Indexes for table `biglog`
--
ALTER TABLE `biglog`
  ADD PRIMARY KEY (`bl_id`);

--
-- Indexes for table `centre`
--
ALTER TABLE `centre`
  ADD PRIMARY KEY (`center_id`),
  ADD KEY `center_name` (`center_name`,`GPS_location`);

--
-- Indexes for table `facilitator`
--
ALTER TABLE `facilitator`
  ADD PRIMARY KEY (`facilitator_id`),
  ADD KEY `facilitator_name` (`facilitator_name`);

--
-- Indexes for table `lga`
--
ALTER TABLE `lga`
  ADD PRIMARY KEY (`lga_id`),
  ADD KEY `lga_name` (`lga_name`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `student_name` (`fname`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biglog`
--
ALTER TABLE `biglog`
  MODIFY `bl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `centre`
--
ALTER TABLE `centre`
  MODIFY `center_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `facilitator`
--
ALTER TABLE `facilitator`
  MODIFY `facilitator_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `lga`
--
ALTER TABLE `lga`
  MODIFY `lga_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `ward_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

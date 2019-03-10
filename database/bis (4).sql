-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2019 at 06:44 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bis`
--

-- --------------------------------------------------------

--
-- Table structure for table `r_active_term`
--

CREATE TABLE `r_active_term` (
  `active_term_id` int(11) NOT NULL,
  `active_term_term_id` int(11) NOT NULL,
  `active_term_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `active_term_date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active_term_date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `r_activity`
--

CREATE TABLE `r_activity` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(500) NOT NULL,
  `activity_description` varchar(500) NOT NULL,
  `activity_target_date` datetime NOT NULL,
  `activity_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `activity_date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activity_date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_activity`
--

INSERT INTO `r_activity` (`activity_id`, `activity_name`, `activity_description`, `activity_target_date`, `activity_active`, `activity_date_added`, `activity_date_updated`) VALUES
(5, 'Nutrition Month', '<blockquote>\n<p>National Nutrition Week&quot;, initiated in March 1973, was embraced by members of the American Dietetic Association (now the Academy of Nutrition and Dietetics) as a way to deliver nutrition education messages to the public while promoting the profession of dietetics. In 1980, in response to growing public interest in nutrition, the week-long celebration expanded to become a month-long observance. Read more about its past in the article, &quot;<a href=\"https://www.eatright.org/-', '2019-07-31 00:00:00', 'Active', '2019-03-11 01:34:25', '2019-03-11 01:34:25'),
(6, 'Christmas Party', '<blockquote>\n<p>Christmas is an annual festival, commemorating the birth of Jesus Christ, observed primarily on December 25 as a religious and cultural celebration among billions of people around the world.&nbsp;</p>\n</blockquote>\n', '2019-12-25 00:00:00', 'Active', '2019-03-11 01:35:23', '2019-03-11 01:35:23'),
(7, 'New Years Eve', '<p>In the Gregorian calendar, New Year&#39;s Eve, the last day of the year, is on 31 December. In many countries, New Year&#39;s Eve is celebrated at evening social gatherings, where many people dance, eat, drink alcoholic beverages, and watch or light fireworks to mark the new year. Some Christians attend a watchnight service</p>\n', '2019-12-31 00:00:00', 'Active', '2019-03-11 01:35:53', '2019-03-11 01:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `r_baranggay`
--

CREATE TABLE `r_baranggay` (
  `baranggay_id` int(11) NOT NULL,
  `baranggay_name` varchar(100) NOT NULL,
  `baranggay_address` varchar(500) NOT NULL,
  `baranggay_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `baranggay_date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `baranggay_date_activated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_baranggay`
--

INSERT INTO `r_baranggay` (`baranggay_id`, `baranggay_name`, `baranggay_address`, `baranggay_active`, `baranggay_date_added`, `baranggay_date_activated`) VALUES
(2, 'Barangay Doña Imelda', '145 Bayani Cor. Guirayan St., Area 22, District IV, Quezon City\r\n', 'Active', '2019-03-11 01:17:55', '2019-03-11 01:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `r_baranggay_officer`
--

CREATE TABLE `r_baranggay_officer` (
  `baranggay_officer_id` int(11) NOT NULL,
  `baranggay_officer_resident_id` int(11) NOT NULL,
  `baranggay_officer_position_id` int(11) NOT NULL,
  `baranggay_officer_term_id` int(11) NOT NULL,
  `baranggay_officer_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `baranggay_officer_date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `baranggay_officer_date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_baranggay_officer`
--

INSERT INTO `r_baranggay_officer` (`baranggay_officer_id`, `baranggay_officer_resident_id`, `baranggay_officer_position_id`, `baranggay_officer_term_id`, `baranggay_officer_active`, `baranggay_officer_date_added`, `baranggay_officer_date_updated`) VALUES
(18, 45, 10, 4, 'Active', '2019-03-11 01:30:25', '2019-03-11 01:30:25'),
(20, 46, 9, 4, 'Active', '2019-03-11 01:30:49', '2019-03-11 01:30:49'),
(21, 48, 9, 4, 'Active', '2019-03-11 01:31:39', '2019-03-11 01:31:39'),
(22, 47, 9, 4, 'Active', '2019-03-11 01:32:10', '2019-03-11 01:32:10'),
(23, 49, 9, 4, 'Active', '2019-03-11 01:32:19', '2019-03-11 01:32:19'),
(24, 50, 9, 4, 'Active', '2019-03-11 01:32:28', '2019-03-11 01:32:28'),
(25, 51, 9, 4, 'Active', '2019-03-11 01:32:38', '2019-03-11 01:32:38'),
(26, 52, 9, 4, 'Active', '2019-03-11 01:32:44', '2019-03-11 01:32:44'),
(27, 53, 12, 4, 'Active', '2019-03-11 01:32:55', '2019-03-11 01:32:55'),
(28, 54, 11, 4, 'Active', '2019-03-11 01:33:06', '2019-03-11 01:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `r_baranggay_officer_position`
--

CREATE TABLE `r_baranggay_officer_position` (
  `baranggay_officer_position_id` int(11) NOT NULL,
  `baranggay_officer_position_position` varchar(100) NOT NULL,
  `baranggay_officer_position_type` enum('Captain','Vice-Captain','Additional','Treasurer','Secretary') NOT NULL DEFAULT 'Additional',
  `baranggay_officer_position_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `baranggay_officer_position_date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_baranggay_officer_position`
--

INSERT INTO `r_baranggay_officer_position` (`baranggay_officer_position_id`, `baranggay_officer_position_position`, `baranggay_officer_position_type`, `baranggay_officer_position_date_created`, `baranggay_officer_position_date_updated`) VALUES
(9, 'Kagawad', 'Additional', '2019-03-11 01:19:27', '2019-03-11 01:19:27'),
(10, 'Punong Barangay', 'Captain', '2019-03-11 01:19:47', '2019-03-11 01:19:47'),
(11, 'Barangay Treasurer', 'Treasurer', '2019-03-11 01:20:00', '2019-03-11 01:20:00'),
(12, 'Barangay Secretary', 'Secretary', '2019-03-11 01:20:08', '2019-03-11 01:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `r_case`
--

CREATE TABLE `r_case` (
  `case_id` int(11) NOT NULL,
  `case_name` varchar(100) NOT NULL,
  `case_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `case_date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `case_date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_case`
--

INSERT INTO `r_case` (`case_id`, `case_name`, `case_active`, `case_date_added`, `case_date_updated`) VALUES
(5, 'Libel', 'Active', '2019-03-11 01:18:08', '2019-03-11 01:18:08'),
(6, 'Missing Person', 'Active', '2019-03-11 01:18:14', '2019-03-11 01:18:14'),
(7, 'Robbery', 'Active', '2019-03-11 01:18:36', '2019-03-11 01:18:36'),
(8, 'Murder', 'Active', '2019-03-11 01:18:41', '2019-03-11 01:18:41'),
(9, 'Frustrated-Murder', 'Active', '2019-03-11 01:18:47', '2019-03-11 01:18:47'),
(10, 'Rape', 'Active', '2019-03-11 01:18:59', '2019-03-11 01:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `r_resident`
--

CREATE TABLE `r_resident` (
  `resident_id` int(11) NOT NULL,
  `resident_first_name` varchar(100) NOT NULL,
  `resident_middle_name` varchar(100) DEFAULT NULL,
  `resident_last_name` varchar(100) NOT NULL,
  `resident_gender` enum('Male','Female') NOT NULL,
  `resident_alive` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `resident_avatar` varchar(150) NOT NULL DEFAULT 'default-user.png',
  `resident_contact_number` varchar(15) NOT NULL,
  `resident_address` varchar(300) NOT NULL,
  `resident_civil_status` enum('Single','Married','Widowed','Separated','Divorced') NOT NULL,
  `resident_place_of_birth` varchar(100) NOT NULL DEFAULT 'Manila',
  `resident_birth_day` date NOT NULL,
  `resident_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `resident_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resident_date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_resident`
--

INSERT INTO `r_resident` (`resident_id`, `resident_first_name`, `resident_middle_name`, `resident_last_name`, `resident_gender`, `resident_alive`, `resident_avatar`, `resident_contact_number`, `resident_address`, `resident_civil_status`, `resident_place_of_birth`, `resident_birth_day`, `resident_active`, `resident_date_created`, `resident_date_updated`) VALUES
(43, 'One Miguel', NULL, 'Parcon', 'Male', 'Yes', 'default-user.png', '', 'Kung san san langpo ako natutulog', 'Single', 'Manila', '1998-03-12', 'Active', '2019-03-11 01:16:35', '2019-03-11 01:16:35'),
(44, 'Eric Kristopher', 'Paras', 'Valdez', 'Male', 'Yes', 'default-user.png', '', 'Westminster, London, England, UK', 'Single', 'Manila', '2001-06-07', 'Active', '2019-03-11 01:22:18', '2019-03-11 01:22:18'),
(45, 'Ferdinan', 'C', 'Ubaldo', 'Male', 'Yes', 'default-user.png', '', 'Tondo, Manila', 'Single', 'Manila', '1983-07-20', 'Active', '2019-03-11 01:23:27', '2019-03-11 01:23:27'),
(46, 'Erilinda', 'G', 'Amor', 'Female', 'Yes', 'default-user.png', '', 'Tondo, Manila', 'Single', 'Manila', '1983-03-10', 'Active', '2019-03-11 01:24:00', '2019-03-11 01:24:00'),
(47, 'Wilfred', 'F', 'Lee', 'Male', 'Yes', 'default-user.png', '', 'Tondo, Manila', 'Single', 'Manila', '1983-03-15', 'Active', '2019-03-11 01:24:16', '2019-03-11 01:24:16'),
(48, 'Joener', 'A', 'Letada', 'Male', 'Yes', 'default-user.png', '', 'Tondo, Manila', 'Single', 'Manila', '1970-01-01', 'Active', '2019-03-11 01:24:28', '2019-03-11 01:24:28'),
(49, 'Ryan Peter', 'S', 'Malangen', 'Male', 'Yes', 'default-user.png', '', 'Tondo, Manila', 'Single', 'Manila', '1982-12-16', 'Active', '2019-03-11 01:24:42', '2019-03-11 01:24:42'),
(50, 'Teresita', 'N', 'Monforte', 'Female', 'Yes', 'default-user.png', '', 'Tondo, Manila', 'Single', 'Manila', '1970-01-01', 'Active', '2019-03-11 01:24:58', '2019-03-11 01:24:58'),
(51, 'Annabel', 'F', 'Morales-Martin', 'Male', 'Yes', 'default-user.png', '', 'Tondo, Manila', 'Single', 'Manila', '1982-05-28', 'Active', '2019-03-11 01:25:11', '2019-03-11 01:25:11'),
(52, 'Terrence', 'T', 'Santos', 'Male', 'Yes', 'default-user.png', '', 'Tondo, Manila', 'Single', 'Manila', '1990-06-04', 'Active', '2019-03-11 01:25:20', '2019-03-11 01:26:08'),
(53, 'Evangelyn', 'E', 'Alarcio', 'Male', 'Yes', 'default-user.png', '', 'Tondo, Manila', 'Single', 'Manila', '1982-05-20', 'Active', '2019-03-11 01:25:34', '2019-03-11 01:25:34'),
(54, 'Imelda', 'E', 'Alas', 'Female', 'Yes', 'default-user.png', '', 'Tondo, Manila', 'Single', 'Manila', '1982-05-11', 'Active', '2019-03-11 01:25:49', '2019-03-11 01:25:49'),
(55, 'Juan', NULL, 'Dela Cruz', 'Male', 'Yes', 'default-user.png', '', 'Makati, Philippines', 'Single', 'Manila', '1995-03-12', 'Active', '2019-03-11 01:26:46', '2019-03-11 01:26:46'),
(56, 'Maria', NULL, 'Dimagiba', 'Female', 'Yes', 'default-user.png', '', 'Makati, Philippines', 'Single', 'Manila', '1995-03-21', 'Active', '2019-03-11 01:27:02', '2019-03-11 01:27:02'),
(57, 'Pedro', NULL, 'Kalamay', 'Male', 'Yes', 'default-user.png', '', 'Cebu , Philippines', 'Single', 'Manila', '1994-12-15', 'Active', '2019-03-11 01:27:17', '2019-03-11 01:27:17'),
(58, 'Wally', NULL, 'Binacutan', 'Male', 'Yes', 'default-user.png', '', 'Quezon City, Philippines', 'Single', 'Manila', '1994-12-29', 'Active', '2019-03-11 01:27:45', '2019-03-11 01:27:45'),
(59, 'Daniel', NULL, 'Balibago', 'Male', 'Yes', 'default-user.png', '', 'North Fairview Quezon City, Philippines', 'Single', 'Manila', '1994-12-17', 'Active', '2019-03-11 01:28:05', '2019-03-11 01:28:05'),
(60, 'Andres', NULL, 'Magtibay', 'Male', 'Yes', 'default-user.png', '', 'Makati, Philippines', 'Single', 'Manila', '1994-12-27', 'Active', '2019-03-11 01:28:17', '2019-03-11 01:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `r_term`
--

CREATE TABLE `r_term` (
  `term_id` int(11) NOT NULL,
  `term_name` varchar(100) NOT NULL,
  `term_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `term_date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `term_date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_term`
--

INSERT INTO `r_term` (`term_id`, `term_name`, `term_active`, `term_date_added`, `term_date_updated`) VALUES
(4, '2015-2019', 'Active', '2019-03-11 01:20:24', '2019-03-11 01:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `r_user`
--

CREATE TABLE `r_user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_resident_id` int(11) NOT NULL,
  `user_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `user_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_user`
--

INSERT INTO `r_user` (`user_id`, `user_username`, `user_password`, `user_resident_id`, `user_active`, `user_date_created`, `user_date_updated`) VALUES
(8, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 43, 'Active', '2019-03-11 01:16:50', '2019-03-11 01:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `t_clearance_record`
--

CREATE TABLE `t_clearance_record` (
  `clearance_record_id` int(11) NOT NULL,
  `clearance_record_control_number` varchar(10) NOT NULL,
  `clearance_record_purpose` varchar(200) NOT NULL,
  `clearance_record_remarks` varchar(200) NOT NULL,
  `clearance_record_resident_id` int(11) NOT NULL,
  `clearance_file` varchar(200) NOT NULL,
  `clearance_record_date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `clearance_record_date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_request_certificate`
--

CREATE TABLE `t_request_certificate` (
  `request_certificate_id` int(11) NOT NULL,
  `request_certificate_resident_id` int(11) NOT NULL,
  `request_certificate_type` enum('Clearance','Indigency') NOT NULL,
  `request_certificate_purpose` varchar(200) NOT NULL,
  `request_certificate_done` enum('No','Yes') NOT NULL DEFAULT 'No',
  `request_certificate_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `request_certificate_seen` enum('Send','Seen') NOT NULL DEFAULT 'Send',
  `request_certificate_date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `request_certificate_date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_resident_case`
--

CREATE TABLE `t_resident_case` (
  `resident_case_id` int(11) NOT NULL,
  `resident_case_resident_id` int(11) NOT NULL,
  `resident_case_case_id` int(11) NOT NULL,
  `resident_case_status` enum('Resolved','Pending') NOT NULL DEFAULT 'Pending',
  `resident_case_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `resident_case_date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resident_case_date_updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_resident_case`
--

INSERT INTO `t_resident_case` (`resident_case_id`, `resident_case_resident_id`, `resident_case_case_id`, `resident_case_status`, `resident_case_active`, `resident_case_date_added`, `resident_case_date_updated`) VALUES
(4, 55, 5, 'Resolved', 'Active', '2019-03-11 01:28:53', '2019-03-11 01:30:08'),
(5, 57, 6, 'Pending', 'Active', '2019-03-11 01:29:06', '2019-03-11 01:29:06'),
(6, 60, 9, 'Pending', 'Active', '2019-03-11 01:29:14', '2019-03-11 01:29:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `r_active_term`
--
ALTER TABLE `r_active_term`
  ADD PRIMARY KEY (`active_term_id`),
  ADD KEY `active_term_term_id` (`active_term_term_id`);

--
-- Indexes for table `r_activity`
--
ALTER TABLE `r_activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `r_baranggay`
--
ALTER TABLE `r_baranggay`
  ADD PRIMARY KEY (`baranggay_id`);

--
-- Indexes for table `r_baranggay_officer`
--
ALTER TABLE `r_baranggay_officer`
  ADD PRIMARY KEY (`baranggay_officer_id`),
  ADD KEY `baranggay_officer_resident_id` (`baranggay_officer_resident_id`),
  ADD KEY `baranggay_officer_position_id` (`baranggay_officer_position_id`),
  ADD KEY `baranggay_officer_term_id` (`baranggay_officer_term_id`);

--
-- Indexes for table `r_baranggay_officer_position`
--
ALTER TABLE `r_baranggay_officer_position`
  ADD PRIMARY KEY (`baranggay_officer_position_id`);

--
-- Indexes for table `r_case`
--
ALTER TABLE `r_case`
  ADD PRIMARY KEY (`case_id`);

--
-- Indexes for table `r_resident`
--
ALTER TABLE `r_resident`
  ADD PRIMARY KEY (`resident_id`);

--
-- Indexes for table `r_term`
--
ALTER TABLE `r_term`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `r_user`
--
ALTER TABLE `r_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD KEY `user_resident_id` (`user_resident_id`);

--
-- Indexes for table `t_clearance_record`
--
ALTER TABLE `t_clearance_record`
  ADD PRIMARY KEY (`clearance_record_id`),
  ADD KEY `clearance_record_resident_id` (`clearance_record_resident_id`);

--
-- Indexes for table `t_request_certificate`
--
ALTER TABLE `t_request_certificate`
  ADD PRIMARY KEY (`request_certificate_id`),
  ADD KEY `request_certificate_resident_id` (`request_certificate_resident_id`);

--
-- Indexes for table `t_resident_case`
--
ALTER TABLE `t_resident_case`
  ADD PRIMARY KEY (`resident_case_id`),
  ADD KEY `resident_case_resident_id` (`resident_case_resident_id`),
  ADD KEY `resident_case_case_id` (`resident_case_case_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `r_active_term`
--
ALTER TABLE `r_active_term`
  MODIFY `active_term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_activity`
--
ALTER TABLE `r_activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `r_baranggay`
--
ALTER TABLE `r_baranggay`
  MODIFY `baranggay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_baranggay_officer`
--
ALTER TABLE `r_baranggay_officer`
  MODIFY `baranggay_officer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `r_baranggay_officer_position`
--
ALTER TABLE `r_baranggay_officer_position`
  MODIFY `baranggay_officer_position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `r_case`
--
ALTER TABLE `r_case`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `r_resident`
--
ALTER TABLE `r_resident`
  MODIFY `resident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `r_term`
--
ALTER TABLE `r_term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_user`
--
ALTER TABLE `r_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_clearance_record`
--
ALTER TABLE `t_clearance_record`
  MODIFY `clearance_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `t_request_certificate`
--
ALTER TABLE `t_request_certificate`
  MODIFY `request_certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_resident_case`
--
ALTER TABLE `t_resident_case`
  MODIFY `resident_case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `r_active_term`
--
ALTER TABLE `r_active_term`
  ADD CONSTRAINT `r_active_term_ibfk_1` FOREIGN KEY (`active_term_term_id`) REFERENCES `r_term` (`term_id`);

--
-- Constraints for table `r_baranggay_officer`
--
ALTER TABLE `r_baranggay_officer`
  ADD CONSTRAINT `r_baranggay_officer_ibfk_1` FOREIGN KEY (`baranggay_officer_resident_id`) REFERENCES `r_resident` (`resident_id`),
  ADD CONSTRAINT `r_baranggay_officer_ibfk_2` FOREIGN KEY (`baranggay_officer_position_id`) REFERENCES `r_baranggay_officer_position` (`baranggay_officer_position_id`),
  ADD CONSTRAINT `r_baranggay_officer_ibfk_3` FOREIGN KEY (`baranggay_officer_term_id`) REFERENCES `r_term` (`term_id`);

--
-- Constraints for table `r_user`
--
ALTER TABLE `r_user`
  ADD CONSTRAINT `r_user_ibfk_1` FOREIGN KEY (`user_resident_id`) REFERENCES `r_resident` (`resident_id`);

--
-- Constraints for table `t_clearance_record`
--
ALTER TABLE `t_clearance_record`
  ADD CONSTRAINT `t_clearance_record_ibfk_1` FOREIGN KEY (`clearance_record_resident_id`) REFERENCES `r_resident` (`resident_id`);

--
-- Constraints for table `t_request_certificate`
--
ALTER TABLE `t_request_certificate`
  ADD CONSTRAINT `t_request_certificate_ibfk_1` FOREIGN KEY (`request_certificate_resident_id`) REFERENCES `r_resident` (`resident_id`);

--
-- Constraints for table `t_resident_case`
--
ALTER TABLE `t_resident_case`
  ADD CONSTRAINT `t_resident_case_ibfk_1` FOREIGN KEY (`resident_case_resident_id`) REFERENCES `r_resident` (`resident_id`),
  ADD CONSTRAINT `t_resident_case_ibfk_2` FOREIGN KEY (`resident_case_case_id`) REFERENCES `r_case` (`case_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

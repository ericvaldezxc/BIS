-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 06:52 AM
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

--
-- Dumping data for table `r_active_term`
--

INSERT INTO `r_active_term` (`active_term_id`, `active_term_term_id`, `active_term_active`, `active_term_date_added`, `active_term_date_updated`) VALUES
(1, 2, 'Inactive', '2019-03-08 16:21:14', '2019-03-08 16:21:26'),
(2, 1, 'Active', '2019-03-08 16:21:19', '2019-03-08 16:21:19');

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
(1, 'Competitionzxczcx', '<blockquote>\n<p><strong>Lorem ipsum dolor sit amet</strong>, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud <em>exercitation</em> ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n</blockq', '2019-12-03 00:00:00', 'Active', '2019-03-08 21:27:30', '2019-03-08 22:46:16'),
(2, 'we', '<p>asd</p>\n', '2019-03-04 00:00:00', 'Active', '2019-03-08 21:28:47', '2019-03-08 21:28:47'),
(3, 'zxc', '<p>qwe</p>\n', '2019-03-12 00:00:00', 'Active', '2019-03-08 21:29:01', '2019-03-08 21:29:01'),
(4, '5615', '<p>asd</p>\n', '2019-03-17 00:00:00', 'Inactive', '2019-03-08 21:29:16', '2019-03-08 21:47:58');

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
(1, 32, 2, 2, 'Active', '2019-03-08 16:13:06', '2019-03-08 20:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `r_baranggay_officer_position`
--

CREATE TABLE `r_baranggay_officer_position` (
  `baranggay_officer_position_id` int(11) NOT NULL,
  `baranggay_officer_position_position` varchar(100) NOT NULL,
  `baranggay_officer_position_type` enum('Captain','Vice-Captain','Additional') NOT NULL DEFAULT 'Additional',
  `baranggay_officer_position_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `baranggay_officer_position_date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_baranggay_officer_position`
--

INSERT INTO `r_baranggay_officer_position` (`baranggay_officer_position_id`, `baranggay_officer_position_position`, `baranggay_officer_position_type`, `baranggay_officer_position_date_created`, `baranggay_officer_position_date_updated`) VALUES
(1, 'Punong Baranggay', 'Captain', '2019-03-08 15:35:13', '2019-03-08 15:35:13'),
(2, 'Vise Punong Baranggay', 'Vice-Captain', '2019-03-08 15:35:13', '2019-03-08 15:35:13'),
(3, 'Super Tanod', 'Additional', '2019-03-08 15:35:28', '2019-03-08 15:35:28');

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
  `resident_birth_day` date NOT NULL,
  `resident_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `resident_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resident_date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_resident`
--

INSERT INTO `r_resident` (`resident_id`, `resident_first_name`, `resident_middle_name`, `resident_last_name`, `resident_gender`, `resident_alive`, `resident_avatar`, `resident_contact_number`, `resident_address`, `resident_civil_status`, `resident_birth_day`, `resident_active`, `resident_date_created`, `resident_date_updated`) VALUES
(32, 'Eric', NULL, 'Valdes', 'Male', 'Yes', '1943317.png', '091645770481', 'Phase II Payatas B. QC', 'Single', '1999-01-24', 'Active', '2019-03-08 13:01:42', '2019-03-09 00:12:36');

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
(1, '2015 - 2019', 'Active', '2019-03-08 15:34:32', '2019-03-08 15:34:32'),
(2, '2010-2015', 'Active', '2019-03-08 16:21:06', '2019-03-08 16:21:06');

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
(1, 'ericvaldezxc', '5f4dcc3b5aa765d61d8327deb882cf99', 32, 'Active', '2019-03-08 22:54:36', '2019-03-08 22:54:36');

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
  ADD KEY `user_resident_id` (`user_resident_id`);

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
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_baranggay_officer`
--
ALTER TABLE `r_baranggay_officer`
  MODIFY `baranggay_officer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `r_baranggay_officer_position`
--
ALTER TABLE `r_baranggay_officer_position`
  MODIFY `baranggay_officer_position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `r_resident`
--
ALTER TABLE `r_resident`
  MODIFY `resident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `r_term`
--
ALTER TABLE `r_term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_user`
--
ALTER TABLE `r_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

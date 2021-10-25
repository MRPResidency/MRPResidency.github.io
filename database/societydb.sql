-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 02:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_29695813_societydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_bill`
--

CREATE TABLE `add_bill` (
  `request_id` int(11) NOT NULL,
  `b_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `b_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `b_contact` int(11) NOT NULL,
  `b_flat_type` varchar(60) COLLATE utf8_bin NOT NULL,
  `b_flat_number` int(11) NOT NULL,
  `b_wing` varchar(60) COLLATE utf8_bin NOT NULL,
  `b_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `b_maintenance` int(11) NOT NULL,
  `b_other_charge` int(11) NOT NULL,
  `b_total_charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'Test@123');

-- --------------------------------------------------------

--
-- Table structure for table `complain_tb`
--

CREATE TABLE `complain_tb` (
  `request_id` int(11) NOT NULL,
  `complain_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `complain_for` mediumtext COLLATE utf8_bin NOT NULL,
  `complain_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `complain_message` text COLLATE utf8_bin NOT NULL,
  `complain_status` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `input_file_path` varchar(255) COLLATE utf8_bin NOT NULL,
  `com_remark` longtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `notice_for_all_tb`
--

CREATE TABLE `notice_for_all_tb` (
  `request_id` int(11) NOT NULL,
  `a_message` longtext COLLATE utf8_bin NOT NULL,
  `a_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `notice_personal_tb`
--

CREATE TABLE `notice_personal_tb` (
  `request_id` int(11) NOT NULL,
  `no_email` varchar(250) COLLATE utf8_bin NOT NULL,
  `no_wing` varchar(60) COLLATE utf8_bin NOT NULL,
  `no_flat_number` int(60) NOT NULL,
  `no_message` longtext COLLATE utf8_bin NOT NULL,
  `no_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `not_alloted`
--

CREATE TABLE `not_alloted` (
  `request_id` int(11) NOT NULL,
  `n_wing` varchar(60) COLLATE utf8_bin NOT NULL,
  `n_flat_number` int(60) NOT NULL,
  `n_flat_type` varchar(60) COLLATE utf8_bin NOT NULL,
  `n_flat_area` varchar(60) COLLATE utf8_bin NOT NULL,
  `n_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `sendcomplainstatus_tb`
--

CREATE TABLE `sendcomplainstatus_tb` (
  `register_id` int(11) NOT NULL,
  `com_number` int(60) NOT NULL,
  `sec_status` varchar(60) COLLATE utf8_bin NOT NULL,
  `com_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sec_remark` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `signup_tb`
--

CREATE TABLE `signup_tb` (
  `request_id` int(11) NOT NULL,
  `s_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `s_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `s_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `s_password` varchar(60) COLLATE utf8_bin NOT NULL,
  `s_contact` int(60) NOT NULL,
  `s_who_lives` varchar(60) COLLATE utf8_bin NOT NULL,
  `s_alternate_add` text COLLATE utf8_bin NOT NULL,
  `s_wing` varchar(60) COLLATE utf8_bin NOT NULL,
  `s_flat_type` varchar(50) COLLATE utf8_bin NOT NULL,
  `s_flat_number` int(50) NOT NULL,
  `s_flat_area` text COLLATE utf8_bin NOT NULL,
  `s_member` int(60) NOT NULL,
  `s_maintenance` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `signup_tb`
--

INSERT INTO `signup_tb` (`request_id`, `s_date`, `s_name`, `s_email`, `s_password`, `s_contact`, `s_who_lives`, `s_alternate_add`, `s_wing`, `s_flat_type`, `s_flat_number`, `s_flat_area`, `s_member`, `s_maintenance`) VALUES
(1, '2021-05-12 12:49:04', 'User Test', 'user@gmail.com', 'b855e41c5c5f5061ecba4fd8613a7760', 1234567890, 'Owner', 'Test', 'A', '1RL', 1, '2000', 10, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_tb`
--

CREATE TABLE `visitor_tb` (
  `Request_Id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `OTPs` int(10) NOT NULL,
  `DT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_bill`
--
ALTER TABLE `add_bill`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `complain_tb`
--
ALTER TABLE `complain_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `notice_for_all_tb`
--
ALTER TABLE `notice_for_all_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `notice_personal_tb`
--
ALTER TABLE `notice_personal_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `not_alloted`
--
ALTER TABLE `not_alloted`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `sendcomplainstatus_tb`
--
ALTER TABLE `sendcomplainstatus_tb`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `signup_tb`
--
ALTER TABLE `signup_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `visitor_tb`
--
ALTER TABLE `visitor_tb`
  ADD PRIMARY KEY (`Request_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_bill`
--
ALTER TABLE `add_bill`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complain_tb`
--
ALTER TABLE `complain_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_for_all_tb`
--
ALTER TABLE `notice_for_all_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_personal_tb`
--
ALTER TABLE `notice_personal_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `not_alloted`
--
ALTER TABLE `not_alloted`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sendcomplainstatus_tb`
--
ALTER TABLE `sendcomplainstatus_tb`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signup_tb`
--
ALTER TABLE `signup_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitor_tb`
--
ALTER TABLE `visitor_tb`
  MODIFY `Request_Id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2017 at 08:13 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admission`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `apartmentnumber` varchar(255) NOT NULL,
  `houseno` varchar(100) NOT NULL,
  `roadno` varchar(10) NOT NULL,
  `roadname` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `postoffice` varchar(100) NOT NULL,
  `policestation` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `type`, `apartmentnumber`, `houseno`, `roadno`, `roadname`, `area`, `postoffice`, `policestation`, `city`, `postcode`, `country`, `created_at`) VALUES
(1, 1, 'present', 'ABC-1', 'adf465', '14', 'bir uttom CR dotto', 'niku', 'kkhet', 'ktkhet', 'dhaka', '1232', 'Albania', '2017-02-03 06:31:55'),
(2, 1, 'premanent', 'dafs', 'dsfdsf', 'dsf', 'dsfdsf', 'fds', 'dfs', 'dsf', 'dfs', '321', 'Albania', '2017-02-03 06:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT '40',
  `count` int(11) NOT NULL DEFAULT '0',
  `credit` int(11) NOT NULL DEFAULT '3',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `capacity`, `count`, `credit`, `status`, `created_at`) VALUES
(1, 'ADVANCE DATABASE MANAGEMENT SYSTEM', 40, 0, 5, 0, '2016-03-21 12:38:47'),
(2, 'ADVANCED COMPUTER NETWORKS', 40, 0, 6, 0, '2016-03-21 12:39:44'),
(4, 'ADVANCED COMPUTER NETWORKSsds', 34, 0, 0, 1, '2017-01-19 08:29:32');

-- --------------------------------------------------------

--
-- Table structure for table `education_infomation`
--

CREATE TABLE `education_infomation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `degree` varchar(200) NOT NULL,
  `group` varchar(200) NOT NULL,
  `year` varchar(4) NOT NULL,
  `result` double NOT NULL,
  `board` varchar(200) NOT NULL,
  `institution` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `family_information`
--

CREATE TABLE `family_information` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `employer` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `nid` varchar(200) NOT NULL,
  `place` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `type` varchar(8) NOT NULL COMMENT 'father/mother/guardian',
  `emergency` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `bloodgroup` varchar(3) NOT NULL,
  `placeofbirth` varchar(255) NOT NULL,
  `maritalstatus` varchar(7) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `dateofissue` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address_id` int(11) NOT NULL COMMENT 'Mailing Address id',
  `picture` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`id`, `user_id`, `gender`, `dob`, `bloodgroup`, `placeofbirth`, `maritalstatus`, `nationality`, `nid`, `place`, `dateofissue`, `phone`, `address_id`, `picture`, `created_at`) VALUES
(2, 1, 'male', '2015-12-21', 'O-', 'Dhaka', 'Married', 'Afghanistan', '19944787654', 'bangladesh', '2017-01-25', '01675645369', 0, '', '2017-02-03 06:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `special_test`
--

CREATE TABLE `special_test` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `score` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(10) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `department`, `type`, `created_at`) VALUES
(1, 'SHAHAD RISAIN', 'ratonsh@gmail.com', '123456', 'BBA', 1, '2016-03-16 12:27:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_infomation`
--
ALTER TABLE `education_infomation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_information`
--
ALTER TABLE `family_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_test`
--
ALTER TABLE `special_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `education_infomation`
--
ALTER TABLE `education_infomation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `family_information`
--
ALTER TABLE `family_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `special_test`
--
ALTER TABLE `special_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

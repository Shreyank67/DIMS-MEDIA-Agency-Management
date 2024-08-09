-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 12:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dam`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `AD_id` varchar(10) NOT NULL,
  `AD_title` varchar(50) NOT NULL,
  `AD_description` varchar(50) NOT NULL,
  `AD_file` varchar(50) NOT NULL,
  `ADSET_id` varchar(11) NOT NULL,
  `USER_id` smallint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`AD_id`, `AD_title`, `AD_description`, `AD_file`, `ADSET_id`, `USER_id`) VALUES
('ad01', 'Gym | reel | 01', 'Gyms reel for males', 'Landing page', 'as1', 4),
('ad02', 'Gym | reel | 02', 'Gyms reel for females', 'Landing page', 'as2', 6),
('ad03', 'Gym | post | 01', 'Gyms post for males', 'Landing page', 'as1', 5),
('ad04', 'Gym | post | 02', 'Gyms post for females', 'Landing page', 'as2', 3),
('ad05', 'Roofing | reel | 01', 'Roofing reel for India', 'Website', 'as3', 9),
('ad06', 'Roofing | post | 01', 'Roofing post for USA', 'Website', 'as3', 10),
('ad07', 'Roofing | post | 02', 'Roofing post for USA', 'Website', 'as4', 1),
('ad08', 'Denstist | post | 01', 'Dentist post for males', 'Lead from', 'as5', 8),
('ad09', 'Denstist | reel | 01', 'Dentist reel for males', 'Lead from', 'as5', 2),
('ad10', 'Denstist | reel | 02', 'Dentist reel for females', 'Lead from', 'as6', 7);

-- --------------------------------------------------------

--
-- Table structure for table `adset`
--

CREATE TABLE `adset` (
  `ADSET_id` varchar(11) NOT NULL,
  `ADSET_name` varchar(50) NOT NULL,
  `ADSET_Description` varchar(50) NOT NULL,
  `ADSET_type` varchar(50) NOT NULL,
  `CAMPAIGN_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adset`
--

INSERT INTO `adset` (`ADSET_id`, `ADSET_name`, `ADSET_Description`, `ADSET_type`, `CAMPAIGN_id`) VALUES
('as1', 'Gym | males', 'Gyms ads for males', 'posts, reels', 'c1'),
('as2', 'Gym | females', 'Gyms ads for females', 'posts, reels', 'c1'),
('as3', 'Roofing | India ', 'Roofing ads in India', 'reels', 'c2'),
('as4', 'Roofing | USA', 'Roofing ads in USA', 'posts', 'c2'),
('as5', 'Dentist | males', 'Dentist ads for males', 'posts, reels', 'c3'),
('as6', 'Dentist | females', 'Dentist ads for females', 'reels', 'c3');

-- --------------------------------------------------------

--
-- Table structure for table `advertisers`
--

CREATE TABLE `advertisers` (
  `ADVERTISERS_id` smallint(10) NOT NULL,
  `ADVERTISERS_Email` varchar(45) NOT NULL,
  `ADVERTISER_name` varchar(45) NOT NULL,
  `ADVERTISER_number` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertisers`
--

INSERT INTO `advertisers` (`ADVERTISERS_id`, `ADVERTISERS_Email`, `ADVERTISER_name`, `ADVERTISER_number`) VALUES
(101, 'Adam@gmail.com', 'Adam', 123456789),
(102, 'Eva@gmail.com', 'Eva', 123456789),
(103, 'Jimmy@gmail.com', 'Jimmy', 123456789),
(104, 'lila123@gmail.com', 'lila', 12345678),
(108, 'sama12@gmail.com', 'sama', 12345678);

--
-- Triggers `advertisers`
--
DELIMITER $$
CREATE TRIGGER `Insert_log` AFTER INSERT ON `advertisers` FOR EACH ROW INSERT INTO log VALUES (null, NEW.ADVERTISERS_id, 'Inserted', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_log` BEFORE DELETE ON `advertisers` FOR EACH ROW INSERT INTO log VALUES (null, OLD.ADVERTISERS_id, 'Deleted', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_log` AFTER UPDATE ON `advertisers` FOR EACH ROW INSERT INTO log VALUES (null, NEW.ADVERTISERS_id, 'Updated', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `CAMPAIGN_id` varchar(10) NOT NULL,
  `ADVERTISERS_id` smallint(10) NOT NULL,
  `CAMPAIGN_name` varchar(50) NOT NULL,
  `CAMPAIGN_start` date NOT NULL,
  `CAMPAIGN_end` date NOT NULL,
  `CAMPAIGN_budget` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`CAMPAIGN_id`, `ADVERTISERS_id`, `CAMPAIGN_name`, `CAMPAIGN_start`, `CAMPAIGN_end`, `CAMPAIGN_budget`) VALUES
('c1', 101, 'Gym ', '2024-01-01', '2024-03-01', 10000),
('c2', 102, 'Roofing', '2024-02-01', '2024-04-01', 50000),
('c3', 101, 'Dentist', '2024-01-01', '2024-03-01', 20000),
('c4', 102, 'solar', '2024-03-01', '2024-05-01', 50000),
('c5', 101, 'camp5', '2024-06-19', '2024-07-19', 60000),
('c6', 102, 'abc', '2024-07-11', '2024-07-26', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log no` int(11) NOT NULL,
  `trigger_id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log no`, `trigger_id`, `action`, `cdate`) VALUES
(16, 106, 'Deleted', '2024-03-05 10:59:40'),
(17, 108, 'Updated', '2024-03-26 13:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_id` smallint(20) NOT NULL,
  `USER_name` varchar(50) NOT NULL,
  `USER_gender` varchar(50) NOT NULL,
  `USER_Email` varchar(50) NOT NULL,
  `USER_number` bigint(12) NOT NULL,
  `USER_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_id`, `USER_name`, `USER_gender`, `USER_Email`, `USER_number`, `USER_address`) VALUES
(1, 'Amanda', 'Female', 'Amanda@gmail.com', 1234567890, 'USA'),
(2, 'Jack', 'Male', 'Jack@gmail.com', 1234567890, 'USA'),
(3, 'Larry', 'Female', 'Larry@gmail.com', 1234567890, 'USA'),
(4, 'Sham', 'Male', 'Sham@gmail.com', 1234567890, 'India'),
(5, 'Shub', 'Male', 'Shub@gmail.com', 1234567890, 'India'),
(6, 'Shreya', 'Female', 'Shreya@gmail.com', 1234567890, 'India'),
(7, 'Ramesh', 'Male', 'Ramesh@gmail.com', 1234567890, 'India'),
(8, 'John', 'Male', 'John@gmail.com', 1234567890, 'USA'),
(9, 'Raksha', 'Female', 'Rakshal@gmail.com', 1234567890, 'India'),
(10, 'Jodi', 'Female', 'Jodi@gmail.com', 1234567890, 'USA'),
(11, 'samuktya', 'Female', 'samu@gmail.com', 12345678, 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`AD_id`),
  ADD KEY `ADSET_id` (`ADSET_id`),
  ADD KEY `USER_id` (`USER_id`);

--
-- Indexes for table `adset`
--
ALTER TABLE `adset`
  ADD PRIMARY KEY (`ADSET_id`),
  ADD KEY `CAMPAIGN_id` (`CAMPAIGN_id`);

--
-- Indexes for table `advertisers`
--
ALTER TABLE `advertisers`
  ADD PRIMARY KEY (`ADVERTISERS_id`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`CAMPAIGN_id`),
  ADD KEY `ADVERTISERS_id` (`ADVERTISERS_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ADSET_id` FOREIGN KEY (`ADSET_id`) REFERENCES `adset` (`ADSET_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `USER_id` FOREIGN KEY (`USER_id`) REFERENCES `users` (`USER_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `adset`
--
ALTER TABLE `adset`
  ADD CONSTRAINT `CAMPAIGN_id` FOREIGN KEY (`CAMPAIGN_id`) REFERENCES `campaign` (`CAMPAIGN_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `ADVERTISERS_id` FOREIGN KEY (`ADVERTISERS_id`) REFERENCES `advertisers` (`ADVERTISERS_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 08:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `location` varchar(32) NOT NULL,
  `date` date NOT NULL,
  `time` int(4) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `dname` varchar(32) NOT NULL,
  `uname` varchar(32) NOT NULL,
  `appt_id` int(10) NOT NULL,
  `status` set('Pending','Confirmed','Cancelled','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`location`, `date`, `time`, `reason`, `dname`, `uname`, `appt_id`, `status`) VALUES
('Urban Smiles Manila', '2022-06-18', 1400, 'Check-Up', 'RGarcia', 'kenlord55', 18, 'Cancelled'),
('Urban Smiles Manila', '2022-07-01', 1600, 'Check-Up', 'RGarcia', 'kenlord55', 19, 'Cancelled'),
('Urban Smiles Manila', '2022-06-16', 1700, 'Check-Up', 'RGarcia', 'net', 23, 'Cancelled'),
('Urban Smiles Manila', '2022-06-17', 1500, 'Check-Up', 'RGarcia', 'net', 24, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) NOT NULL,
  `selector` char(12) NOT NULL,
  `token` char(64) NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `selector`, `token`, `userid`, `expires`) VALUES
(77, 'J19MTGSrAfYT', '1faa14697cdf5ff8aab17c9967e4d250be4fbdf5f221eefe59e15d8d55b1bb8c', 0, '2020-10-19 09:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `clinic_id` int(10) NOT NULL,
  `location` varchar(32) NOT NULL,
  `open_hr` varchar(4) NOT NULL DEFAULT '1000',
  `close_hr` varchar(4) NOT NULL DEFAULT '1800'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinic_id`, `location`, `open_hr`, `close_hr`) VALUES
(1, 'Urban Smiles Manila', '10AM', '5PM'),
(2, 'ALC Clinic Quezon', '11AM', '5PM'),
(3, 'Dental World Manila', '12PM', '6PM'),
(4, 'Cavite Dental Clinic', '8AM', '2PM');

-- --------------------------------------------------------

--
-- Table structure for table `dentist`
--

CREATE TABLE `dentist` (
  `username` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` set('M','F') NOT NULL,
  `d_type` set('General','Orthodontist') NOT NULL,
  `location` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dentist`
--

INSERT INTO `dentist` (`username`, `name`, `phone`, `age`, `sex`, `d_type`, `location`) VALUES
('CDelacruz', 'C. Dela Cruz', 9067854312, 30, 'F', 'General', 'Cavite Dental Clinic'),
('DOlivares', 'D. Olivares', 9067844312, 34, 'M', 'General', 'ALC Clinic Quezon'),
('JSantos', 'J. Santos', 9067854332, 48, 'M', 'Orthodontist', 'Dental World Manila'),
('RGarcia', 'R. Garcia', 9067855312, 27, 'M', 'General', 'Urban Smiles Manila');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key1` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name`, `code`, `image`, `price`) VALUES
(1, 'Colgate Extra Clean Pack of 6 Toothbrush', 'TB101', 'tb101img.jpg', 100.00),
(2, 'Sensodyne Whitening Toothpaste', 'TP201', 'tp201img.jpg', 200.00),
(3, 'Oral B Essential Floss', 'DF301', 'df301img.jpg', 130.00),
(4, 'Colgate Plax Complete Care Mouthwash', 'MW401', 'mw401img.jpg', 99.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` char(64) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_no` bigint(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `role` set('admin','patient','dentist') NOT NULL DEFAULT 'patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `name`, `mobile_no`, `dob`, `role`) VALUES
(4, 'xyz', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'xyz@gmail.com', '', 0, NULL, 'patient'),
(8, 'admin1', 'f5fcb362366b8afab99565e016b71dc94502e3105455c6dddcadbbe1d4d23c55', 'admin1@gmail.com', '', 0, NULL, 'admin'),
(9, 'dentist1', '700de62160665c9da3c9adc67420ae415158cbaca2cd6cffe1b5156b21c9005e', 'd1@gmail.com', '', 0, NULL, 'dentist'),
(11, 'RGarcia', 'eb1ae24d0a6fe659e4b99f70d3f7362d4724865a12411d2b73b400e77416ee15', 'RGarcia@gmail.com', '', 0, NULL, 'dentist'),
(12, 'kenlord55', 'f5fcb362366b8afab99565e016b71dc94502e3105455c6dddcadbbe1d4d23c55', 'kenlord@gmail.com', '', 0, NULL, 'patient'),
(13, 'DOlivares', 'eb1ae24d0a6fe659e4b99f70d3f7362d4724865a12411d2b73b400e77416ee15', 'DOlivares@gmail.com', '', 0, NULL, 'dentist'),
(14, 'JSantos', 'eb1ae24d0a6fe659e4b99f70d3f7362d4724865a12411d2b73b400e77416ee15', 'JSantos@gmail.com', '', 0, NULL, 'dentist'),
(15, 'CDelacruz', 'eb1ae24d0a6fe659e4b99f70d3f7362d4724865a12411d2b73b400e77416ee15', 'CDelacruz@gmail.com', '', 0, NULL, 'dentist'),
(16, 'net', 'eb1ae24d0a6fe659e4b99f70d3f7362d4724865a12411d2b73b400e77416ee15', 'kaidyo13@gmail.com', 'an', 915370196, NULL, 'patient'),
(17, 'net2', 'eb1ae24d0a6fe659e4b99f70d3f7362d4724865a12411d2b73b400e77416ee15', 'net2@gmail.com', 'TONET', 9327375158, '2000-01-01', 'patient'),
(18, 'final', 'eb1ae24d0a6fe659e4b99f70d3f7362d4724865a12411d2b73b400e77416ee15', 'final@gmail.com', 'an2net funtanilla', 9153701961, '2000-01-01', 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `username` varchar(32) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `mobile_no` bigint(10) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `useraccount`
--

INSERT INTO `useraccount` (`username`, `name`, `mobile_no`, `dob`) VALUES
('net', 'antoinette', 915370196, '2000-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appt_id`) USING BTREE;

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Indexes for table `dentist`
--
ALTER TABLE `dentist`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u1` (`username`),
  ADD UNIQUE KEY `u2` (`email`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `clinic_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dentist`
--
ALTER TABLE `dentist`
  ADD CONSTRAINT `dentist_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD CONSTRAINT `useraccount_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `useraccount_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

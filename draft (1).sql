-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2021 at 12:26 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `draft`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `about_me` varchar(255) DEFAULT NULL,
  `Type` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`ID`, `FirstName`, `LastName`, `Email`, `phone_no`, `Password`, `about_me`, `Type`, `isActive`) VALUES
(1, 'kirtan', 'patel', 'kirtan09322@gmail.com', '0', '6a01bfa30172639e770a6aacb78a3ed4', '', 'student', 0),
(2, 'Kirtan ', 'patel', 'kp@gmail.com', '0700116183', '6a01bfa30172639e770a6aacb78a3ed4', 'hello am kirtan patel, and am just trying this out', 'landlord', 0),
(3, 'himanshu', 'parmar', 'hp@gmail.com', '075561718188', '6a01bfa30172639e770a6aacb78a3ed4', 'Just started my business and am a man of my word and all i post is legit', 'landlord', 0),
(4, 'DON', 'OMAR', 'don@gmail.com', '0', '6a01bfa30172639e770a6aacb78a3ed4', '', 'admin', 0),
(7, 'max', 'patel', 'max@gmail.com', '0755995104', '6a01bfa30172639e770a6aacb78a3ed4', 'Hello my name is maxx patel and i am the owner of 2 hostels', 'student', 0),
(8, 'sam', 'sam', 'sam@gmail.com', '0788995167', '332532dcfaa1cbf61e2a266bd723612c', 'Hello', 'landlord', 0),
(9, 'gagandeep', 'gahir', 'gahir@gmail.com', '111111111111', '6627415e807ee33c7302917216e7da68', NULL, 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hos_details`
--

CREATE TABLE `hos_details` (
  `ID` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `hos_name` varchar(50) NOT NULL,
  `hos_type` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ft_img` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `friendly_add` varchar(255) NOT NULL,
  `services` varchar(50) NOT NULL,
  `rules` varchar(50) NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT current_timestamp(),
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `agent_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hos_details`
--

INSERT INTO `hos_details` (`ID`, `agent_id`, `hos_name`, `hos_type`, `price`, `description`, `ft_img`, `location`, `friendly_add`, `services`, `rules`, `uploaded_on`, `isActive`, `agent_active`) VALUES
(1, 2, 'kirtans', 'Private room', '25000', 'qwerty', 'images/uploads/kirtans.jpeg', 'Butere road, milimani', 'uphill', 'internet, food, water', 'None', '2021-08-09 20:50:46', 0, 0),
(2, 3, 'himanshus', 'Shared room', '50000', 'Good place', 'images/uploads/himanshus.jpeg', 'Madaraka', 'next to huse', 'All', 'None', '2021-08-11 12:03:30', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `img_table`
--

CREATE TABLE `img_table` (
  `ID` int(11) NOT NULL,
  `hos_id` int(11) NOT NULL,
  `more_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `img_table`
--

INSERT INTO `img_table` (`ID`, `hos_id`, `more_img`) VALUES
(5, 1, 'images/uploads/kirtans_images.jfif'),
(6, 2, 'images/uploads/himanshus_download (2).jfif'),
(7, 2, 'images/uploads/himanshus_download (1).jfif'),
(8, 2, 'images/uploads/himanshus_download.jfif'),
(9, 2, 'images/uploads/himanshus_images.jfif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hos_details`
--
ALTER TABLE `hos_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `img_table`
--
ALTER TABLE `img_table`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hos_details`
--
ALTER TABLE `hos_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `img_table`
--
ALTER TABLE `img_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

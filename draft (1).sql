-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 10:57 AM
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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `hos_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `start_stay` varchar(50) NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `Checked` varchar(11) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `agent_id`, `hos_id`, `name`, `email`, `phone_no`, `message`, `start_stay`, `uploaded_on`, `Checked`) VALUES
(1, 3, 2, 'Kirtankumar Kamleshkumar Patel', 'kirtan09322@gmail.com', '0755995103', 'Nice place to stay, can i have a room?', '2021-08-27', '2021-08-28 13:43:03', 'checked'),
(2, 3, 2, 'Aryan', 'kirtan09322@gmail.com', '0755995103', 'qwerty', '2021-08-27', '2021-08-28 13:51:18', 'checked'),
(3, 2, 1, 'Kirtankumar Kamleshkumar Patel', 'kirtan09322@gmail.com', '0755995103', 'qwerty', '2021-08-27', '2021-08-28 14:53:48', 'checked'),
(4, 2, 3, 'Aryan', 'kirtan09322@gmail.com', '0755995103', 'asdfg', '2021-08-31', '2021-08-28 14:54:42', 'checked'),
(5, 3, 4, 'Aryan', 'kirtan09322@gmail.com', '0755995103', 'qwertyuiop', '2021-08-30', '2021-08-28 16:01:53', 'checked');

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
  `Religion` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `mstatus` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`ID`, `FirstName`, `LastName`, `Email`, `phone_no`, `Password`, `about_me`, `Type`, `Religion`, `location`, `mstatus`, `gender`, `isActive`) VALUES
(1, 'kirtan', 'patel', 'kirtan09322@gmail.com', '2546677890', '6a01bfa30172639e770a6aacb78a3ed4', '', 'student', NULL, NULL, NULL, NULL, 0),
(2, 'Kirtan ', 'patel', 'kp@gmail.com', '0700116183', '81dc9bdb52d04dc20036dbd8313ed055', 'hello am kirtan patel, and am just trying this out', 'landlord', NULL, NULL, NULL, NULL, 0),
(3, 'himanshu', 'parmar', 'hp@gmail.com', '075561718188', '6a01bfa30172639e770a6aacb78a3ed4', 'Just started my business and am a man of my word and all i post is legit', 'landlord', NULL, NULL, NULL, NULL, 0),
(4, 'DON', 'OMAR', 'don@gmail.com', '0700116183', '6a01bfa30172639e770a6aacb78a3ed4', 'I am admin', 'admin', NULL, NULL, NULL, NULL, 0),
(7, 'max', 'patel', 'max@gmail.com', '0755995104', '6a01bfa30172639e770a6aacb78a3ed4', 'Hello my name is maxx patel and i am the owner of 2 hostels', 'student', NULL, NULL, NULL, NULL, 0),
(8, 'sam', 'sam', 'sam@gmail.com', '0788995167', '332532dcfaa1cbf61e2a266bd723612c', 'Hello', 'landlord', NULL, NULL, NULL, NULL, 0),
(9, 'gagandeep', 'gahir', 'gahir@gmail.com', '111111111111', '6627415e807ee33c7302917216e7da68', NULL, 'admin', NULL, NULL, NULL, NULL, 0),
(11, 'deep', 'patel', 'deep@gmail.com', '2222222222', '6a01bfa30172639e770a6aacb78a3ed4', 'I am a 3rd year who wants to find a hostel', 'student', NULL, NULL, NULL, NULL, 0),
(12, 'bunda', 'patel', 'bunda@gmail.com', '0700116183', '6a01bfa30172639e770a6aacb78a3ed4', NULL, 'admin', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `name`, `email`, `message`, `uploaded_on`) VALUES
(1, 'kirtan', 'kp@gmail.com', 'qwert', '2021-08-23 12:41:42'),
(2, 'himanshu', 'hp@gmail.com', 'So this landlord is good', '2021-08-26 15:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `hos_details`
--

CREATE TABLE `hos_details` (
  `ID` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `hos_name` varchar(50) NOT NULL,
  `hos_type` varchar(50) NOT NULL,
  `share_no` int(11) DEFAULT NULL,
  `bed_no` int(11) DEFAULT NULL,
  `price` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ft_img` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `friendly_add` varchar(255) NOT NULL,
  `transport` varchar(255) DEFAULT NULL,
  `services` varchar(50) NOT NULL,
  `rules` varchar(50) NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT current_timestamp(),
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `agent_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hos_details`
--

INSERT INTO `hos_details` (`ID`, `agent_id`, `hos_name`, `hos_type`, `share_no`, `bed_no`, `price`, `description`, `ft_img`, `location`, `friendly_add`, `transport`, `services`, `rules`, `uploaded_on`, `isActive`, `agent_active`) VALUES
(1, 2, 'DOPE', 'Private room', NULL, 200, '25000', 'qwerty', 'images/uploads/kirtans.jpeg', 'Butere road, milimani', 'uphill', 'Yes we provide transport', 'internet, food, water', 'None', '2021-08-09 20:50:46', 0, 0),
(2, 3, 'himanshus', 'Shared room', 3, 200, '25000', 'Good place', 'images/uploads/himanshus.jpeg', 'kisauni road nairobi west', 'next to house', 'Do not worry about your transportation, we provide at no extra charge', 'All', 'None', '2021-08-11 12:03:30', 0, 0),
(3, 2, 'QWERTYS', 'Shared room', 4, 200, '25000', 'It is very good', 'images/uploads/QWERTYS.png', 'forest road nairobi', 'next to strathmore ', 'Yes we provide transport', 'Internet and all', 'No pets', '2021-08-18 20:36:39', 0, 0),
(4, 3, 'My_newone', 'Shared room', 5, 99, '25000', 'Nice place to stay', 'images/uploads/My_newone.jpeg', 'Butere road, milimani', 'next to west suit', 'We provide transport to students at specific times', 'All', 'No party!', '2021-08-20 21:31:09', 0, 0),
(5, 3, 'ikea', 'Shared room', 2, 200, '25000', 'Nice place to stay ', 'images/uploads/ikea.jpeg', 'kodi road nairobi', 'Butere road, milimani', 'Yes,  we provide transport at 1000/month', 'All', 'No party', '2021-08-28 12:59:29', 0, 0);

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
(9, 2, 'images/uploads/himanshus_images.jfif'),
(10, 3, 'images/uploads/QWERTYS_WhatsApp Image 2021-08-12 at 3.28.46 PM.jpeg'),
(11, 4, 'images/uploads/My_newone_images (2).jpg'),
(12, 4, 'images/uploads/My_newone_images (1).jpg'),
(13, 4, 'images/uploads/My_newone_images.jpg'),
(14, 4, 'images/uploads/My_newone_download (2).jpg'),
(15, 4, 'images/uploads/My_newone_download (1).jpg'),
(16, 4, 'images/uploads/My_newone_download.jpg'),
(17, 5, 'images/uploads/ikea_images (2).jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hos_details`
--
ALTER TABLE `hos_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `img_table`
--
ALTER TABLE `img_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

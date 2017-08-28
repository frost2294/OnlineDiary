-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2017 at 07:10 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdms`
--

-- --------------------------------------------------------

--
-- Table structure for table `personal_event`
--

CREATE TABLE `personal_event` (
  `Student_ID` bigint(20) NOT NULL,
  `username` varchar(25) NOT NULL,
  `eventID` int(11) NOT NULL,
  `eventDescrp` varchar(255) NOT NULL,
  `eventDate` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_notes`
--

CREATE TABLE `personal_notes` (
  `username` varchar(25) NOT NULL,
  `noteID` int(11) NOT NULL,
  `Student_ID` bigint(20) NOT NULL,
  `personalNote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_quote`
--

CREATE TABLE `personal_quote` (
  `username` varchar(25) NOT NULL,
  `quoteID` int(11) NOT NULL,
  `Student_ID` bigint(20) NOT NULL,
  `personalQuote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_event`
--

CREATE TABLE `social_event` (
  `socID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `Student_ID` bigint(20) NOT NULL,
  `socNotes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `Student_ID` bigint(20) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_assg`
--

CREATE TABLE `subject_assg` (
  `assgID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `Student_ID` bigint(20) NOT NULL,
  `assgNote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject_sum`
--

CREATE TABLE `subject_sum` (
  `sumID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `Student_ID` bigint(20) NOT NULL,
  `subSummary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_event`
--
ALTER TABLE `personal_event`
  ADD PRIMARY KEY (`eventID`,`Student_ID`);

--
-- Indexes for table `personal_notes`
--
ALTER TABLE `personal_notes`
  ADD PRIMARY KEY (`noteID`);

--
-- Indexes for table `personal_quote`
--
ALTER TABLE `personal_quote`
  ADD PRIMARY KEY (`quoteID`,`Student_ID`);

--
-- Indexes for table `social_event`
--
ALTER TABLE `social_event`
  ADD PRIMARY KEY (`socID`,`Student_ID`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`Student_ID`);

--
-- Indexes for table `subject_assg`
--
ALTER TABLE `subject_assg`
  ADD PRIMARY KEY (`assgID`,`Student_ID`);

--
-- Indexes for table `subject_sum`
--
ALTER TABLE `subject_sum`
  ADD PRIMARY KEY (`sumID`,`Student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_event`
--
ALTER TABLE `personal_event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `personal_notes`
--
ALTER TABLE `personal_notes`
  MODIFY `noteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `personal_quote`
--
ALTER TABLE `personal_quote`
  MODIFY `quoteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `social_event`
--
ALTER TABLE `social_event`
  MODIFY `socID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subject_assg`
--
ALTER TABLE `subject_assg`
  MODIFY `assgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subject_sum`
--
ALTER TABLE `subject_sum`
  MODIFY `sumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 01:58 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(128) NOT NULL,
  `c1` varchar(128) NOT NULL,
  `c2` varchar(128) NOT NULL,
  `c3` varchar(128) NOT NULL,
  `c4` varchar(128) NOT NULL,
  `c5` varchar(128) NOT NULL,
  `c6` varchar(128) NOT NULL,
  `pt` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `pt`) VALUES
(7, 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'IT331-Professional Training in Networking 1'),
(8, 'BA113-Physics', 'GM311-Introduction to Multimedia', 'BA203-Probability and Statistics', 'CS322-Operating Systems', 'CS402-Project 2', 'CS401-Project 1', 'IT331-Professional Training in Networking 1'),
(9, 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'IT331-Professional Training in Networking 1'),
(10, 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'IT331-Professional Training in Networking 1'),
(11, 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'BA101-Calculus 1', 'IT331-Professional Training in Networking 1');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` varchar(128) NOT NULL,
  `name` text NOT NULL,
  `time_day` int(11) NOT NULL,
  `time_period` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `time_day`, `time_period`) VALUES
('BA101', 'Calculas 1', 2, 2),
('BA102', 'Calculus 2', 2, 2),
('BA113', 'Physics', 2, 2),
('CS111', 'Intro to Computers', 2, 3),
('CS143', 'Problem Solving', 2, 3),
('EC134', 'Fund. Of Electronics', 2, 3),
('GM311', 'Intro to Multimedia', 4, 4),
('IS171', 'Intro to IS', 2, 4),
('IT331', 'Pro Training in Network 1', 1, 4),
('IT332', 'Pro Training in Network 2', 1, 4),
('LH135', 'ESP1', 3, 1),
('LH136', 'ESP2', 4, 3),
('NC133', 'Communication Skills', 3, 3),
('NC172', 'Fund. of Business', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `uid` int(11) NOT NULL,
  `cid` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`uid`, `cid`) VALUES
(14102835, 'BA102'),
(14102835, 'CS143'),
(14102835, 'EC134'),
(14102835, 'GM311'),
(14102835, 'IT332'),
(14102835, 'LH136'),
(14102835, 'NC133');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`uid`,`cid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `cid` (`cid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reg`
--
ALTER TABLE `reg`
  ADD CONSTRAINT `reg_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

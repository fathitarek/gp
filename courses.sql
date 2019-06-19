-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2019 at 09:19 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` varchar(128) NOT NULL,
  `name` text NOT NULL,
  `time_day` int(11) NOT NULL,
  `time_period` int(11) NOT NULL,
  `pre_id` varchar(32) NOT NULL,
  `term` int(10) NOT NULL,
  `Dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `time_day`, `time_period`, `pre_id`, `term`, `Dept`) VALUES
('BA101', 'Calculas 1', 2, 2, '', 1, ''),
('BA102', 'Calculus 2', 2, 2, 'BA101', 2, ''),
('BA113', 'Physics', 5, 4, '', 1, ''),
('BA201', 'Calculus 3', 1, 1, 'BA102', 3, ''),
('BA203', 'Probability and Statistics', 1, 2, 'BA102', 3, ''),
('BA216', 'Advanced Physics', 1, 3, 'BA113', 3, ''),
('BA301', 'Advanced Statistics', 4, 1, 'BA203', 5, ''),
('BA304', 'Linear Algebra', 4, 2, 'BA102', 5, ''),
('CE216', 'Digital Logic Design', 1, 4, 'CS111', 3, ''),
('CE231', 'Introduction to Networks', 2, 3, 'CS143', 4, ''),
('CE243', 'Intro.to Computer Architecture', 2, 4, 'CE216', 4, ''),
('CS111', 'Introduction to Computers', 2, 3, '', 1, ''),
('CS143', 'Introduction to Problem Solving and Programming', 2, 3, 'CS111', 2, ''),
('CS202', 'Discrete Structures', 2, 1, 'CS111', 3, ''),
('CS212', 'Data Structures and Algorithms', 3, 1, 'CS243', 4, ''),
('CS243', 'Object Oriented Programming', 2, 2, 'CS143', 3, ''),
('CS244', 'Advanced Programming Applications', 3, 2, 'CS243', 4, ''),
('CS301', 'Numerical Methods', 1, 1, 'BA304,CS143', 6, ''),
('CS305', 'System Modeling and Simulation', 1, 2, 'CS212', 6, ''),
('CS311', 'Theory of Computation', 1, 2, 'CS202', 5, ''),
('CS312', 'Computing Algorithms', 1, 3, 'CS212', 6, ''),
('CS321', 'Systems Programming', 4, 3, 'CS243,CE243', 5, ''),
('CS322', 'Operating Systems', 6, 1, 'CS212,CE243', 6, ''),
('CS333', 'Web Programming', 4, 4, 'IS273', 5, ''),
('CS352', 'Computer Graphics', 5, 1, 'CS212', 5, ''),
('CS366', 'Introduction to Artificial Intelligence', 5, 2, 'CS212,CS202', 6, ''),
('CS401', 'Project 1', 6, 2, 'GPA=2.0+ & 96+ CR', 7, ''),
('CS402', 'Project 2', 6, 2, 'CS401', 8, ''),
('CS411', 'Data Compression', 5, 3, 'CS212,BA201', 8, ''),
('CS421', 'Computer System Security', 4, 3, 'CS322,CE231', 8, ''),
('CS427', 'Embedded Systems Programming', 5, 1, 'CS143,CE243', 7, ''),
('CS445', 'Structure of Programming Languages', 3, 2, 'CS311,CS321', 7, ''),
('CS451', 'Human Computer Interaction', 5, 3, 'SE291', 8, ''),
('CS481', 'Computers & Society', 6, 1, '96CR+', 7, ''),
('EC134', 'Fundamentals of Electronics', 2, 3, 'BA113', 2, ''),
('GM311', 'Introduction to Multimedia', 4, 4, 'CS111', 2, ''),
('GM323', 'Digital Lighting and Rendering', 5, 3, 'GM324', 0, 'GM'),
('GM324', '3D Modeling', 5, 4, 'GM311', 0, 'GM'),
('GM411', 'Computer Animation', 6, 1, 'GM323', 0, 'GM'),
('GM415', 'Digital Audio & Video Fundamentals', 6, 2, 'GM311', 0, 'GM'),
('GM417', 'Media Production and Editing', 6, 3, 'GM311', 0, 'GM'),
('IS171', 'Introduction to Information systems', 2, 4, '', 1, ''),
('IS273', 'Database Systems', 3, 3, 'CS143', 4, ''),
('IS371', 'E-business Fundamentals', 2, 1, 'IS171', 0, 'IS'),
('IS372', 'Information Systems Theory And Practice', 2, 2, 'IS171', 0, 'IS'),
('IS374', 'Advanced Database Systems', 2, 3, 'IS273', 0, 'IS'),
('IS391', 'Systems Analysis & Design', 2, 4, 'IS171,CS243', 0, 'IS'),
('IS461', 'Decision Support Systems', 3, 1, 'CS366', 0, 'IS'),
('IS471', 'Strategic Planning for IS', 3, 2, 'IS391', 0, 'IS'),
('IT321', 'Professional Training in Programming I', 1, 4, '', 4, ''),
('IT322', 'Professional Training in Programming II', 1, 4, 'IT321', 5, ''),
('IT331', 'Professional Training in Networking  1', 1, 4, '', 0, ''),
('IT332', 'Professional Training in Networking  2', 1, 4, 'IT331', 0, ''),
('IT333', 'Professional Training in Networking 3', 1, 4, 'IT332', 0, ''),
('IT371', 'Professional Training in Databases 1', 1, 4, '', 0, ''),
('IT372', 'Professional Training in Databases 2', 1, 1, 'IT371', 0, ''),
('IT373', 'Professional Training in Databases 3', 1, 2, 'IT372', 0, ''),
('IT480', 'Professional Training in Multimedia 1', 1, 3, '', 0, ''),
('IT481	', 'Professional Training in Multimedia 2', 1, 4, 'IT480', 0, ''),
('IT482	', 'Professional Training in Multimedia 3', 1, 3, 'IT481', 0, ''),
('LH135', 'ESP1', 3, 1, '', 1, ''),
('LH136', 'ESP2', 4, 3, 'LH135', 2, ''),
('NC133', 'Communication Skills', 3, 3, 'LH135', 2, ''),
('NC172', 'Fundamentals of Business', 4, 4, '', 1, ''),
('SE291', 'Introduction to Software Engineering', 3, 4, 'CS243,IS171', 4, ''),
('SE392', 'Software Requirements and Specifications', 6, 4, 'SE291', 0, 'SE'),
('SE393', 'Principles of Software Architecture', 1, 1, 'SE291', 0, 'SE'),
('SE491', 'Software Component Design', 1, 2, 'SE291', 0, 'SE'),
('SE492', 'Software Verification', 1, 3, 'SE291', 0, 'SE'),
('SE493', 'Software Quality Assurance', 1, 4, 'SE291', 0, 'SE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

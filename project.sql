-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2016 at 07:51 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `following` varchar(255) DEFAULT NULL,
  `currentuser` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`following`, `currentuser`) VALUES
('user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `songdetails`
--

CREATE TABLE `songdetails` (
  `id` int(11) NOT NULL,
  `songname` varchar(48) NOT NULL,
  `genre` varchar(48) NOT NULL,
  `download` varchar(48) NOT NULL,
  `songowner` varchar(48) NOT NULL,
  `flag` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songdetails`
--

INSERT INTO `songdetails` (`id`, `songname`, `genre`, `download`, `songowner`, `flag`) VALUES
(17, 'Dog Days Are Over.mp3', 'Pop', 'no', 'user', 1),
(18, 'Youâ€™ve Got The Love (Candi Staton Cover).mp3', 'Rock', 'no', 'user', 1),
(19, 'Spectrum.mp3', 'gsldjf', 'no', 'user', 1),
(20, 'Mother.mp3', 'fsd', 'no', 'user', 1),
(21, 'Ship To Wreck.mp3', 'gfh', 'yes', 'user', 1),
(22, 'Caught.mp3', 'dfg', 'no', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `customer_name` varchar(48) NOT NULL,
  `uname` varchar(48) NOT NULL,
  `pass` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`customer_name`, `uname`, `pass`) VALUES
('ads', 'asda', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('abc', 'asv', 'f10e2821bbbea527ea02200352313bc059445190'),
('halum', 'halum', '4ced5536cdfaa020fa60ec64c824fccd9a08ec59'),
('John', 'johndoe', '6c074fa94c98638dfe3e3b74240573eb128b3d16'),
('default name', 'passispass', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('abc', 'sbsd', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('User Test', 'user', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684'),
('name', 'username', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `songdetails`
--
ALTER TABLE `songdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `songdetails`
--
ALTER TABLE `songdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

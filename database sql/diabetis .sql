-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 12:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diabetis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldata`
--

CREATE TABLE `tbldata` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time1` varchar(100) NOT NULL,
  `beforebreakfast` varchar(100) NOT NULL,
  `time2` varchar(100) NOT NULL,
  `breakfast` varchar(100) NOT NULL,
  `time3` varchar(100) NOT NULL,
  `lunch` varchar(100) NOT NULL,
  `time4` varchar(100) NOT NULL,
  `dinner` varchar(100) NOT NULL,
  `afterdinner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldata`
--

INSERT INTO `tbldata` (`id`, `date`, `time1`, `beforebreakfast`, `time2`, `breakfast`, `time3`, `lunch`, `time4`, `dinner`, `afterdinner`) VALUES
(1, '2023-04-30', '02:50', '200', '07:50', 'beef ', '13:50', 'rice', '08:50', 'beef with fruits', '187'),
(2, '2023-05-01', '02:57', '189', '07:51', 'cofee with mangoes', '12:52', 'beef with cereals', '20:52', 'milk', '152');

-- --------------------------------------------------------

--
-- Table structure for table `tblimages`
--

CREATE TABLE `tblimages` (
  `id` int(11) NOT NULL,
  `fimage` varchar(100) NOT NULL,
  `simage` varchar(100) NOT NULL,
  `timage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblimages`
--

INSERT INTO `tblimages` (`id`, `fimage`, `simage`, `timage`) VALUES
(11, '3.jpeg', '4.jpeg', '5.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tblquiz`
--

CREATE TABLE `tblquiz` (
  `id` int(11) NOT NULL,
  `quiz` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblquiz`
--

INSERT INTO `tblquiz` (`id`, `quiz`) VALUES
(1, 'What is the name of the college you applied to but did not attend?'),
(2, 'What is the name of the college you applied to but did not attend?'),
(3, 'What was the name of the first school you remember attending?'),
(4, 'What was the name of the first school you remember attending?'),
(5, 'Where was the destination of your best school field trip?'),
(6, 'Where was the destination of your best school field trip?'),
(7, 'What is your pet\'s name?'),
(8, 'What is your pet\'s name?'),
(9, 'What is the name of the town in which you were born?'),
(10, 'What is the name of the town in which you were born?'),
(11, 'What was your driving instructors first name?'),
(12, 'What was your driving instructors first name?'),
(13, 'What is your presidents name?');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `birth` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password1` varchar(200) NOT NULL,
  `quiz1` varchar(200) NOT NULL,
  `password2` varchar(100) NOT NULL,
  `quiz2` varchar(200) NOT NULL,
  `password3` varchar(200) NOT NULL,
  `quiz3` varchar(200) NOT NULL,
  `password4` varchar(100) NOT NULL,
  `password5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `fullname`, `email`, `phone`, `birth`, `username`, `password1`, `quiz1`, `password2`, `quiz2`, `password3`, `quiz3`, `password4`, `password5`) VALUES
(2, '', '', 0, '', '', '', '', '', '', '', '', '', ''),
(5, 'winslause shioso', 'wenbusale383@gmail.com', 769525570, '2023-04-04', 'wenslause', 'nXdrzFCT', '9', 'kyu', '4', 'dog', '9', 'kevin', '11'),
(6, 'jakob', 'jakob321@gmail.com', 98766554, '2023-06-15', 'jakob', 'Shioso@2023', '13', 'clinton', '1', 'havard', '9', 'hannington', '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldata`
--
ALTER TABLE `tbldata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblimages`
--
ALTER TABLE `tblimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblquiz`
--
ALTER TABLE `tblquiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldata`
--
ALTER TABLE `tbldata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblimages`
--
ALTER TABLE `tblimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblquiz`
--
ALTER TABLE `tblquiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

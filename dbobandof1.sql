-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 04:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbobandof1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblentry`
--

CREATE TABLE `tblentry` (
  `entryid` int(6) NOT NULL,
  `acctid` int(6) NOT NULL,
  `entrycontent` varchar(500) NOT NULL,
  `dateadded` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `heartcount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblentry`
--

INSERT INTO `tblentry` (`entryid`, `acctid`, `entrycontent`, `dateadded`, `heartcount`) VALUES
(3, 1, 'tessttt', '2024-04-04 10:06:12.062491', 0),
(4, 1, 'anotherrr testt', '2024-04-04 10:06:33.459980', 0),
(5, 3, 'test for john doe', '2024-04-04 10:07:32.328938', 0),
(9, 8, 'updateedd?????', '2024-04-18 08:44:11.079166', 0),
(11, 5, 'boang ko yey\r\n', '2024-04-18 09:10:03.770396', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblreviewlocation`
--

CREATE TABLE `tblreviewlocation` (
  `reviewid` int(11) NOT NULL,
  `acctid` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `review_content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreviewlocation`
--

INSERT INTO `tblreviewlocation` (`reviewid`, `acctid`, `country`, `date_added`, `review_content`) VALUES
(1, 5, 'Philippines', '2024-04-18 09:26:38', 'updated?\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `acctid` int(6) NOT NULL,
  `emailadd` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`acctid`, `emailadd`, `username`, `password`, `usertype`) VALUES
(1, 'obandoguadalue951@gmail.com', 'Guadaaaa', 'opbando123', 0),
(3, 'jdoe@gmail.com', 'Johnnn', '1234', 0),
(5, 'mclara@gmail.com', 'Mclara', '$2y$10$GQC5HzWEdh8tTs31l6bGSugwe/HWm4Wdd0jy9ruw5KGB493O63Xi2', 1),
(6, 'jd@gmail.com', 'JaneD', '$2y$10$KGgScP2KmoCn8RqLl2TdXuVM7PCoIABAo3REh.M8XPNqxJgnwq42C', 1),
(7, 'nienie@gmail.com', 'nienie', '$2y$10$1jJtAAtm.QeB699ZHp857e9tl./27BxNOYyV0i2hoAPGk3wYPwnnm', 1),
(8, 'tbear@gmail.com', 'tbear', '$2y$10$oYFB6tNAV0Uur/g8zH9lceuqE5vaOxVgo0CLX//0Q3Gxe5/Rl0t.K', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluserprofile`
--

CREATE TABLE `tbluserprofile` (
  `userid` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserprofile`
--

INSERT INTO `tbluserprofile` (`userid`, `firstname`, `lastname`, `gender`, `birthdate`) VALUES
(1, 'Guadalue', 'Obando', 'Female', '0000-00-00'),
(6, 'John', 'Doe', 'Male', '0000-00-00'),
(8, 'Maria', 'Clara', 'Female', '0000-00-00'),
(9, 'Jane', 'Doe', 'Female', '0000-00-00'),
(10, 'Nicole', 'Ejares', 'Female', '2004-02-28'),
(11, 'Teddy', 'Bear', 'Male', '2024-04-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblentry`
--
ALTER TABLE `tblentry`
  ADD PRIMARY KEY (`entryid`),
  ADD KEY `postentry` (`acctid`);

--
-- Indexes for table `tblreviewlocation`
--
ALTER TABLE `tblreviewlocation`
  ADD PRIMARY KEY (`reviewid`),
  ADD KEY `acctidfk` (`acctid`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`acctid`);

--
-- Indexes for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblentry`
--
ALTER TABLE `tblentry`
  MODIFY `entryid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblreviewlocation`
--
ALTER TABLE `tblreviewlocation`
  MODIFY `reviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `acctid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbluserprofile`
--
ALTER TABLE `tbluserprofile`
  MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblentry`
--
ALTER TABLE `tblentry`
  ADD CONSTRAINT `postentry` FOREIGN KEY (`acctid`) REFERENCES `tbluseraccount` (`acctid`);

--
-- Constraints for table `tblreviewlocation`
--
ALTER TABLE `tblreviewlocation`
  ADD CONSTRAINT `acctidfk` FOREIGN KEY (`acctid`) REFERENCES `tbluseraccount` (`acctid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

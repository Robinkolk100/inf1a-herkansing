-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 12:51 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `advice`
--

CREATE TABLE `advice` (
  `adviceID` int(11) NOT NULL,
  `documentID` int(11) NOT NULL,
  `adviceType` varchar(10) DEFAULT NULL,
  `adviceTekst` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `documentID` int(11) NOT NULL,
  `documentName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `filelink`
--

CREATE TABLE `filelink` (
  `fileID` int(11) NOT NULL,
  `fileLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projectdocuments`
--

CREATE TABLE `projectdocuments` (
  `projectDocumentID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `documentID` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `send` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `projectGroup` varchar(1) NOT NULL,
  `projectPeriode` int(1) NOT NULL,
  `projectYear` int(1) NOT NULL,
  `ProjectName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`projectID`, `projectGroup`, `projectPeriode`, `projectYear`, `ProjectName`) VALUES
(1, 'A', 5, 1, 'Herkansing');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `projectDocumentID` int(11) NOT NULL,
  `fileID` int(11) NOT NULL,
  `uploadDate` date DEFAULT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userproject`
--

CREATE TABLE `userproject` (
  `userID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `WarningCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPass`) VALUES
(587842, 'Martin Westerhof', 'martin.westerhof@student.stenden.com', 'poep1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advice`
--
ALTER TABLE `advice`
  ADD PRIMARY KEY (`adviceID`),
  ADD KEY `documentID` (`documentID`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`documentID`),
  ADD UNIQUE KEY `documentName` (`documentName`);

--
-- Indexes for table `filelink`
--
ALTER TABLE `filelink`
  ADD PRIMARY KEY (`fileID`);

--
-- Indexes for table `projectdocuments`
--
ALTER TABLE `projectdocuments`
  ADD PRIMARY KEY (`projectDocumentID`),
  ADD KEY `projectID` (`projectID`),
  ADD KEY `documentID` (`documentID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD KEY `projectDocumentID` (`projectDocumentID`),
  ADD KEY `fileID` (`fileID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `userproject`
--
ALTER TABLE `userproject`
  ADD KEY `userID` (`userID`),
  ADD KEY `projectID` (`projectID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advice`
--
ALTER TABLE `advice`
  MODIFY `adviceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `documentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filelink`
--
ALTER TABLE `filelink`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projectdocuments`
--
ALTER TABLE `projectdocuments`
  MODIFY `projectDocumentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advice`
--
ALTER TABLE `advice`
  ADD CONSTRAINT `advice_ibfk_1` FOREIGN KEY (`documentID`) REFERENCES `documents` (`documentID`);

--
-- Constraints for table `projectdocuments`
--
ALTER TABLE `projectdocuments`
  ADD CONSTRAINT `projectdocuments_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`),
  ADD CONSTRAINT `projectdocuments_ibfk_2` FOREIGN KEY (`documentID`) REFERENCES `documents` (`documentID`);

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `upload_ibfk_1` FOREIGN KEY (`projectDocumentID`) REFERENCES `projectdocuments` (`projectDocumentID`),
  ADD CONSTRAINT `upload_ibfk_2` FOREIGN KEY (`fileID`) REFERENCES `filelink` (`fileID`),
  ADD CONSTRAINT `upload_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `userproject`
--
ALTER TABLE `userproject`
  ADD CONSTRAINT `userproject_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `userproject_ibfk_2` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

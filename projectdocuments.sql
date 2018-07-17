-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 jul 2018 om 12:43
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.8

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
-- Tabelstructuur voor tabel `projectdocuments`
--

CREATE TABLE `projectdocuments` (
  `projectDocumentID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `documentID` int(11) NOT NULL,
  `documentDeadline` date NOT NULL,
  `documentUpload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `projectdocuments`
--

INSERT INTO `projectdocuments` (`projectDocumentID`, `projectID`, `documentID`, `documentDeadline`, `documentUpload`) VALUES
(3, 10, 2, '0000-00-00', NULL),
(4, 16, 2, '2018-07-09', NULL),
(5, 16, 3, '0000-00-00', NULL),
(6, 16, 4, '0000-00-00', NULL),
(7, 10, 3, '0000-00-00', NULL),
(8, 10, 5, '0000-00-00', NULL),
(9, 15, 6, '0000-00-00', NULL),
(10, 15, 7, '0000-00-00', NULL),
(11, 16, 5, '0000-00-00', NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `projectdocuments`
--
ALTER TABLE `projectdocuments`
  ADD PRIMARY KEY (`projectDocumentID`),
  ADD KEY `projectID` (`projectID`),
  ADD KEY `documentID` (`documentID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `projectdocuments`
--
ALTER TABLE `projectdocuments`
  MODIFY `projectDocumentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `projectdocuments`
--
ALTER TABLE `projectdocuments`
  ADD CONSTRAINT `projectdocuments_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`),
  ADD CONSTRAINT `projectdocuments_ibfk_2` FOREIGN KEY (`documentID`) REFERENCES `documents` (`documentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

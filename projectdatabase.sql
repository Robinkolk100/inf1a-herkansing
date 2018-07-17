-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 17 jul 2018 om 13:52
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
-- Tabelstructuur voor tabel `advice`
--

CREATE TABLE `advice` (
  `adviceID` int(11) NOT NULL,
  `documentID` int(11) NOT NULL,
  `adviceType` varchar(20) DEFAULT NULL,
  `adviceTekst` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `advice`
--

INSERT INTO `advice` (`adviceID`, `documentID`, `adviceType`, `adviceTekst`) VALUES
(3, 2, 'Verplichting', 'functies verdelen'),
(4, 2, 'Valkuil', 'onduidelijke afspraken'),
(5, 2, 'Verplichting', 'document ondertekenen'),
(6, 2, 'Verplichting', 'afspraken maken'),
(7, 2, 'Tip', 'Zorg ervoor dat iedereen bij het document kan komen.'),
(8, 3, 'Tip', 'Kies een kwaliteitscontroleur die het document controleert.'),
(9, 4, 'Tip', 'Laat het document controleren door de kwaliteitscontroleur.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `documents`
--

CREATE TABLE `documents` (
  `documentID` int(11) NOT NULL,
  `documentName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `documents`
--

INSERT INTO `documents` (`documentID`, `documentName`) VALUES
(4, 'Functioneel ontwerp'),
(5, 'gebruikershandleiding'),
(3, 'Plan van aanpak'),
(2, 'Teamcode'),
(7, 'Technisch adviesrapport'),
(6, 'Technisch ontwerp');

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
(11, 16, 5, '0000-00-00', NULL),
(12, 17, 2, '0000-00-00', NULL),
(13, 17, 3, '0000-00-00', NULL),
(14, 17, 4, '0000-00-00', NULL),
(15, 17, 6, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projects`
--

CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL,
  `projectGroup` varchar(1) NOT NULL,
  `projectPeriode` int(1) NOT NULL,
  `projectYear` int(1) NOT NULL,
  `ProjectName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `projects`
--

INSERT INTO `projects` (`projectID`, `projectGroup`, `projectPeriode`, `projectYear`, `ProjectName`) VALUES
(2, 'A', 1, 1, 'PROFESSIONELE WEBSITE'),
(3, 'E', 2, 1, 'DIGITALE PORTFOLIO'),
(4, 'E', 2, 1, 'DIGITALE PORTFOLIO'),
(5, 'E', 2, 1, 'DIGITALE PORTFOLIO'),
(6, 'B', 2, 1, 'DIGITALE PORTFOLIO'),
(7, 'B', 2, 1, 'DIGITALE PORTFOLIO'),
(8, 'D', 1, 1, 'PROFESSIONELE WEBSITE'),
(9, 'D', 1, 1, 'PROFESSIONELE WEBSITE'),
(10, 'D', 1, 1, 'PROFESSIONELE WEBSITE'),
(11, 'A', 2, 1, 'DIGITALE PORTFOLIO'),
(12, 'E', 1, 1, 'PROFESSIONELE WEBSITE'),
(13, 'A', 2, 1, 'DIGITALE PORTFOLIO'),
(14, 'C', 3, 1, 'STENDEN BATTLEBOT'),
(15, 'A', 4, 1, 'PROJECT INNOVATE'),
(16, 'A', 5, 1, 'SMARTPROJECTS'),
(17, 'A', 1, 1, 'PROFESSIONELE WEBSITE'),
(18, 'B', 2, 1, 'DIGITALE PORTFOLIO'),
(19, 'C', 3, 1, 'STENDEN BATTLEBOT'),
(20, 'D', 4, 1, 'PROJECT INNOVATE');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `userproject`
--

CREATE TABLE `userproject` (
  `userID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `WarningCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `userproject`
--

INSERT INTO `userproject` (`userID`, `projectID`, `WarningCount`) VALUES
(587842, 2, 0),
(587842, 3, 0),
(587842, 4, 0),
(587842, 5, 0),
(12345, 6, 0),
(12345, 7, 0),
(12345, 8, 0),
(12345, 9, 0),
(611294, 10, 0),
(611294, 11, 0),
(12345, 10, 1),
(587842, 10, 0),
(594776, 10, 0),
(48665, 12, 0),
(594776, 13, 0),
(594776, 14, 0),
(594776, 15, 0),
(594776, 16, 1),
(611294, 16, 0),
(587842, 16, 0),
(12345, 13, 1),
(48665, 13, 0),
(611294, 13, 0),
(587842, 13, 0),
(987654, 17, 0),
(987654, 18, 0),
(987654, 19, 0),
(987654, 20, 0),
(12345, 17, 0),
(567890, 17, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPass`) VALUES
(12345, 'andre rodzevic', 'andre.rodzevic@student.stenden.com', '8a8b53dd046a36328b661315ffd6a594c9229ab4672fc6207c9f3ff8449516f0'),
(48665, 'gerwin kreeft', 'gerwin.kreeft@student.stenden.com', 'dfaf1cf43ee840e276f0f690f3c603c4bb63e5502be1ff1ff96838105afd4d50'),
(567890, 'jan de vries', 'jan.de.vries@student.stenden.com', '2e0e339c8d5f9772c21a9111e1269ec004e9d93fa9cdde48c654b59033f20bb5'),
(587842, 'martin westerhof', 'martin.westerhof@student.stenden.com', '9fbb9e42930bd3c25b8238030e97136de5e305a756b975ebebafc158a51a417e'),
(594776, 'ivar huizing', 'ivar.huizing@student.stenden.com', '86ee4e76198f59574aa8244f555e2d4259da1dc223ca267a5d0c31785dbc0093'),
(611294, 'Robin Kolk', 'Robin.Kolk@student.stenden.com', 'c2541c43bc8e74958bb9006b6adbbc2a6d882ef2dfc3d4f094695045094ac240'),
(987654, 'test user', 'test.user@student.stenden.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `advice`
--
ALTER TABLE `advice`
  ADD PRIMARY KEY (`adviceID`),
  ADD KEY `documentID` (`documentID`);

--
-- Indexen voor tabel `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`documentID`),
  ADD UNIQUE KEY `documentName` (`documentName`);

--
-- Indexen voor tabel `projectdocuments`
--
ALTER TABLE `projectdocuments`
  ADD PRIMARY KEY (`projectDocumentID`),
  ADD KEY `projectID` (`projectID`),
  ADD KEY `documentID` (`documentID`);

--
-- Indexen voor tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexen voor tabel `userproject`
--
ALTER TABLE `userproject`
  ADD KEY `userID` (`userID`),
  ADD KEY `projectID` (`projectID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `advice`
--
ALTER TABLE `advice`
  MODIFY `adviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `documents`
--
ALTER TABLE `documents`
  MODIFY `documentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `projectdocuments`
--
ALTER TABLE `projectdocuments`
  MODIFY `projectDocumentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT voor een tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `advice`
--
ALTER TABLE `advice`
  ADD CONSTRAINT `advice_ibfk_1` FOREIGN KEY (`documentID`) REFERENCES `documents` (`documentID`);

--
-- Beperkingen voor tabel `projectdocuments`
--
ALTER TABLE `projectdocuments`
  ADD CONSTRAINT `projectdocuments_ibfk_1` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`),
  ADD CONSTRAINT `projectdocuments_ibfk_2` FOREIGN KEY (`documentID`) REFERENCES `documents` (`documentID`);

--
-- Beperkingen voor tabel `userproject`
--
ALTER TABLE `userproject`
  ADD CONSTRAINT `userproject_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `userproject_ibfk_2` FOREIGN KEY (`projectID`) REFERENCES `projects` (`projectID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

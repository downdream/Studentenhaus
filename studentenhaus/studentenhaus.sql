-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Feb 2021 um 20:20
-- Server-Version: 10.1.36-MariaDB
-- PHP-Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `studentenhaus`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `nachname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `admin`
--

INSERT INTO `admin` (`admin_id`, `vorname`, `nachname`, `username`, `email`, `telefon`, `password`) VALUES
(1, 'Anna', 'Zimmermann', 'anna', 'anna@studentenhaus.com', '12345667890', 'studentenhaus'),
(2, 'Max', 'Fischer', 'max', 'max@studentenhaus.com', '0987654321', 'studentenhaus');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auftrag`
--

CREATE TABLE `auftrag` (
  `auftrag_id` int(12) NOT NULL,
  `termin` date NOT NULL,
  `einzugsadress` text NOT NULL,
  `einzugsPLZ` text NOT NULL,
  `zieladress` text NOT NULL,
  `zielPLZ` text NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `inventar_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `auftrag`
--

INSERT INTO `auftrag` (`auftrag_id`, `termin`, `einzugsadress`, `einzugsPLZ`, `zieladress`, `zielPLZ`, `student_id`, `inventar_id`, `status_id`) VALUES
(1, '2019-01-20', 'Rostockerstrasse 09 berlin', '10553', 'Brandenburg hauptbahnhof', '14776', 3, 2, 1),
(14, '2019-01-31', 'asdad', '111231', 'sadasd', '112321', 2, 46, NULL),
(15, '2019-02-08', 'asdsad', '10557', 'asdsa', '12312', 2, 47, NULL),
(16, '2019-01-31', 'asdasd', '10557', 'asdasd', '12312', 2, 49, 14),
(17, '2019-07-17', 'Schnellerstr. ', '12439', 'Leipzigerstr.', '10179', 4, 54, 15),
(18, '2019-04-18', 'Leipzigerstr.', '10179', 'Schnellerstr. ', '12439', 4, 54, 16),
(19, '2019-02-07', 'Friedrichstr. ', '10117', 'Magdeburger Str. ', '14770', 4, 56, 17),
(20, '2019-02-15', 'Ginsterweg', '12345', 'StraÃŸe', '12345', 15, 60, 19),
(21, '2018-05-05', 'Carmerstr 12 ', '120623', 'Savgnstr12 ', '23564', 16, 60, 20),
(22, '2019-02-17', 'ters', '3433', 'efd', '3434', 17, 60, 21),
(23, '2019-02-10', 'ters', '3433', 'efd', '3434', 17, 61, 22),
(24, '2019-02-16', 'ters', '3433', 'efd', '3434', 17, 62, 23),
(25, '2021-02-15', 'hbf', '2131', 'brbhbf', '3123', 18, 64, 24);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fileup`
--

CREATE TABLE `fileup` (
  `image_id` int(11) NOT NULL,
  `student_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `fileup`
--

INSERT INTO `fileup` (`image_id`, `student_id`, `title`, `image`) VALUES
(93, 19, 'Scott Bike', '4518-$_59 (1).jpg'),
(94, 20, 'Logitech Tastatur', '7862-$_59.jpg'),
(95, 21, 'Nachttisch', '5059-$_59 (2).jpg'),
(96, 22, 'TRUST GAMING MOUSE RGB', '8618-$_59 (3).jpg'),
(97, 23, 'Lenovo Laptop/ AMD Athlon / Dual Core/ 320GB/ Akku top', '4615-$_59 (4).jpg'),
(98, 24, 'Regal, Schuhregal, Sideboard', '7712-$_59 (5).jpg'),
(99, 25, 'Sportschuhe Schuhe Marke Nike Gr. 38', '1733-$_59 (6).jpg'),
(100, 26, 'Philips Lautsprecher Set inkl. Subwoofer', '3482-$_59 (7).jpg'),
(101, 27, 'GroÃŸe sofa+fuÃŸablage im guten Zustand 192cm LÃ¤nge 1m', '7964-$_59 (8).jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `inventar`
--

CREATE TABLE `inventar` (
  `inventar_id` int(12) NOT NULL,
  `menge` int(11) NOT NULL,
  `waren_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `inventar`
--

INSERT INTO `inventar` (`inventar_id`, `menge`, `waren_id`) VALUES
(1, 1, 1),
(1, 4, 2),
(1, 3, 3),
(2, 1, 1),
(2, 4, 2),
(2, 2, 3),
(3, 2, 1),
(4, 3, 4),
(5, 1, 1),
(6, 3, 4),
(7, 3, 4),
(8, 1, 1),
(9, 1, 1),
(10, 3, 4),
(11, 3, 4),
(12, 3, 4),
(13, 3, 4),
(14, 3, 4),
(15, 3, 4),
(16, 3, 4),
(17, 3, 4),
(18, 1, 1),
(19, 3, 4),
(20, 3, 4),
(21, 1, 1),
(22, 3, 4),
(23, 1, 1),
(24, 1, 1),
(25, 3, 4),
(26, 1, 1),
(27, 3, 4),
(28, 1, 1),
(29, 3, 4),
(30, 1, 1),
(31, 1, 1),
(32, 1, 1),
(33, 1, 1),
(34, 1, 1),
(35, 1, 1),
(36, 1, 1),
(37, 1, 1),
(38, 1, 1),
(39, 3, 4),
(40, 1, 1),
(40, 3, 4),
(41, 1, 1),
(42, 1, 1),
(43, 1, 1),
(44, 1, 1),
(44, 3, 2),
(44, 4, 4),
(45, 3, 4),
(46, 4, 1),
(46, 3, 4),
(47, 4, 1),
(47, 10, 2),
(47, 3, 4),
(47, 3, 5),
(48, 1, 1),
(48, 10, 2),
(49, 4, 1),
(49, 3, 2),
(49, 3, 4),
(49, 3, 5),
(50, 3, 5),
(51, 4, 1),
(51, 4, 3),
(51, 3, 4),
(51, 3, 5),
(52, 4, 1),
(52, 4, 3),
(52, 3, 4),
(52, 3, 5),
(53, 3, 1),
(53, 4, 5),
(54, 3, 5),
(55, 4, 3),
(56, 3, 1),
(56, 4, 3),
(57, 2, 1),
(57, 6, 2),
(57, 1, 3),
(57, 5, 4),
(57, 3, 5),
(58, 2, 1),
(58, 6, 2),
(58, 1, 3),
(58, 5, 4),
(58, 3, 5),
(59, 2, 1),
(59, 1, 3),
(59, 5, 4),
(60, 1, 1),
(60, 1, 2),
(60, 100, 5),
(61, 1, 1),
(61, 1, 5),
(62, 1, 5),
(63, 4, 1),
(64, 4, 1),
(64, 4, 2),
(64, 5, 5),
(65, 4, 1),
(65, 4, 2),
(65, 5, 5),
(66, 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lieferer`
--

CREATE TABLE `lieferer` (
  `liefer_id` int(11) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `nachname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `lieferer`
--

INSERT INTO `lieferer` (`liefer_id`, `vorname`, `nachname`, `email`, `telefon`) VALUES
(1, 'Valentino', 'Rossi', 'Rossi@testmail.com', '01234567890');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `preis` varchar(255) DEFAULT NULL,
  `Bezahlung` tinyint(1) DEFAULT NULL,
  `Zustand` text NOT NULL,
  `lieferer_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `status`
--

INSERT INTO `status` (`status_id`, `preis`, `Bezahlung`, `Zustand`, `lieferer_id`, `admin_id`) VALUES
(1, '60€', 1, 'Fertig', 1, 1),
(2, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(3, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(4, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(5, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(6, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(7, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(8, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(9, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(10, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(11, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(12, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(13, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(14, '90€', 0, 'Gerade abgestellt', 1, 2),
(15, NULL, 0, 'Gerade abgestellt', NULL, 1),
(16, NULL, 0, 'Gerade abgestellt', NULL, 2),
(17, NULL, 0, 'Gerade abgestellt', NULL, 2),
(18, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(19, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(20, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(21, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(22, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(23, NULL, 0, 'Gerade abgestellt', NULL, NULL),
(24, NULL, 0, 'Gerade abgestellt', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `student`
--

CREATE TABLE `student` (
  `student_id` int(255) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `nachname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `telefon` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `student`
--

INSERT INTO `student` (`student_id`, `vorname`, `nachname`, `email`, `username`, `telefon`, `password`) VALUES
(2, 'Jonathan Lovell', 'Darmawan', 'darmawan@th-brandenburg.de', 'darmawan', '017624365xxx', '6f300c37c38c594cef11ff8a66445d69'),
(3, 'test', 'user', 'test@mail.com', 'test', '123456789', '6f300c37c38c594cef11ff8a66445d69'),
(4, 'JianYing', 'Toy', 'toy@th-brandenburg.de', 'toy', '017634483448', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'David', 'Heft', 'heft@th-brandenburg.de', 'heft', '01743156974', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'Clemence', 'Tchilibou', 'clemence.tchuendem@yahoo.com', '', '12345689', 'e2fc714c4727ee9395f324cd2e7f331f'),
(9, 'Hello', 'World', 'helloworld@example.com', '', '01234567899', 'fc5e038d38a57032085441e7fe7010b0'),
(10, 'Jay', 'Toy', 'testing@gmail.com', 'test', '0123456789', '81dc9bdb52d04dc20036dbd8313ed055'),
(11, 'test2', 'student', 'test2@mail.com', 'teststudent', '0123456778', '6f300c37c38c594cef11ff8a66445d69'),
(12, 'asd', 'asd', 'asd@live.com', 'cheecko', '123456789', 'cc03e747a6afbbcbf8be7668acfebee5'),
(13, 'test', 'job', 'testjob@example.com', 'testdta', '012312312', 'aa00faf97d042c13a59da4d27eb32358'),
(14, 'Max', 'Schmidt', 'lol@lol.de', 'max', '102974097128', '530ea1472e71035353d32d341ecf6343'),
(15, 'Michael', 'HÃ¶ding', 'hoeding@th-brandenburg.de', 'hoeding', '03920120770', '81dc9bdb52d04dc20036dbd8313ed055'),
(16, 'Amine', 'Iziki', 'amine.iziki@gmail.com', 'amine', '0524492310', 'e7a517911794b7c50e2f2aa8444ebcd1'),
(17, 'Clemence', 'Tchilibou', 'tchilibo@th-brandenburg.de', 'tchilibo', '01629835810', '098f6bcd4621d373cade4e832627b4f6'),
(18, 'supadi', 'natanegara', 'test@mail.de', 'testuser', '1234567890', '16d7a4fca7442dda3ad93c9a726597e4'),
(19, 'Levi', 'Ackerman', 'helloworld@mail.com', 'helloworld', '01577123456', 'fc5e038d38a57032085441e7fe7010b0'),
(20, 'Armin', 'van Buuren', 'awedawkl@asdkk.com', 'regoblok', '015734561892', 'e19d5cd5af0378da05f63f891c7467af'),
(21, 'Mikasa', 'Sukasa', 'mkasdkj@mail.com', 'msukasa', '015477812653', 'e19d5cd5af0378da05f63f891c7467af'),
(22, 'Floc', 'Isded', 'asdhjal@mail.com', 'jdarmawan', '015429987146', 'e19d5cd5af0378da05f63f891c7467af'),
(23, 'Jawtitan', 'Canfly', 'asldkna@mail.com', 'tross@mail.com', '015667893455', 'e19d5cd5af0378da05f63f891c7467af'),
(24, 'Hannes', 'San', 'hsan@gmail.com', 'hsan', '015773468295', 'e19d5cd5af0378da05f63f891c7467af'),
(25, 'Sasha', 'Isded', 'asdasd@gmail.com', 'sisded', '0157726384956', 'e19d5cd5af0378da05f63f891c7467af'),
(26, 'Hange', 'Isded', 'asdnas@mail.com', 'hisded', '015778394561', 'e19d5cd5af0378da05f63f891c7467af'),
(27, 'Falco', 'Jawtitan', 'asdkjasd@gmail.com', 'fjawtitan', '015774629386', 'e19d5cd5af0378da05f63f891c7467af');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `waren`
--

CREATE TABLE `waren` (
  `waren_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `waren`
--

INSERT INTO `waren` (`waren_id`, `name`, `image`) VALUES
(1, 'Tisch', '1.jpg'),
(2, 'Stuhl', '2.jpg'),
(3, 'Schrank', '3.jpg'),
(4, 'Karton', '4.jpg'),
(5, 'Karton L', '5.jpg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indizes für die Tabelle `auftrag`
--
ALTER TABLE `auftrag`
  ADD PRIMARY KEY (`auftrag_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `inventar_id` (`inventar_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indizes für die Tabelle `fileup`
--
ALTER TABLE `fileup`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indizes für die Tabelle `inventar`
--
ALTER TABLE `inventar`
  ADD PRIMARY KEY (`inventar_id`,`waren_id`),
  ADD KEY `waren_id` (`waren_id`);

--
-- Indizes für die Tabelle `lieferer`
--
ALTER TABLE `lieferer`
  ADD PRIMARY KEY (`liefer_id`);

--
-- Indizes für die Tabelle `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `auftrag_id` (`lieferer_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indizes für die Tabelle `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indizes für die Tabelle `waren`
--
ALTER TABLE `waren`
  ADD PRIMARY KEY (`waren_id`),
  ADD KEY `waren_id` (`waren_id`),
  ADD KEY `waren_id_2` (`waren_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `auftrag`
--
ALTER TABLE `auftrag`
  MODIFY `auftrag_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT für Tabelle `fileup`
--
ALTER TABLE `fileup`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT für Tabelle `inventar`
--
ALTER TABLE `inventar`
  MODIFY `inventar_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT für Tabelle `lieferer`
--
ALTER TABLE `lieferer`
  MODIFY `liefer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT für Tabelle `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT für Tabelle `waren`
--
ALTER TABLE `waren`
  MODIFY `waren_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `auftrag`
--
ALTER TABLE `auftrag`
  ADD CONSTRAINT `Auftrag_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `Auftrag_ibfk_4` FOREIGN KEY (`inventar_id`) REFERENCES `inventar` (`inventar_id`),
  ADD CONSTRAINT `Auftrag_ibfk_5` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints der Tabelle `fileup`
--
ALTER TABLE `fileup`
  ADD CONSTRAINT `fileup_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints der Tabelle `inventar`
--
ALTER TABLE `inventar`
  ADD CONSTRAINT `Inventar_ibfk_1` FOREIGN KEY (`waren_id`) REFERENCES `waren` (`waren_id`);

--
-- Constraints der Tabelle `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `Status_ibfk_1` FOREIGN KEY (`lieferer_id`) REFERENCES `lieferer` (`liefer_id`),
  ADD CONSTRAINT `Status_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

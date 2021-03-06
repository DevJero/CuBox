-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Okt 2014 um 15:48
-- Server Version: 5.6.16
-- PHP-Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `cuboard`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `control`
--

CREATE TABLE IF NOT EXISTS `control` (
  `cid` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `code` int(6) unsigned NOT NULL,
  `pos` int(4) unsigned DEFAULT NULL,
  `rid` int(4) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `control`
--

INSERT INTO `control` (`cid`, `name`, `status`, `code`, `pos`, `rid`) VALUES
(2, 'Standlicht', 0, 100021, 1, 2),
(3, 'Deckenlicht', 0, 100022, 3, 2),
(4, 'Deckenlicht', 0, 100011, 2, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Daten für Tabelle `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'Jero', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `mid` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `pos` int(4) unsigned DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `module`
--

INSERT INTO `module` (`mid`, `name`, `pos`, `status`) VALUES
(1, 'control', NULL, 1),
(2, 'news', NULL, 1),
(3, 'wetter', NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `rid` int(4) NOT NULL AUTO_INCREMENT,
  `room` varchar(50) NOT NULL,
  `pos` int(4) unsigned NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `room`
--

INSERT INTO `room` (`rid`, `room`, `pos`) VALUES
(2, 'Schlafzimmer', 0),
(3, 'Wohnzimmer', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `sid` int(4) NOT NULL AUTO_INCREMENT,
  `funktion` varchar(40) NOT NULL,
  `code` varchar(60) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `settings`
--

INSERT INTO `settings` (`sid`, `funktion`, `code`, `status`) VALUES
(1, 'Push-Benachrichtigungen', 'v1pAxW812rygFz1LGah8McTV5Pb5IlZ5qNujAmPyZyvC0', 0),
(2, 'Master-Passwort', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

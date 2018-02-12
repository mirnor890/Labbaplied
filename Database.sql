-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 12 feb 2018 kl 11:28
-- Serverversion: 5.6.35
-- PHP-version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databas: `Book club`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `Author`
--

CREATE TABLE `Author` (
  `ID` int(11) NOT NULL,
  `First Name` varchar(25) NOT NULL,
  `Last Name` varchar(50) NOT NULL,
  `Information` text NOT NULL,
  `SSN` int(11) DEFAULT NULL,
  `Birthyear` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `Book`
--

CREATE TABLE `Book` (
  `ISBN` int(13) NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Author` varchar(100) NOT NULL,
  `Reserved` tinyint(1) NOT NULL,
  `Due Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `Book`
--

INSERT INTO `Book` (`ISBN`, `Title`, `Author`, `Reserved`, `Due Date`) VALUES
(1, 'Animal Farm', 'George Orwell', 0, '0000-00-00'),
(2, 'Romeo and Juliet', 'William Shakespeare', 0, '2017-09-25'),
(3, 'To kill a mockingbird', 'Harper Lee', 0, '2017-09-25'),
(4, 'Lord of the flies', 'William Golding', 0, '2017-09-25'),
(5, 'The Alchemist', 'Paulo Coelho', 0, '2017-09-25');

-- --------------------------------------------------------

--
-- Tabellstruktur `Creator`
--

CREATE TABLE `Creator` (
  `Author ID` int(11) NOT NULL,
  `Book ISBN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellstruktur `User`
--

CREATE TABLE `User` (
  `userid` int(11) NOT NULL,
  `username` char(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `User`
--

INSERT INTO `User` (`userid`, `username`, `password`) VALUES
(3, 'loop', '1df823e482339eb6067f4134408b0b8b28411a78');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`ID`);

--
-- Index för tabell `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Index för tabell `Creator`
--
ALTER TABLE `Creator`
  ADD PRIMARY KEY (`Author ID`,`Book ISBN`);

--
-- Index för tabell `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `Author`
--
ALTER TABLE `Author`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `User`
--
ALTER TABLE `User`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `Creator`
--
ALTER TABLE `Creator`
  ADD CONSTRAINT `creator_ibfk_1` FOREIGN KEY (`Author ID`) REFERENCES `Author` (`ID`);
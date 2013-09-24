-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Računalo: 127.0.0.1
-- Vrijeme generiranja: Ruj 25, 2013 u 12:20 AM
-- Verzija poslužitelja: 5.5.32
-- PHP verzija: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza podataka: `knjiznica`


-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `korisnicko_ime` varchar(50) NOT NULL,
  `zaporka` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Izbacivanje podataka za tablicu `admin`
--

INSERT INTO `admin` (`admin_ID`, `korisnicko_ime`, `zaporka`) VALUES
(1, 'tomislav', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `autor_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  PRIMARY KEY (`autor_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Izbacivanje podataka za tablicu `autor`
--

INSERT INTO `autor` (`autor_ID`, `ime`, `prezime`) VALUES
(1, 'Susan', 'Wittig Albert'),
(2, 'Margery', 'Allingham'),
(4, 'Isaac', 'Asimov'),
(5, 'Tomislav', 'Šapina');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `izdavac`
--

CREATE TABLE IF NOT EXISTS `izdavac` (
  `izdavac_ID` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) NOT NULL,
  PRIMARY KEY (`izdavac_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Izbacivanje podataka za tablicu `izdavac`
--

INSERT INTO `izdavac` (`izdavac_ID`, `naziv`) VALUES
(1, 'Profil'),
(2, 'Školska knjiga d.d.'),
(3, 'Test izdavac');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `knjiga`
--

CREATE TABLE IF NOT EXISTS `knjiga` (
  `knjiga_ID` int(11) NOT NULL AUTO_INCREMENT,
  `autor_ID_FK` int(11) NOT NULL,
  `izdavac_ID_FK` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `isbn` varchar(15) NOT NULL,
  `godina` varchar(15) NOT NULL,
  `kolicina` int(11) NOT NULL,
  PRIMARY KEY (`knjiga_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Izbacivanje podataka za tablicu `knjiga`
--

INSERT INTO `knjiga` (`knjiga_ID`, `autor_ID_FK`, `izdavac_ID_FK`, `naziv`, `isbn`, `godina`, `kolicina`) VALUES
(1, 1, 1, 'Rat svjetova', '123456', '2000', 10),
(2, 2, 2, 'Rajski vodoskoc', '112345', '2001', 15),
(3, 2, 1, 'Roboti i Carstvo', '111234', '2003', 20),
(4, 4, 2, 'Sastanak sa Ramom', '111123', '2010', 11),
(5, 5, 1, 'Vodič po galaksiji za autostopere', '111112', '2009', 12),
(6, 5, 2, 'Test naziv', '33333', '2008', 15);

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
  `korisnik_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `kontakt` varchar(50) NOT NULL,
  `iskaznica_broj` varchar(50) NOT NULL,
  PRIMARY KEY (`korisnik_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Izbacivanje podataka za tablicu `korisnik`
--

INSERT INTO `korisnik` (`korisnik_ID`, `ime`, `prezime`, `kontakt`, `iskaznica_broj`) VALUES
(1, 'Ivan', 'Ivanić', '923211234', '123456'),
(2, 'Marija', 'Marić', '0922223454', '654321'),
(3, 'Luka', 'Lukić', '0923456321', '654254'),
(4, 'Nikolina', 'Nikić', '0923546541', '654123'),
(5, 'Karlo', 'Karlić', '0926543258', '654333');

-- --------------------------------------------------------

--
-- Tablična struktura za tablicu `posudba`
--

CREATE TABLE IF NOT EXISTS `posudba` (
  `posudba_ID` int(11) NOT NULL AUTO_INCREMENT,
  `knjiga_ID_FK` int(11) NOT NULL,
  `korisnik_ID_FK` int(11) NOT NULL,
  `datum_posudbe` date NOT NULL,
  `datum_vracanja` date NOT NULL,
  PRIMARY KEY (`posudba_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Izbacivanje podataka za tablicu `posudba`
--

INSERT INTO `posudba` (`posudba_ID`, `knjiga_ID_FK`, `korisnik_ID_FK`, `datum_posudbe`, `datum_vracanja`) VALUES
(1, 2, 1, '2013-09-05', '2013-09-23'),
(2, 3, 2, '0000-00-00', '0000-00-00'),
(3, 3, 3, '2013-09-10', '2013-09-25'),
(4, 4, 4, '2013-09-04', '2013-09-12'),
(5, 5, 5, '2013-09-11', '2013-09-21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

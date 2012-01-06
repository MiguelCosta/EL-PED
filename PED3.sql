-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2012 at 09:13 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `PED`
--

-- --------------------------------------------------------

--
-- Table structure for table `Access`
--

DROP TABLE IF EXISTS `Access`;
CREATE TABLE IF NOT EXISTS `Access` (
  `username` varchar(255) NOT NULL,
  `numAccess` int(11) NOT NULL,
  `datahora` datetime NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Access`
--

INSERT INTO `Access` (`username`, `numAccess`, `datahora`) VALUES
('bruno', 2, '0000-00-00 00:00:00'),
('miguel', 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

DROP TABLE IF EXISTS `Author`;
CREATE TABLE IF NOT EXISTS `Author` (
  `authorcode` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `id` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(2002) DEFAULT NULL,
  PRIMARY KEY (`authorcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Author`
--

INSERT INTO `Author` (`authorcode`, `name`, `id`, `email`, `url`) VALUES
(1, 'Miguel Pinto da Costa', 'a54746', 'miguelpintodacosta@gmail.com', 'http://gplus.to/miguelcosta'),
(4, 'Bruno Azevedo', 'pg12345', 'azevedo.252@gmail.com', 'http://google.com'),
(5, 'author1', '1', 'authot1@a3.pt', ' '),
(6, 'author2', '2', 'author2@a3.pt', ' '),
(7, 'Rafael Abreu', 'pg20978', 'rafaelabreu@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

DROP TABLE IF EXISTS `Course`;
CREATE TABLE IF NOT EXISTS `Course` (
  `coursecode` int(11) NOT NULL AUTO_INCREMENT,
  `coursedescription` varchar(30) NOT NULL,
  PRIMARY KEY (`coursecode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`coursecode`, `coursedescription`) VALUES
(1, 'Engenharia Informática');

-- --------------------------------------------------------

--
-- Table structure for table `Deliverable`
--

DROP TABLE IF EXISTS `Deliverable`;
CREATE TABLE IF NOT EXISTS `Deliverable` (
  `delcode` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `path` varchar(2002) NOT NULL,
  `projcode` int(11) NOT NULL,
  PRIMARY KEY (`delcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Downloads`
--

DROP TABLE IF EXISTS `Downloads`;
CREATE TABLE IF NOT EXISTS `Downloads` (
  `username` varchar(255) NOT NULL,
  `projcode` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  PRIMARY KEY (`username`,`projcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Downloads`
--

INSERT INTO `Downloads` (`username`, `projcode`, `downloads`) VALUES
('bruno', 1, 5),
('jcr', 1, 2),
('miguel', 2, 3),
('miguel', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ProjAut`
--

DROP TABLE IF EXISTS `ProjAut`;
CREATE TABLE IF NOT EXISTS `ProjAut` (
  `projcode` int(11) NOT NULL,
  `authorcode` int(11) NOT NULL,
  PRIMARY KEY (`projcode`,`authorcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProjAut`
--

INSERT INTO `ProjAut` (`projcode`, `authorcode`) VALUES
(1, 4),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Project`
--

DROP TABLE IF EXISTS `Project`;
CREATE TABLE IF NOT EXISTS `Project` (
  `projcode` int(11) NOT NULL AUTO_INCREMENT,
  `keyname` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(100) DEFAULT NULL,
  `bdate` date NOT NULL,
  `edate` date NOT NULL,
  `subdate` datetime NOT NULL,
  `abstract` varchar(1502) NOT NULL,
  `coursecode` int(11) NOT NULL,
  PRIMARY KEY (`projcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Project`
--

INSERT INTO `Project` (`projcode`, `keyname`, `title`, `subtitle`, `bdate`, `edate`, `subdate`, `abstract`, `coursecode`) VALUES
(1, 'a', 'a', NULL, '2012-01-10', '2012-01-17', '2012-01-16 00:00:00', '<para>Teste de uma submissao para listagem</para>', 1),
(2, 'b', 'b', 'b', '2012-01-05', '2012-01-12', '2012-01-11 00:00:00', '<para>Teste de uma submissao para listagem</para>', 1),
(3, 'c', 'c', 'c', '2012-01-09', '2012-01-16', '2012-01-15 00:00:00', '<para>Teste de uma submissao para listagem</para>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ProjSup`
--

DROP TABLE IF EXISTS `ProjSup`;
CREATE TABLE IF NOT EXISTS `ProjSup` (
  `projcode` int(11) NOT NULL,
  `supcode` int(11) NOT NULL,
  PRIMARY KEY (`projcode`,`supcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ProjSup`
--

INSERT INTO `ProjSup` (`projcode`, `supcode`) VALUES
(1, 1),
(2, 3),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Queries`
--

DROP TABLE IF EXISTS `Queries`;
CREATE TABLE IF NOT EXISTS `Queries` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `projcode` int(11) DEFAULT NULL,
  `authorcode` int(11) DEFAULT NULL,
  `supcode` int(11) DEFAULT NULL,
  `queries` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Queries`
--

INSERT INTO `Queries` (`id`, `username`, `projcode`, `authorcode`, `supcode`, `queries`) VALUES
(1, 'bruno', 1, NULL, NULL, 3),
(2, 'jcr', 1, NULL, NULL, 6),
(3, 'bruno', 2, 0, NULL, 3),
(4, 'bruno', 3, NULL, NULL, 5),
(5, 'miguel', NULL, 1, NULL, 6),
(6, 'miguel', NULL, 4, NULL, 7),
(7, 'miguel', NULL, 5, NULL, 8),
(8, 'jcr', NULL, 6, NULL, 9),
(9, 'bruno', NULL, NULL, 1, 2),
(10, 'bruno', NULL, NULL, 2, 5),
(11, 'bruno', NULL, NULL, 3, 5),
(12, 'miguel', NULL, 7, NULL, 1),
(14, 'jcr', NULL, NULL, 1, 3),
(15, 'bruno', NULL, 7, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Supervisor`
--

DROP TABLE IF EXISTS `Supervisor`;
CREATE TABLE IF NOT EXISTS `Supervisor` (
  `supcode` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(2002) DEFAULT NULL,
  `affil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`supcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Supervisor`
--

INSERT INTO `Supervisor` (`supcode`, `name`, `email`, `url`, `affil`) VALUES
(1, 'José Carlos Ramalho', 'jcr@di.uminho.pt', 'http://www.di.uminho.pt/~jcr', 'Departamento de Informática'),
(2, 'Pedro Rangel Henriques', 'prh@di.uminho.pt', 'http://www.di.uminho.pt/~prh', 'Departamento de Informática'),
(3, 'José João', 'jj@di.uminho.pt', 'http://www.di.uminho.pt/~jj', 'Departamento de Informática');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `affil` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`name`, `username`, `password`, `email`, `affil`, `url`, `type`) VALUES
('Bruno Azevedo', 'bruno', 'bruno', 'azevedo.252@gmail.com', 'Departamento de Informática', '', 'p'),
('José Carlos Ramalho', 'jcr', 'jcr', 'jcr@di.uminho.pt', 'Departamento de Informática', 'http://www3.di.uminho.pt/~jcr/', 'c'),
('Miguel Costa', 'miguel', 'miguel', 'miguelpintodacosta@gmail.com', 'Departamento de Informática', 'http://gplus.to/miguelcosta', 'a'),
('Palhas', 'palhas', 'palhas', 'mpalhas@gmail.com', 'CPD', 'www.mpalhas.com', 'c'),
('Vitor', 'vitor', 'vitor', 'vitor@gmail.com', 'BI', 'www.vitor.com', 'p');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumAccess`
--
DROP VIEW IF EXISTS `ViewNumAccess`;
CREATE TABLE IF NOT EXISTS `ViewNumAccess` (
`SUM(numAccess)` decimal(32,0)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumDeposits`
--
DROP VIEW IF EXISTS `ViewNumDeposits`;
CREATE TABLE IF NOT EXISTS `ViewNumDeposits` (
`numProjsTotal` decimal(42,0)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumDepositsAut`
--
DROP VIEW IF EXISTS `ViewNumDepositsAut`;
CREATE TABLE IF NOT EXISTS `ViewNumDepositsAut` (
`authorcode` int(11)
,`numProjs` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumSupervisedProj`
--
DROP VIEW IF EXISTS `ViewNumSupervisedProj`;
CREATE TABLE IF NOT EXISTS `ViewNumSupervisedProj` (
`supcode` int(11)
,`numProjs` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewTopConsultas`
--
DROP VIEW IF EXISTS `ViewTopConsultas`;
CREATE TABLE IF NOT EXISTS `ViewTopConsultas` (
`projcode` int(11)
,`authorcode` int(11)
,`supcode` int(11)
,`queries` decimal(32,0)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewTopDownloads`
--
DROP VIEW IF EXISTS `ViewTopDownloads`;
CREATE TABLE IF NOT EXISTS `ViewTopDownloads` (
`projcode` int(11)
,`downloads` decimal(32,0)
);
-- --------------------------------------------------------

--
-- Structure for view `ViewNumAccess`
--
DROP TABLE IF EXISTS `ViewNumAccess`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumAccess` AS select sum(`Access`.`numAccess`) AS `SUM(numAccess)` from `Access`;

-- --------------------------------------------------------

--
-- Structure for view `ViewNumDeposits`
--
DROP TABLE IF EXISTS `ViewNumDeposits`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumDeposits` AS select sum(`ViewNumDepositsAut`.`numProjs`) AS `numProjsTotal` from `ViewNumDepositsAut`;

-- --------------------------------------------------------

--
-- Structure for view `ViewNumDepositsAut`
--
DROP TABLE IF EXISTS `ViewNumDepositsAut`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumDepositsAut` AS select `ProjAut`.`authorcode` AS `authorcode`,count(`ProjAut`.`projcode`) AS `numProjs` from `ProjAut` group by `ProjAut`.`authorcode`;

-- --------------------------------------------------------

--
-- Structure for view `ViewNumSupervisedProj`
--
DROP TABLE IF EXISTS `ViewNumSupervisedProj`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumSupervisedProj` AS select `ProjSup`.`supcode` AS `supcode`,count(`ProjSup`.`projcode`) AS `numProjs` from `ProjSup` group by `ProjSup`.`supcode`;

-- --------------------------------------------------------

--
-- Structure for view `ViewTopConsultas`
--
DROP TABLE IF EXISTS `ViewTopConsultas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewTopConsultas` AS select `Queries`.`projcode` AS `projcode`,`Queries`.`authorcode` AS `authorcode`,`Queries`.`supcode` AS `supcode`,sum(`Queries`.`queries`) AS `queries` from `Queries` group by `Queries`.`projcode`,`Queries`.`authorcode`,`Queries`.`supcode` order by sum(`Queries`.`queries`) desc limit 0,10;

-- --------------------------------------------------------

--
-- Structure for view `ViewTopDownloads`
--
DROP TABLE IF EXISTS `ViewTopDownloads`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewTopDownloads` AS select `Downloads`.`projcode` AS `projcode`,sum(`Downloads`.`downloads`) AS `downloads` from `Downloads` group by `Downloads`.`projcode` order by sum(`Downloads`.`downloads`) desc limit 0,10;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

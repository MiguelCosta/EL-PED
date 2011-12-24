-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 24/12/2011 às 01h58min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `PED`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Author`
--

CREATE TABLE IF NOT EXISTS `Author` (
  `authorcode` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `id` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(2002) DEFAULT NULL,
  PRIMARY KEY (`authorcode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `Author`
--

INSERT INTO `Author` (`authorcode`, `name`, `id`, `email`, `url`) VALUES
(1, 'Miguel Pinto da Costa', 'a54746', 'miguelpintodacosta@gmail.com', 'http://gplus.to/miguelcosta'),
(4, 'Bruno Azevedo', 'pg12345', 'azevedo.252@gmail.com', 'http://google.com'),
(5, 'author1', '1', 'authot1@a3.pt', ' '),
(6, 'author2', '2', 'author2@a3.pt', ' ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Course`
--

CREATE TABLE IF NOT EXISTS `Course` (
  `coursecode` int(11) NOT NULL AUTO_INCREMENT,
  `coursedescription` varchar(30) NOT NULL,
  PRIMARY KEY (`coursecode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `Course`
--

INSERT INTO `Course` (`coursecode`, `coursedescription`) VALUES
(1, 'Engenharia Informática');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Deliverable`
--

CREATE TABLE IF NOT EXISTS `Deliverable` (
  `delcode` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `path` varchar(2002) NOT NULL,
  `projcode` int(11) NOT NULL,
  PRIMARY KEY (`delcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ProjAut`
--

CREATE TABLE IF NOT EXISTS `ProjAut` (
  `projcode` int(11) NOT NULL,
  `authorcode` int(11) NOT NULL,
  PRIMARY KEY (`projcode`,`authorcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Project`
--

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ProjSup`
--

CREATE TABLE IF NOT EXISTS `ProjSup` (
  `projcode` int(11) NOT NULL,
  `supcode` int(11) NOT NULL,
  PRIMARY KEY (`projcode`,`supcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Supervisor`
--

CREATE TABLE IF NOT EXISTS `Supervisor` (
  `supcode` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(2002) DEFAULT NULL,
  `affil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`supcode`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `Supervisor`
--

INSERT INTO `Supervisor` (`supcode`, `name`, `email`, `url`, `affil`) VALUES
(1, 'José Carlos Ramalho', 'jcr@di.uminho.pt', 'http://www.di.uminho.pt/~jcr', 'Departamento de Informática'),
(2, 'Pedro Rangel Henriques', 'prh@di.uminho.pt', 'http://www.di.uminho.pt/~prh', 'Departamento de Informática'),
(3, 'José João', 'jj@di.uminho.pt', 'http://www.di.uminho.pt/~jj', 'Departamento de Informática');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `affil` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `Users`
--

INSERT INTO `Users` (`name`, `username`, `password`, `email`, `affil`, `url`, `type`) VALUES
('Miguel Costa', 'miguel', 'miguel', 'miguelpintodacosta@gmail.com', 'Departamento de Informática', 'http://gplus.to/miguelcosta', 'a'),
('Bruno Azevedo', 'bruno', 'bruno', 'azevedo.252@gmail.com', 'Departamento de Informática', '', 'p'),
('José Carlos Ramalho', 'jcr', 'jcr', 'jcr@di.uminho.pt', 'Departamento de Informática', 'http://www3.di.uminho.pt/~jcr/', 'c');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

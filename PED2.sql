-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 06/01/2012 às 15h22min
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `Author`
--

INSERT INTO `Author` (`authorcode`, `name`, `id`, `email`, `url`) VALUES
(1, 'Miguel Pinto da Costa', 'a54746', 'miguelpintodacosta@gmail.com', 'http://gplus.to/miguelcosta'),
(4, 'Bruno Azevedo', 'pg12345', 'azevedo.252@gmail.com', 'http://google.com'),
(5, 'author1', '1', 'authot1@a3.pt', ' '),
(6, 'author2', '2', 'author2@a3.pt', ' '),
(7, 'author1', 'a54746', 'aksd', 'jsg');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Extraindo dados da tabela `Deliverable`
--

INSERT INTO `Deliverable` (`delcode`, `description`, `path`, `projcode`) VALUES
(60, 'RelatÃ³rio base -Tex', '9fec488360fda295215fbdf49595daf0.tex', 60),
(59, 'RelatÃ³rio base - PDF', '3e17347de045607364c19658a10da2ae.pdf', 60),
(58, 'date', '00605cb27f45dd2055f7ea1086c8fa7a.html', 58),
(57, 'Header', 'bb521830849d5c4db96758f884d1c7ef.php', 57),
(55, 'RelatÃ³rio', '3e17347de045607364c19658a10da2ae.pdf', 55),
(56, 'File', '3e17347de045607364c19658a10da2ae.pdf', 56),
(54, 'SQL da Base de Dados', 'cf9dfd6f6f4034d6a45cc33499578562.sql', 54);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ProjAut`
--

CREATE TABLE IF NOT EXISTS `ProjAut` (
  `projcode` int(11) NOT NULL,
  `authorcode` int(11) NOT NULL,
  PRIMARY KEY (`projcode`,`authorcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ProjAut`
--

INSERT INTO `ProjAut` (`projcode`, `authorcode`) VALUES
(54, 1),
(54, 4),
(55, 1),
(56, 1),
(56, 4),
(57, 1),
(58, 1),
(58, 5),
(58, 6),
(59, 7),
(60, 7);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Extraindo dados da tabela `Project`
--

INSERT INTO `Project` (`projcode`, `keyname`, `title`, `subtitle`, `bdate`, `edate`, `subdate`, `abstract`, `coursecode`) VALUES
(60, 'key name qualquer cosia', 'para testar os deliverables ao ver o pr', '', '2011-12-14', '2011-12-14', '2012-01-06 02:13:17', 'Abstract para testar os deliverables ao ver o PR.', 1),
(59, 'a', 'b', 'c', '2012-01-06', '2012-01-06', '2012-01-05 16:33:53', 'dfgdfgsdfgsdgs', 1),
(58, 'teste', 'titulo de teste', 'subtitulo', '2012-01-03', '2012-01-06', '2012-01-05 16:28:50', '\n\n\n\n\n\n', 1),
(56, 'teste1', 'titulo1', '', '2011-12-14', '2011-12-26', '2012-01-02 14:26:24', '', 1),
(57, 'UCE30:PED - Login', 'Controlo de Sessões', 'Gestão dos diferentes tipos de utilizadores', '2011-12-14', '2012-01-05', '2012-01-04 22:08:42', '', 1),
(55, 'UCE30:EL - Projeto Integrado', 'Projeto Integrado de Engenharia de Linguagens', 'Museu da Emigração e das Comunidades', '2011-10-14', '2011-12-27', '2011-12-27 12:45:34', '', 1),
(54, 'UCE30:PED - Final Project', 'Projeto Final de PED', 'Projeto para o Módulo de Engenharia de Linguagens PED', '2011-11-28', '2011-12-26', '2011-12-27 12:40:28', 'Este é o último projeto de PED.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ProjSup`
--

CREATE TABLE IF NOT EXISTS `ProjSup` (
  `projcode` int(11) NOT NULL,
  `supcode` int(11) NOT NULL,
  PRIMARY KEY (`projcode`,`supcode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ProjSup`
--

INSERT INTO `ProjSup` (`projcode`, `supcode`) VALUES
(54, 1),
(55, 1),
(55, 2),
(55, 3),
(56, 1),
(56, 3),
(57, 1),
(57, 2),
(58, 2),
(58, 3),
(58, 4),
(59, 2),
(60, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `Supervisor`
--

INSERT INTO `Supervisor` (`supcode`, `name`, `email`, `url`, `affil`) VALUES
(1, 'José Carlos Ramalho', 'jcr@di.uminho.pt', 'http://www.di.uminho.pt/~jcr', 'Departamento de Informática'),
(2, 'Pedro Rangel Henriques', 'prh@di.uminho.pt', 'http://www.di.uminho.pt/~prh', 'Departamento de Informática'),
(3, 'José João', 'jj@di.uminho.pt', 'http://www.di.uminho.pt/~jj', 'Departamento de Informática'),
(4, 'Supervisor1', 'supervisor@ped.pt', 'www.google.pt', 'UM');

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

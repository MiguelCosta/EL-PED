-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2012 at 10:27 PM
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

CREATE TABLE IF NOT EXISTS `Access` (
  `username` varchar(255) NOT NULL,
  `datahora` datetime NOT NULL,
  PRIMARY KEY (`username`,`datahora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `Access`:
--   `username`
--       `Users` -> `username`
--

--
-- Dumping data for table `Access`
--

INSERT INTO `Access` (`username`, `datahora`) VALUES
('bruno', '2012-01-10 19:55:53'),
('jcr', '2010-01-05 10:39:00'),
('jcr', '2011-02-09 04:00:49'),
('jcr', '2012-01-10 19:55:58'),
('miguel', '2012-01-10 19:55:01'),
('miguel', '2012-01-10 19:56:03'),
('miguel', '2012-01-10 19:56:24'),
('miguel', '2012-01-10 19:57:47'),
('miguel', '2012-01-10 21:14:19'),
('miguel', '2012-01-10 21:16:31'),
('miguel', '2012-01-10 21:28:05'),
('miguel', '2012-01-10 21:56:10'),
('miguel', '2012-01-11 00:08:22'),
('miguel', '2012-01-11 12:58:49'),
('miguel', '2012-01-11 21:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

CREATE TABLE IF NOT EXISTS `Author` (
  `authorcode` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `id` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(2002) DEFAULT NULL,
  `coursecode` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`authorcode`),
  KEY `coursecode` (`coursecode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- RELATIONS FOR TABLE `Author`:
--   `coursecode`
--       `Course` -> `coursecode`
--

--
-- Dumping data for table `Author`
--

INSERT INTO `Author` (`authorcode`, `name`, `id`, `email`, `url`, `coursecode`) VALUES
(1, 'Miguel Pinto da Costa', 'a54746', 'miguelpintodacosta@gmail.com', 'http://gplus.to/miguelcosta', 1),
(4, 'Bruno Azevedo', 'pg12345', 'azevedo.252@gmail.com', 'http://google.com', 1),
(5, 'author1', '1', 'authot1@a3.pt', ' ', 1),
(6, 'author2', '2', 'author2@a3.pt', ' ', 1),
(7, 'Rafael Abreu', 'pg20978', 'rafaelabreu@gmail.com', NULL, 1),
(8, 'Nome Author Course', '123456', 'course@um.pt', 'kkk', 62);

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE IF NOT EXISTS `Course` (
  `coursecode` int(11) NOT NULL AUTO_INCREMENT,
  `coursedescription` varchar(200) NOT NULL,
  PRIMARY KEY (`coursecode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201 ;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`coursecode`, `coursedescription`) VALUES
(1, 'Doutoramento em Arqueologia'),
(2, 'Doutoramento em Arquitectura'),
(3, 'Doutoramento em Bioengenharia'),
(4, 'Doutoramento em Biologia Molecular e Ambiental'),
(5, 'Doutoramento em Biologia de Plantas'),
(6, 'Doutoramento em Ci�ncia Pol�tica e Rela��es Internacionais'),
(7, 'Doutoramento em Ci�ncia e Engenharia de Pol�meros e Comp�sitos'),
(8, 'Doutoramento em Ci�ncias'),
(9, 'Doutoramento em Ci�ncias Empresariais'),
(10, 'Doutoramento em Ci�ncias Jur�dicas'),
(11, 'Doutoramento em Ci�ncias da Administra��o'),
(12, 'Doutoramento em Ci�ncias da Comunica��o'),
(13, 'Doutoramento em Ci�ncias da Cultura'),
(14, 'Doutoramento em Ci�ncias da Educa��o'),
(15, 'Doutoramento em Ci�ncias da Linguagem'),
(16, 'Doutoramento em Ci�ncias da Literatura'),
(17, 'Doutoramento em Ci�ncias da Sa�de'),
(18, 'Doutoramento em Contabilidade'),
(19, 'Doutoramento em Economia'),
(20, 'Doutoramento em Engenharia Biom�dica'),
(21, 'Doutoramento em Engenharia Civil'),
(22, 'Doutoramento em Engenharia Electr�nica e de Computadores'),
(23, 'Doutoramento em Engenharia Industrial e de Sistemas'),
(24, 'Doutoramento em Engenharia Mec�nica'),
(25, 'Doutoramento em Engenharia Qu�mica e Biol�gica'),
(26, 'Doutoramento em Engenharia T�xtil'),
(27, 'Doutoramento em Engenharia de Materiais'),
(28, 'Doutoramento em Engenharia de Tecidos, Medicina Regenerativa e C�lulas Estaminais'),
(29, 'Doutoramento em Estudos Culturais'),
(30, 'Doutoramento em Estudos da Crian�a'),
(31, 'Doutoramento em Filosofia'),
(32, 'Doutoramento em F�sica'),
(33, 'Doutoramento em Geografia'),
(34, 'Doutoramento em Hist�ria'),
(35, 'Doutoramento em L�deres para as Ind�strias Tecnol�gicas'),
(36, 'Doutoramento em Marketing e Estrat�gia'),
(37, 'Doutoramento em Matem�tica e Aplica��es'),
(38, 'Doutoramento em Medicina'),
(39, 'Doutoramento em Psicologia'),
(40, 'Doutoramento em Psicologia Aplicada'),
(41, 'Doutoramento em Psicologia B�sica'),
(42, 'Doutoramento em Sociologia'),
(43, 'Doutoramento em Tecnologia e Sistemas de Informa��o'),
(44, 'Licenciatura em Administra��o P�blica'),
(45, 'Licenciatura em Arqueologia'),
(46, 'Licenciatura em Biologia - Geologia'),
(47, 'Licenciatura em Biologia Aplicada'),
(48, 'Licenciatura em Bioqu�mica'),
(49, 'Licenciatura em Ci�ncia Pol�tica - P�s-Laboral'),
(50, 'Licenciatura em Ci�ncias da Computa��o'),
(51, 'Licenciatura em Ci�ncias da Comunica��o'),
(52, 'Licenciatura em Ci�ncias do Ambiente - P�s-Laboral'),
(53, 'Licenciatura em Contabilidade - P�s-Laboral'),
(54, 'Licenciatura em Design e Marketing de Moda'),
(55, 'Licenciatura em Direito'),
(56, 'Licenciatura em Direito - P�s-Laboral'),
(57, 'Licenciatura em Economia'),
(58, 'Licenciatura em Educa��o'),
(59, 'Licenciatura em Educa��o - P�s-Laboral'),
(60, 'Licenciatura em Educa��o B�sica'),
(61, 'Licenciatura em Enfermagem'),
(62, 'Licenciatura em Engenharia Inform�tica'),
(63, 'Licenciatura em Estat�stica Aplicada'),
(64, 'Licenciatura em Estudos Culturais - P�s-Laboral'),
(65, 'Licenciatura em Estudos Portugueses e Lus�fonos'),
(66, 'Licenciatura em Filosofia'),
(67, 'Licenciatura em F�sica'),
(68, 'Licenciatura em F�sica e Qu�mica - P�s-Laboral'),
(69, 'Licenciatura em Geografia e Planeamento'),
(70, 'Licenciatura em Geologia - P�s-Laboral'),
(71, 'Licenciatura em Gest�o'),
(72, 'Licenciatura em Hist�ria'),
(73, 'Licenciatura em Hist�ria - P�s-Laboral'),
(74, 'Licenciatura em L�nguas Aplicadas'),
(75, 'Licenciatura em L�nguas e Culturas Orientais'),
(76, 'Licenciatura em L�nguas e Literaturas Europeias'),
(77, 'Licenciatura em L�nguas e Literaturas Europeias - P�s-Laboral'),
(78, 'Licenciatura em Marketing - P�s-Laboral'),
(79, 'Licenciatura em Matem�tica'),
(80, 'Licenciatura em M�sica - P�s-Laboral'),
(81, 'Licenciatura em Neg�cios Internacionais - P�s-Laboral'),
(82, 'Licenciatura em Optometria e Ci�ncias da Vis�o'),
(83, 'Licenciatura em Qu�mica'),
(84, 'Licenciatura em Rela��es Internacionais'),
(85, 'Licenciatura em Sociologia'),
(86, 'Licenciatura em Tecnologias e Sistemas de Informa��o'),
(87, 'Licenciatura em Tecnologias e Sistemas de Informa��o - P�s-Laboral'),
(88, 'Mestrado Europeu em An�lise Estrutural de Monumentos e Constru��es Hist�ricas'),
(89, 'Mestrado Europeu em Reologia Aplicada � Engenharia'),
(90, 'Mestrado Integrado em Arquitectura'),
(91, 'Mestrado Integrado em Engenharia Biol�gica'),
(92, 'Mestrado Integrado em Engenharia Biom�dica'),
(93, 'Mestrado Integrado em Engenharia Civil'),
(94, 'Mestrado Integrado em Engenharia Electr�nica Industrial e Computadores'),
(95, 'Mestrado Integrado em Engenharia Mec�nica'),
(96, 'Mestrado Integrado em Engenharia T�xtil - P�s-Laboral'),
(97, 'Mestrado Integrado em Engenharia de Comunica��es'),
(98, 'Mestrado Integrado em Engenharia de Materiais'),
(99, 'Mestrado Integrado em Engenharia de Pol�meros'),
(100, 'Mestrado Integrado em Engenharia e Gest�o Industrial'),
(101, 'Mestrado Integrado em Medicina'),
(102, 'Mestrado Integrado em Psicologia'),
(103, 'Mestrado em Administra��o P�blica'),
(104, 'Mestrado em Administra��o da Justi�a'),
(105, 'Mestrado em Arqueologia'),
(106, 'Mestrado em Bioengenharia'),
(107, 'Mestrado em Biof�sica e Bionanossistemas'),
(108, 'Mestrado em Bioinform�tica'),
(109, 'Mestrado em Biologia Molecular, Biotecnologia e Bioempreendedorismo em Plantas'),
(110, 'Mestrado em Bioqu�mica Aplicada'),
(111, 'Mestrado em Biotecnologia e Bio-Empreendedorismo em Plantas Arom�ticas e Medicinais'),
(112, 'Mestrado em Ci�ncias - Forma��o Cont�nua de Professores'),
(113, 'Mestrado em Ci�ncias da Comunica��o'),
(114, 'Mestrado em Ci�ncias da Educa��o'),
(115, 'Mestrado em Ci�ncias da Sa�de'),
(116, 'Mestrado em Ci�ncias e Tecnologias do Ambiente'),
(117, 'Mestrado em Comunica��o, Arte e Cultura'),
(118, 'Mestrado em Comunica��o, Cidadania e Educa��o'),
(119, 'Mestrado em Constru��o e Reabilita��o Sustent�veis'),
(120, 'Mestrado em Contabilidade'),
(121, 'Mestrado em Crime, Diferen�a e Desigualdade'),
(122, 'Mestrado em Design de Comunica��o de Moda'),
(123, 'Mestrado em Design e Marketing'),
(124, 'Mestrado em Direito Administrativo'),
(125, 'Mestrado em Direito Judici�rio (Direitos Processuais e Organiza��o Judici�ria)'),
(126, 'Mestrado em Direito Tribut�rio e Fiscal'),
(127, 'Mestrado em Direito da Uni�o Europeia'),
(128, 'Mestrado em Direito das Autarquias Locais'),
(129, 'Mestrado em Direito dos Contratos e da Empresa'),
(130, 'Mestrado em Direito e Inform�tica'),
(131, 'Mestrado em Direitos Humanos'),
(132, 'Mestrado em Ecologia'),
(133, 'Mestrado em Economia'),
(134, 'Mestrado em Economia Industrial e da Empresa'),
(135, 'Mestrado em Economia Monet�ria, Banc�ria e Financeira'),
(136, 'Mestrado em Economia Pol�tica da Sa�de'),
(137, 'Mestrado em Economia Social'),
(138, 'Mestrado em Economia, Mercados e Pol�ticas P�blicas'),
(139, 'Mestrado em Educa��o'),
(140, 'Mestrado em Educa��o Especial'),
(141, 'Mestrado em Educa��o Pr�-Escolar'),
(142, 'Mestrado em Educa��o Pr�-Escolar e Ensino do 1� Ciclo do Ensino B�sico'),
(143, 'Mestrado em Engenharia Humana'),
(144, 'Mestrado em Engenharia Industrial'),
(145, 'Mestrado em Engenharia Inform�tica'),
(146, 'Mestrado em Engenharia Mecatr�nica'),
(147, 'Mestrado em Engenharia Urbana'),
(148, 'Mestrado em Engenharia de Redes e Servi�os de Comunica��es'),
(149, 'Mestrado em Engenharia de Sistemas'),
(150, 'Mestrado em Engenharia e Gest�o de Sistemas de Informa��o'),
(151, 'Mestrado em Ensino de Biologia e Geologia no 3� Ciclo no Ensino B�sico e no Ensino Secund�rio'),
(152, 'Mestrado em Ensino de Educa��o F�sica nos Ensinos B�sico e Secund�rio'),
(153, 'Mestrado em Ensino de Filosofia no Ensino Secund�rio'),
(154, 'Mestrado em Ensino de F�sica e de Qu�mica no 3� Ciclo do Ensino B�sico e no Ensino Secund�rio'),
(155, 'Mestrado em Ensino de Hist�ria e Geografia no 3� Ciclo do Ensino B�sico e no Ensino Secund�rio'),
(156, 'Mestrado em Ensino de Inform�tica'),
(157, 'Mestrado em Ensino de Ingl�s e de Espanhol no 3� Ciclo do Ensino B�sico e no Ensino Secund�rio'),
(158, 'Mestrado em Ensino de Matem�tica no 3� Ciclo do Ensino B�sico e no Secund�rio'),
(159, 'Mestrado em Ensino de M�sica'),
(160, 'Mestrado em Ensino de Portugu�s e de L�nguas Cl�ssicas no 3� Ciclo do Ensino B�sico e no Secund�rio'),
(161, 'Mestrado em Ensino do 1� e do 2� Ciclos do Ensino B�sico'),
(162, 'Mestrado em Ensino do Portugu�s no 3� Ciclo do Ensino B�sico e no Ensino Secund�rio e de Espanhol nos Ensinos B�sico e Secund�rio'),
(163, 'Mestrado em Estat�stica'),
(164, 'Mestrado em Estudos Interculturais Portugu�s/Chin�s: Tradu��o, Forma��o e Comunica��o Empresarial'),
(165, 'Mestrado em Estudos da Crian�a'),
(166, 'Mestrado em Finan�as'),
(167, 'Mestrado em F�sica'),
(168, 'Mestrado em Gen�tica Molecular'),
(169, 'Mestrado em Geografia'),
(170, 'Mestrado em Gest�o'),
(171, 'Mestrado em Gest�o Ambiental'),
(172, 'Mestrado em Gest�o das Unidades de Sa�de'),
(173, 'Mestrado em Gest�o de Recursos Humanos'),
(174, 'Mestrado em Hist�ria'),
(175, 'Mestrado em Lingu�stica Portuguesa e Comparada'),
(176, 'Mestrado em L�ngua, Literatura e Cultura Inglesas'),
(177, 'Mestrado em Marketing e Gest�o Estrat�gica'),
(178, 'Mestrado em Matem�tica e Computa��o'),
(179, 'Mestrado em Media Interactivos'),
(180, 'Mestrado em Media��o Cultural e Liter�ria'),
(181, 'Mestrado em Micro e Nano Tecnologias'),
(182, 'Mestrado em Neg�cios Internacionais'),
(183, 'Mestrado em Optometria Avan�ada'),
(184, 'Mestrado em Ordenamento e Valoriza��o de Recursos Geol�gicos'),
(185, 'Mestrado em Patrim�nio Geol�gico e Geoconserva��o'),
(186, 'Mestrado em Patrim�nio e Turismo Cultural'),
(187, 'Mestrado em Portugu�s L�ngua N�o Materna (PLNM) - Portugu�s L�ngua Estrangeira (PLE) e L�ngua Segunda (PL2)'),
(188, 'Mestrado em Propriedades e Tecnologia de Pol�meros'),
(189, 'Mestrado em Qu�mica Medicinal'),
(190, 'Mestrado em Qu�mica T�xtil'),
(191, 'Mestrado em Rela��es Internacionais'),
(192, 'Mestrado em Servi�os de Informa��o'),
(193, 'Mestrado em Sistemas de Informa��o'),
(194, 'Mestrado em Sociologia'),
(195, 'Mestrado em Tecnologia e Arte Digital'),
(196, 'Mestrado em Teoria da Literatura'),
(197, 'Mestrado em Tradu��o e Comunica��o Multilingue'),
(198, 'Mestrado em T�cnicas de Caracteriza��o e An�lise Qu�mica'),
(199, 'Mestrado em T�xteis Avan�ados'),
(200, 'Programa Doutoral em Qu�mica');

-- --------------------------------------------------------

--
-- Table structure for table `Deliverable`
--

CREATE TABLE IF NOT EXISTS `Deliverable` (
  `delcode` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `path` varchar(2002) NOT NULL,
  `projcode` int(11) NOT NULL,
  PRIMARY KEY (`delcode`),
  KEY `projcode` (`projcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- RELATIONS FOR TABLE `Deliverable`:
--   `projcode`
--       `Project` -> `projcode`
--

--
-- Dumping data for table `Deliverable`
--

INSERT INTO `Deliverable` (`delcode`, `description`, `path`, `projcode`) VALUES
(1, 'SQL', 'dd73c84b06cb091609966a646ea4fbba.sql', 4),
(2, 'PDF', '3e17347de045607364c19658a10da2ae.pdf', 4),
(3, 'xslx', 'b636ff6917890d6a9f00951a98e18b9d.xlsx', 4),
(4, '', 'bbdc1b313cf22ce7c642eb980bce04ce.PNG', 5),
(5, 'Imagem', 'bbdc1b313cf22ce7c642eb980bce04ce.PNG', 6),
(6, 'Imagem PNG', 'b74b5f63a47427ca0b0a619563ae00d7.PNG', 7);

-- --------------------------------------------------------

--
-- Table structure for table `Deposits`
--

CREATE TABLE IF NOT EXISTS `Deposits` (
  `username` varchar(255) NOT NULL,
  `projcode` int(11) NOT NULL,
  PRIMARY KEY (`username`,`projcode`),
  KEY `username` (`username`),
  KEY `projcode` (`projcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Downloads`
--

CREATE TABLE IF NOT EXISTS `Downloads` (
  `username` varchar(255) NOT NULL,
  `projcode` int(11) NOT NULL,
  `datahora` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`username`,`projcode`,`datahora`),
  KEY `projcode` (`projcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `Downloads`:
--   `username`
--       `Users` -> `username`
--   `projcode`
--       `Project` -> `projcode`
--

--
-- Dumping data for table `Downloads`
--

INSERT INTO `Downloads` (`username`, `projcode`, `datahora`) VALUES
('bruno', 1, '2012-01-01 18:25:49'),
('jcr', 1, '2012-01-11 08:00:00'),
('miguel', 2, '2011-01-03 08:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `ProjAut`
--

CREATE TABLE IF NOT EXISTS `ProjAut` (
  `projcode` int(11) NOT NULL,
  `authorcode` int(11) NOT NULL,
  PRIMARY KEY (`projcode`,`authorcode`),
  KEY `authorcode` (`authorcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `ProjAut`:
--   `projcode`
--       `Project` -> `projcode`
--   `authorcode`
--       `Author` -> `authorcode`
--

--
-- Dumping data for table `ProjAut`
--

INSERT INTO `ProjAut` (`projcode`, `authorcode`) VALUES
(1, 1),
(7, 1),
(2, 4),
(4, 5),
(5, 6),
(6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `Project`
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
  PRIMARY KEY (`projcode`),
  KEY `coursecode` (`coursecode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- RELATIONS FOR TABLE `Project`:
--   `coursecode`
--       `Course` -> `coursecode`
--

--
-- Dumping data for table `Project`
--

INSERT INTO `Project` (`projcode`, `keyname`, `title`, `subtitle`, `bdate`, `edate`, `subdate`, `abstract`, `coursecode`) VALUES
(1, 'a', 'a', NULL, '2012-01-10', '2012-01-17', '2012-01-16 00:00:00', '<para>Teste de uma submissao para listagem</para>', 1),
(2, 'b', 'b', 'b', '2012-01-05', '2012-01-12', '2012-01-11 00:00:00', '<para>Teste de uma submissao para listagem</para>', 1),
(4, 'Download', 'Testar download de ficheiros', '', '2012-01-10', '2012-01-10', '2012-01-09 09:27:13', 'Vai ser testado o download de ficheiros.', 1),
(5, 'Download de Imagens', 'Testar download de imagens', '', '2012-01-10', '2012-01-08', '2012-01-09 09:32:20', 'Vai ser testado o download de imagens.', 1),
(6, 'Download', 'Testar download de imagens 2', '', '2012-01-10', '2012-01-08', '2012-01-09 09:33:10', 'Testar novamente o download de imagens.', 1),
(7, 'asXML', 'Testar abstract', '', '2012-01-10', '2012-01-08', '2012-01-09 14:12:00', '<abstract>Supostamente agora j� aparecem as tags.\n\n<p>Aqui tem um programa. palavras a <b>negrito</b></p>\n</abstract>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ProjSup`
--

CREATE TABLE IF NOT EXISTS `ProjSup` (
  `projcode` int(11) NOT NULL,
  `supcode` int(11) NOT NULL,
  PRIMARY KEY (`projcode`,`supcode`),
  KEY `supcode` (`supcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `ProjSup`:
--   `projcode`
--       `Project` -> `projcode`
--   `supcode`
--       `Supervisor` -> `supcode`
--

--
-- Dumping data for table `ProjSup`
--

INSERT INTO `ProjSup` (`projcode`, `supcode`) VALUES
(1, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(2, 3),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Queries`
--

CREATE TABLE IF NOT EXISTS `Queries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `projcode` int(11) DEFAULT NULL,
  `authorcode` int(11) DEFAULT NULL,
  `supcode` int(11) DEFAULT NULL,
  `datahora` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`projcode`,`authorcode`,`supcode`),
  KEY `projcode` (`projcode`,`authorcode`,`supcode`),
  KEY `authorcode` (`authorcode`),
  KEY `supcode` (`supcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- RELATIONS FOR TABLE `Queries`:
--   `username`
--       `Users` -> `username`
--   `projcode`
--       `Project` -> `projcode`
--   `authorcode`
--       `Author` -> `authorcode`
--   `supcode`
--       `Supervisor` -> `supcode`
--

--
-- Dumping data for table `Queries`
--

INSERT INTO `Queries` (`id`, `username`, `projcode`, `authorcode`, `supcode`, `datahora`) VALUES
(1, 'bruno', 1, NULL, NULL, '2012-01-03 14:31:00'),
(2, 'jcr', NULL, 1, NULL, '2012-01-04 19:42:00'),
(3, 'jcr', NULL, NULL, 3, '2006-01-04 12:19:00'),
(4, 'miguel', NULL, 1, NULL, '2012-01-11 20:30:06'),
(5, 'miguel', NULL, 4, NULL, '2012-01-11 20:30:31'),
(6, 'miguel', NULL, 1, NULL, '2012-01-11 21:07:24'),
(7, 'miguel', 1, NULL, NULL, '2012-01-11 21:11:19'),
(8, 'miguel', 6, NULL, NULL, '2012-01-11 21:11:33'),
(9, 'miguel', 1, NULL, NULL, '2012-01-11 21:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `Supervisor`
--

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
(1, 'Jos� Carlos Ramalho', 'jcr@di.uminho.pt', 'http://www.di.uminho.pt/~jcr', 'Departamento de Inform�tica'),
(2, 'Pedro Rangel Henriques', 'prh@di.uminho.pt', 'http://www.di.uminho.pt/~prh', 'Departamento de Inform�tica'),
(3, 'Jos� Jo�o', 'jj@di.uminho.pt', 'http://www.di.uminho.pt/~jj', 'Departamento de Inform�tica');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `affil` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`name`, `username`, `password`, `email`, `affil`, `url`, `type`) VALUES
('Bruno Azevedo', 'bruno', 'bruno', 'azevedo.252@gmail.com', 'Departamento de Inform�tica', '', 'p'),
('Jos� Carlos Ramalho', 'jcr', 'jcr', 'jcr@di.uminho.pt', 'Departamento de Inform�tica', 'http://www3.di.uminho.pt/~jcr/', 'c'),
('Miguel Costa', 'miguel', 'miguel', 'miguelpintodacosta@gmail.com', 'Departamento de Inform�tica', 'http://gplus.to/miguelcosta', 'a'),
('Palhas', 'palhas', 'palhas', 'mpalhas@gmail.com', 'CPD', 'www.mpalhas.com', 'c'),
('Vitor', 'vitor', 'vitor', 'vitor@gmail.com', 'BI', 'www.vitor.com', 'p');

-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumAccessData`
--
CREATE TABLE IF NOT EXISTS `ViewNumAccessData` (
`month` int(2)
,`year` int(4)
,`accesses` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumAccessTotal`
--
CREATE TABLE IF NOT EXISTS `ViewNumAccessTotal` (
`accesses` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumAccessUser`
--
CREATE TABLE IF NOT EXISTS `ViewNumAccessUser` (
`username` varchar(255)
,`accesses` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumDepositsCourse`
--
CREATE TABLE IF NOT EXISTS `ViewNumDepositsCourse` (
`curso` int(11)
,`depositos` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumDepositsDate`
--
CREATE TABLE IF NOT EXISTS `ViewNumDepositsDate` (
`month` int(2)
,`year` int(4)
,`deposits` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumDepositsTotal`
--
CREATE TABLE IF NOT EXISTS `ViewNumDepositsTotal` (
`numProjsTotal` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumDepositsUser`
--
CREATE TABLE IF NOT EXISTS `ViewNumDepositsUser` (
`username` varchar(255)
,`depositos` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumDownloadsTotal`
--
CREATE TABLE IF NOT EXISTS `ViewNumDownloadsTotal` (
`numDownloads` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumQueriesAuthorTotal`
--
CREATE TABLE IF NOT EXISTS `ViewNumQueriesAuthorTotal` (
`queries` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumQueriesProjTotal`
--
CREATE TABLE IF NOT EXISTS `ViewNumQueriesProjTotal` (
`queries` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumQueriesSupTotal`
--
CREATE TABLE IF NOT EXISTS `ViewNumQueriesSupTotal` (
`queries` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewNumSupervisedProj`
--
CREATE TABLE IF NOT EXISTS `ViewNumSupervisedProj` (
`supcode` int(11)
,`numProjs` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewTopDownloads`
--
CREATE TABLE IF NOT EXISTS `ViewTopDownloads` (
`projcode` int(11)
,`downloads` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewTopQueriesAuthor`
--
CREATE TABLE IF NOT EXISTS `ViewTopQueriesAuthor` (
`authorcode` int(11)
,`queries` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewTopQueriesProj`
--
CREATE TABLE IF NOT EXISTS `ViewTopQueriesProj` (
`projcode` int(11)
,`queries` bigint(21)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ViewTopQueriesSup`
--
CREATE TABLE IF NOT EXISTS `ViewTopQueriesSup` (
`supcode` int(11)
,`queries` bigint(21)
);
-- --------------------------------------------------------

--
-- Structure for view `ViewNumAccessData`
--
DROP TABLE IF EXISTS `ViewNumAccessData`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumAccessData` AS select month(`Access`.`datahora`) AS `month`,year(`Access`.`datahora`) AS `year`,count(0) AS `accesses` from `Access` group by month(`Access`.`datahora`),year(`Access`.`datahora`) order by month(`Access`.`datahora`),year(`Access`.`datahora`);

-- --------------------------------------------------------

--
-- Structure for view `ViewNumAccessTotal`
--
DROP TABLE IF EXISTS `ViewNumAccessTotal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumAccessTotal` AS select count(`Access`.`username`) AS `accesses` from `Access`;

-- --------------------------------------------------------

--
-- Structure for view `ViewNumAccessUser`
--
DROP TABLE IF EXISTS `ViewNumAccessUser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumAccessUser` AS select `Access`.`username` AS `username`,count(0) AS `accesses` from `Access` group by `Access`.`username` order by count(0);

-- --------------------------------------------------------

--
-- Structure for view `ViewNumDepositsCourse`
--
DROP TABLE IF EXISTS `ViewNumDepositsCourse`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumDepositsCourse` AS select `P`.`coursecode` AS `curso`,count(`P`.`projcode`) AS `depositos` from `Project` `P` group by `P`.`coursecode`;

-- --------------------------------------------------------

--
-- Structure for view `ViewNumDepositsDate`
--
DROP TABLE IF EXISTS `ViewNumDepositsDate`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumDepositsDate` AS select month(`P`.`subdate`) AS `month`,year(`P`.`subdate`) AS `year`,count(0) AS `deposits` from `Project` `P` group by month(`P`.`subdate`),year(`P`.`subdate`) order by month(`P`.`subdate`),year(`P`.`subdate`);

-- --------------------------------------------------------

--
-- Structure for view `ViewNumDepositsTotal`
--
DROP TABLE IF EXISTS `ViewNumDepositsTotal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumDepositsTotal` AS select count(1) AS `numProjsTotal` from `Project`;

-- --------------------------------------------------------

--
-- Structure for view `ViewNumDepositsUser`
--
DROP TABLE IF EXISTS `ViewNumDepositsUser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumDepositsUser` AS select `Deposits`.`username` AS `username`,count(`Deposits`.`projcode`) AS `depositos` from `Deposits` group by `Deposits`.`username`;

-- --------------------------------------------------------

--
-- Structure for view `ViewNumDownloadsTotal`
--
DROP TABLE IF EXISTS `ViewNumDownloadsTotal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumDownloadsTotal` AS select count(`Downloads`.`projcode`) AS `numDownloads` from `Downloads`;

-- --------------------------------------------------------

--
-- Structure for view `ViewNumQueriesAuthorTotal`
--
DROP TABLE IF EXISTS `ViewNumQueriesAuthorTotal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumQueriesAuthorTotal` AS select count(1) AS `queries` from `Queries` where (isnull(`Queries`.`projcode`) and (`Queries`.`authorcode` is not null) and isnull(`Queries`.`supcode`));

-- --------------------------------------------------------

--
-- Structure for view `ViewNumQueriesProjTotal`
--
DROP TABLE IF EXISTS `ViewNumQueriesProjTotal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumQueriesProjTotal` AS select count(1) AS `queries` from `Queries` where ((`Queries`.`projcode` is not null) and isnull(`Queries`.`authorcode`) and isnull(`Queries`.`supcode`));

-- --------------------------------------------------------

--
-- Structure for view `ViewNumQueriesSupTotal`
--
DROP TABLE IF EXISTS `ViewNumQueriesSupTotal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumQueriesSupTotal` AS select count(1) AS `queries` from `Queries` where (isnull(`Queries`.`projcode`) and isnull(`Queries`.`authorcode`) and (`Queries`.`supcode` is not null));

-- --------------------------------------------------------

--
-- Structure for view `ViewNumSupervisedProj`
--
DROP TABLE IF EXISTS `ViewNumSupervisedProj`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewNumSupervisedProj` AS select `ProjSup`.`supcode` AS `supcode`,count(`ProjSup`.`projcode`) AS `numProjs` from `ProjSup` group by `ProjSup`.`supcode`;

-- --------------------------------------------------------

--
-- Structure for view `ViewTopDownloads`
--
DROP TABLE IF EXISTS `ViewTopDownloads`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewTopDownloads` AS select `Downloads`.`projcode` AS `projcode`,count(`Downloads`.`projcode`) AS `downloads` from `Downloads` group by `Downloads`.`projcode` order by count(`Downloads`.`projcode`) limit 0,10;

-- --------------------------------------------------------

--
-- Structure for view `ViewTopQueriesAuthor`
--
DROP TABLE IF EXISTS `ViewTopQueriesAuthor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewTopQueriesAuthor` AS select `Queries`.`authorcode` AS `authorcode`,count(1) AS `queries` from `Queries` where (isnull(`Queries`.`projcode`) and (`Queries`.`authorcode` is not null) and isnull(`Queries`.`supcode`)) group by `Queries`.`authorcode` order by count(1) limit 0,10;

-- --------------------------------------------------------

--
-- Structure for view `ViewTopQueriesProj`
--
DROP TABLE IF EXISTS `ViewTopQueriesProj`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewTopQueriesProj` AS select `Queries`.`projcode` AS `projcode`,count(1) AS `queries` from `Queries` where ((`Queries`.`projcode` is not null) and isnull(`Queries`.`authorcode`) and isnull(`Queries`.`supcode`)) group by `Queries`.`projcode` order by count(1) limit 0,10;

-- --------------------------------------------------------

--
-- Structure for view `ViewTopQueriesSup`
--
DROP TABLE IF EXISTS `ViewTopQueriesSup`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ViewTopQueriesSup` AS select `Queries`.`supcode` AS `supcode`,count(1) AS `queries` from `Queries` where (isnull(`Queries`.`projcode`) and isnull(`Queries`.`authorcode`) and (`Queries`.`supcode` is not null)) group by `Queries`.`supcode` order by count(1) limit 0,10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Access`
--
ALTER TABLE `Access`
  ADD CONSTRAINT `Access_ibfk_1` FOREIGN KEY (`username`) REFERENCES `Users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Author`
--
ALTER TABLE `Author`
  ADD CONSTRAINT `Author_ibfk_1` FOREIGN KEY (`coursecode`) REFERENCES `Course` (`coursecode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Deliverable`
--
ALTER TABLE `Deliverable`
  ADD CONSTRAINT `Deliverable_ibfk_1` FOREIGN KEY (`projcode`) REFERENCES `Project` (`projcode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Downloads`
--
ALTER TABLE `Downloads`
  ADD CONSTRAINT `Downloads_ibfk_1` FOREIGN KEY (`username`) REFERENCES `Users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Downloads_ibfk_2` FOREIGN KEY (`projcode`) REFERENCES `Project` (`projcode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ProjAut`
--
ALTER TABLE `ProjAut`
  ADD CONSTRAINT `ProjAut_ibfk_1` FOREIGN KEY (`projcode`) REFERENCES `Project` (`projcode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ProjAut_ibfk_2` FOREIGN KEY (`authorcode`) REFERENCES `Author` (`authorcode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Project`
--
ALTER TABLE `Project`
  ADD CONSTRAINT `Project_ibfk_1` FOREIGN KEY (`coursecode`) REFERENCES `Course` (`coursecode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ProjSup`
--
ALTER TABLE `ProjSup`
  ADD CONSTRAINT `ProjSup_ibfk_1` FOREIGN KEY (`projcode`) REFERENCES `Project` (`projcode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ProjSup_ibfk_2` FOREIGN KEY (`supcode`) REFERENCES `Supervisor` (`supcode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Queries`
--
ALTER TABLE `Queries`
  ADD CONSTRAINT `Queries_ibfk_1` FOREIGN KEY (`username`) REFERENCES `Users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Queries_ibfk_2` FOREIGN KEY (`projcode`) REFERENCES `Project` (`projcode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Queries_ibfk_3` FOREIGN KEY (`authorcode`) REFERENCES `Author` (`authorcode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Queries_ibfk_4` FOREIGN KEY (`supcode`) REFERENCES `Supervisor` (`supcode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2012 at 04:35 PM
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
('miguel', '2012-01-11 21:00:46'),
('miguel', '2012-01-14 00:22:57');

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
(6, 'Doutoramento em Ciência Política e Relações Internacionais'),
(7, 'Doutoramento em Ciência e Engenharia de Polímeros e Compósitos'),
(8, 'Doutoramento em Ciências'),
(9, 'Doutoramento em Ciências Empresariais'),
(10, 'Doutoramento em Ciências Jurídicas'),
(11, 'Doutoramento em Ciências da Administração'),
(12, 'Doutoramento em Ciências da Comunicação'),
(13, 'Doutoramento em Ciências da Cultura'),
(14, 'Doutoramento em Ciências da Educação'),
(15, 'Doutoramento em Ciências da Linguagem'),
(16, 'Doutoramento em Ciências da Literatura'),
(17, 'Doutoramento em Ciências da Saúde'),
(18, 'Doutoramento em Contabilidade'),
(19, 'Doutoramento em Economia'),
(20, 'Doutoramento em Engenharia Biomédica'),
(21, 'Doutoramento em Engenharia Civil'),
(22, 'Doutoramento em Engenharia Electrónica e de Computadores'),
(23, 'Doutoramento em Engenharia Industrial e de Sistemas'),
(24, 'Doutoramento em Engenharia Mecânica'),
(25, 'Doutoramento em Engenharia Química e Biológica'),
(26, 'Doutoramento em Engenharia Têxtil'),
(27, 'Doutoramento em Engenharia de Materiais'),
(28, 'Doutoramento em Engenharia de Tecidos, Medicina Regenerativa e Células Estaminais'),
(29, 'Doutoramento em Estudos Culturais'),
(30, 'Doutoramento em Estudos da Criança'),
(31, 'Doutoramento em Filosofia'),
(32, 'Doutoramento em Física'),
(33, 'Doutoramento em Geografia'),
(34, 'Doutoramento em História'),
(35, 'Doutoramento em Líderes para as Indústrias Tecnológicas'),
(36, 'Doutoramento em Marketing e Estratégia'),
(37, 'Doutoramento em Matemática e Aplicações'),
(38, 'Doutoramento em Medicina'),
(39, 'Doutoramento em Psicologia'),
(40, 'Doutoramento em Psicologia Aplicada'),
(41, 'Doutoramento em Psicologia Básica'),
(42, 'Doutoramento em Sociologia'),
(43, 'Doutoramento em Tecnologia e Sistemas de Informação'),
(44, 'Licenciatura em Administração Pública'),
(45, 'Licenciatura em Arqueologia'),
(46, 'Licenciatura em Biologia - Geologia'),
(47, 'Licenciatura em Biologia Aplicada'),
(48, 'Licenciatura em Bioquímica'),
(49, 'Licenciatura em Ciência Política - Pós-Laboral'),
(50, 'Licenciatura em Ciências da Computação'),
(51, 'Licenciatura em Ciências da Comunicação'),
(52, 'Licenciatura em Ciências do Ambiente - Pós-Laboral'),
(53, 'Licenciatura em Contabilidade - Pós-Laboral'),
(54, 'Licenciatura em Design e Marketing de Moda'),
(55, 'Licenciatura em Direito'),
(56, 'Licenciatura em Direito - Pós-Laboral'),
(57, 'Licenciatura em Economia'),
(58, 'Licenciatura em Educação'),
(59, 'Licenciatura em Educação - Pós-Laboral'),
(60, 'Licenciatura em Educação Básica'),
(61, 'Licenciatura em Enfermagem'),
(62, 'Licenciatura em Engenharia Informática'),
(63, 'Licenciatura em Estatística Aplicada'),
(64, 'Licenciatura em Estudos Culturais - Pós-Laboral'),
(65, 'Licenciatura em Estudos Portugueses e Lusófonos'),
(66, 'Licenciatura em Filosofia'),
(67, 'Licenciatura em Física'),
(68, 'Licenciatura em Física e Química - Pós-Laboral'),
(69, 'Licenciatura em Geografia e Planeamento'),
(70, 'Licenciatura em Geologia - Pós-Laboral'),
(71, 'Licenciatura em Gestão'),
(72, 'Licenciatura em História'),
(73, 'Licenciatura em História - Pós-Laboral'),
(74, 'Licenciatura em Línguas Aplicadas'),
(75, 'Licenciatura em Línguas e Culturas Orientais'),
(76, 'Licenciatura em Línguas e Literaturas Europeias'),
(77, 'Licenciatura em Línguas e Literaturas Europeias - Pós-Laboral'),
(78, 'Licenciatura em Marketing - Pós-Laboral'),
(79, 'Licenciatura em Matemática'),
(80, 'Licenciatura em Música - Pós-Laboral'),
(81, 'Licenciatura em Negócios Internacionais - Pós-Laboral'),
(82, 'Licenciatura em Optometria e Ciências da Visão'),
(83, 'Licenciatura em Química'),
(84, 'Licenciatura em Relações Internacionais'),
(85, 'Licenciatura em Sociologia'),
(86, 'Licenciatura em Tecnologias e Sistemas de Informação'),
(87, 'Licenciatura em Tecnologias e Sistemas de Informação - Pós-Laboral'),
(88, 'Mestrado Europeu em Análise Estrutural de Monumentos e Construções Históricas'),
(89, 'Mestrado Europeu em Reologia Aplicada à Engenharia'),
(90, 'Mestrado Integrado em Arquitectura'),
(91, 'Mestrado Integrado em Engenharia Biológica'),
(92, 'Mestrado Integrado em Engenharia Biomédica'),
(93, 'Mestrado Integrado em Engenharia Civil'),
(94, 'Mestrado Integrado em Engenharia Electrónica Industrial e Computadores'),
(95, 'Mestrado Integrado em Engenharia Mecânica'),
(96, 'Mestrado Integrado em Engenharia Têxtil - Pós-Laboral'),
(97, 'Mestrado Integrado em Engenharia de Comunicações'),
(98, 'Mestrado Integrado em Engenharia de Materiais'),
(99, 'Mestrado Integrado em Engenharia de Polímeros'),
(100, 'Mestrado Integrado em Engenharia e Gestão Industrial'),
(101, 'Mestrado Integrado em Medicina'),
(102, 'Mestrado Integrado em Psicologia'),
(103, 'Mestrado em Administração Pública'),
(104, 'Mestrado em Administração da Justiça'),
(105, 'Mestrado em Arqueologia'),
(106, 'Mestrado em Bioengenharia'),
(107, 'Mestrado em Biofísica e Bionanossistemas'),
(108, 'Mestrado em Bioinformática'),
(109, 'Mestrado em Biologia Molecular, Biotecnologia e Bioempreendedorismo em Plantas'),
(110, 'Mestrado em Bioquímica Aplicada'),
(111, 'Mestrado em Biotecnologia e Bio-Empreendedorismo em Plantas Aromáticas e Medicinais'),
(112, 'Mestrado em Ciências - Formação Contínua de Professores'),
(113, 'Mestrado em Ciências da Comunicação'),
(114, 'Mestrado em Ciências da Educação'),
(115, 'Mestrado em Ciências da Saúde'),
(116, 'Mestrado em Ciências e Tecnologias do Ambiente'),
(117, 'Mestrado em Comunicação, Arte e Cultura'),
(118, 'Mestrado em Comunicação, Cidadania e Educação'),
(119, 'Mestrado em Construção e Reabilitação Sustentáveis'),
(120, 'Mestrado em Contabilidade'),
(121, 'Mestrado em Crime, Diferença e Desigualdade'),
(122, 'Mestrado em Design de Comunicação de Moda'),
(123, 'Mestrado em Design e Marketing'),
(124, 'Mestrado em Direito Administrativo'),
(125, 'Mestrado em Direito Judiciário (Direitos Processuais e Organização Judiciária)'),
(126, 'Mestrado em Direito Tributário e Fiscal'),
(127, 'Mestrado em Direito da União Europeia'),
(128, 'Mestrado em Direito das Autarquias Locais'),
(129, 'Mestrado em Direito dos Contratos e da Empresa'),
(130, 'Mestrado em Direito e Informática'),
(131, 'Mestrado em Direitos Humanos'),
(132, 'Mestrado em Ecologia'),
(133, 'Mestrado em Economia'),
(134, 'Mestrado em Economia Industrial e da Empresa'),
(135, 'Mestrado em Economia Monetária, Bancária e Financeira'),
(136, 'Mestrado em Economia Política da Saúde'),
(137, 'Mestrado em Economia Social'),
(138, 'Mestrado em Economia, Mercados e Políticas Públicas'),
(139, 'Mestrado em Educação'),
(140, 'Mestrado em Educação Especial'),
(141, 'Mestrado em Educação Pré-Escolar'),
(142, 'Mestrado em Educação Pré-Escolar e Ensino do 1º Ciclo do Ensino Básico'),
(143, 'Mestrado em Engenharia Humana'),
(144, 'Mestrado em Engenharia Industrial'),
(145, 'Mestrado em Engenharia Informática'),
(146, 'Mestrado em Engenharia Mecatrónica'),
(147, 'Mestrado em Engenharia Urbana'),
(148, 'Mestrado em Engenharia de Redes e Serviços de Comunicações'),
(149, 'Mestrado em Engenharia de Sistemas'),
(150, 'Mestrado em Engenharia e Gestão de Sistemas de Informação'),
(151, 'Mestrado em Ensino de Biologia e Geologia no 3º Ciclo no Ensino Básico e no Ensino Secundário'),
(152, 'Mestrado em Ensino de Educação Física nos Ensinos Básico e Secundário'),
(153, 'Mestrado em Ensino de Filosofia no Ensino Secundário'),
(154, 'Mestrado em Ensino de Física e de Química no 3º Ciclo do Ensino Básico e no Ensino Secundário'),
(155, 'Mestrado em Ensino de História e Geografia no 3º Ciclo do Ensino Básico e no Ensino Secundário'),
(156, 'Mestrado em Ensino de Informática'),
(157, 'Mestrado em Ensino de Inglês e de Espanhol no 3º Ciclo do Ensino Básico e no Ensino Secundário'),
(158, 'Mestrado em Ensino de Matemática no 3º Ciclo do Ensino Básico e no Secundário'),
(159, 'Mestrado em Ensino de Música'),
(160, 'Mestrado em Ensino de Português e de Línguas Clássicas no 3º Ciclo do Ensino Básico e no Secundário'),
(161, 'Mestrado em Ensino do 1º e do 2º Ciclos do Ensino Básico'),
(162, 'Mestrado em Ensino do Português no 3º Ciclo do Ensino Básico e no Ensino Secundário e de Espanhol nos Ensinos Básico e Secundário'),
(163, 'Mestrado em Estatística'),
(164, 'Mestrado em Estudos Interculturais Português/Chinês: Tradução, Formação e Comunicação Empresarial'),
(165, 'Mestrado em Estudos da Criança'),
(166, 'Mestrado em Finanças'),
(167, 'Mestrado em Física'),
(168, 'Mestrado em Genética Molecular'),
(169, 'Mestrado em Geografia'),
(170, 'Mestrado em Gestão'),
(171, 'Mestrado em Gestão Ambiental'),
(172, 'Mestrado em Gestão das Unidades de Saúde'),
(173, 'Mestrado em Gestão de Recursos Humanos'),
(174, 'Mestrado em História'),
(175, 'Mestrado em Linguística Portuguesa e Comparada'),
(176, 'Mestrado em Língua, Literatura e Cultura Inglesas'),
(177, 'Mestrado em Marketing e Gestão Estratégica'),
(178, 'Mestrado em Matemática e Computação'),
(179, 'Mestrado em Media Interactivos'),
(180, 'Mestrado em Mediação Cultural e Literária'),
(181, 'Mestrado em Micro e Nano Tecnologias'),
(182, 'Mestrado em Negócios Internacionais'),
(183, 'Mestrado em Optometria Avançada'),
(184, 'Mestrado em Ordenamento e Valorização de Recursos Geológicos'),
(185, 'Mestrado em Património Geológico e Geoconservação'),
(186, 'Mestrado em Património e Turismo Cultural'),
(187, 'Mestrado em Português Língua Não Materna (PLNM) - Português Língua Estrangeira (PLE) e Língua Segunda (PL2)'),
(188, 'Mestrado em Propriedades e Tecnologia de Polímeros'),
(189, 'Mestrado em Química Medicinal'),
(190, 'Mestrado em Química Têxtil'),
(191, 'Mestrado em Relações Internacionais'),
(192, 'Mestrado em Serviços de Informação'),
(193, 'Mestrado em Sistemas de Informação'),
(194, 'Mestrado em Sociologia'),
(195, 'Mestrado em Tecnologia e Arte Digital'),
(196, 'Mestrado em Teoria da Literatura'),
(197, 'Mestrado em Tradução e Comunicação Multilingue'),
(198, 'Mestrado em Técnicas de Caracterização e Análise Química'),
(199, 'Mestrado em Têxteis Avançados'),
(200, 'Programa Doutoral em Química');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
(6, 'Imagem PNG', 'b74b5f63a47427ca0b0a619563ae00d7.PNG', 7),
(7, 'JavaScript ', '2012/01/14/99a46edec01729f5319abd91f9cefd50/ccd6a97eb7c0bcd5b9fd0be32050c641.zip', 8),
(8, 'logs', '2012/01/14/5d1980c9026718cbf9901c23ff04875a/1ed72561ae16faac3103063ba5fb8363.xml', 25),
(9, 'javascript', '2012/01/14/198ea2f84203852eeb2a68490f98ef1c/3822de3de6e9959789a1a99472b3bfff.html', 26);

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
-- Table structure for table `KeyWord`
--

CREATE TABLE IF NOT EXISTS `KeyWord` (
  `kwcode` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL,
  PRIMARY KEY (`kwcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `KeyWord`
--

INSERT INTO `KeyWord` (`kwcode`, `keyword`) VALUES
(12, 'XML'),
(13, 'PHP 4'),
(14, 'HTML'),
(15, 'PHP'),
(16, 'JAVASCRIPT'),
(17, 'AJAX');

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
(14, 1),
(15, 1),
(21, 1),
(24, 1),
(26, 1),
(27, 1),
(2, 4),
(8, 4),
(11, 4),
(14, 4),
(17, 4),
(23, 4),
(25, 4),
(4, 5),
(10, 5),
(18, 5),
(20, 5),
(5, 6),
(8, 6),
(9, 6),
(16, 6),
(18, 6),
(19, 6),
(22, 6),
(27, 6),
(6, 7),
(13, 7),
(21, 7),
(24, 7),
(12, 8),
(15, 8),
(22, 8),
(23, 8),
(25, 8),
(26, 8);

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
  `path` varchar(300) NOT NULL,
  PRIMARY KEY (`projcode`),
  KEY `coursecode` (`coursecode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- RELATIONS FOR TABLE `Project`:
--   `coursecode`
--       `Course` -> `coursecode`
--

--
-- Dumping data for table `Project`
--

INSERT INTO `Project` (`projcode`, `keyname`, `title`, `subtitle`, `bdate`, `edate`, `subdate`, `abstract`, `coursecode`, `path`) VALUES
(1, 'a', 'a', NULL, '2012-01-10', '2012-01-17', '2012-01-16 00:00:00', '<para>Teste de uma submissao para listagem</para>', 1, ''),
(2, 'b', 'b', 'b', '2012-01-05', '2012-01-12', '2012-01-11 00:00:00', '<para>Teste de uma submissao para listagem</para>', 1, ''),
(4, 'Download', 'Testar download de ficheiros', '', '2012-01-10', '2012-01-10', '2012-01-09 09:27:13', 'Vai ser testado o download de ficheiros.', 1, ''),
(5, 'Download de Imagens', 'Testar download de imagens', '', '2012-01-10', '2012-01-08', '2012-01-09 09:32:20', 'Vai ser testado o download de imagens.', 1, ''),
(6, 'Download', 'Testar download de imagens 2', '', '2012-01-10', '2012-01-08', '2012-01-09 09:33:10', 'Testar novamente o download de imagens.', 1, ''),
(7, 'asXML', 'Testar abstract', '', '2012-01-10', '2012-01-08', '2012-01-09 14:12:00', '<abstract>Supostamente agora já aparecem as tags.\n\n<p>Aqui tem um programa. palavras a <b>negrito</b></p>\n</abstract>', 1, ''),
(8, 'uuuu', 'uuuuuu', '', '2012-01-12', '2012-01-09', '2012-01-14 00:26:45', '<abstract><p>\nEste abstract já tens <kw>key words</kw>.\no <kw>XML</kw> é uma key word.\n</p></abstract>', 1, ''),
(9, 'kljlkj', 'lkjlkj', '', '2012-01-11', '2012-01-09', '2012-01-14 00:52:12', '<abstract><p>\numa <kw>kw</kw> mais outra <kw>XML</kw>.\n</p></abstract>', 1, ''),
(10, 'jjjj', 'jjjj', '', '2012-01-13', '2012-01-13', '2012-01-14 00:54:31', '<abstract><p>\nasdasd\n<kw>ooo</kw>\n</p></abstract>', 1, ''),
(11, 'xxxx', 'xxxxxxx', '', '2012-01-11', '2012-01-09', '2012-01-14 01:12:35', '<abstract><p>\nqualquer coisas para <kw>kw</kw>, mais outra <kw>xml</kw>.\n</p></abstract>', 1, ''),
(12, 'nnn', 'nnnnn', '', '2012-01-21', '2012-01-11', '2012-01-14 01:14:49', '<abstract><p>\nmais <kw>xsl</kw> e <kw>xml</kw>.\n</p></abstract>', 1, ''),
(13, 'mm', 'mmm', '', '2012-02-14', '2012-01-22', '2012-01-14 01:17:06', '<abstract><p>\n<kw>xml</kw> e <kw>xsl</kw>\n</p></abstract>', 1, ''),
(14, 'ggg', 'ggggg', '', '2012-01-15', '2012-01-14', '2012-01-14 11:23:13', '<abstract><p>\n<kw>php</kw>\n<kw>html</kw>\n</p></abstract>', 1, ''),
(15, 'hhhh', 'hhhhhhh', '', '2012-01-15', '2012-01-11', '2012-01-14 11:25:07', '<abstract><kw>php 5</kw>\n<kw>html 5</kw></abstract>', 1, ''),
(16, 'ooo', 'oooooo', '', '2012-01-17', '2012-01-16', '2012-01-14 11:31:45', '<abstract><kw>\nphp\n</kw></abstract>', 1, ''),
(17, 'ttt', 'ttttt', '', '2012-02-15', '2012-01-18', '2012-01-14 11:33:09', '<abstract><kw>php 4</kw></abstract>', 1, ''),
(18, 'iii', 'iiiiii', '', '2012-02-23', '2012-01-18', '2012-01-14 11:34:39', '<abstract><kw>php 4</kw></abstract>', 1, ''),
(19, 'llll', 'lllllll', '', '2012-01-18', '2012-01-12', '2012-01-14 11:35:38', '<abstract><kw>php 4</kw></abstract>', 1, ''),
(20, 'llllll', 'lllllll', '', '2012-01-17', '2012-01-12', '2012-01-14 11:36:09', '<abstract><kw>php 4</kw></abstract>', 1, ''),
(21, 'jkhkh', 'kjhjkh', '', '2012-01-18', '2012-01-10', '2012-01-14 11:39:09', '<abstract><kw>php 4</kw></abstract>', 1, ''),
(22, 'uyu', 'yutuygt', '', '2012-01-17', '2012-01-13', '2012-01-14 11:39:55', '<abstract><kw>php 4</kw></abstract>', 1, ''),
(23, 'yyy', 'yyyyy', '', '2012-01-19', '2012-01-16', '2012-01-14 12:26:35', '<abstract><kw>xml</kw>\n\n<kw>php 4</kw></abstract>', 1, ''),
(24, 'kkkk', 'kkkkk', '', '2012-01-18', '2012-01-18', '2012-01-14 12:48:07', '<abstract><p>\nAqui vai ter várias key words, entre elas <kw>xml</kw>, <kw>html</kw>, <kw>php</kw>, <kw>javascript</kw> e <kw>ajax</kw>.\n</p></abstract>', 1, ''),
(25, 'jyh', 'jjhyyu', '', '2012-03-15', '2012-01-26', '2012-01-14 13:05:32', '<abstract><kw>php</kw> \n<kw>html</kw></abstract>', 1, ''),
(26, 'hjhg', 'hjhyu', '', '2012-02-19', '2012-01-16', '2012-01-14 13:07:27', '<abstract><p>algumas kw\n<kw>php</kw> e <kw>html</kw> e <kw>javascript</kw>\n</p></abstract>', 1, ''),
(27, 'fghj', 'lkjdgh', '', '2012-01-17', '2012-01-11', '2012-01-14 15:18:47', '<abstract><p>nada com <kw>php</kw></p></abstract>', 1, '2012/01/14/0835b99fc16c863b8d09a94959b89088/');

-- --------------------------------------------------------

--
-- Table structure for table `ProjKW`
--

CREATE TABLE IF NOT EXISTS `ProjKW` (
  `projcode` int(11) NOT NULL,
  `kwcode` int(11) NOT NULL,
  PRIMARY KEY (`projcode`,`kwcode`),
  KEY `kwcode` (`kwcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `ProjKW`:
--   `projcode`
--       `Project` -> `projcode`
--   `kwcode`
--       `KeyWord` -> `kwcode`
--

--
-- Dumping data for table `ProjKW`
--

INSERT INTO `ProjKW` (`projcode`, `kwcode`) VALUES
(23, 12),
(24, 12),
(23, 13),
(1, 14),
(24, 14),
(25, 14),
(26, 14),
(1, 15),
(24, 15),
(25, 15),
(26, 15),
(27, 15),
(24, 16),
(26, 16),
(24, 17);

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
(10, 1),
(12, 1),
(14, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(24, 1),
(27, 1),
(9, 2),
(13, 2),
(15, 2),
(21, 2),
(22, 2),
(24, 2),
(26, 2),
(2, 3),
(4, 3),
(8, 3),
(11, 3),
(14, 3),
(15, 3),
(23, 3),
(25, 3),
(26, 3),
(27, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

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
(9, 'miguel', 1, NULL, NULL, '2012-01-11 21:17:26'),
(10, 'miguel', 7, NULL, NULL, '2012-01-14 00:14:00'),
(11, 'miguel', NULL, NULL, 1, '2012-01-14 00:14:05'),
(12, 'miguel', 23, NULL, NULL, '2012-01-14 12:36:39'),
(13, 'miguel', 5, NULL, NULL, '2012-01-14 12:36:49'),
(14, 'miguel', 9, NULL, NULL, '2012-01-14 12:36:55'),
(15, 'miguel', 9, NULL, NULL, '2012-01-14 12:37:56'),
(16, 'miguel', 22, NULL, NULL, '2012-01-14 12:38:01'),
(17, 'miguel', 13, NULL, NULL, '2012-01-14 12:38:04'),
(18, 'miguel', 1, NULL, NULL, '2012-01-14 12:38:08'),
(19, 'miguel', 2, NULL, NULL, '2012-01-14 12:38:12'),
(21, 'miguel', 4, NULL, NULL, '2012-01-14 12:38:19'),
(22, 'miguel', 5, NULL, NULL, '2012-01-14 12:38:23'),
(23, 'miguel', 23, NULL, NULL, '2012-01-14 12:38:32'),
(24, 'miguel', 23, NULL, NULL, '2012-01-14 12:39:44'),
(25, 'miguel', 10, NULL, NULL, '2012-01-14 12:39:47'),
(26, 'miguel', 23, NULL, NULL, '2012-01-14 12:39:55'),
(27, 'miguel', 23, NULL, NULL, '2012-01-14 12:41:47'),
(28, 'miguel', 17, NULL, NULL, '2012-01-14 12:41:57'),
(29, 'miguel', 24, NULL, NULL, '2012-01-14 12:48:16'),
(30, 'miguel', 24, NULL, NULL, '2012-01-14 12:50:04'),
(31, 'miguel', 24, NULL, NULL, '2012-01-14 12:50:45'),
(32, 'miguel', 24, NULL, NULL, '2012-01-14 12:50:46'),
(33, 'miguel', 24, NULL, NULL, '2012-01-14 12:50:47'),
(34, 'miguel', 24, NULL, NULL, '2012-01-14 12:50:51'),
(35, 'miguel', 24, NULL, NULL, '2012-01-14 12:54:12'),
(36, 'miguel', 24, NULL, NULL, '2012-01-14 12:56:10'),
(37, 'miguel', 24, NULL, NULL, '2012-01-14 12:56:25'),
(38, 'miguel', 24, NULL, NULL, '2012-01-14 13:03:40'),
(39, 'miguel', 25, NULL, NULL, '2012-01-14 13:05:40'),
(40, 'miguel', 26, NULL, NULL, '2012-01-14 13:07:32'),
(41, 'miguel', NULL, NULL, 1, '2012-01-14 14:42:57'),
(42, 'miguel', NULL, NULL, 1, '2012-01-14 14:42:58'),
(43, 'miguel', NULL, NULL, 1, '2012-01-14 14:43:00'),
(44, 'miguel', NULL, NULL, 1, '2012-01-14 14:54:59'),
(45, 'miguel', NULL, NULL, 1, '2012-01-14 14:55:00'),
(46, 'miguel', NULL, NULL, 1, '2012-01-14 14:55:02'),
(47, 'miguel', NULL, NULL, 1, '2012-01-14 15:03:58'),
(48, 'miguel', NULL, NULL, 1, '2012-01-14 15:03:59'),
(49, 'miguel', NULL, NULL, 1, '2012-01-14 15:04:01'),
(50, 'miguel', NULL, NULL, 1, '2012-01-14 15:04:26'),
(51, 'miguel', NULL, NULL, 1, '2012-01-14 15:04:30'),
(52, 'miguel', NULL, NULL, 1, '2012-01-14 15:04:33'),
(53, 'miguel', 26, NULL, NULL, '2012-01-14 15:05:35'),
(54, 'miguel', 26, NULL, NULL, '2012-01-14 15:05:47'),
(55, 'miguel', 26, NULL, NULL, '2012-01-14 15:06:06'),
(56, 'miguel', 26, NULL, NULL, '2012-01-14 15:06:29'),
(57, 'miguel', 24, NULL, NULL, '2012-01-14 15:06:33'),
(58, 'miguel', NULL, NULL, 1, '2012-01-14 15:06:35'),
(59, 'miguel', NULL, NULL, 1, '2012-01-14 15:06:40'),
(60, 'miguel', NULL, NULL, 1, '2012-01-14 15:06:42'),
(61, 'miguel', NULL, NULL, 1, '2012-01-14 15:08:50'),
(62, 'miguel', NULL, NULL, 1, '2012-01-14 15:11:34'),
(63, 'miguel', NULL, NULL, 1, '2012-01-14 15:11:53'),
(64, 'miguel', NULL, NULL, 1, '2012-01-14 15:11:55'),
(65, 'miguel', 26, NULL, NULL, '2012-01-14 15:12:04'),
(66, 'miguel', 27, NULL, NULL, '2012-01-14 15:18:53'),
(67, 'miguel', 27, NULL, NULL, '2012-01-14 15:19:25');

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
(1, 'José Carlos Ramalho', 'jcr@di.uminho.pt', 'http://www.di.uminho.pt/~jcr', 'Departamento de Informática'),
(2, 'Pedro Rangel Henriques', 'prh@di.uminho.pt', 'http://www.di.uminho.pt/~prh', 'Departamento de Informática'),
(3, 'José João', 'jj@di.uminho.pt', 'http://www.di.uminho.pt/~jj', 'Departamento de Informática');

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
('Bruno Azevedo', 'bruno', 'bruno', 'azevedo.252@gmail.com', 'Departamento de Informática', '', 'p'),
('José Carlos Ramalho', 'jcr', 'jcr', 'jcr@di.uminho.pt', 'Departamento de Informática', 'http://www3.di.uminho.pt/~jcr/', 'c'),
('Miguel Costa', 'miguel', 'miguel', 'miguelpintodacosta@gmail.com', 'Departamento de Informática', 'http://gplus.to/miguelcosta', 'a'),
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
-- Constraints for table `ProjKW`
--
ALTER TABLE `ProjKW`
  ADD CONSTRAINT `ProjKW_ibfk_2` FOREIGN KEY (`projcode`) REFERENCES `Project` (`projcode`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ProjKW_ibfk_1` FOREIGN KEY (`kwcode`) REFERENCES `KeyWord` (`kwcode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 01/05/2012 às 19h49min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `rpv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE IF NOT EXISTS `equipamento` (
  `id_equipamento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id_equipamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`id_equipamento`, `descricao`) VALUES
(1, 'ar condicionado'),
(2, 'notbook');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento_sala`
--

CREATE TABLE IF NOT EXISTS `equipamento_sala` (
  `id_equipamento_sala` int(11) NOT NULL AUTO_INCREMENT,
  `numero_sala` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id_equipamento_sala`,`numero_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE IF NOT EXISTS `sala` (
  `numero` int(10) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `capacidade` varchar(255) NOT NULL,
  `capacidade_desc` varchar(255) NOT NULL,
  `responsavel` varchar(40) NOT NULL,
  `status_disponibilidade` tinyint(1) NOT NULL,
  `info_adicionais` varchar(255) NOT NULL,
  `id_tipo_sala` int(11) NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`numero`, `descricao`, `capacidade`, `capacidade_desc`, `responsavel`, `status_disponibilidade`, `info_adicionais`, `id_tipo_sala`) VALUES
(0, 'Laboratorio 12 - Informatica', '35', 'Pessoas', '', 1, 'Preferencial para o curso da ES e CC', 2),
(3, 'LAB Fisica', '12', 'Pessoas', '', 1, '', 2),
(4, 'LAB Fisica', '13', 'pessoas', 'Marcelo Maia', 1, 'Destinado a aula pratica', 2),
(233, 'Sala de aula', '56', 'Pessoas, ', 'Porteiro', 1, 'Esta sala pode ser utilizada para aulas teoricas, eventos etc', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_sala`
--

CREATE TABLE IF NOT EXISTS `tipo_sala` (
  `id_tipo_sala` int(11) NOT NULL DEFAULT '0',
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_sala`
--

INSERT INTO `tipo_sala` (`id_tipo_sala`, `descricao`) VALUES
(1, 'Laboratorio de informatica'),
(2, 'laboratorio de fisica');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

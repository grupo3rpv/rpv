-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 18/05/2012 às 23h36min
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
-- Estrutura da tabela `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`id_area`, `nome`, `descricao`) VALUES
(1, 'Construção', 'Construção de Software'),
(2, 'Modelagem e Projeto', 'Modelagem e Projeto de Software'),
(3, 'Analise e Validação', 'Analise e Validação de Software'),
(4, 'Qualidade de Software', 'Qualidade de Software');

-- --------------------------------------------------------

--
-- Estrutura da tabela `area_professor`
--

CREATE TABLE IF NOT EXISTS `area_professor` (
  `id_area_professor` int(11) NOT NULL AUTO_INCREMENT,
  `id_area` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  PRIMARY KEY (`id_area_professor`),
  KEY `fk_area_has_professor_professor1` (`id_professor`),
  KEY `fk_area_has_professor_area1` (`id_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `area_professor`
--

INSERT INTO `area_professor` (`id_area_professor`, `id_area`, `id_professor`) VALUES
(3, 3, 1),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` char(12) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `codigo`, `nome`) VALUES
(1, '103441', 'Ciência da Computação'),
(2, '1103682', 'Engenharia Agrícola'),
(3, '103445', 'Engenharia Civil'),
(4, '1103689', 'Engenharia de Software'),
(5, '5000908', 'Engenharia de Telecomunicações'),
(6, '103447', 'Engenharia Elétrica'),
(7, '122050', 'Engenharia Mecânica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `id_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `codigo` char(15) DEFAULT NULL,
  `ementa` longtext,
  `carga_horaria` int(11) DEFAULT NULL,
  `info_adicionais` longtext,
  PRIMARY KEY (`id_disciplina`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `nome`, `codigo`, `ementa`, `carga_horaria`, `info_adicionais`) VALUES
(1, 'Processo de Software', 'AL0229', 'Introdução ao Processo de Software. Modelos de ciclo de vida de desenvolvimento de software. Atividades de processo.', 30, ''),
(2, 'Qualidade de Software', 'AL0230', 'Histórico e conceitos sobre qualidade. Qualidade de processo e produto de software. Normas de qualidade de software.', 30, ''),
(3, 'RPV', 'AL0233', 'Diferenciação entre métodos tradicionais e ágeis. Instaciação de processo de acordo com objetivos do projeto. Execução de processo de desenvolvimento de software.', 120, ''),
(4, 'Cáculo I ', 'AL0001', 'Noções básicas de conjuntos. A  reta real. Intervalos e desigualdades. Funções \r\nde uma variável. Limites. Continuidade. Derivadas.  Regras de derivação. Regra da \r\ncadeia. Derivação implícita. Diferencial. Regra de  L’Hôspital, máximos e mínimos e \r\noutras aplicações.', 60, ''),
(5, 'Física', 'AL0003', 'Movimento retilíneo. Movimento no plano. Leis de Newton. Trabalho e energia \r\ncinética. Energia potencial e conservação de energia. Quantidade de movimento linear e \r\nchoques. Rotação de corpos rígidos. Gravitação.', 75, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_curso`
--

CREATE TABLE IF NOT EXISTS `disciplina_curso` (
  `id_disciplina_curso` int(11) NOT NULL AUTO_INCREMENT,
  `id_curso` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  PRIMARY KEY (`id_disciplina_curso`),
  KEY `fk_curso_has_disciplina_disciplina1` (`id_disciplina`),
  KEY `fk_curso_has_disciplina_curso1` (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `disciplina_curso`
--

INSERT INTO `disciplina_curso` (`id_disciplina_curso`, `id_curso`, `id_disciplina`) VALUES
(1, 4, 1),
(2, 4, 2),
(3, 4, 3),
(4, 6, 4),
(5, 6, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE IF NOT EXISTS `equipamento` (
  `id_equipamento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id_equipamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`id_equipamento`, `descricao`) VALUES
(3, 'Notebook'),
(4, 'Computador'),
(5, 'Cadeira giratória'),
(6, 'Carteira'),
(7, 'Mesa de professor'),
(8, 'Lousa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento_sala`
--

CREATE TABLE IF NOT EXISTS `equipamento_sala` (
  `id_equipamento_sala` int(11) NOT NULL,
  `numero_sala` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  KEY `numero_sala_numero` (`numero_sala`),
  KEY `id_equipamento_sala_id_equipamento` (`id_equipamento_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `equipamento_sala`
--

INSERT INTO `equipamento_sala` (`id_equipamento_sala`, `numero_sala`, `quantidade`) VALUES
(3, 3, 20),
(7, 4, 10),
(4, 5, 50),
(6, 1, 30),
(4, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `hora1` time NOT NULL,
  `hora2` time NOT NULL,
  `id_professor` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id_evento`, `data_inicial`, `data_final`, `hora1`, `hora2`, `id_professor`, `titulo`) VALUES
(32, '2012-05-09', '2012-05-09', '02:00:00', '03:00:00', 1, 'Toma agua'),
(33, '2012-05-12', '2012-05-12', '03:30:00', '04:00:00', 1, 'Toma agua tabém'),
(34, '2012-05-23', '2012-05-23', '02:30:00', '04:30:00', 1, 'Krug viado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_interesse`
--

CREATE TABLE IF NOT EXISTS `nivel_interesse` (
  `id_nivel_interesse` int(11) NOT NULL AUTO_INCREMENT,
  `id_professor` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL,
  `nivel_interesse` int(11) NOT NULL,
  PRIMARY KEY (`id_nivel_interesse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Extraindo dados da tabela `nivel_interesse`
--

INSERT INTO `nivel_interesse` (`id_nivel_interesse`, `id_professor`, `id_disciplina`, `nivel_interesse`) VALUES
(41, 1, 1, 5),
(42, 1, 2, 1),
(43, 1, 3, 2);

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
  PRIMARY KEY (`numero`),
  KEY `fk_sala_tipo_sala1` (`id_tipo_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`numero`, `descricao`, `capacidade`, `capacidade_desc`, `responsavel`, `status_disponibilidade`, `info_adicionais`, `id_tipo_sala`) VALUES
(1, 'Lab 1', '60', 'Pessoas', 'Ze', 1, '', 1),
(2, 'Lab 2', '50', 'Pessoas', 'Antonio', 1, 'Sala pra uso exclusivo de computadores', 1),
(3, 'Sala 203', '6', 'Pessoas', '', 0, '', 3),
(4, 'Sala 302', '40', 'Cadeiras', 'nenhum', 1, 'sala para alunos', 2),
(5, 'Administração', '5', 'Pessoas', 'Alberto', 0, '', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_sala`
--

CREATE TABLE IF NOT EXISTS `tipo_sala` (
  `id_tipo_sala` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id_tipo_sala`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tipo_sala`
--

INSERT INTO `tipo_sala` (`id_tipo_sala`, `descricao`) VALUES
(1, 'Laboratório'),
(2, 'Sala Comum'),
(3, 'Sala dos Professores'),
(4, 'Sala Administrativa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `matricula` char(12) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `matricula`) VALUES
(1, 'Jose Bins', '42112');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `area_professor`
--
ALTER TABLE `area_professor`
  ADD CONSTRAINT `fk_area_has_professor_area1` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_area_has_professor_professor1` FOREIGN KEY (`id_professor`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `disciplina_curso`
--
ALTER TABLE `disciplina_curso`
  ADD CONSTRAINT `fk_curso_has_disciplina_curso1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_has_disciplina_disciplina1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `equipamento_sala`
--
ALTER TABLE `equipamento_sala`
  ADD CONSTRAINT `id_equipamento_sala_id_equipamento` FOREIGN KEY (`id_equipamento_sala`) REFERENCES `equipamento` (`id_equipamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `numero_sala_numero` FOREIGN KEY (`numero_sala`) REFERENCES `sala` (`numero`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `fk_sala_tipo_sala1` FOREIGN KEY (`id_tipo_sala`) REFERENCES `tipo_sala` (`id_tipo_sala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

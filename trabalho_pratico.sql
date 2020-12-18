-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 18-Dez-2020 às 22:54
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `trabalho_pratico`
--
CREATE DATABASE IF NOT EXISTS `trabalho_pratico` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `trabalho_pratico`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeonatos`
--

CREATE TABLE IF NOT EXISTS `campeonatos` (
  `id_campeonato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_campeonato`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `campeonatos`
--

INSERT INTO `campeonatos` (`id_campeonato`, `nome`, `cod_usuario`) VALUES
(1, 'teste6', 0),
(2, 'teste3', 0),
(4, 'te7', 0),
(5, 'tes3', 0),
(11, 'campteste', 0),
(12, 'teste35', 5),
(14, 'tc', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `correio`
--

CREATE TABLE IF NOT EXISTS `correio` (
  `id_carta` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `conteudo` text NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cod_remetente` int(11) NOT NULL,
  PRIMARY KEY (`id_carta`),
  KEY `cod_remetente` (`cod_remetente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `correio`
--

INSERT INTO `correio` (`id_carta`, `titulo`, `conteudo`, `id_usuario`, `cod_remetente`) VALUES
(2, 'Titulo', 'conteudo, bla bla bla', 19, 1),
(3, 'Mensagem Teste2', 'Muito massa', 19, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

CREATE TABLE IF NOT EXISTS `times` (
  `id_time` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `times`
--

INSERT INTO `times` (`id_time`, `nome`) VALUES
(0, 'Sem Time'),
(7, 'G2'),
(8, 'MIBR'),
(12, 'TimeTeste8'),
(15, 'Meutime');

-- --------------------------------------------------------

--
-- Estrutura da tabela `times_campeonato`
--

CREATE TABLE IF NOT EXISTS `times_campeonato` (
  `id_times_campeonato` int(11) NOT NULL AUTO_INCREMENT,
  `nome_time` varchar(100) NOT NULL,
  `cod_campeonato` int(11) NOT NULL,
  PRIMARY KEY (`id_times_campeonato`),
  KEY `cod_campeonato` (`cod_campeonato`),
  KEY `cod_time` (`nome_time`),
  KEY `nome_time` (`nome_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `times_campeonato`
--

INSERT INTO `times_campeonato` (`id_times_campeonato`, `nome_time`, `cod_campeonato`) VALUES
(1, 'G5', 1),
(2, 'G2', 2),
(3, 'G5', 2),
(4, '123', 4),
(5, 'G2', 4),
(6, '123', 5),
(7, 'MIBR', 5),
(15, 'MIBR', 11),
(16, 'TimeTeste8', 11),
(17, '123', 12),
(18, 'MIBR', 12),
(21, 'G2', 14),
(22, 'MIBR', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` char(32) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `posicao` varchar(100) NOT NULL,
  `permissao` int(11) NOT NULL,
  `idade` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `permissao_requerida` int(11) NOT NULL,
  `cod_time` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `cod_time` (`cod_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`, `nome`, `posicao`, `permissao`, `idade`, `nickname`, `permissao_requerida`, `cod_time`) VALUES
(1, 'email@adm', 'e10adc3949ba59abbe56e057f20f883e', 'Gabriel', 'Nenhuma', 4, 0, '', 0, 0),
(4, 't@a.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Treinador_teste1', '', 2, 20, 'TT1', 2, 12),
(5, 'c@a.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Org_teste1', '', 3, 0, '', 0, 0),
(12, 'g@a', '202cb962ac59075b964b07152d234b70', 'Gabriel', '', 1, 15, 'Leoni3', 1, 0),
(14, 'g3@a', '202cb962ac59075b964b07152d234b70', 'Gabriel4', 'IGL', 1, 16, 'teste10', 2, 15),
(15, 'j@a.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Jogador1', 'Suporte', 1, 20, 'J2', 1, 0),
(18, 'j2@a.com', '202cb962ac59075b964b07152d234b70', 'Jogador2', 'IGL', 1, 21, 'J4', 1, 12),
(19, 'a@a.com', '202cb962ac59075b964b07152d234b70', 'Apreciador1', '', 0, 12, 'A1', 0, 0),
(21, 'at1@a.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Apreciador1', '', 4, 12, 'Teste1', 4, 0);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `times_campeonato`
--
ALTER TABLE `times_campeonato`
  ADD CONSTRAINT `times_campeonato_ibfk_1` FOREIGN KEY (`cod_campeonato`) REFERENCES `campeonatos` (`id_campeonato`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_time`) REFERENCES `times` (`id_time`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

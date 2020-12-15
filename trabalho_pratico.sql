-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 15-Dez-2020 às 03:47
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeonatos`
--

CREATE TABLE IF NOT EXISTS `campeonatos` (
  `id_campeonato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_campeonato`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `campeonatos`
--

INSERT INTO `campeonatos` (`id_campeonato`, `nome`, `cod_usuario`) VALUES
(1, 'teste3', 0),
(2, 'teste2', 0),
(3, '', 0),
(4, 'te7', 0),
(5, 'tes3', 0),
(6, 'Campeonato3', 0),
(11, 'campteste', 0),
(12, 'teste35', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

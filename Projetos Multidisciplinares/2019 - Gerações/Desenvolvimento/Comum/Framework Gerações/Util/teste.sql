-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Abr-2019 às 19:57
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste`
--
CREATE DATABASE IF NOT EXISTS `teste` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `teste`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_info`
--

DROP TABLE IF EXISTS `tbl_info`;
CREATE TABLE IF NOT EXISTS `tbl_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_info`
--

INSERT INTO `tbl_info` (`id`, `titulo`, `descricao`) VALUES
(1, 'Missão', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(2, 'Visão', 'Metus vulputate eu scelerisque felis imperdiet proin fermentum. Ornare suspendisse sed nisi lacus sed viverra. Eros in cursus turpis massa tincidunt dui ut ornare lectus.'),
(3, 'Valores', 'Ut pharetra sit amet aliquam id diam maecenas ultricies mi. Ornare arcu odio ut sem nulla pharetra diam. Fringilla ut morbi tincidunt augue interdum. Dolor sit amet consectetur adipiscing elit ut. Fusce id velit ut tortor pretium viverra. Tristique nulla aliquet enim tortor at auctor. Tellus pellentesque eu tincidunt tortor aliquam nulla. Donec enim diam vulputate ut pharetra sit amet aliquam id. Arcu ac tortor dignissim convallis aenean et tortor. Ut morbi tincidunt augue interdum. Tincidunt eget nullam non nisi est sit. Suscipit adipiscing bibendum est ultricies integer. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Ut aliquam purus sit amet luctus venenatis lectus magna.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produtos`
--

DROP TABLE IF EXISTS `tbl_produtos`;
CREATE TABLE IF NOT EXISTS `tbl_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `preco` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_produtos`
--

INSERT INTO `tbl_produtos` (`id`, `descricao`, `preco`) VALUES
(1, 'sofá', 1250.75),
(2, 'cadeira', 378.99),
(3, 'cama', 870.75),
(4, 'notebook', 1752.49),
(5, 'smartphone', 999.99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'Jose', 'js', '321'),
(2, 'Jose', 'js', '321'),
(3, 'Maria', 'mm', 'asdf'),
(4, 'Marcos', 'marc', 'asdf'),
(5, 'Rodrigo', 'rod', '1243'),
(6, 'Pedro', 'pedrinho', 'asdf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

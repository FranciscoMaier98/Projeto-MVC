-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Dez-2020 às 17:16
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetomvc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Livro'),
(2, 'Brinquedos'),
(3, 'Tecnologia'),
(4, 'Automotivo'),
(5, 'Casa'),
(6, 'Esporte');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `preco` float NOT NULL DEFAULT 0,
  `preco_formatado` varchar(50) DEFAULT NULL,
  `desconto` int(11) NOT NULL DEFAULT 0,
  `parcela` float NOT NULL,
  `preco_desconto` varchar(50) DEFAULT NULL,
  `preco_parcelado` varchar(50) DEFAULT NULL,
  `imagem` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `titulo`, `categoria`, `preco`, `preco_formatado`, `desconto`, `parcela`, `preco_desconto`, `preco_parcelado`, `imagem`) VALUES
(66, 'Skate', '5', 599.99, '599,99', 10, 3, '539,99', '180,00', '1605038252.png'),
(65, 'Caderno', '4', 9.99, '9,99', 1, 2, '9,89', '4,95', '1605038182.png'),
(64, 'Telefone', '2', 999.99, '999,99', 15, 5, '849,99', '170,00', '1605038123.png'),
(63, 'Tesoura', '4', 7.99, '7,99', 2, 2, '7,83', '3,92', '1605038044.png'),
(62, 'Mesa', '4', 800, '800,00', 5, 3, '760,00', '253,33', '1605037618.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

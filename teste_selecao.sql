-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Out-2016 às 02:48
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste_selecao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cores`
--

CREATE TABLE `cores` (
  `titulo` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cores`
--

INSERT INTO `cores` (`titulo`, `id`) VALUES
('Branco', 1),
('Azul', 2),
('Preto', 3),
('Vermelho', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_antigos`
--

CREATE TABLE `dados_antigos` (
  `codigo` varchar(100) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `tamanho` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados_antigos`
--

INSERT INTO `dados_antigos` (`codigo`, `titulo`, `cor`, `tamanho`) VALUES
('100', 'Sapato Verão 2014', 'Branco', '33'),
('100', 'Sapato Verão 2014', 'Branco', '34'),
('100', 'Sapato Verão 2014', 'Branco', '35'),
('100', 'Sapato Verão 2014', 'Azul', '33'),
('100', 'Sapato Verão 2014', 'Azul', '34'),
('100', 'Sapato Verão 2014', 'Azul', '35'),
('120', 'Tênis Nike', 'Preto', '36'),
('120', 'Tênis Nike', 'Preto', '37'),
('120', 'Tênis Nike', 'Preto', '38'),
('120', 'Tênis Nike', 'Vermelho', '36'),
('120', 'Tênis Nike', 'Vermelho', '37'),
('120', 'Tênis Nike', 'Vermelho', '38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `titulo` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`titulo`, `id`, `codigo`) VALUES
('Sapato Verão 2014', 1, '100'),
('Sapato Verão 2014', 2, '100'),
('Sapato Verão 2014', 3, '100'),
('Sapato Verão 2014', 4, '100'),
('Sapato Verão 2014', 5, '100'),
('Sapato Verão 2014', 6, '100'),
('Tênis Nike', 7, '120'),
('Tênis Nike', 8, '120'),
('Tênis Nike', 9, '120'),
('Tênis Nike', 10, '120'),
('Tênis Nike', 11, '120'),
('Tênis Nike', 12, '120');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_cores`
--

CREATE TABLE `produtos_cores` (
  `id` int(11) NOT NULL,
  `id_cor` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos_cores`
--

INSERT INTO `produtos_cores` (`id`, `id_cor`, `id_produto`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 4, 10),
(11, 4, 11),
(12, 4, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_tamanhos`
--

CREATE TABLE `produtos_tamanhos` (
  `id` int(11) NOT NULL,
  `id_produto_cor` int(11) DEFAULT NULL,
  `id_tamanho` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos_tamanhos`
--

INSERT INTO `produtos_tamanhos` (`id`, `id_produto_cor`, `id_tamanho`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3),
(7, 3, 4),
(8, 3, 5),
(9, 3, 6),
(10, 4, 4),
(11, 4, 5),
(12, 4, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanhos`
--

CREATE TABLE `tamanhos` (
  `titulo` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tamanhos`
--

INSERT INTO `tamanhos` (`titulo`, `id`) VALUES
('33', 1),
('34', 2),
('35', 3),
('36', 4),
('37', 5),
('38', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cores`
--
ALTER TABLE `cores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos_cores`
--
ALTER TABLE `produtos_cores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cor` (`id_cor`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `produtos_tamanhos`
--
ALTER TABLE `produtos_tamanhos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto_cor` (`id_produto_cor`),
  ADD KEY `id_tamanho` (`id_tamanho`);

--
-- Indexes for table `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cores`
--
ALTER TABLE `cores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `produtos_cores`
--
ALTER TABLE `produtos_cores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `produtos_tamanhos`
--
ALTER TABLE `produtos_tamanhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tamanhos`
--
ALTER TABLE `tamanhos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

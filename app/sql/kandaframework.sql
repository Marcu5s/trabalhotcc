-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
-- Host: localhost
-- Generation Time: 24-Jan-2015 às 12:25
-- Versão do servidor: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kandaframework`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
`id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `criacao` timestamp NULL DEFAULT NULL,
  `atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nivel`
--

INSERT INTO `nivel` (`id`, `nome`, `criacao`, `atualizacao`) VALUES
(3, 'Admin', '2015-01-09 11:20:20', '2015-01-10 01:35:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`user_id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `senha` text,
  `status` int(11) DEFAULT NULL,
  `criacao` timestamp NULL DEFAULT NULL,
  `atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(16) DEFAULT NULL,
  `nivel_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`user_id`, `nome`, `login`, `senha`, `status`, `criacao`, `atualizacao`, `ip`, `nivel_id`) VALUES
(8, 'Marcus Antonio Rios Dos Santos', 'marcus', '$2y$10$Te7uMsuU7uos5LNXW3Mq5e7HVjZl42P4r4w9L.mcK6e3c1GdHgkY2', 1, '2015-01-09 07:18:18', '2015-01-10 01:40:03', NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`user_id`), ADD KEY `fk_usuario_nivel1_idx` (`nivel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `fk_usuario_nivel1` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

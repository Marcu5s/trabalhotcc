-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 05-Jun-2015 às 10:21
-- Versão do servidor: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trabalhotcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `sexo` int(11) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL,
  `criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`, `email`, `sexo`, `cidade`, `estado`, `data_nasc`, `criacao`, `file`) VALUES
(1, 'luan', 'luan', '$2y$10$Te7uMsuU7uos5LNXW3Mq5e7HVjZl42P4r4w9L.mcK6e3c1GdHgkY2', 'luan', 1, 'luan', 'luan', '2015-04-01', '2015-05-27 16:21:18', 'main.png'),
(6, 'Marcus Antonio', 'marcus.antonio', '$2y$10$Fs9vtlPZ2B7sJngf2nJWx.q2iyUE4gLhEUqB82Fz4/5Q16t4jiRCi', 'marcus@inetsistemas.com.br', 0, '', '', '0000-00-00', '2015-05-20 16:28:47', ''),
(14, 'teste', 'lc', '$2y$10$LU1LQkiHEGoCGY/0vbb1QesTUpxcwNvgDKmoXf/hcpLU4WS2O/r7m', '12345@12345.com', 0, '', '', '0000-00-00', '2015-05-27 16:20:28', 'main.png'),
(15, '123456', 'gustavo', '$2y$10$3b1q2Y5nuLKohiT/SV14gOLqZcWMK0As4ThotlIx.jOQ.VtZWgLYq', 'teste@teste.com.br', 0, '', '', '0000-00-00', '2015-06-02 22:06:53', 'trabalhotcc.png'),
(16, 'Michael', 'michael', '$2y$10$IGeSIJwj1EdwOfBLsNIaXuhXmw4SBsFBd.mKg8on3qzye1fpruHfC', 'teste@12345.com', 0, '', '', '0000-00-00', '2015-06-03 22:56:17', 'main.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

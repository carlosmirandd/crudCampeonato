-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/02/2024 às 20:49
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `campeonato`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `times`
--

CREATE TABLE `times` (
  `matricula` int(11) NOT NULL,
  `nome` text NOT NULL,
  `data_fundacao` text NOT NULL,
  `vitorias` int(11) NOT NULL,
  `sede` text NOT NULL,
  `presidente` text NOT NULL,
  `treinador` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `times`
--

INSERT INTO `times` (`matricula`, `nome`, `data_fundacao`, `vitorias`, `sede`, `presidente`, `treinador`) VALUES
(0, '0', '0', 0, '0', '0', '0'),
(1, 'Vasco da Gama', '21 de agosto de 1898', 1, 'Avenida Roberto Dinamite, 10', 'Pedro Paulo', 'Ramon Diaz');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`matricula`),
  ADD UNIQUE KEY `matricula` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

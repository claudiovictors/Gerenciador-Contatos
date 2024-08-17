-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 17/08/2024 às 16:32
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
-- Banco de dados: `contactos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `usuario_id` bigint(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contactos`
--

INSERT INTO `contactos` (`id`, `usuario_id`, `nome`, `email`, `telefone`, `data`) VALUES
(12, 19421256535529, 'Pedro Afonso', 'pedroafonso@gmail.com', '5511234644', '2024-08-17'),
(13, 19421256535529, 'Ana maria', 'anamaria@gmail.com', '244932900321', '2024-08-17'),
(14, 19421256535529, 'ClevCodes', 'clevcodes.web@gmail.com', '931474092', '2024-08-17'),
(15, 19421256535529, 'Gustavo Guanabara', 'cursosemvideos@gmail.com', '551198374633', '2024-08-17'),
(16, 19421256535529, 'Anderson Falcão', 'andersonfalcao@gmail.com', '183624', '2024-08-17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lista`
--

CREATE TABLE `lista` (
  `id` int(11) NOT NULL,
  `usuario_id` bigint(20) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `img` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lista`
--

INSERT INTO `lista` (`id`, `usuario_id`, `nome`, `apelido`, `usuario`, `email`, `senha`, `img`) VALUES
(3, 19421256535529, 'Admin', 'Code', '@admincode2477', 'admin@gmail.com', 'root', 'AC');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `lista`
--
ALTER TABLE `lista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

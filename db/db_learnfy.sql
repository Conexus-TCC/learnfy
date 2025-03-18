-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/03/2025 às 04:48
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_learnfy`
--
CREATE DATABASE IF NOT EXISTS `db_learnfy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_learnfy`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria_curso`
--

CREATE TABLE `categoria_curso` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(30) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `categoria_curso`
--

INSERT INTO `categoria_curso` (`id_categoria`, `nome_categoria`, `id_empresa`) VALUES
(4, 'Batata', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(50) NOT NULL,
  `cnpj` varchar(19) DEFAULT NULL,
  `ie` varchar(15) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `site` varchar(60) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `ddd` varchar(3) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `cnpj`, `ie`, `cep`, `site`, `email`, `senha`, `logo`, `ddd`, `telefone`) VALUES
(2, 'conexus', '11.111.111/1111-11', '111.111.111.111', '03581-160', NULL, 'conexus@gmail.com', '$2y$10$BCjy7X8yP9hq5uQx5.o0qOq8RH59IcxvE127mkq9AoJYiYyPOCBJG', '../fotosSite/5855b9c87ea22529952785f29a8b5fbe.jpg', NULL, '11 1111-1111'),
(3, 'Sodexo', '11.111.111/1111-11', '111.111.111.111', '11111-111', NULL, 'sodexo@gmail.com', '$2y$10$B3y2fld3Hsxh70Ugq/BN2.2.apW5xhKvG.HxQI8eoIUCa9si.eQZq', '../fotosSite/53a7d5230c292fda8b58ad2bc5423042.jpg', NULL, '11 1111-1111');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(60) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `ddd` varchar(3) NOT NULL,
  `telefone` varchar(9) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_Empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `data_nascimento`, `sexo`, `ddd`, `telefone`, `email`, `senha`, `cpf`, `foto`, `status`, `id_Empresa`) VALUES
(2, 'FELIPE S CERQUEIRA', '2025-02-26', 'M', '', '995937887', 'felipe@gmail.com', '$2y$10$crTeR.ToOOH6UDTpyvOSBOUbbGIm.FxSZe2MY1wQEEalr284DwT6K', '11111111111111', '../fotosSite/ae22dc144e04c7b7bb5e8f736ab49a5f.jpg', 1, 2),
(3, 'Gustavo', '2025-02-26', 'M', '', '111111111', 'gustavo@gmail.com', '$2y$10$Ke.EnJ4pcKpPf4qu.HFGkupQuOuJaPkrzvrwnXt7FeAwQjqCIj0yy', '23454554454545', '../fotosSite/0edcb7fcfb9ebe0c58f4767104256909.jpg', 1, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria_curso`
--
ALTER TABLE `categoria_curso`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `fk_categoriaCurso` (`id_empresa`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_empresa` (`id_Empresa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria_curso`
--
ALTER TABLE `categoria_curso`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `categoria_curso`
--
ALTER TABLE `categoria_curso`
  ADD CONSTRAINT `fk_categoriaCurso` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_empresa` FOREIGN KEY (`id_Empresa`) REFERENCES `empresa` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

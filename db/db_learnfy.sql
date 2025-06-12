-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/06/2025 às 20:02
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
-- Banco de dados: `db_learnfy`
--
CREATE DATABASE IF NOT EXISTS `db_learnfy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_learnfy`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aula`
--

DROP TABLE IF EXISTS `aula`;
CREATE TABLE `aula` (
  `id_aula` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `tempo_em_segundos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `aula`
--

INSERT INTO `aula` (`id_aula`, `nome`, `descricao`, `video`, `id_curso`, `tempo_em_segundos`) VALUES
(1, 'Conceitos de node', 'Descrevendo NodeJS', '../fotosSite/a079cbae3280539db097f3823d4d39581.mp4', 1, 824),
(2, 'Api Rest', 'conceitos de API Rest', '../fotosSite/a079cbae3280539db097f3823d4d39581.mp4', 1, 582);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria_curso`
--

DROP TABLE IF EXISTS `categoria_curso`;
CREATE TABLE `categoria_curso` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(30) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nivelAcesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `categoria_curso`
--

INSERT INTO `categoria_curso` (`id_categoria`, `nome_categoria`, `id_empresa`, `nivelAcesso`) VALUES
(1, 'Programação', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome`, `descricao`, `imagem`, `categoria`, `id_empresa`, `nivel`) VALUES
(1, 'Node JS', 'Curso de node', '../fotosSite/0dbf392946de563420e9daa72e416e5b1.jpg', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(50) NOT NULL,
  `cnpj` varchar(19) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `ddd` varchar(3) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `cnpj`, `cep`, `email`, `senha`, `logo`, `ddd`, `telefone`) VALUES
(1, 'Conexus', '50.405.354/0001-94', '03590-070', 'conexus@mail.com', '$2y$10$GmoWw6KvOW..CSUeBVENGOaOIBzND8.aNZzIiMHpbR7rcSxgFdtla', 'https://github.com/Conexus-TCC/Site-Conexus/raw/main/media/imgs/contato/technologyBranco.png', NULL, '47 8978-9789');

-- --------------------------------------------------------

--
-- Estrutura para tabela `materiais_aula`
--

DROP TABLE IF EXISTS `materiais_aula`;
CREATE TABLE `materiais_aula` (
  `id_material` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `id_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `materiais_aula`
--

INSERT INTO `materiais_aula` (`id_material`, `filename`, `caminho`, `id_aula`) VALUES
(1, 'material .pdf', '../fotosSite/a079cbae3280539db097f3823d4d39581.pdf', 1),
(2, 'material.docx', '../fotosSite/a079cbae3280539db097f3823d4d39581.docx', 1),
(3, 'material .pdf', '../fotosSite/a079cbae3280539db097f3823d4d39581.pdf', 2),
(4, 'material.docx', '../fotosSite/a079cbae3280539db097f3823d4d39581.docx', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pergunta`
--

DROP TABLE IF EXISTS `pergunta`;
CREATE TABLE `pergunta` (
  `id_pergunta` int(11) NOT NULL,
  `pergunta` varchar(190) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `id_res_certa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `pergunta`
--

INSERT INTO `pergunta` (`id_pergunta`, `pergunta`, `id_quiz`, `id_res_certa`) VALUES
(1, 'O que é node JS', 1, 1),
(2, 'Qual o verbo HTTP se utiliza para enviar os dados pra API', 2, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntas_respondidas`
--

DROP TABLE IF EXISTS `perguntas_respondidas`;
CREATE TABLE `perguntas_respondidas` (
  `id_usuario` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `acertado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `progresso`
--

DROP TABLE IF EXISTS `progresso`;
CREATE TABLE `progresso` (
  `id_aula` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tempo_assistido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz` (
  `id_quiz` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `id_aula`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `resposta`
--

DROP TABLE IF EXISTS `resposta`;
CREATE TABLE `resposta` (
  `id_resposta` int(11) NOT NULL,
  `resposta` varchar(190) NOT NULL,
  `id_pergunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `resposta`
--

INSERT INTO `resposta` (`id_resposta`, `resposta`, `id_pergunta`) VALUES
(1, 'Compilador JavaScript', 1),
(2, 'Interpretador JavaScript', 1),
(3, 'biblioteca  JavaScript', 1),
(4, 'Framework JavaScript', 1),
(5, 'GET', 2),
(6, 'POST', 2),
(7, 'DELETE', 2),
(8, 'PUT', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
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
  `id_Empresa` int(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `data_nascimento`, `sexo`, `ddd`, `telefone`, `email`, `senha`, `cpf`, `foto`, `status`, `id_Empresa`, `nivel`) VALUES
(1, 'Ana', '1990-01-01', 'F', '11', '999999999', 'ana@email.com', '$2y$10$ZYdswmu0.gKKChhe17Q2CerjZBw9crSW4qIBZ7qpeio1P5Aw5leHy', '12345678901', '../fotosSite/pessoa.jpg', 1, 1, 1),
(2, 'Bruno', '1985-05-15', 'M', '21', '988888888', 'bruno@email.com', '$2y$10$tf6hLcBrONevq6MZRuPLXuHHrpn6gh5LonbC.xPndDq1BC8/8jM6q', '23456789012', '../fotosSite/pessoa.jpg', 1, 1, 2),
(3, 'Carlos', '1992-03-10', 'M', '31', '977777777', 'carlos@email.com', '$2y$10$PurondNM95.7us8xs6tQDeEYa89ouYU2UVFH9JmG97Vfvzy02W6ci', '34567890123', '../fotosSite/pessoa.jpg', 1, 1, 1),
(4, 'Daniela', '1995-07-20', 'F', '41', '966666666', 'daniela@email.com', '$2y$10$VhIUo2eorHpD4Cak89/PVeDrKr/wI6YjsKaINZpyaSeRVrBXe7o16', '45678901234', '../fotosSite/pessoa.jpg', 1, 1, 2),
(5, 'Eduardo', '1988-11-25', 'M', '51', '955555555', 'eduardo@email.com', '$2y$10$BLC0rVj0P2mh.ueGHf4Aa.v7.4SeqyTIJqyiNZ5pZIlqPpNKSmN1.', '56789012345', '../fotosSite/pessoa.jpg', 1, 1, 1),
(6, 'Fernanda', '1993-09-12', 'F', '61', '944444444', 'fernanda@email.com', '$2y$10$q60XhFan8Oju/T3yNdfPjelgymhmNJqbeYAxivZvp8qjq/od8IklW', '67890123456', '../fotosSite/pessoa.jpg', 1, 1, 2),
(7, 'Gabriel', '1990-04-18', 'M', '71', '933333333', 'gabriel@email.com', '$2y$10$RWpao8mx9qaTqkRMaCzOuO.sDxmYYQAq21KVMs4rZnEZVp9DodBYO', '78901234567', '../fotosSite/pessoa.jpg', 1, 1, 1),
(8, 'Helena', '1997-06-30', 'F', '81', '922222222', 'helena@email.com', '$2y$10$Q3FQIFwk4dJJYBEniP49ievdNl4.61jbQj31dqG8SG7mY2j3anWhy', '89012345678', '../fotosSite/pessoa.jpg', 1, 1, 2),
(9, 'Igor', '1989-02-14', 'M', '91', '911111111', 'igor@email.com', '$2y$10$.7pLh.swRsoR3nzj5hf.lOqMWxliSGAWC3IvTJaO5h/7/hYTzlkOm', '90123456789', '../fotosSite/pessoa.jpg', 1, 1, 1),
(10, 'Juliana', '1994-08-05', 'F', '71', '900000000', 'juliana@email.com', '$2y$10$QgblgeAoda3qGm4M0DnqfOjO.r4EsioPsGHzI4fUH44xzPpPJWki2', '01234567890', '../fotosSite/pessoa.jpg', 1, 1, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`),
  ADD KEY `fk_aula_curso` (`id_curso`);

--
-- Índices de tabela `categoria_curso`
--
ALTER TABLE `categoria_curso`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `fk_categoriaCurso` (`id_empresa`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `fk_curso_categoria` (`categoria`),
  ADD KEY `fk_curso_empresa` (`id_empresa`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices de tabela `materiais_aula`
--
ALTER TABLE `materiais_aula`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `fk_material_aula` (`id_aula`);

--
-- Índices de tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`id_pergunta`),
  ADD KEY `fk_pergunta_quiz` (`id_quiz`),
  ADD KEY `fk_pergunta_resposta` (`id_res_certa`);

--
-- Índices de tabela `perguntas_respondidas`
--
ALTER TABLE `perguntas_respondidas`
  ADD KEY `P_respondidas_usuario` (`id_usuario`),
  ADD KEY `P_respondidas_pergunta` (`id_pergunta`);

--
-- Índices de tabela `progresso`
--
ALTER TABLE `progresso`
  ADD KEY `fk_prog_user` (`id_usuario`),
  ADD KEY `fk_prog_aula` (`id_aula`);

--
-- Índices de tabela `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`),
  ADD KEY `fk_quiz-aula` (`id_aula`);

--
-- Índices de tabela `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`id_resposta`),
  ADD KEY `fk_resposta_pergunta` (`id_pergunta`);

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
-- AUTO_INCREMENT de tabela `aula`
--
ALTER TABLE `aula`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `categoria_curso`
--
ALTER TABLE `categoria_curso`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `materiais_aula`
--
ALTER TABLE `materiais_aula`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `id_pergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id_quiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `resposta`
--
ALTER TABLE `resposta`
  MODIFY `id_resposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `fk_aula_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Restrições para tabelas `categoria_curso`
--
ALTER TABLE `categoria_curso`
  ADD CONSTRAINT `fk_categoriaCurso` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Restrições para tabelas `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria_curso` (`id_categoria`),
  ADD CONSTRAINT `fk_curso_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Restrições para tabelas `materiais_aula`
--
ALTER TABLE `materiais_aula`
  ADD CONSTRAINT `fk_material_aula` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id_aula`);

--
-- Restrições para tabelas `pergunta`
--
ALTER TABLE `pergunta`
  ADD CONSTRAINT `fk_pergunta_quiz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`);

--
-- Restrições para tabelas `perguntas_respondidas`
--
ALTER TABLE `perguntas_respondidas`
  ADD CONSTRAINT `P_respondidas_pergunta` FOREIGN KEY (`id_pergunta`) REFERENCES `resposta` (`id_resposta`),
  ADD CONSTRAINT `P_respondidas_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Restrições para tabelas `progresso`
--
ALTER TABLE `progresso`
  ADD CONSTRAINT `fk_prog_aula` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id_aula`),
  ADD CONSTRAINT `fk_prog_user` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Restrições para tabelas `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `fk_quiz-aula` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id_aula`);

--
-- Restrições para tabelas `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `fk_resposta_pergunta` FOREIGN KEY (`id_pergunta`) REFERENCES `pergunta` (`id_pergunta`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_empresa` FOREIGN KEY (`id_Empresa`) REFERENCES `empresa` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

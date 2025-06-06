-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/06/2025 às 21:34
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
CREATE TABLE IF NOT EXISTS `aula` (
  `id_aula` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `tempo_em_segundos` double NOT NULL,
  PRIMARY KEY (`id_aula`),
  KEY `fk_aula_curso` (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria_curso`
--

DROP TABLE IF EXISTS `categoria_curso`;
CREATE TABLE IF NOT EXISTS `categoria_curso` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(30) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nivelAcesso` int(11) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `fk_categoriaCurso` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `categoria` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id_curso`),
  KEY `fk_curso_categoria` (`categoria`),
  KEY `fk_curso_empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(50) NOT NULL,
  `cnpj` varchar(19) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `ddd` varchar(3) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

 INSERT INTO `empresa` (`id_empresa`, `nome_empresa`, `cnpj`, `cep`, `email`, `senha`, `logo`, `ddd`, `telefone`) VALUES
(1, 
'Conexus', 
'50.405.354/0001-94', 
'03590-070',
'conexus@mail.com', 
'$2y$10$GmoWw6KvOW..CSUeBVENGOaOIBzND8.aNZzIiMHpbR7rcSxgFdtla',  -- 123   
'https://github.com/Conexus-TCC/Site-Conexus/raw/main/media/imgs/contato/technologyBranco.png',
 NULL, 
 '47 8978-9789');  



--
-- Estrutura para tabela `materiais_aula`
--

DROP TABLE IF EXISTS `materiais_aula`;
CREATE TABLE IF NOT EXISTS `materiais_aula` (
  `id_material` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `id_aula` int(11) NOT NULL,
  PRIMARY KEY (`id_material`),
  KEY `fk_material_aula` (`id_aula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pergunta`
--

DROP TABLE IF EXISTS `pergunta`;
CREATE TABLE IF NOT EXISTS `pergunta` (
  `id_pergunta` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` varchar(190) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `id_res_certa` int(11) NOT NULL,
  PRIMARY KEY (`id_pergunta`),
  KEY `fk_pergunta_quiz` (`id_quiz`),
  KEY `fk_pergunta_resposta` (`id_res_certa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `progresso`
--

DROP TABLE IF EXISTS `progresso`;
CREATE TABLE IF NOT EXISTS `progresso` (
  `id_usuario` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `Data` date NOT NULL DEFAULT current_timestamp(),
  KEY `fk_progresso_usuario` (`id_usuario`),
  KEY `fk_progresso_quiz` (`id_quiz`),
  KEY `progresso_pergunta` (`id_pergunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `id_quiz` int(11) NOT NULL AUTO_INCREMENT,
  `id_aula` int(11) NOT NULL,
  PRIMARY KEY (`id_quiz`),
  KEY `fk_quiz-aula` (`id_aula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `resposta`
--

DROP TABLE IF EXISTS `resposta`;
CREATE TABLE IF NOT EXISTS `resposta` (
  `id_resposta` int(11) NOT NULL AUTO_INCREMENT,
  `resposta` varchar(190) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  PRIMARY KEY (`id_resposta`),
  KEY `fk_resposta_pergunta` (`id_pergunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
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
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuario_empresa` (`id_Empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Restrições para tabelas `progresso`
--
ALTER TABLE `progresso`
  ADD CONSTRAINT `fk_progresso_quiz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`),
  ADD CONSTRAINT `fk_progresso_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `progresso_pergunta` FOREIGN KEY (`id_pergunta`) REFERENCES `pergunta` (`id_pergunta`);

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

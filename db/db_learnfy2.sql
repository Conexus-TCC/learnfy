-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/02/2025 às 18:49
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET FOREIGN_KEY_CHECKS=0;
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
CREATE DATABASE IF NOT EXISTS `db_learnfy` DEFAULT CHARACTER SET utf8mb4 COLLATE=utf8mb4_unicode_ci;
USE `db_learnfy`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(50) NOT NULL,
  `cnpj` varchar(19) DEFAULT NULL,
  `ie` varchar(15) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `site` varchar(60) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `ddd` varchar(3) DEFAULT NULL,
  `telefone` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria_curso`
--

DROP TABLE IF EXISTS `categoria_curso`;
CREATE TABLE `categoria_curso` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(30) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  KEY `id_empresa` (`id_empresa`),
  CONSTRAINT `fk_categoria_curso` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `certificado`
--

DROP TABLE IF EXISTS `certificado`;
CREATE TABLE `certificado` (
  `id_certificado` int(11) NOT NULL AUTO_INCREMENT,
  `nome_certificado` int(11) NOT NULL,
  `caminho_certificado` varchar(100) NOT NULL,
  PRIMARY KEY (`id_certificado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `certificado_usuario`
--

DROP TABLE IF EXISTS `certificado_usuario`;
CREATE TABLE `certificado_usuario` (
  `id_certificado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  KEY `fk_usuario_certificado` (`id_usuario`),
  KEY `fk_certificado_usuario` (`id_certificado`),
  CONSTRAINT `fk_certificado_usuario` FOREIGN KEY (`id_certificado`) REFERENCES `certificado` (`id_certificado`),
  CONSTRAINT `fk_usuario_certificado` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `id_quiz` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome_curso` varchar(50) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `data_criacao` date NOT NULL,
  `data_atualizacao` date NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_certificado` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_curso`),
  KEY `fk_curso_categoria` (`id_categoria`),
  KEY `fk_curso_certificado` (`id_certificado`),
  KEY `fk_curso` (`id_quiz`),
  CONSTRAINT `fk_curso` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`),
  CONSTRAINT `fk_curso_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_curso` (`id_categoria`),
  CONSTRAINT `fk_curso_certificado` FOREIGN KEY (`id_certificado`) REFERENCES `certificado` (`id_certificado`),
  CONSTRAINT `fk_curso_quiz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `material_curso`
--

DROP TABLE IF EXISTS `material_curso`;
CREATE TABLE `material_curso` (
  `id_curso` int(11) NOT NULL,
  `caminho_material` varchar(100) NOT NULL,
  `nome_material` varchar(50) NOT NULL,
  KEY `fk_material_curso` (`id_curso`),
  CONSTRAINT `fk_material_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `opcoes_pergunta`
--

DROP TABLE IF EXISTS `opcoes_pergunta`;
CREATE TABLE `opcoes_pergunta` (
  `id_opcoes` int(11) NOT NULL AUTO_INCREMENT,
  `id_pergunta` int(11) NOT NULL,
  `texto_opcao` varchar(50) NOT NULL,
  `correta` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_opcoes`),
  KEY `fk_opcao_pergunta` (`id_pergunta`),
  CONSTRAINT `fk_opcao_pergunta` FOREIGN KEY (`id_pergunta`) REFERENCES `pergunta` (`id_pergunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pergunta`
--

DROP TABLE IF EXISTS `pergunta`;
CREATE TABLE `pergunta` (
  `id_pergunta` int(11) NOT NULL AUTO_INCREMENT,
  `id_quiz` int(11) NOT NULL,
  `pergunta` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pergunta`),
  KEY `fk_pergunta_quiz` (`id_quiz`),
  CONSTRAINT `fk_pergunta_quiz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE `quiz` (
  `id_quiz` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_quiz` int(11) NOT NULL,
  `nome_quiz` varchar(50) NOT NULL,
  PRIMARY KEY (`id_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `respostas_usuario`
--

DROP TABLE IF EXISTS `respostas_usuario`;
CREATE TABLE `respostas_usuario` (
  `id_resposta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `Id_opcao` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `correta` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_resposta`),
  KEY `fk_resposta_usuario` (`id_usuario`),
  KEY `fk_resposta_opcao` (`Id_opcao`),
  KEY `fk_resposta_quiz` (`id_quiz`),
  KEY `fk_resposta_pergunta` (`id_pergunta`),
  CONSTRAINT `fk_resposta_opcao` FOREIGN KEY (`Id_opcao`) REFERENCES `opcoes_pergunta` (`id_opcoes`),
  CONSTRAINT `fk_resposta_pergunta` FOREIGN KEY (`id_pergunta`) REFERENCES `pergunta` (`id_pergunta`),
  CONSTRAINT `fk_resposta_quiz` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`),
  CONSTRAINT `fk_resposta_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
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
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_curso`
--

DROP TABLE IF EXISTS `usuarios_curso`;
CREATE TABLE `usuarios_curso` (
  `id_curso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  KEY `fk_usuario_curso` (`id_usuario`),
  KEY `fk_curso_usuario` (`id_curso`),
  CONSTRAINT `fk_curso_usuario` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  CONSTRAINT `fk_usuario_curso` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos_curso`
--

DROP TABLE IF EXISTS `videos_curso`;
CREATE TABLE `videos_curso` (
  `id_curso` int(11) NOT NULL,
  `video` varchar(100) NOT NULL,
  `capa_video` varchar(50) NOT NULL,
  KEY `fk_video_curso` (`id_curso`),
  CONSTRAINT `fk_video_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

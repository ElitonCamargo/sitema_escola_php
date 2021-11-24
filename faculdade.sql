-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Nov-2021 às 11:51
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `faculdade`
--

DELIMITER $$
--
-- Procedimentos
--
DROP PROCEDURE IF EXISTS `p_alunoCadastrar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_alunoCadastrar` (IN `nome` VARCHAR(50), IN `curso` INT)  NO SQL
INSERT INTO `aluno`(`nome`, `fk_curso`) VALUES (nome,curso)$$

DROP PROCEDURE IF EXISTS `p_alunoConsultarTodos`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_alunoConsultarTodos` ()  NO SQL
SELECT 
	aluno.id,
    aluno.nome,
    aluno.fk_curso,
    curso.nome as 'curso'
FROM 
	aluno
    	INNER JOIN
    curso ON aluno.fk_curso = curso.id$$

DROP PROCEDURE IF EXISTS `p_alunoExcluirPorId`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_alunoExcluirPorId` (IN `id` INT)  NO SQL
DELETE FROM aluno WHERE aluno.id = id$$

DROP PROCEDURE IF EXISTS `p_cursoCadastrar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_cursoCadastrar` (IN `_nome` VARCHAR(50))  NO SQL
INSERT INTO `curso`(`nome`) VALUES (_nome)$$

DROP PROCEDURE IF EXISTS `p_cursoListar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_cursoListar` ()  NO SQL
select * from curso$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `fk_curso` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_curso` (`fk_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `fk_curso`) VALUES
(6, 'Camargo de Oliveira', 4),
(7, 'Eliton Camargo de Oliveira', 2),
(11, 'Camargo de Oliveira', 5),
(14, 'Camargo de Oliveira', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`) VALUES
(2, 'Informática'),
(3, 'Banco de dados'),
(4, 'Letras'),
(5, 'Física'),
(6, 'Direito');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`fk_curso`) REFERENCES `curso` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

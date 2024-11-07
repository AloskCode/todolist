-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/11/2024 às 00:50
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
-- Banco de dados: `todolist`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `lista_de_tarefas`
--

CREATE TABLE `lista_de_tarefas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `status` bigint(20) NOT NULL,
  `data_limite` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lista_de_tarefas`
--

INSERT INTO `lista_de_tarefas` (`id`, `nome`, `descricao`, `status`, `data_limite`) VALUES
(5, 'Estudar para concurso', 'Estuda todas as mateiras', 0, '2025-04-12'),
(6, 'Limpar a garagem', 'Jogar fora coisas desnecessárias acumuladas', 0, '2025-08-17'),
(7, 'Limpar o quarto', 'Arrumar a cama , reoganizar o armario etc', 0, '2025-09-12'),
(8, 'Comprar cartas', 'Comprar novo bralho na shoope para o churracos, comprar faca para cortar bolo', 0, '2025-09-12');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `lista_de_tarefas`
--
ALTER TABLE `lista_de_tarefas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lista_de_tarefas`
--
ALTER TABLE `lista_de_tarefas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

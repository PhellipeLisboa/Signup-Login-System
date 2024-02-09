-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/02/2024 às 15:48
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
-- Banco de dados: `projetologin`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contactmessage`
--

CREATE TABLE `contactmessage` (
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_full_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_tel` varchar(11) NOT NULL,
  `message_text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contactmessage`
--

INSERT INTO `contactmessage` (`message_id`, `user_id`, `user_name`, `user_full_name`, `user_email`, `user_tel`, `message_text`) VALUES
(1, 2, 'Testee', 'Teste teste', 'teste@gmail.com', '21966999003', 'Mensagem de teste.'),
(2, 2, 'Testee', 'Teste teste', 'teste@gmail.com', '21964537746', 'Segunda mensagem de teste.'),
(3, 3, 'Testes', 'Testes', 'teste@teste.com', '21935664875', 'Mensagem de teste 3.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_full_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_email`, `user_full_name`) VALUES
(1, 'Testes2', '$2y$10$uk5KKyn2n8cJXN.PxP3UVOv3/0pFdQYBmSHfn3kCDPoCIes72zXHe', 'testes@gmail.com', 'Testes'),
(2, 'Testee', '$2y$10$Ip2qluBf.1TAICUt8G7rv.XIQDJwZyfLK2paOZH3hXYeVRNaMblp2', 'teste@gmail.com', 'Teste teste'),
(3, 'Testes', '$2y$10$GBHTXM9NuSH.FrKCgY6dP.wICiDfJOkVbt4XqQTZIs0Gc8CeNaJ4a', 'teste@teste.com', 'Testes'),
(4, 'Testes3', '$2y$10$mTX.tKUVFnzEYSSjNGzMMO6y1mOEcGpD7duInZe3nYeeqQ0/Rv/ya', 'teste@teste.com', 'TestesTestes');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contactmessage`
--
ALTER TABLE `contactmessage`
  ADD PRIMARY KEY (`message_id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contactmessage`
--
ALTER TABLE `contactmessage`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

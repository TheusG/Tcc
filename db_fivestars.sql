-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/08/2023 às 23:50
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
-- Banco de dados: `db_fivestars`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo`
--

CREATE TABLE `cargo` (
  `Id_Cargo` int(11) NOT NULL,
  `Nome_Cargo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cargo`
--

INSERT INTO `cargo` (`Id_Cargo`, `Nome_Cargo`) VALUES
(5, 'Ajudante Geral'),
(3, 'Balconista'),
(2, 'Caixa'),
(6, 'Garçom'),
(1, 'Gerente'),
(4, 'Pizzaiolo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cep`
--

CREATE TABLE `cep` (
  `Id` int(11) NOT NULL,
  `Cep` varchar(9) DEFAULT NULL,
  `Cidade` varchar(30) DEFAULT NULL,
  `Logradouro` varchar(30) DEFAULT NULL,
  `Bairro` varchar(30) DEFAULT NULL,
  `Tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cep`
--

INSERT INTO `cep` (`Id`, `Cep`, `Cidade`, `Logradouro`, `Bairro`, `Tipo`) VALUES
(1, '8253001', 'São Paulo', 'Virginia Ferni', 'Itaquera', 'Rua');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `Id_Funcionario` int(11) NOT NULL,
  `Cargo` int(11) DEFAULT NULL,
  `Perfil` int(11) DEFAULT NULL,
  `Salario` float DEFAULT NULL,
  `Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`Id_Funcionario`, `Cargo`, `Perfil`, `Salario`, `Usuario`) VALUES
(1, 1, 1, 10000, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `Id_Perfil` int(11) NOT NULL,
  `Acessa_Cliente` tinyint(1) DEFAULT NULL,
  `Acessa_Funcionario` tinyint(1) DEFAULT NULL,
  `Acessa_Produto` tinyint(1) DEFAULT NULL,
  `Acessa_Entregador` tinyint(1) DEFAULT NULL,
  `Acessa_Status` tinyint(1) DEFAULT NULL,
  `Acessa_Venda` tinyint(1) DEFAULT NULL,
  `Acessa_Carrinho` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`Id_Perfil`, `Acessa_Cliente`, `Acessa_Funcionario`, `Acessa_Produto`, `Acessa_Entregador`, `Acessa_Status`, `Acessa_Venda`, `Acessa_Carrinho`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Nome_Usuario` varchar(45) DEFAULT NULL,
  `Senha` varchar(100) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Cep` int(11) DEFAULT NULL,
  `Numero` varchar(10) DEFAULT NULL,
  `Complemento` varchar(45) DEFAULT NULL,
  `Telefone` varchar(11) DEFAULT NULL,
  `Email` varchar(60) DEFAULT NULL,
  `Nascimento` date DEFAULT NULL,
  `Foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nome_Usuario`, `Senha`, `Sexo`, `Cep`, `Numero`, `Complemento`, `Telefone`, `Email`, `Nascimento`, `Foto`) VALUES
(1, 'Felipe Cerqueira', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'm', 1, '400', 'Escola', '11995937887', 'felipe@pizza.com', '2000-09-02', ''),
(2, 'Theus Gomes', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'n', 1, '400', 'Escola', '11987654321', 'theus@pizza.com', '2023-05-10', ''),
(3, 'Wilson Bezerra', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'f', 1, '400', 'Escola', '11987654312', 'wilson@pizza.com', '1887-05-08', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`Id_Cargo`),
  ADD UNIQUE KEY `Nome_Cargo` (`Nome_Cargo`);

--
-- Índices de tabela `cep`
--
ALTER TABLE `cep`
  ADD PRIMARY KEY (`Id`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`Id_Funcionario`),
  ADD KEY `Cargo` (`Cargo`),
  ADD KEY `Perfil` (`Perfil`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`Id_Perfil`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD UNIQUE KEY `Nome_Usuario` (`Nome_Usuario`),
  ADD KEY `Cep` (`Cep`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `Id_Cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `cep`
--
ALTER TABLE `cep`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `Id_Funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `Id_Perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`Cargo`) REFERENCES `cargo` (`Id_Cargo`),
  ADD CONSTRAINT `funcionario_ibfk_2` FOREIGN KEY (`Perfil`) REFERENCES `perfil` (`Id_Perfil`),
  ADD CONSTRAINT `funcionario_ibfk_3` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Id_Usuario`);

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Cep`) REFERENCES `cep` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

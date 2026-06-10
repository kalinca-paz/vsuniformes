<<<<<<< HEAD
CREATE DATABASE IF NOT EXISTS vsuniformes
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE vsuniformes;

-- =========================
-- TABELA USUÁRIOS
-- =========================

CREATE TABLE usuarios (
    idUsuarios INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo VARCHAR(20) NOT NULL,
    
    PRIMARY KEY (idUsuarios)
);

-- =========================
-- TABELA CLIENTES
-- =========================

CREATE TABLE clientes (
    idCliente INT NOT NULL AUTO_INCREMENT,
    nomeCliente VARCHAR(100) NOT NULL,
    telefone VARCHAR(45) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cpf VARCHAR(15),
    cnpj VARCHAR(18),
    tipo VARCHAR(20) NOT NULL,
    razaoSocial VARCHAR(100),

    PRIMARY KEY (idCliente)
);

-- =========================
-- TABELA PRODUTOS
-- =========================

CREATE TABLE produtos (
    idProdutos INT NOT NULL AUTO_INCREMENT,
    nomeProd VARCHAR(100) NOT NULL,
    categoria VARCHAR(45) NOT NULL,
    modelo VARCHAR(45) NOT NULL,
    tamanho VARCHAR(10) NOT NULL,
    cor VARCHAR(45) NOT NULL,
    descricao text,
    preco DECIMAL(10,2) NOT NULL,
    foto1 VARCHAR(300),
    foto2 VARCHAR(300),
    foto3 VARCHAR(300),
    estoque INT DEFAULT 0,

    PRIMARY KEY (idProdutos)
);

-- =========================
-- TABELA PEDIDOS
-- =========================

CREATE TABLE pedidos (
    idPedidos INT NOT NULL AUTO_INCREMENT,
    dataEntrega DATE NOT NULL,
    valor DECIMAL(10,2) NOT NULL,

    Clientes_idCliente INT NOT NULL,

    PRIMARY KEY (idPedidos),

    CONSTRAINT fk_pedidos_clientes
    FOREIGN KEY (Clientes_idCliente)
    REFERENCES clientes(idCliente)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

-- =========================
-- TABELA ITENS DO PEDIDO
-- =========================

CREATE TABLE itensprodutos (
    Produtos_idProdutos INT NOT NULL,
    Pedidos_idPedidos INT NOT NULL,

    itemProduto VARCHAR(100) NOT NULL,
    valorProdutos DECIMAL(10,2) NOT NULL,
    quant INT NOT NULL,

    PRIMARY KEY (
        Produtos_idProdutos,
        Pedidos_idPedidos
    ),

    CONSTRAINT fk_itens_produtos
    FOREIGN KEY (Produtos_idProdutos)
    REFERENCES produtos(idProdutos)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

    CONSTRAINT fk_itens_pedidos
    FOREIGN KEY (Pedidos_idPedidos)
    REFERENCES pedidos(idPedidos)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
=======
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jun-2026 às 13:49
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vsuniformes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cnpj` varchar(15) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `razaosocial` varchar(100) NOT NULL,
  `Usuarios_idUsuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensprodutos`
--

CREATE TABLE `itensprodutos` (
  `Produtos_idProdutos` int(11) NOT NULL,
  `Pedidos_idPedidos` int(11) NOT NULL,
  `valorProdutos` decimal(10,2) NOT NULL,
  `quant` int(11) NOT NULL,
  `itemProduto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedidos` int(11) NOT NULL,
  `dataEntrega` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `Clientes_idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProdutos` int(11) NOT NULL,
  `nomeProd` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `cor` varchar(45) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `foto1` varchar(300) NOT NULL,
  `foto2` varchar(300) NOT NULL,
  `foto3` varchar(300) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_Clientes_Usuarios1_idx` (`Usuarios_idUsuarios`);

--
-- Índices para tabela `itensprodutos`
--
ALTER TABLE `itensprodutos`
  ADD PRIMARY KEY (`Produtos_idProdutos`,`Pedidos_idPedidos`),
  ADD KEY `fk_Produtos_has_Pedidos_Pedidos1_idx` (`Pedidos_idPedidos`),
  ADD KEY `fk_Produtos_has_Pedidos_Produtos1_idx` (`Produtos_idProdutos`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedidos`),
  ADD KEY `fk_Pedidos_Clientes1_idx` (`Clientes_idCliente`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProdutos`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_Clientes_Usuarios1` FOREIGN KEY (`Usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itensprodutos`
--
ALTER TABLE `itensprodutos`
  ADD CONSTRAINT `fk_Produtos_has_Pedidos_Pedidos1` FOREIGN KEY (`Pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Produtos_has_Pedidos_Produtos1` FOREIGN KEY (`Produtos_idProdutos`) REFERENCES `produtos` (`idProdutos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_Pedidos_Clientes1` FOREIGN KEY (`Clientes_idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
>>>>>>> e6ec54cb21e34494f6cb07045ef965cf6c25c532

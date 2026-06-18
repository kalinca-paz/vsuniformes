-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jun-2026 às 14:19
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
-- Banco de dados: `vsuniformeskalinca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnpj` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razaoSocial` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataCadastro` datetime NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nomeCliente`, `telefone`, `email`, `cpf`, `cnpj`, `endereco`, `cep`, `bairro`, `cidade`, `uf`, `tipo`, `razaoSocial`, `dataCadastro`, `Usuario_idUsuario`) VALUES
(1, 'Ana Pereira', '(61)99999-1111', 'ana@email.com', '123.456.789-01', NULL, 'Rua das Flores, 100', '70600-000', 'Centro', 'Brasília', 'DF', 'Pessoa Física', NULL, '2026-06-11 10:22:52', 1),
(2, 'Escola Futuro', '(61)3333-4444', 'contato@escolafuturo.com', NULL, '12.345.678/0001-99', 'Av. Principal, 500', '70700-000', 'Asa Sul', 'Brasília', 'DF', 'Pessoa Jurídica', 'Escola Futuro LTDA', '2026-06-11 10:22:52', 2),
(3, 'Pedro Martins', '(61)98888-7777', 'pedro@email.com', '987.654.321-00', NULL, 'Rua A, 250', '70800-000', 'Taguatinga', 'Brasília', 'DF', 'Pessoa Física', NULL, '2026-06-11 10:22:52', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itensprodutos`
--

CREATE TABLE `itensprodutos` (
  `Produto_idProduto` int(11) NOT NULL,
  `Pedido_idPedido` int(11) NOT NULL,
  `itemProduto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valorProdutos` decimal(10,2) NOT NULL,
  `quant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `itensprodutos`
--

INSERT INTO `itensprodutos` (`Produto_idProduto`, `Pedido_idPedido`, `itemProduto`, `valorProdutos`, `quant`) VALUES
(1, 1, 'Camiseta Escolar', '39.90', 10),
(2, 2, 'Calça Escolar', '69.90', 10),
(3, 3, 'Jaleco', '89.90', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `dataEntrega` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `Cliente_idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `dataEntrega`, `valor`, `Cliente_idCliente`) VALUES
(1, '2026-07-01', '399.00', 1),
(2, '2026-07-05', '699.00', 2),
(3, '2026-07-10', '269.70', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int(11) NOT NULL,
  `nomeProd` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamanho` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cor` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `foto1` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto2` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto3` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estoque` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idProduto`, `nomeProd`, `categoria`, `modelo`, `tamanho`, `cor`, `descricao`, `preco`, `foto1`, `foto2`, `foto3`, `estoque`) VALUES
(1, 'Camiseta Escolar', 'Uniforme Escolar', 'Gola Careca', 'M', 'Branco', 'Camiseta padrão escolar', '39.90', 'camiseta1.jpg', NULL, NULL, 100),
(2, 'Calça Escolar', 'Uniforme Escolar', 'Moletom', 'G', 'Azul Marinho', 'Calça escolar de moletom', '69.90', 'calca1.jpg', NULL, NULL, 50),
(3, 'Jaleco', 'Profissional', 'Manga Longa', 'GG', 'Branco', 'Jaleco para laboratório', '89.90', 'jaleco1.jpg', NULL, NULL, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'kalinca', 'ka@out.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(2, 'João Silva', 'joao@vsuniformes.com', 'e10adc3949ba59abbe56e057f20f883e', 'Cliente'),
(3, 'Maria Souza', 'maria@vsuniformes.com', 'e10adc3949ba59abbe56e057f20f883e', 'Cliente'),
(4, 'Carlos Lima', 'carlos@vsuniformes.com', 'e10adc3949ba59abbe56e057f20f883e', 'Cliente'),
(5, 'ze', 'ze@out.com', 'e10adc3949ba59abbe56e057f20f883e', 'usuario');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_clientes_usuarios` (`Usuario_idUsuario`);

--
-- Índices para tabela `itensprodutos`
--
ALTER TABLE `itensprodutos`
  ADD PRIMARY KEY (`Produto_idProduto`,`Pedido_idPedido`),
  ADD KEY `fk_itens_pedidos` (`Pedido_idPedido`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_pedidos_clientes` (`Cliente_idCliente`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_usuarios` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `itensprodutos`
--
ALTER TABLE `itensprodutos`
  ADD CONSTRAINT `fk_itens_pedidos` FOREIGN KEY (`Pedido_idPedido`) REFERENCES `pedidos` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_itens_produtos` FOREIGN KEY (`Produto_idProduto`) REFERENCES `produtos` (`idProduto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_clientes` FOREIGN KEY (`Cliente_idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

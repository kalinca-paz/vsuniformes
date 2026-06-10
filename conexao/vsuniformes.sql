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
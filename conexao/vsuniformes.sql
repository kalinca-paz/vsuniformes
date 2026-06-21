CREATE DATABASE IF NOT EXISTS vsuniformes
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE vsuniformes;

-- =========================
-- TABELA USUARIOS
-- =========================

CREATE TABLE usuarios (
    idUsuario INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo VARCHAR(20) NOT NULL,

    PRIMARY KEY (idUsuario)
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
    endereco VARCHAR(255) NOT NULL,
    cep VARCHAR(15) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    uf CHAR(2) NOT NULL,
    tipo VARCHAR(20) NOT NULL,
    razaoSocial VARCHAR(100),
    dataCadastro DATETIME NOT NULL,

    Usuario_idUsuario INT NOT NULL,

    PRIMARY KEY (idCliente),

    CONSTRAINT fk_clientes_usuarios
    FOREIGN KEY (Usuario_idUsuario)
    REFERENCES usuarios(idUsuario)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

-- =========================
-- TABELA PRODUTOS
-- =========================

CREATE TABLE produtos (
    idProduto INT NOT NULL AUTO_INCREMENT,
    nomeProd VARCHAR(100) NOT NULL,
    categoria VARCHAR(45) NOT NULL,
    modelo VARCHAR(45) NOT NULL,
    tamanho VARCHAR(10) NOT NULL,
    cor VARCHAR(45) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    foto1 VARCHAR(300),
    foto2 VARCHAR(300),
    foto3 VARCHAR(300),
    estoque INT DEFAULT 0,

    PRIMARY KEY (idProduto)
);

-- =========================
-- TABELA PEDIDOS
-- =========================

CREATE TABLE pedidos (
    idPedido INT NOT NULL AUTO_INCREMENT,
    dataEntrega DATE NOT NULL,
    valor DECIMAL(10,2) NOT NULL,

    Cliente_idCliente INT NOT NULL,

    PRIMARY KEY (idPedido),

    CONSTRAINT fk_pedidos_clientes
    FOREIGN KEY (Cliente_idCliente)
    REFERENCES clientes(idCliente)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

-- =========================
-- TABELA ITENS DO PEDIDO
-- =========================

CREATE TABLE itensprodutos (
    Produto_idProduto INT NOT NULL,
    Pedido_idPedido INT NOT NULL,

    itemProduto VARCHAR(100) NOT NULL,
    valorProdutos DECIMAL(10,2) NOT NULL,
    quant INT NOT NULL,

    PRIMARY KEY (
        Produto_idProduto,
        Pedido_idPedido
    ),

    CONSTRAINT fk_itens_produtos
    FOREIGN KEY (Produto_idProduto)
    REFERENCES produtos(idProduto)
    ON DELETE CASCADE
    ON UPDATE CASCADE,

    CONSTRAINT fk_itens_pedidos
    FOREIGN KEY (Pedido_idPedido)
    REFERENCES pedidos(idPedido)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
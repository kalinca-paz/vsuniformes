-- =========================
-- USUARIOS
-- =========================

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES
('kalinca', 'kali@out.com', MD5('1234'), 'Admin'),
('João Silva', 'joao@vsuniformes.com', MD5('123456'), 'Cliente'),
('Maria Souza', 'maria@vsuniformes.com', MD5('123456'), 'Cliente'),
('Carlos Lima', 'carlos@vsuniformes.com', MD5('123456'), 'Cliente');

-- =========================
-- CLIENTES
-- =========================

INSERT INTO clientes (
    nomeCliente,
    telefone,
    email,
    cpf,
    cnpj,
    endereco,
    cep,
    bairro,
    cidade,
    uf,
    tipo,
    razaoSocial,
    dataCadastro,
    Usuario_idUsuario
)
VALUES
(
    'Ana Pereira',
    '(61)99999-1111',
    'ana@email.com',
    '123.456.789-01',
    NULL,
    'Rua das Flores, 100',
    '70600-000',
    'Centro',
    'Brasília',
    'DF',
    'Pessoa Física',
    NULL,
    NOW(),
    1
),
(
    'Escola Futuro',
    '(61)3333-4444',
    'contato@escolafuturo.com',
    NULL,
    '12.345.678/0001-99',
    'Av. Principal, 500',
    '70700-000',
    'Asa Sul',
    'Brasília',
    'DF',
    'Pessoa Jurídica',
    'Escola Futuro LTDA',
    NOW(),
    2
),
(
    'Pedro Martins',
    '(61)98888-7777',
    'pedro@email.com',
    '987.654.321-00',
    NULL,
    'Rua A, 250',
    '70800-000',
    'Taguatinga',
    'Brasília',
    'DF',
    'Pessoa Física',
    NULL,
    NOW(),
    3
);

-- =========================
-- PRODUTOS
-- =========================

INSERT INTO produtos (
    nomeProd,
    categoria,
    modelo,
    tamanho,
    cor,
    descricao,
    preco,
    foto1,
    foto2,
    foto3,
    estoque
)
VALUES
(
    'Camiseta Escolar',
    'Uniforme Escolar',
    'Gola Careca',
    'M',
    'Branco',
    'Camiseta padrão escolar',
    39.90,
    'camiseta1.jpg',
    NULL,
    NULL,
    100
),
(
    'Calça Escolar',
    'Uniforme Escolar',
    'Moletom',
    'G',
    'Azul Marinho',
    'Calça escolar de moletom',
    69.90,
    'calca1.jpg',
    NULL,
    NULL,
    50
),
(
    'Jaleco',
    'Profissional',
    'Manga Longa',
    'GG',
    'Branco',
    'Jaleco para laboratório',
    89.90,
    'jaleco1.jpg',
    NULL,
    NULL,
    30
);

-- =========================
-- PEDIDOS
-- =========================

INSERT INTO pedidos (
    dataEntrega,
    valor,
    Cliente_idCliente
)
VALUES
('2026-07-01', 399.00, 1),
('2026-07-05', 699.00, 2),
('2026-07-10', 269.70, 3);

-- =========================
-- ITENSPRODUTOS
-- =========================

INSERT INTO itensprodutos (
    Produto_idProduto,
    Pedido_idPedido,
    itemProduto,
    valorProdutos,
    quant
)
VALUES
(
    1,
    1,
    'Camiseta Escolar',
    39.90,
    10
),
(
    2,
    2,
    'Calça Escolar',
    69.90,
    10
),
(
    3,
    3,
    'Jaleco',
    89.90,
    3
);
-- =========================
-- DADOS USUÁRIOS
-- =========================

INSERT INTO usuarios (nome, email, senha, tipo)
VALUES
('Ka', 'ka@out.com', MD5('123456'), 'admin'),
('João Silva', 'joao@email.com', MD5('123456'), 'usuario'),
('Maria Oliveira', 'maria@email.com', MD5('123456'), 'usuario');

-- =========================
-- DADOS CLIENTES
-- =========================

INSERT INTO clientes
(nomeCliente, telefone, email, cpf, cnpj, tipo, razaoSocial)
VALUES

(
'Escola Futuro',
'(61) 99999-1111',
'contato@escolafuturo.com',
NULL,
'12.345.678/0001-90',
'PJ',
'Escola Futuro LTDA'
),

(
'Academia Power Fit',
'(61) 99999-2222',
'financeiro@powerfit.com',
NULL,
'98.765.432/0001-10',
'PJ',
'Power Fit Academia'
),

(
'Carlos Mendes',
'(61) 99999-3333',
'carlos@email.com',
'123.456.789-00',
NULL,
'PF',
NULL
);

-- =========================
-- DADOS PRODUTOS
-- =========================

INSERT INTO produtos
(nomeProd, categoria, modelo, tamanho, cor, descricao, preco, foto1, foto2, foto3, estoque)
VALUES

(
'Camiseta Escolar',
'Uniforme Escolar',
'Gola Redonda',
'M',
'Azul',
'Camiseta escolar confeccionada em malha fria de alta qualidade.',
35.90,
'camiseta1.jpg',
'camiseta2.jpg',
'camiseta3.jpg',
150
),

(
'Calça Escolar',
'Uniforme Escolar',
'Moletom',
'G',
'Preta',
'Calça escolar confortável e resistente para uso diário.',
79.90,
'calca1.jpg',
'calca2.jpg',
'calca3.jpg',
80
),

(
'Agasalho Esportivo',
'Uniforme Esportivo',
'Jaqueta',
'GG',
'Vermelho',
'Agasalho esportivo completo ideal para atividades físicas.',
129.90,
'agasalho1.jpg',
'agasalho2.jpg',
'agasalho3.jpg',
50
);

-- =========================
-- DADOS PEDIDOS
-- =========================

INSERT INTO pedidos
(dataEntrega, valor, Clientes_idCliente)
VALUES

('2026-06-20', 11580.00, 1),
('2026-06-25', 6495.00, 2),
('2026-06-30', 718.00, 3);

-- =========================
-- DADOS ITENS DOS PEDIDOS
-- =========================

INSERT INTO itensprodutos
(Produtos_idProdutos, Pedidos_idPedidos, itemProduto, valorProdutos, quant)
VALUES

(1, 1, 'Camiseta Escolar', 35.90, 100),
(2, 1, 'Calça Escolar', 79.90, 100),

(3, 2, 'Agasalho Esportivo', 129.90, 50),

(1, 3, 'Camiseta Escolar', 35.90, 20);
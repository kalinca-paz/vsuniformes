<?php
require_once '../model/ClassProdutoDAO.php';
require_once '../model/ClassProduto.php';
require_once "../conexao/Conexao.php";
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Gerenciar Produtos</title>
</head>
<body>
    <?php 
    $produtoDAO = new ClassProdutoDAO();
    $produtos = $produtoDAO->listarProdutos();
    ?>
    
    <?php include 'includes/menu.php'; ?>

    <main class="container">

        <h2 class="tituloForm">Lista de Produtos</h2>

        <table class="tabela-preco">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
            <?php if (!empty($produtos)): ?>
                <?php foreach($produtos as $produto): ?>
                    <tr>
                        <td><?= $produto['idUsuario'] ?? $produto['idProduto']; ?></td>

                        <td>
                            <?php if (!empty($produto['foto1'])): ?>
                                <img src="../img/<?= $produto['foto1']; ?>" class="card-admin" alt="Produto">
                            <?php endif; ?>
                        </td>

                        <td><?= $produto['nomeProd']; ?></td>
                        <td><?= $produto['categoria']; ?></td>
                        <td>R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></td>
                        <td><?= $produto['estoque']; ?></td>

                        <td>
                            <a class="tecnologias" href="editarProduto.php?idProduto=<?= $produto['idProduto']; ?>">
                                Editar
                            </a>

                            <a class="alerta-erro" href="../controller/excluirProduto.php?idProduto=<?= $produto['idProduto']; ?>" onclick="return confirm('Deseja realmente excluir este produto?')">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="texto">
                        Nenhum produto cadastrado.
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
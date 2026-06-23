
<!-- listarProdutos.php -->
<?php
session_start();
require_once '../model/ClassProdutoDAO.php';
require_once '../model/ClassProduto.php';
require_once "../conexao/Conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Listar Produtos</title>
</head>
<body>
<?php

$produtoDAO = new ClassProdutoDAO();
$produtos = $produtoDAO->listarProdutos();

?>
<?php include 'includes/menu.php'; ?>
<div class="container-voltar">
        <a href="painelAdmin.php" class="btn-voltar">
            &larr; Voltar ao Painel
        </a>
    </div>

<h2 class="tituloForm">Lista de Produtos</h2>

<table class="tabela">
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
                <td><?= $produto['idProduto']; ?></td>

                <td>
                    <?php if (!empty($produto['foto1'])): ?>
                        <img src="../img/?= $produto['foto1']; ?>" width="80">
                    <?php endif; ?>
                </td>

                <td><?= $produto['nomeProd']; ?></td>

                <td><?= $produto['categoria']; ?></td>

                <td>R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></td>

                <td><?= $produto['estoque']; ?></td>

                <td>
                    <a class="btn-card"
                       href="editarProduto.php?idProduto=<?= $produto['idProduto']; ?>">
                        Editar
                    </a>

                    <a class="alerta-erro"
                       href="../controller/excluirProduto.php?idProduto=<?= $produto['idProduto']; ?>"
                       onclick="return confirm('Deseja realmente excluir este produto?')">
                        Excluir
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>

    <?php else: ?>

        <tr>
            <td colspan="7">
                Nenhum produto cadastrado.
            </td>
        </tr>

    <?php endif; ?>

    </tbody>
</table>

<?php include 'includes/footer.php'; ?>

</body>
</html>
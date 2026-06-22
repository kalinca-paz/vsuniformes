<?php
session_start();
require_once "../conexao/Conexao.php";
require_once "../model/ClassProdutoDAO.php";
require_once "../model/ClassProduto.php";

$produtoDAO = new ClassProdutoDAO();
$produtos = $produtoDAO->listarProdutos();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Nossos Produtos</title>
</head>
<body>

    <?php include 'includes/menu.php'; ?>  

    <main class="container">

        <h2>Nossos Produtos</h2>

        <div class="container-produtos">

            <?php foreach($produtos as $produto): ?>

                <div class="card card-produto">

                    <?php if(!empty($produto['foto1'])): ?>
                        <img src="../uploads/produtos/<?= $produto['foto1']; ?>" alt="<?= $produto['nomeProd']; ?>">
                    <?php else: ?>
                        <img src="../imagem/carrinho.jpg" alt="Imagem padrão">
                    <?php endif; ?>

                    <div class="info-produto">

                        <div class="nome-produto">
                            <?= $produto['nomeProd']; ?>
                        </div>

                        <div class="categoria">
                            <?= $produto['categoria']; ?>
                        </div>

                        <div class="preco">
                            R$ <?= number_format($produto['preco'], 2, ',', '.'); ?>
                        </div>

                        <a class="btn-card" href="../controller/adicionarCarrinho.php?id=<?= $produto['idProduto']; ?>">
                            Comprar
                        </a>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
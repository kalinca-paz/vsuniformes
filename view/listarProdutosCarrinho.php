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

        <h2 class="tituloForm">Nossos Produtos</h2>

        <div class="grid">

            <?php foreach($produtos as $produto): ?>

                <div class="card card-admin">

                    <?php if(!empty($produto['foto1'])): ?>
                        <img src="../uploads/produtos/<?= $produto['foto1']; ?>" alt="<?= $produto['nomeProd']; ?>">
                    <?php else: ?>
                        <img src="../imagem/carrinho.jpg" alt="Imagem padrão">
                    <?php endif; ?>

                    <div class="info-produto">

                        <h3 class="tecnologias"><?= $produto['nomeProd']; ?></h3>

                        <p class="texto" style="margin-bottom: 5px;">
                            <strong>Categoria:</strong> <?= $produto['categoria']; ?>
                        </p>

                        <p class="texto" style="font-size: 18px; font-weight: bold; color: var(--titulo); margin-bottom: 15px;">
                            R$ <?= number_format($produto['preco'], 2, ',', '.'); ?>
                        </p>

                        <div class="botoes-grupo">
                            <a class="btn-orcamento" href="../controller/adicionarCarrinho.php?id=<?= $produto['idProduto']; ?>">
                                Adicionar ao Carrinho
                            </a>
                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
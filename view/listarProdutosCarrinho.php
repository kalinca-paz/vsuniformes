<!--listarProdutosCarrinho.php -->
<?php
session_start();
require_once "../conexao/Conexao.php";
require_once "../model/ClassProdutoDAO.php";
require_once "../model/ClassProduto.php";


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include 'includes/head.php'; ?>
</head>
<body>

 <!-- HEADER -->
  <?php include 'includes/menu.php'; ?>  
<?php

$produtoDAO = new ClassProdutoDAO();
$produtos = $produtoDAO->listarProdutos();

?><div class="container">

    <h2>Nossos Produtos</h2>

    <div class="container-produtos">

        <?php foreach($produtos as $produto): ?>

            <div class="card-produto">

                <?php if(!empty($produto['foto1'])): ?>
                    <img src="../uploads/produtos/<?php echo $produto['foto1']; ?>">
                <?php else: ?>
                    <img src="../imagem/carrinho.jpg">
                <?php endif; ?>

                <div class="info-produto">

                    <div class="nome-produto">
                        <?php echo $produto['nomeProd']; ?>
                    </div>

                    <div class="categoria">
                        <?php echo $produto['categoria']; ?>
                    </div>

                    <div class="preco">
                        R$ <?php echo number_format($produto['preco'],2,',','.'); ?>
                    </div>

                    <a class="btn-comprar"
                       href="../controller/adicionarCarrinho.php?id=<?php echo $produto['idProduto']; ?>">
                       Comprar
                    </a>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>
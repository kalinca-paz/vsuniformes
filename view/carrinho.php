<?php
session_start();
$carrinho = $_SESSION['carrinho'] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Meu Carrinho</title>
</head>
<body>
    <?php include 'includes/menu.php'; ?>
    <div class="container-voltar">
        <a href="listarProdutosCarrinho.php" class="btn-voltar">
            &larr; Voltar ao Catálogo
        </a>
    </div>

    <main class="container">

        <h2>Meu Carrinho</h2>

        <table class="tabela">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Subtotal</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($carrinho as $item):
                    $subtotal = $item['preco'] * $item['quantidade'];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><?= $item['nomeProd']; ?></td>
                        <td>R$ <?= number_format($item['preco'], 2, ',', '.'); ?></td>
                        <td>
                            <form action="../controller/atualizarQuantidade.php" method="POST" class="botoes-grupo">
                                <input type="hidden" name="id" value="<?= $item['idProduto']; ?>">
                                <input type="number" name="quantidade" value="<?= $item['quantidade']; ?>" min="1">
                                <button type="submit">Atualizar</button>
                            </form>
                        </td>
                        <td>R$ <?= number_format($subtotal, 2, ',', '.'); ?></td>
                        <td>
                            <a class="alerta-erro" href="../controller/removerCarrinho.php?id=<?= $item['idProduto']; ?>">
                                Remover
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                
                <tr>
                    <td colspan="3"><strong>Total Geral:</strong></td>
                    <td colspan="2"><strong>R$ <?= number_format($total, 2, ',', '.'); ?></strong></td>
                </tr>
            </tbody>
        </table>

        <div class="botoes-grupo">
            <a href="finalizarPedido.php" class="btn-orcamento">
                Finalizar Pedido
            </a>
            <a href="listarProdutosCarrinho.php" class="btn-card" style="background-color: #cccccc; color: #ffffff;">
                Continuar Comprando
            </a>
        </div>

    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
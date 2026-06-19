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
    <?php include 'includes/menu.php';?>

    <main class="container">
        
        <h2 class="tituloForm">🛒 Meu Carrinho</h2>

        <?php if (!empty($carrinho)): ?>
            <table class="tabela-preco">
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
                            <td style="font-weight: bold; color: var(--titulo);"><?= $item['nomeProd']; ?></td>
                            <td>R$ <?= number_format($item['preco'], 2, ',', '.'); ?></td>
                            <td>
                                <form action="../controller/atualizarQuantidade.php" method="POST" style="display: flex; gap: 5px; justify-content: center; align-items: center;">
                                    <input type="hidden" name="id" value="<?= $item['idProduto']; ?>">
                                    <input type="number" name="quantidade" value="<?= $item['quantidade']; ?>" min="1" style="width: 60px; padding: 5px; text-align: center; border: 1px solid var(--borda); border-radius: 4px;">
                                    <button type="submit" style="padding: 5px 10px; font-size: 12px; margin: 0;">Mudar</button>
                                </form>
                            </td>
                            <td style="font-weight: bold;">R$ <?= number_format($subtotal, 2, ',', '.'); ?></td>
                            <td>
                                <a href="../controller/removerCarrinho.php?id=<?= $item['idProduto']; ?>" class="alerta-erro" style="padding: 4px 8px; font-size: 12px;">
                                    Remover
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    
                    <tr style="background: #f8fafc; font-size: 16px;">
                        <td colspan="3" style="text-align: right; font-weight: bold;">Total Geral:</td>
                        <td colspan="2" style="text-align: left; font-weight: bold; color: #14532d; font-size: 18px;">
                            R$ <?= number_format($total, 2, ',', '.'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="botoes-grupo" style="flex-direction: row; gap: 15px; margin-top: 25px; justify-content: center;">
                <a href="listarProdutosCarrinho.php" style="flex: 1; max-width: 250px;">
                    <button type="button" style="width: 100%;">Continuar Comprando</button>
                </a>
                <a href="finalizarPedido.php" style="flex: 1; max-width: 250px;">
                    <button type="button" class="btn-orcamento" style="width: 100%;">Finalizar Pedido</button>
                </a>
            </div>

        <?php else: ?>
            <div class="card card-admin" style="text-align: center; padding: 40px 20px;">
                <p class="texto" style="font-size: 18px; margin-bottom: 20px;">Seu carrinho está vazio no momento.</p>
                <div class="botoes-grupo" style="justify-content: center;">
                    <a href="listarProdutosCarrinho.php">
                        <button type="button" class="btn-orcamento">Ver Produtos</button>
                    </a>
                </div>
            </div>
        <?php endif; ?>

    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
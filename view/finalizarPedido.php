<?php
session_start();

$total = 0;
if(isset($_SESSION['carrinho'])){
    foreach($_SESSION['carrinho'] as $item){
        $total += $item['preco'] * $item['quantidade'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Finalizar Pedido</title>
</head>
<body>
    <?php include 'includes/menu.php'; ?>

    <main class="container">
        
        <h2 class="tituloForm">🛒 Finalizar Pedido</h2>
        
        <form action="../controller/finalizarPedidoCarrinho.php" method="POST" class="form">
            
            <div class="info-item" style="text-align: center; background: #f8fafc; padding: 15px; border-radius: 8px; border: 1px solid var(--borda);">
                <h4>Valor Total do Pedido</h4>
                <p style="font-size: 24px; color: #14532d;">R$ <?= number_format($total, 2, ',', '.'); ?></p>
            </div>

            <div class="input-group">
                <label for="nome">Nome Completo</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
            </div>

            <div class="input-group">
                <label for="endereco">Endereço de Entrega</label>
                <textarea id="endereco" name="endereco" rows="4" placeholder="Rua, número, bairro, cidade e CEP" required></textarea>
            </div>

            <div class="botoes-grupo">
                <button type="submit" class="btn-orcamento">
                    Confirmar Pedido
                </button>
            </div>
            
        </form>

    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
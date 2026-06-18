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
<html>
<head>
<meta charset="utf-8">
<?php include 'includes/head.php'; ?>
<title>Finalizar Pedido</title>

</head>
<body>
<?php include 'includes/menu.php';?>

<div class="container">
    <h2>🛒 Finalizar Pedido</h2>
    <div class="total">
        Total: R$ <?= number_format($total,2,',','.'); ?>
    </div>
    <form action="../controller/finalizarPedidoCarrinho.php" method="POST">
        <label>Nome Completo</label>
        <input type="text" name="nome" required>

        <label>Endereço de Entrega</label>
        <textarea name="endereco" required></textarea>

        <button type="submit">
            Confirmar Pedido
        </button>
    </form>
</div>
</body>
</html>
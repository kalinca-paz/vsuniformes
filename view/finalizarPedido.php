<!-- finalizarPedido.php -->
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
    <title>Finalizar Pedido</title>
</head>
<body>
<?php include 'includes/menu.php'; ?>

<div class="container">
    <h2>Finalizar Pedido</h2>
    <div class="pedido">

    

        Total: R$ <?= number_format($total,2,',','.'); ?>
    </div>

    <form action="../controller/finalizarPedidoCarrinho.php" method="POST">
        <button type="submit">Confirmar Pedido</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>

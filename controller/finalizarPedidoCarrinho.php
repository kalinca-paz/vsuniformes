<?php
session_start();

unset($_SESSION['carrinho']);
?>
<script>
    alert('Pedido realizado com sucesso!');
    window.location.href = '../view/listarProdutosCarrinho.php';
</script>


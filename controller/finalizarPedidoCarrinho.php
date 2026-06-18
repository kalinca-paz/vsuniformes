<?php
session_start();
/*
Aqui futuramente você poderá:
- salvar pedido no banco
- salvar itens do pedido
- gerar PIX
- enviar e-mail
*/
unset($_SESSION['carrinho']);
?>
<script>
    alert('✅ Pedido realizado com sucesso!');
    window.location.href = '../view/listarProdutosCarrinho.php';
</script>


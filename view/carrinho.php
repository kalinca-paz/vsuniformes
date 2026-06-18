<?php
session_start();
$carrinho = $_SESSION['carrinho'] ?? [];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <?php include 'includes/head.php'; ?>
    <title>Carrinho</title>
    <style>
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background: #4CAF50;
            color: white;
        }
    </style>
    
</head>
<body>
<?php include 'includes/menu.php';?>
    <h2 align=center>Meu Carrinho</h2>
    <table border="1" width="80%">
        <tr>
            <th>Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Subtotal</th>
            <th>Ação</th>
        </tr>
        <?php
                $total = 0;
                foreach ($carrinho as $item):
                    $subtotal = $item['preco'] * $item['quantidade'];
                    $total += $subtotal;

        ?>
            <tr>
                <td>
                    <?= $item['nomeProd']; ?>
                </td>
                <td>
                    R$ <?= number_format($item['preco'], 2, ',', '.'); ?>
                </td>
                <td>
                    <form action="../controller/atualizarQuantidade.php" method="POST">
                        <input type="hidden"
                            name="id"
                            value="<?= $item['idProduto']; ?>">
                        <input type="number" 
                            name="quantidade"
                            value="<?= $item['quantidade']; ?>"
                            min="1" style="width:60px;" >
                        <button type="submit">
                            Atualizar
                        </button>
                    </form>
                </td>
                <td>
                    R$ <?= number_format($subtotal, 2, ',', '.'); ?>
                </td>
                <td>
                    <a href="../controller/removerCarrinho.php?id=<?= $item['idProduto']; ?>">
                        Remover
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">
                <strong>Total</strong>
            </td>
            <td colspan="2">
                <strong>
                    R$ <?= number_format($total, 2, ',', '.'); ?>
                </strong>
            </td>
        </tr>
    </table>
    <br>
    <center>
        <a href="listarProdutosCarrinho.php">
            Continuar Comprando
        </a>
        <br>
        <a href="finalizarPedido.php">Finalizar Pedido</a>
    </center>
</body>
</html>
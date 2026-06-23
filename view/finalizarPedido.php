<?php
session_start();
require_once "../conexao/Conexao.php";
require_once "../model/Cliente.php";

// 1. Verifica se o usuário está logado
$idUsuarioLogado = $_SESSION['idUsuario'] ?? null;

if (!$idUsuarioLogado) {
    echo "<script>
            alert('Você precisa estar logado para finalizar o pedido.');
            window.location.href = 'login.php';
          </script>";
    exit;
}

$pdo = Conexao::getInstance();
$clienteModel = new Cliente($pdo);

// 2. Busca AUTOMATICAMENTE o cliente vinculado a este usuário logado
$cliente = $clienteModel->buscarPorUsuario($idUsuarioLogado);

if (!$cliente) {
    echo "<script>
            alert('Cadastro de cliente não encontrado para este usuário.');
            window.location.href = 'cadastrarCliente.php';
          </script>";
    exit;
}

// 3. Calcula o total do carrinho
$total = 0;
if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $item) {
        $total += $item['preco'] * $item['quantidade'];
    }
} else {
    echo "<script>
            alert('Seu carrinho está vazio!');
            window.location.href = 'listarProdutosCarrinho.php';
          </script>";
    exit;
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
        
        <h2 class="tituloForm">Confirmar e Finalizar Pedido</h2>
        
        <form action="../controller/finalizarPedidoCarrinho.php" method="POST" class="form">
            
            <input type="hidden" name="idCliente" value="<?= $cliente['idCliente']; ?>">
            <input type="hidden" name="totalPedido" value="<?= $total; ?>">

            <div class="card-admin">
                <h3 class="tecnologias">Dados do Cliente</h3>
                <p class="texto"><strong>Nome:</strong> <?= $cliente['nomeCliente']; ?></p>
                <p class="texto"><strong>E-mail:</strong> <?= $cliente['email']; ?></p>
                <p class="texto"><strong>Telefone:</strong> <?= $cliente['telefone']; ?></p>
                <p class="texto">
                    <strong>Documento:</strong> 
                    <?= !empty($cliente['cpf']) ? $cliente['cpf'] : $cliente['cnpj']; ?>
                </p>
                <p class="texto"><strong>Endereço de Entrega:</strong> <?= $cliente['endereco']; ?>, <?= $cliente['bairro']; ?> - <?= $cliente['cidade']; ?>/<?= $cliente['uf']; ?></p>
            </div>

            <div class="card">
                <h3 class="tecnologias">Resumo Financeiro</h3>
                <p class="texto">
                    <strong>Total a Pagar:</strong> R$ <?= number_format($total, 2, ',', '.'); ?>
                </p>
            </div>

            <div class="input-group">
                <label for="observacoes">Observações ou Instruções de Entrega (Opcional)</label>
                <textarea id="observacoes" name="observacoes" rows="3" placeholder="Caso precise mudar o endereço ou deixar instruções, digite aqui..."></textarea>
            </div>

            <div class="botoes-grupo">
                <button type="submit" class="btn-orcamento">Confirmar e Fechar Pedido</button>
                <a href="carrinho.php">
                    <button type="button">Voltar ao Carrinho</button>
                </a>
            </div>
            
        </form>

    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
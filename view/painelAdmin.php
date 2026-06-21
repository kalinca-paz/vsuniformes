<!-- painelAdmin.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Painel de Administração</title>
</head>
<body>

<?php include 'includes/menu.php'; ?>

<h2 class="tituloForm">Painel Administrativo</h2>

<div class="admin-grid">

    <!-- USUÁRIOS -->
    <div class="card-admin">
        <a href="listarUsuarios.php">
            <img src="../img/boneco.png" alt="Usuários">
        </a>
        <p>Usuários</p>
    </div>

    <div class="card-admin">
        <a href="listarClientes.php">
            <img src="../img/boneco.png" alt="Clientes">
        </a>
        <p>Clientes</p>
    </div>

    <div class="card-admin">
        <a href="cadastrarCliente.php">
            <img src="../img/boneco.png" alt="Cadastrar Clientes">
        </a>
        <p>Cadastrar Clientes</p>
    </div>

    <!-- PRODUTOS -->
    <div class="card-admin">
        <a href="listarProdutos.php">
            <img src="../img/boneco.png" alt="Produtos">
        </a>
        <p>Produtos</p>
    </div>

    <div class="card-admin">
        <a href="cadastrarProdutos.php">
            <img src="../img/boneco.png" alt="Cadastrar Produtos">
        </a>
        <p>Cadastrar Produtos</p>
    </div>

    <!-- CARRINHO -->
    <div class="card-admin">
        <a href="listarProdutosCarrinho.php">
            <img src="../img/boneco.png" alt="Carrinho">
        </a>
        <p>Carrinho</p>
    </div>

</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>

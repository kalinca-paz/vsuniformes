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
           <img src="../img/sem-protecao.png" alt="Usuários">
        </a>
        <p>Usuários</p>
    </div>

    <div class="card-admin">
        <a href="cadastrarUsuarios.php">
            <img src="../img/sem-protecao.png" alt="Usuários">
        </a>
        <p>Cadastrar Usuários</p>
    </div>


    <div class="card-admin">
        <a href="listarClientes.php">
            <img src="../img/sem-protecao.png" alt="Clientes">
        </a>
        <p>Clientes</p>
    </div>

    <!-- PRODUTOS -->
    <div class="card-admin">
        <a href="listarProdutos.php">
            <img src="../img/sem-protecao.png" alt="Produtos">
        </a>
        <p>Produtos</p>
    </div>

    <div class="card-admin">
        <a href="cadastrarProdutos.php">
            <img src="../img/sem-protecao.png" alt="Cadastrar Produtos">
        </a>
        <p>Cadastrar Produtos</p>
    </div>

    <!-- CARRINHO -->

</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>

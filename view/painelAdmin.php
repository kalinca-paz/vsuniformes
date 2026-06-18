  <?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'includes/head.php'; ?>
  <title>Painel de Administração</title>
</head>
<body>
<?php include 'includes/menu.php'; ?>
<?php include 'includes/footer.php'; ?>
    <h2>Painel Admin</h2>

    <div style="display:inline-block; margin:20px; text-align:center;">
        <a href="../view/listarUsuarios.php">
            <img src="../img/boneco.png" width="300px" alt="Usuários">
        </a>
        <p>Listar Usuários</p>
    </div>

    <div style="display:inline-block; margin:20px; text-align:center;">
        <a href="../view/cadastrarProdutos.php">
            <img src="../img/boneco.png" width="300px" alt="Cadastrar Produtos">
        </a>
        <p>Cadastrar Produtos</p>
    </div>

    <div style="display:inline-block; margin:20px; text-align:center;">
        <a href="../view/listarProdutos.php">
            <img src="../img/boneco.png" width="300px" alt="Produtos">
        </a>
        <p>Listar Produtos</p>
    </div>

    <div style="display:inline-block; margin:20px; text-align:center;">
        <a href="../view/listarClientes.php">
            <img src="../img/boneco.png" width="300px" alt="Clientes">
        </a>
        <p>Listar Clientes</p>
    </div>

</center>
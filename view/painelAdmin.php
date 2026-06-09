  <?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Empresa Exemplo</title>
  <link rel=stylesheet href="../css/estilo.css">
</head>
<body>
    <!-- HEADER -->
  <header>
    <h1>MinhaEmpresa</h1>
    <nav>
      <a href="index.php">Início</a>
      <a href="#">Sobre</a>
      <a href="#">Serviços</a>
        <?php
        if (isset($_SESSION['nome'])) {
          echo "Bem-vindo, " . $_SESSION['nome'];
		  echo "<a href='view/painelAdmin.php'>Painel Admin</a>";
          echo ' | <a href="controller/logout.php">Sair</a>';
        } else {
          echo '<a href="view/login.php">Login</a>';
        }
        ?>
    </nav>
  </header><center>
    <h2>Painel Admin</h2>

    <div style="display:inline-block; margin:20px; text-align:center;">
        <a href="../view/listarUsuarios.php">
            <img src="../imagem/usuario.jpg" width="300px" alt="Usuários">
        </a>
        <p>Listar Usuários</p>
    </div>

    <div style="display:inline-block; margin:20px; text-align:center;">
        <a href="../view/cadastrarProdutos.php">
            <img src="../imagem/usuario.jpg" width="300px" alt="Cadastrar Produtos">
        </a>
        <p>Cadastrar Produtos</p>
    </div>

    <div style="display:inline-block; margin:20px; text-align:center;">
        <a href="../view/listarProdutos.php">
            <img src="../imagem/usuario.jpg" width="300px" alt="Produtos">
        </a>
        <p>Listar Produtos</p>
    </div>

    <div style="display:inline-block; margin:20px; text-align:center;">
        <a href="../view/listarFuncionarios.php">
            <img src="../imagem/usuario.jpg" width="300px" alt="Funcionários">
        </a>
        <p>Listar Funcionários</p>
    </div>

</center>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Itens da Venda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="../css/estilo.css">
<style>
        body{
            width:1000px;
            margin:auto;
            font-family:Arial;
        }
        input, textarea{
            width:100%;
            padding:10px;
            margin-bottom:10px;
        }
        button{
            padding:10px 20px;
        }
        </style>
</head>
<body>
   <header>
    <h1>MinhaEmpresa2</h1>
    <nav>
      <a href="../index.php">Início</a>
      <a href="#">Sobre</a>
      <a href="#">Serviços</a>
        <?php
            if (isset($_SESSION['nome'])) {
            echo "Bem-vindo, " . $_SESSION['nome'];
            echo "<a href='../view/painelAdmin.php'>Painel Admin</a>";
            echo ' | <a href="controller/logout.php">Sair</a>';
            } else {
            echo '<a href="../view/login.php">Login</a>';
            }
        ?>
    </nav>
  </header>

<h2>Cadastro de Cliente</h2>

<form action="../controller/ClienteController.php" method="post">
    <input type="hidden" name="acao" value="cadastrar">
    Nome:<br>
    <input type="text" name="nome" required><br><br>
    Endereço:<br>
    <input type="text" name="endereco" required><br><br>
    CEP:<br>
    <input type="text" name="cep" required><br><br>
    Bairro:<br>
    <input type="text" name="bairro" required><br><br>
    Cidade:<br>
    <input type="text" name="cidade" required><br><br>
    UF:<br>
    <input type="text" name="uf" maxlength="2" required><br><br>
    Telefone:<br>
    <input type="text" name="telefone" required><br><br>
    E-mail:<br>
    <input type="email" name="email" required><br><br>
    CPF:<br>
    <input type="text" name="cpf" required><br><br>
    <button type="submit">
        Salvar Cliente
    </button>
</form>
</body>
</html>
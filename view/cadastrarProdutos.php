<!-- cadastrarProdutos.php -->
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

<h2>Cadastro de Produto</h2>

<?php
if(isset($_SESSION['mensagem'])){
    echo "<p>" . $_SESSION['mensagem'] . "</p>";
    unset($_SESSION['mensagem']);
}
?>

<form action="../controller/ProdutoController.php"
      method="post"
      enctype="multipart/form-data">

    <label>Nome</label>
    <input type="text" name="nome" required>

    <label>Categoria</label>
    <input type="text" name="categoria" required>

    <label>Preço</label>
    <input type="number"
           step="0.01"
           name="preco"
           required>

    <label>Foto 1</label>
    <input type="file" name="foto1">

    <label>Foto 2</label>
    <input type="file" name="foto2">

    <label>Foto 3</label>
    <input type="file" name="foto3">

    <label>Descrição</label>
    <textarea name="descricao"
              rows="5"
              required></textarea>

    <label>Estoque</label>
    <input type="number"
           name="estoque"
           required>

    <button type="submit">
        Salvar Produto
    </button>

</form>

</body>
</html>
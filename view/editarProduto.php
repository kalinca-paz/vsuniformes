<!-- editarProduto.php -->
 <?php
session_start();
require_once "../conexao/Conexao.php";
require_once "../model/ClassProdutoDAO.php";


if (!isset($_GET['idProdutos'])) {
    die("Produto não informado.");
}

$idproduto = $_GET['idProdutos'];

$produtoDAO = new ClassProdutoDAO();
$produto = $produtoDAO->buscarProduto($idproduto);

if (!$produto) {
    die("Produto não encontrado.");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel=stylesheet href="../css/estilo.css">

    <style>
        body{
            width:1000px;
            margin:auto;
            font-family:Arial;
        }
        input,
        textarea{
            width:100%;
            padding:10px;
            margin-bottom:10px;
        }
        img{
            border:1px solid #ccc;
            padding:5px;
            margin-bottom:10px;
        }
        button{
            padding:10px 20px;
            cursor:pointer;
        }
        .foto{
            margin-bottom:20px;
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header>
        <h1>MinhaEmpresa</h1>
        <nav>
            <a href="../index.php">Início</a>
            <a href="#">Sobre</a>
            <a href="#">Serviços</a>
            <!-- <a href="view/login.php">Login</a> -->
            <?php
            if (isset($_SESSION['nome'])) {
                echo "Bem-vindo, " . $_SESSION['nome'];
                 echo ' | <a href="../controller/logout.php">Sair</a>';
                // echo '<a href="../view/login.php">Login</a>';
               
            } else {
                echo '<a href="../view/login.php">Login</a>';
            }
            ?>
        </nav>
    </header>

<h2>Editar Produto</h2>

<form action="../controller/atualizarProduto.php"
      method="post"
      enctype="multipart/form-data">

    <input type="hidden"
           name="idproduto"
<<<<<<< HEAD
           value="<?php echo $produto['idProdutos']; ?>">

    <label>Nome</label>
    <input type="text"
           name="nomeProd"
           value="<?php echo $produto['nomeProd']; ?>"
=======
           value="<?php echo $produto['idproduto']; ?>">

    <label>Nome</label>
    <input type="text"
           name="nome"
           value="<?php echo $produto['nome']; ?>"
>>>>>>> e6ec54cb21e34494f6cb07045ef965cf6c25c532
           required>

    <label>Categoria</label>
    <input type="text"
           name="categoria"
           value="<?php echo $produto['categoria']; ?>"
           required>

    <label>Preço</label>
    <input type="number"
           step="0.01"
           name="preco"
           value="<?php echo $produto['preco']; ?>"
           required>

    <div class="foto">

        <label>Foto 1 Atual</label><br>

        <?php if(!empty($produto['foto1'])): ?>
            <img src="../uploads/produtos/<?php echo $produto['foto1']; ?>"
                 width="150">
        <?php endif; ?>

        <input type="file" name="foto1">

        <input type="hidden"
               name="foto1_atual"
               value="<?php echo $produto['foto1']; ?>">
    </div>

    <div class="foto">

        <label>Foto 2 Atual</label><br>

        <?php if(!empty($produto['foto2'])): ?>
            <img src="../uploads/produtos/<?php echo $produto['foto2']; ?>"
                 width="150">
        <?php endif; ?>

        <input type="file" name="foto2">

        <input type="hidden"
               name="foto2_atual"
               value="<?php echo $produto['foto2']; ?>">
    </div>

    <div class="foto">

        <label>Foto 3 Atual</label><br>

        <?php if(!empty($produto['foto3'])): ?>
            <img src="../uploads/produtos/<?php echo $produto['foto3']; ?>"
                 width="150">
        <?php endif; ?>

        <input type="file" name="foto3">

        <input type="hidden"
               name="foto3_atual"
               value="<?php echo $produto['foto3']; ?>">
    </div>

    <label>Descrição</label>

    <textarea name="descricao"
              rows="6"
              required><?php echo $produto['descricao']; ?></textarea>

    <label>Estoque</label>

    <input type="number"
           name="estoque"
           value="<?php echo $produto['estoque']; ?>"
           required>

    <button type="submit">
        Atualizar Produto
    </button>

    <a href="listarProdutos.php">
        <button type="button">
            Voltar
        </button>
    </a>

</form>

</body>
</html>
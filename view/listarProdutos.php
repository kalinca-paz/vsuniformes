<!--listarProdutos.php -->
<?php
require_once "../conexao/Conexao.php";
require_once "../model/ClassProdutoDAO.php";
require_once "../model/ClassProduto.php";

session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
    <link rel=stylesheet href="../css/estilo.css">


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 95%;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #4CAF50;
            color: white;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-editar {
            background-color: #2196F3;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-excluir {
            background-color: #f44336;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            text-decoration: none;
        }

        img {
            border-radius: 5px;
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


    
<?php

$produtoDAO = new ClassProdutoDAO();
$produtos = $produtoDAO->listarProdutos();

?>

<div class="container">

    <h2>Listar Produtos</h2>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach($produtos as $produto): ?>

                <tr>

                    <td><?= $produto['idproduto']; ?></td>

                    <td>
                        <?php if(!empty($produto['foto1'])): ?>
                            <img src="../uploads/produtos/<?= $produto['foto1']; ?>" width="80">
                        <?php endif; ?>
                    </td>

                    <td><?= $produto['nome']; ?></td>

                    <td><?= $produto['categoria']; ?></td>

                    <td>
                        R$ <?= number_format($produto['preco'], 2, ',', '.'); ?>
                    </td>

                    <td><?= $produto['estoque']; ?></td>

                    <td>
                            <a href="editarProduto.php?id=<?php echo $produto['idproduto']; ?>">
                                Editar
                            </a>

                            <a href="../controller/excluirProduto.php?id=<?php echo $produto['idproduto']; ?>"
                            onclick="return confirm('Deseja realmente excluir este produto?')">
                            Excluir
                            </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

</body>
</html>
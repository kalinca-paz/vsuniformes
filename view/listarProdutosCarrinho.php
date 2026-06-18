<!--listarProdutosCarrinho.php -->
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
    <link rel=stylesheet href="../css/style.css">
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
        .container-produtos{
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card-produto{
            width: 250px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .card-produto:hover{
            transform: translateY(-5px);
        }

        .card-produto img{
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .info-produto{
            padding: 15px;
        }

        .nome-produto{
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .categoria{
            color: #777;
            margin-bottom: 10px;
        }

        .preco{
            color: #4CAF50;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .btn-comprar{
            display: block;
            text-align: center;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
        }

        .btn-comprar:hover{
            background: #388E3C;
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
            <?php
            if (isset($_SESSION['nome'])) {
                echo "Bem-vindo, " . $_SESSION['nome'];

                        $qtdeCarrinho = 0;
                        if(isset($_SESSION['carrinho'])){
                            foreach($_SESSION['carrinho'] as $item){
                                $qtdeCarrinho += $item['quantidade'];
                            }
                        }
                        ?>
                        <a href="carrinho.php">
                🛒              Carrinho (<?= $qtdeCarrinho; ?>)
                         </a>
                       <?php
             echo ' | <a href="../controller/logout.php">Sair</a>';
               
            } else {
                echo '<a href="../view/login.php">Login</a>';
            }
            ?>
            
        </nav>
    </header>
<?php

$produtoDAO = new ClassProdutoDAO();
$produtos = $produtoDAO->listarProdutos();

?><div class="container">

    <h2>Nossos Produtos</h2>

    <div class="container-produtos">

        <?php foreach($produtos as $produto): ?>

            <div class="card-produto">

                <?php if(!empty($produto['foto1'])): ?>
                    <img src="../uploads/produtos/<?php echo $produto['foto1']; ?>">
                <?php else: ?>
                    <img src="../imagem/carrinho.jpg">
                <?php endif; ?>

                <div class="info-produto">

                    <div class="nome-produto">
                        <?php echo $produto['nomeProd']; ?>
                    </div>

                    <div class="categoria">
                        <?php echo $produto['categoria']; ?>
                    </div>

                    <div class="preco">
                        R$ <?php echo number_format($produto['preco'],2,',','.'); ?>
                    </div>

                    <a class="btn-comprar"
                       href="../controller/adicionarCarrinho.php?id=<?php echo $produto['idProduto']; ?>">
                       🛒 Comprar
                    </a>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>
</body>
</html>
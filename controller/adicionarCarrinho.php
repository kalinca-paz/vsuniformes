<?php

session_start();

require_once "../conexao/Conexao.php";
require_once "../model/ClassProdutoDAO.php";

$id = $_GET['id'];

$produtoDAO = new ClassProdutoDAO();
$produto = $produtoDAO->buscarProdutoPorId($id);

if ($produto) {

    $_SESSION['carrinho'][$id] = [
        'idProduto' => $produto['idProduto'],
        'nomeProd'  => $produto['nomeProd'],
        'preco'     => $produto['preco'],
        'quantidade' => isset($_SESSION['carrinho'][$id])
                        ? $_SESSION['carrinho'][$id]['quantidade'] + 1
                        : 1
    ];
}

header("Location: ../view/listarProdutosCarrinho.php");
exit;
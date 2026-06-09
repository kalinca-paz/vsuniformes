<?php

session_start();

require_once("../model/ProdutoVenda.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $produtos_id = $_POST['produtos_id'];
    $vendas_id   = $_POST['vendas_id'];
    $itemVendido = trim($_POST['itemVendido']);
    $valorItem   = $_POST['valorItem'];

    try {

        $produtoVenda = new ProdutoVenda();

        $resultado = $produtoVenda->salvar(
            $produtos_id,
            $vendas_id,
            $itemVendido,
            $valorItem
        );

        if ($resultado) {

            $_SESSION['mensagem'] =
                "Item da venda cadastrado com sucesso!";

        } else {

            $_SESSION['mensagem'] =
                "Não foi possível cadastrar o item.";

        }

    } catch (Exception $e) {

        $_SESSION['mensagem'] =
            "Erro: " . $e->getMessage();

    }

    header("Location: ../view/cadastrarProdutos.php");
    exit;
}
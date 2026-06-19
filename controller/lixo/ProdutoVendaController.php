<?php

session_start();

require_once("../model/ProdutoVenda.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // CORREÇÃO 1: Verificação segura para não rejeitar o número 0 (zero)
    // Verifica se os campos existem no POST e se não são apenas espaços em branco
    if (
        !isset($_POST['produtos_id']) || $_POST['produtos_id'] === '' ||
        !isset($_POST['vendas_id']) || $_POST['vendas_id'] === '' ||
        !isset($_POST['itemVendido']) || trim($_POST['itemVendido']) === '' ||
        !isset($_POST['valorItem']) || $_POST['valorItem'] === ''
    ) {
        $_SESSION['mensagem'] = "Por favor, preencha todos os campos obrigatórios.";
        header("Location: ../view/cadastrarProdutos.php"); // Verifique se o nome desta view está correto
        exit;
    }

    // Captura e limpa os dados
    $produtos_id = intval($_POST['produtos_id']); // Garante que é um número inteiro
    $vendas_id   = intval($_POST['vendas_id']);   // Garante que é um número inteiro
    $itemVendido = trim($_POST['itemVendido']);
    
    // CORREÇÃO 2: Trata o valor monetário caso venha com a vírgula brasileira (ex: 25,90 -> 25.90)
    $valorItem   = str_replace(',', '.', $_POST['valorItem']);
    $valorItem   = floatval($valorItem); // Garante que é um número decimal

    try {
        $produtoVenda = new ProdutoVenda();

        $resultado = $produtoVenda->salvar(
            $produtos_id,
            $vendas_id,
            $itemVendido,
            $valorItem
        );

        if ($resultado) {
            $_SESSION['mensagem'] = "Item do orçamento inserido com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Não foi possível adicionar o item ao orçamento.";
        }
    } catch (Exception $e) {
        $_SESSION['mensagem'] = "Erro no sistema: " . $e->getMessage();
    }

    // Redireciona de volta para a página do formulário
    header("Location: ../view/cadastrarProdutos.php");
    exit;
}
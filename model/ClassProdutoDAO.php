<?php

require_once "../conexao/Conexao.php";
require_once "../model/ClassProduto.php";

class ClassProdutoDAO
{
    public function cadastrarProduto(ClassProduto $produto)
    {
        $sql = "INSERT INTO produtos (
            nomeProd,
            categoria,
            modelo,
            tamanho,
            cor,
            preco,
            foto1,
            foto2,
            foto3,
            descricao,
            estoque
        ) VALUES (
            :nomeProd,
            :categoria,
            :modelo,
            :tamanho,
            :cor,
            :preco,
            :foto1,
            :foto2,
            :foto3,
            :descricao,
            :estoque
        )";

        $conn = Conexao::getInstance();
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":nomeProd", $produto->getNome());
        $stmt->bindValue(":categoria", $produto->getCategoria());
        $stmt->bindValue(":modelo", $produto->getModelo());
        $stmt->bindValue(":tamanho", $produto->getTamanho());
        $stmt->bindValue(":cor", $produto->getCor());
        $stmt->bindValue(":preco", $produto->getPreco());
        $stmt->bindValue(":foto1", $produto->getFoto1());
        $stmt->bindValue(":foto2", $produto->getFoto2());
        $stmt->bindValue(":foto3", $produto->getFoto3());
        $stmt->bindValue(":descricao", $produto->getDescricao());
        $stmt->bindValue(":estoque", $produto->getEstoque());

        return $stmt->execute();
    }

    public function listarProdutos()
    {
        $sql = "SELECT * FROM produtos ORDER BY idProduto DESC";

        $conn = Conexao::getInstance();
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarProduto($idProduto)
    {
        $sql = "SELECT * FROM produtos WHERE idProduto = :idProduto";

        $conn = Conexao::getInstance();
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":idProduto", $idProduto);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarProduto(ClassProduto $produto)
    {
        $sql = "UPDATE produtos SET
            nomeProd = :nomeProd,
            categoria = :categoria,
            modelo = :modelo,
            tamanho = :tamanho,
            cor = :cor,
            preco = :preco,
            foto1 = :foto1,
            foto2 = :foto2,
            foto3 = :foto3,
            descricao = :descricao,
            estoque = :estoque
        WHERE idProduto = :idProduto";

        $conn = Conexao::getInstance();
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":idProduto", $produto->getId());
        $stmt->bindValue(":nomeProd", $produto->getNome());
        $stmt->bindValue(":categoria", $produto->getCategoria());
        $stmt->bindValue(":modelo", $produto->getModelo());
        $stmt->bindValue(":tamanho", $produto->getTamanho());
        $stmt->bindValue(":cor", $produto->getCor());
        $stmt->bindValue(":preco", $produto->getPreco());
        $stmt->bindValue(":foto1", $produto->getFoto1());
        $stmt->bindValue(":foto2", $produto->getFoto2());
        $stmt->bindValue(":foto3", $produto->getFoto3());
        $stmt->bindValue(":descricao", $produto->getDescricao());
        $stmt->bindValue(":estoque", $produto->getEstoque());
        
        return $stmt->execute();
    }

    public function excluirProduto($produto)
    {
        $sql = "DELETE FROM produtos WHERE idProduto = :idProduto";

        $conn = Conexao::getInstance();
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':idProduto', $produto);

        return $stmt->execute();
    }
    public function buscarProdutoPorId($produto){
        $sql = "SELECT * FROM produtos
                WHERE idProduto = :idProduto";
        $conn = Conexao::getInstance();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':idProduto', $produto);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
?>
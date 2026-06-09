
<!-- ClassProdutoDAO -->
<?php

require_once "../conexao/Conexao.php";
require_once "ClassProduto.php";

class ClassProdutoDAO
{
    public function cadastrarProduto(ClassProduto $produto)
    {
        $sql = "INSERT INTO produtos
        (
            nome,
            categoria,
            preco,
            foto1,
            foto2,
            foto3,
            descricao,
            estoque
        )
        VALUES
        (
            :nome,
            :categoria,
            :preco,
            :foto1,
            :foto2,
            :foto3,
            :descricao,
            :estoque
        )";

        $conn = Conexao::getInstance();

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":nome", $produto->getNome());
        $stmt->bindValue(":categoria", $produto->getCategoria());
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
        $sql = "SELECT * FROM produtos ORDER BY idproduto DESC";

        $conn = Conexao::getInstance();

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarProduto($idproduto)
    {
        $sql = "SELECT * FROM produtos
                WHERE idproduto = :idproduto";

        $conn = Conexao::getInstance();

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":idproduto", $idproduto);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarProduto(ClassProduto $produto)
    {
        $sql = "UPDATE produtos SET
                nome = :nome,
                categoria = :categoria,
                preco = :preco,
                foto1 = :foto1,
                foto2 = :foto2,
                foto3 = :foto3,
                descricao = :descricao,
                estoque = :estoque
                WHERE idproduto = :idproduto";

        $conn = Conexao::getInstance();

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":idproduto", $produto->getIdproduto());
        $stmt->bindValue(":nome", $produto->getNome());
        $stmt->bindValue(":categoria", $produto->getCategoria());
        $stmt->bindValue(":preco", $produto->getPreco());
        $stmt->bindValue(":foto1", $produto->getFoto1());
        $stmt->bindValue(":foto2", $produto->getFoto2());
        $stmt->bindValue(":foto3", $produto->getFoto3());
        $stmt->bindValue(":descricao", $produto->getDescricao());
        $stmt->bindValue(":estoque", $produto->getEstoque());

        return $stmt->execute();
    }

    public function excluirProduto($idproduto){
    $sql = "DELETE FROM produtos
            WHERE idproduto = :idproduto";

    $conn = Conexao::getInstance();

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':idproduto', $idproduto);

    return $stmt->execute();
   }
}
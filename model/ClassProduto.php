<!--ClassProduto.php -->

<?php

class ClassProduto
{
    private $idProdutos;
    private $nome;
    private $categoria;
    private $preco;
    private $foto1;
    private $foto2;
    private $foto3;
    private $descricao;
    private $estoque;

    public function getIdproduto()
    {
        return $this->idProdutos;
    }

    public function setIdproduto($idProdutos)
    {
        $this->idProdutos = $idProdutos;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getFoto1()
    {
        return $this->foto1;
    }

    public function setFoto1($foto1)
    {
        $this->foto1 = $foto1;
    }

    public function getFoto2()
    {
        return $this->foto2;
    }

    public function setFoto2($foto2)
    {
        $this->foto2 = $foto2;
    }

    public function getFoto3()
    {
        return $this->foto3;
    }

    public function setFoto3($foto3)
    {
        $this->foto3 = $foto3;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getEstoque()
    {
        return $this->estoque;
    }

    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }
}
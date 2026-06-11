<?php

class ClassProduto
{
    private $idProduto;
    private $nomeProd;
    private $categoria;
    private $modelo;
    private $tamanho;
    private $cor;
    private $preco;
    private $foto1;
    private $foto2;
    private $foto3;
    private $descricao;
    private $estoque;

    // ID
    public function getId()
    {
        return $this->idProduto;
    }

    public function setId($idProduto)
    {
        $this->idProduto = $idProduto;
    }

    // Nome
    public function getNome()
    {
        return $this->nomeProd;
    }

    public function setNome($nomeProd)
    {
        $this->nomeProd = $nomeProd;
    }

    // Categoria
    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    // Modelo
    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    // Tamanho
    public function getTamanho()
    {
        return $this->tamanho;
    }

    public function setTamanho($tamanho)
    {
        $this->tamanho = $tamanho;
    }

    // Cor
    public function getCor()
    {
        return $this->cor;
    }

    public function setCor($cor)
    {
        $this->cor = $cor;
    }

    // Preço
    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    // Fotos
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

    // Descrição
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    // Estoque
    public function getEstoque()
    {
        return $this->estoque;
    }

    public function setEstoque($estoque)
    {
        $this->estoque = $estoque;
    }
}
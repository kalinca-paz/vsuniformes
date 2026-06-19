<?php
require_once("../conexao/Conexao.php");

class Produto {
    private $pdo;

    private $nome;
    private $categoria;
    private $modelo;
    private $tamanho;
    private $cor;
    private $descricao;
    private $preco;
    private $foto1;
    private $foto2;
    private $foto3;
    private $estoque;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    // SETTERS
    public function setNome($nome){ $this->nome = $nome; }
    public function setCategoria($categoria){ $this->categoria = $categoria; }
    public function setModelo($modelo){ $this->modelo = $modelo; }
    public function setTamanho($tamanho){ $this->tamanho = $tamanho; }
    public function setCor($cor){ $this->cor = $cor; }
    public function setDescricao($descricao){ $this->descricao = $descricao; }
    public function setPreco($preco){ $this->preco = $preco; }
    public function setFoto1($foto1){ $this->foto1 = $foto1; }
    public function setFoto2($foto2){ $this->foto2 = $foto2; }
    public function setFoto3($foto3){ $this->foto3 = $foto3; }
    public function setEstoque($estoque){ $this->estoque = $estoque; }

    public function salvar()
    {
        $sql = "INSERT INTO produtos (
                    nomeProd,
                    categoria,
                    modelo,
                    tamanho,
                    cor,
                    descricao,
                    preco,
                    foto1,
                    foto2,
                    foto3,
                    estoque
                ) VALUES (
                    :nomeProd,
                    :categoria,
                    :modelo,
                    :tamanho,
                    :cor,
                    :descricao,
                    :preco,
                    :foto1,
                    :foto2,
                    :foto3,
                    :estoque
                )";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':nomeProd', $this->nome);
        $stmt->bindValue(':categoria', $this->categoria);
        $stmt->bindValue(':modelo', $this->modelo);
        $stmt->bindValue(':categoria', $this->categoria);
        $stmt->bindValue(':modelo', $this->modelo);
        $stmt->bindValue(':tamanho', $this->tamanho);
        $stmt->bindValue(':cor', $this->cor);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':foto1', $this->foto1);
        $stmt->bindValue(':foto2', $this->foto2);
        $stmt->bindValue(':foto3', $this->foto3);
        $stmt->bindValue(':estoque', $this->estoque);

        return $stmt->execute();
    }
}
?>
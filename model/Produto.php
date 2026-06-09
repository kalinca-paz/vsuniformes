
<!-- Produto.php -->
 
 <?php
require_once("../conexao/Conexao.php");

class Produto{
    private $pdo;
    
    private $idproduto;
    private $nome;
    private $categoria;
    private $preco;
    private $foto1;
    private $foto2;
    private $foto3;
    private $descricao;
    private $estoque;



    public function __construct(){
        $this->pdo = conexao::getInstance();
    }


    // metodos get e set:
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
    public function setPreco($preco){
        $this->preco = $preco;
    }
    public function setFoto1($foto1){
        $this->foto1 = $foto1;
    }
    public function setFoto2($foto2){
        $this->foto2 = $foto2;
    }
    public function setFoto3($foto3){
        $this->foto3 = $foto3;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function setEstoque($estoque){
        $this->estoque = $estoque;
    }


    public function salvar()
    {
        $sql = "INSERT INTO produtos
                (   nomeProd,
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
                    :nomeProd,
                    :categoria,
                    :preco,
                    :foto1,
                    :foto2,
                    :foto3,
                    :descricao,
                    :estoque
                )";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':nomeProd', $this->nome);
        $stmt->bindValue(':categoria', $this->categoria);
        $stmt->bindValue(':preco', $this->preco);
        $stmt->bindValue(':foto1', $this->foto1);
        $stmt->bindValue(':foto2', $this->foto2);
        $stmt->bindValue(':foto3', $this->foto3);
        $stmt->bindValue(':descricao', $this->descricao);
        $stmt->bindValue(':estoque', $this->estoque);


        return $stmt->execute();
    }
}
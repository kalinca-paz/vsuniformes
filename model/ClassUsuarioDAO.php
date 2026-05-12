<!-- ClassUsuarioDAO.php -->
<?php
require_once '../conexao/Conexao.php';
class ClassUsuarioDAO{//COMEÇO ClassUsuarioDAO.php
public function cadastrarUsuario($novoUsuario){
    try{
        $pdo = Conexao::getInstance();
        $sql = "INSERT INTO usuarios (nome,email,senha,tipo)
        VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($sql);// executa o sql
        $stmt->bindValue(1, $novoUsuario->getNome());
        $stmt->bindValue(2, $novoUsuario->getemail());
        $stmt->bindValue(3, $novoUsuario->getSenha());
        $stmt->bindValue(4, $novoUsuario->getTipo());
        $stmt->execute();
        return true;
    }/* fim try */ 
    catch (PDOExeption $erro){
        echo $erro->getMessage();
    }
    
}//FIM METODO cadastrarUsuario
}//FIM ClassUsuarioDAO.php
?>
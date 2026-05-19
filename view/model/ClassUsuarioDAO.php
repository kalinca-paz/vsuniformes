<!-- ClassUsuarioDAO.php -->
<?php
require_once '../conexao/Conexao.php';
class ClassUsuarioDAO{//COMEÇO ClassUsuarioDAO.php
public function cadastrarUsuario($novoUsuario){// método cadastrarUsuario
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
    } catch (PDOExeption $erro){
        echo $erro->getMessage();
    }
    
}//FIM METODO cadastrarUsuario

public function buscaUsuarios($novoUsuarios){//COMEÇO buscaUsuario
    //métodos
    //1 ->conexão
    //2 ->sql
    //3 ->prepare
    //4 ->bindvalue
    //5 ->execute
    //6 ->

        $pdo = Conexao::getInstance();//1 ->conexão
        $sql = "select * from Usuarios where
        email=:email and senha=:senha";//2 ->sql
        
        $stmt = $pdo->prepare($sql);//3 ->prepare
        $stmt->bindValue(':email', $novoUsuario->getemail());//4 ->bindvalue
        $stmt->bindValue(':senha', $novoUsuario->getSenha());
        $stmt->execute();//5 ->execute
        return $stmt->fetch(PDO::FETCH_ASSOC);
        
}//FIM MÉTODO buscaUsuario

public function listarUsuarios(){//COMEÇO listarUsuarios
    try {
        $pdo = Conexao::getInstance();//1 ->conexão
        $sql = "select * from Usuarios";//2 ->sql
        $stmt = $pdo->prepare($sql);//3 ->prepare
        $stmt->execute();//5 ->execute
        return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOExeption $erro){
            echo $erro->getMessage();
        }
        
        
}//FIM MÉTODO listarUsuarios

}//FIM CLASSE ClassUsuarioDAO.php    


?>
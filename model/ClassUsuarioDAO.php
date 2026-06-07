<!-- ClassUsuarioDAO.php -->
<?php
require_once '../conexao/Conexao.php';
class ClassUsuarioDAO
{//COMEÇO ClassUsuarioDAO.php
    public function cadastrarUsuario($novoUsuario)
    {// método cadastrarUsuario
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO usuarios (nome,email,senha,tipo)
        VALUES (?,?,?,?)";
            $stmt = $pdo->prepare($sql);// executa o sql
            $stmt->bindValue(1, $novoUsuario->getNome());
            $stmt->bindValue(2, $novoUsuario->getEmail());
           // $stmt->bindValue(3, $novoUsuario->getSenha());
           // criptografando a senha no cadastrar: md5
            $stmt->bindValue(3, md5($novoUsuario->getSenha()));
            $stmt->bindValue(4, $novoUsuario->getTipo());
            $stmt->execute();
            return true;
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }

    }//FIM METODO cadastrarUsuario

    public function buscaUsuario($novoUsuario)
    {
        try {
            $conexao = Conexao::getInstance();
            $sql = "SELECT * FROM usuarios WHERE email=:email AND senha=:senha";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':email', $novoUsuario->getEmail());
            $stmt->bindValue(':senha', $novoUsuario->getSenha());
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }//FIM MÉTODO buscaUsuario

    public function listarUsuarios()
    {//COMEÇO listarUsuarios
        try {
            $pdo = Conexao::getInstance();//1 ->conexão
            $sql = "SELECT * FROM usuarios";//2 ->sql
            $stmt = $pdo->prepare($sql);//3 ->prepare
            $stmt->execute();//5 ->execute
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }


    }//FIM MÉTODO listarUsuarios

    public function excluirUsuarios($novoUsuario)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM usuarios 
                WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $novoUsuario->getId());
            return $stmt->execute();
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }
    public function alterarUsuario($usuario)
    {
        try {
            $pdo = Conexao::getInstance();
            if(!empty($usuario->getSenha())){
            
            $sql = "UPDATE usuarios 
                SET nome = ?, email = ?, senha = ?, tipo = ?
                WHERE id = ?";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $usuario->getNome());
            $stmt->bindValue(2, $usuario->getEmail());
            $stmt->bindValue(3, md5($usuario->getSenha()));
            $stmt->bindValue(4, $usuario->getTipo());
            $stmt->bindValue(5, $usuario->getId());
        } else {
            $sql = "UPDATE usuarios 
            SET nome = ?, email = ?, tipo = ?
            WHERE id = ?";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $usuario->getNome());
            $stmt->bindValue(2, $usuario->getEmail());
            $stmt->bindValue(3, $usuario->getTipo());
            $stmt->bindValue(4, $usuario->getId());
    
        }
            $stmt->execute();
            return true;

        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }//fim do método alterar usuário.
    public function buscarUsuarioPorId($id)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM usuarios WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }// fim do método buscarUsuarioPorId

}//FIM CLASSE ClassUsuarioDAO.php    


?>
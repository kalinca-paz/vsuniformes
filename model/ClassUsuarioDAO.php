<?php
require_once '../conexao/Conexao.php';

class ClassUsuarioDAO
{
    public function cadastrarUsuario($novoUsuario)
    {
        try {
            $pdo = Conexao::getInstance();

            $sql = "INSERT INTO usuarios (nome, email, senha, tipo)
                    VALUES (?, ?, ?, ?)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $novoUsuario->getNome());
            $stmt->bindValue(2, $novoUsuario->getEmail());
            $stmt->bindValue(3, md5($novoUsuario->getSenha()));
            $stmt->bindValue(4, $novoUsuario->getTipo());

            return $stmt->execute();

        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }

    public function buscaUsuario($novoUsuario)
    {
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT * FROM usuarios 
                    WHERE email = :email AND senha = :senha";

            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(':email', $novoUsuario->getEmail());
            $stmt->bindValue(':senha', $novoUsuario->getSenha());

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }

    public function listarUsuarios()
    {
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT * FROM usuarios";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }

    public function excluirUsuarios($id)
    {
        try {
            $pdo = Conexao::getInstance();

            $sql = "DELETE FROM usuarios WHERE idUsuario = :id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":id", $id);

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

            if (!empty($usuario->getSenha())) {

                $sql = "UPDATE usuarios 
                        SET nome = ?, email = ?, senha = ?, tipo = ?
                        WHERE idUsuario = ?";

                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(1, $usuario->getNome());
                $stmt->bindValue(2, $usuario->getEmail());
                $stmt->bindValue(3, md5($usuario->getSenha()));
                $stmt->bindValue(4, $usuario->getTipo());
                $stmt->bindValue(5, $usuario->getId());

            } else {

                $sql = "UPDATE usuarios 
                        SET nome = ?, email = ?, tipo = ?
                        WHERE idUsuario = ?";

                $stmt = $pdo->prepare($sql);

                $stmt->bindValue(1, $usuario->getNome());
                $stmt->bindValue(2, $usuario->getEmail());
                $stmt->bindValue(3, $usuario->getTipo());
                $stmt->bindValue(4, $usuario->getId());
            }

            return $stmt->execute();

        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }

    public function buscarUsuarioPorId($id)
    {
        try {
            $pdo = Conexao::getInstance();

            $sql = "SELECT * FROM usuarios WHERE idUsuario = ?";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $id);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $erro) {
            echo $erro->getMessage();
            return false;
        }
    }
}
?>
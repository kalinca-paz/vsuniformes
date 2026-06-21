<?php
session_start();

require_once '../model/ClassUsuario.php';
require_once '../model/ClassUsuarioDAO.php';
require_once '../conexao/Conexao.php';

$novoUsuario = new ClassUsuario();

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$novoUsuario->setEmail($email);
$novoUsuario->setSenha($senha);

$usuarioDAO = new ClassUsuarioDAO();
$usuario = $usuarioDAO->buscaUsuario($novoUsuario);

if ($usuario) {

    
    $_SESSION['idUsuarios'] = $usuario['idUsuarios'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['tipo'] = $usuario['tipo'];

    echo "
    <script>
        alert('Login realizado com sucesso!');

        if ('{$usuario['tipo']}' === 'admin') {
            window.location.href = '../view/listarUsuarios.php';
        } else {
            window.location.href = '../index.php';
        }

    </script>
    ";

} else {
    echo "
    <script>
        alert('Usuário ou senha inválidos');
        window.location.href = '../view/login.php';
    </script>
    ";
}
?>
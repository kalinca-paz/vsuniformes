<!-- validarLogin.php -->
<?php
require_once '../model/ClassUsuario.php';
require_once '../model/ClassUsuarioDAO.php';
require_once '../conexao/Conexao.php';

session_start();

$novoUsuario = new ClassUsuario();
$email = $_POST['email'];
// $senha = $_POST['senha'];
$senha = md5($_POST['senha']);

$novoUsuario->setEmail($email);
$novoUsuario->setSenha($senha);

$usuarioDAO = new ClassUsuarioDAO();
$usuario = $usuarioDAO->buscaUsuario($novoUsuario);

if ($usuario) {
    $_SESSION['id'] = $usuario['id'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['tipo'] = $usuario['tipo'];

    if ($usuario['tipo'] == 'admin') {
        echo
            "<script>
            alert('Você fez logon com ADMINISTRADOR!')
            window.location.href = '../index.php';
        </script>";
    } else if ($usuario['tipo'] == 'usuario') {
        echo
            "<script>
            alert('Usuário logado com sucesso!')
            window.location.href = '../index.php';
        </script>";
    }
} else {
    echo
        "<script>
            alert('Email ou senha inválido!')
            window.location.href = '../view/login.php';
        </script>";

}
?>
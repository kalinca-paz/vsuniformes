<?php

require_once '../model/ClassUsuario.php';
require_once '../model/ClassUsuarioDAO.php';
require_once '../conexao/Conexao.php';

session_start();

$email = trim($_POST['email']);
$senha = md5($_POST['senha']);

$novoUsuario = new ClassUsuario();
$novoUsuario->setEmail($email);
$novoUsuario->setSenha($senha);

$usuarioDAO = new ClassUsuarioDAO();
$usuario = $usuarioDAO->buscaUsuario($novoUsuario);

if ($usuario) {

    $_SESSION['idUsuario'] = $usuario['idUsuario'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['tipo'] = $usuario['tipo'];

    if ($usuario['tipo'] == 'Administrador') {

        echo "
        <script>
            alert('Administrador logado com sucesso!');
            window.location.href='../index.php';
        </script>";
        exit;

    } else {

        echo "
        <script>
            alert('Usuário logado com sucesso!');
            window.location.href='../index.php';
        </script>";
        exit;
    }

} else {

    echo "
    <script>
        alert('Email ou senha inválidos!');
        window.location.href='../view/login.php';
    </script>";
    exit;
}
?>
<?php
session_start();

require_once '../model/ClassUsuario.php';
require_once '../model/ClassUsuarioDAO.php';
require_once '../conexao/Conexao.php';

// Verifica se os dados foram enviados por POST para evitar acessos diretos pela URL
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']); // Pegamos a senha limpa primeiro

    // Aplica o MD5 para comparar com o banco (certifique-se de que o DAO não faz isso de novo)
    $senhaCriptografada = md5($senha);

    $novoUsuario = new ClassUsuario();
    $novoUsuario->setEmail($email);
    $novoUsuario->setSenha($senhaCriptografada);

    $usuarioDAO = new ClassUsuarioDAO();
    $usuario = $usuarioDAO->buscaUsuario($novoUsuario);

    if ($usuario) {
        // Grava os dados do usuário na sessão
        $_SESSION['idUsuario'] = $usuario['idUsuario'];
        $_SESSION['nome']      = $usuario['nome'];
        $_SESSION['tipo']      = $usuario['tipo'];

        // Redireciona ambos para a index do site
        // (A index se encarregará de exibir o menu correto baseado no $_SESSION['tipo'])
        header("Location: ../index.php");
        exit;

    } else {
        // Alimenta a mensagem que vai aparecer na caixinha vermelha da tela de login
        $_SESSION['mensagem'] = "E-mail ou senha incorretos.";
        header("Location: ../view/login.php");
        exit;
    }
} else {
    // Se tentarem acessar o arquivo direto, manda de volta para o login
    header("Location: ../view/login.php");
    exit;
}
?>
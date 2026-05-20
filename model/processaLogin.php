<!-- processaLogin.php --
<?php
require_once '../model/ClassUsuario.php';
require_once '../model/ClassUsuarioDAO.php';
require_once '../conexao/Conexao.php';

// criando o objeto usuário
$novoUsuario = new ClassUsuario();

// setando os dados vindos do formulário
$novoUsuario->setEmail($_POST['email']);
$novoUsuario->setSenha($_POST['senha']);

$usuarioDAO = new ClassUsuarioDAO();

$usuario = $usuarioDAO->buscaUsuario($novoUsuario);

if ($usuario) {
    echo "
    <script>
        alert('Login realizado com sucesso!');
        window.location.href = '../view/listarUsuarios.php';
    </script>
    ";
} else {
    echo "Usuário ou senha inválidos";
}

?>
<!-- processaLogin.php --
<?php
require_once'../model/ClassUsuario.php';
require_once'../model/ClassUsuarioDAO.php';
require_once'../conexao/Conexao.php';


$novoUsuario = new ClassUsuario();

$novoUsuario->setEmail($email);
$novoUsuario->setSenha($senha);

$ClassUsuarioDAO = new ClassUsuarioDAO();
$usuario=$usuarioDAO->buscaUsuario($novoUsuario);

if($usuario){
    echo"
    <script>
        alert('Login realizado com sucesso!');
        window.location.href = '../view/listarUsuarios.php';
    </script>
    ";
} else {
    echo"Usuário ou senha inválidos";
}

?>
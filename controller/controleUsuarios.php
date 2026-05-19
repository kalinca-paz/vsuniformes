<!-- controle usuario -->
<?php
//chamar arquivos
require_once'../model/ClassUsuario.php';
require_once'../model/ClassUsuarioDAO.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];

$novoUsuario = new ClassUsuario();

$novoUsuario->setNome($nome);
$novoUsuario->setEmail($email);
$novoUsuario->setSenha($senha);
$novoUsuario->setTipo($tipo);

$novoUsuarioDAO = new ClassUsuarioDAO();

if ($novoUsuarioDAO->cadastrarUsuario($novoUsuario)){

    echo "<script>
    alert('Usuario cadastrado com sucesso!');
    window.location.href = '../view/login.php';
    </script>";
} else {
    echo"Erro ao cadastrar o usuário!";
}
?>
<!-- controle usuario -->
<?php
//chamar arquivos
session_start();
require_once '../conexao/Conexao.php';
require_once '../model/ClassUsuario.php';
require_once '../model/ClassUsuarioDAO.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];

$novoUsuario = new ClassUsuario();
$novoUsuario->setNome($nome);
$novoUsuario->setEmail($email);
$novoUsuario->setSenha($senha);
$novoUsuario->setTipo($tipo);

$ClassUsuarioDAO = new ClassUsuarioDAO();

$novoId = $ClassUsuarioDAO->cadastrarUsuario($novoUsuario);

if ($novoId) {
    echo "<script>
        alert('Usuário cadastrado! Agora cadastre os dados do cliente.');
        window.location.href = '../view/cadastrarCliente.php?idUsuario=$novoId';
    </script>";
} else {
    echo "Erro ao cadastrar o usuário!";
}
?>
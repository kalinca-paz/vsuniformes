<?php  
require_once '../model/ClassUsuarioDAO.php';
require_once '../model/ClassUsuario.php';

if (isset($_GET['idUsuario'])) {
    $novoUsuario = new ClassUsuario();
    $novoUsuario->setId($_GET['idUsuario']);
    $usuarioDAO = new ClassUsuarioDAO();

    if ($usuarioDAO->excluirUsuarios($novoUsuario->getId())) {
        header('Location: ../view/listarUsuarios.php');
        exit;
    } else {

    echo "Erro ao excluir o usuário.";
    }
} else {
    echo "Usuário não encontrado.";
}
?>
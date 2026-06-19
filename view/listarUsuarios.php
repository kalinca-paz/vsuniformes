<?php 
require_once "../conexao/Conexao.php";
require_once '../model/ClassUsuarioDAO.php';
require_once '../model/ClassUsuario.php';  

session_start();
$usuarioDAO = new ClassUsuarioDAO();
$novoUsuario = $usuarioDAO->listarUsuarios();
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <?php include 'includes/head.php'; ?>

<body>
    <?php include 'includes/menu.php'; ?>
<div class="container">

    <h2>Listar Usuários</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($novoUsuario as $usuario): ?>
                <tr>
                    <td><?= $usuario['idUsuario']; ?></td>
                    <td><?= $usuario['nome']; ?></td>
                    <td><?= $usuario['email']; ?></td>
                    <td><?= $usuario['tipo']; ?></td>

                    <td>
                        <a href="editarUsuarios.php?idUsuario=<?= $usuario['idUsuario']; ?>">
                            Editar
                        </a>

                        <a href="../controller/excluirUsuarios.php?idUsuario=<?= $usuario['idUsuario']; ?>">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>
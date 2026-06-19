<?php 
require_once "../conexao/Conexao.php";
require_once '../model/ClassUsuarioDAO.php';
require_once '../model/ClassUsuario.php';  

session_start();
$usuarioDAO = new ClassUsuarioDAO();
$listaUsuarios = $usuarioDAO->listarUsuarios(); // Renomeado para fazer mais sentido lógico
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Listar Usuários</title>
</head>
<body>
    <?php include 'includes/menu.php'; ?>

    <main class="container">

        <h2 class="tituloForm">Listar Usuários</h2>

        <table class="tabela-preco">
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
                <?php foreach ($listaUsuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario['idUsuario']; ?></td>
                        <td><?= $usuario['nome']; ?></td>
                        <td><?= $usuario['email']; ?></td>
                        <td><?= $usuario['tipo']; ?></td>

                        <td>
                            <a href="editarUsuarios.php?idUsuario=<?= $usuario['idUsuario']; ?>" class="tecnologias">
                                Editar
                            </a>
                            
                            <a href="../controller/excluirUsuarios.php?idUsuario=<?= $usuario['idUsuario']; ?>" class="alerta-erro" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                                Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
<?php
session_start();
require_once "../conexao/Conexao.php";
require_once '../model/ClassUsuarioDAO.php';
require_once '../model/ClassUsuario.php';  

$usuarioDAO = new ClassUsuarioDAO();
$novoUsuario = $usuarioDAO->listarUsuarios();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Listar Usuários</title>
</head>
<body>
    <?php include 'includes/menu.php'; ?>
    <div class="container-voltar">
        <a href="painelAdmin.php" class="btn-voltar">
            &larr; Voltar ao Painel
        </a>
    </div>
    
    <main class="container">

        <h2>Listar Usuários</h2>

        <table class="tabela">
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
                            <a class="btn-card" href="editarUsuarios.php?idUsuario=<?= $usuario['idUsuario']; ?>">
                                Editar
                            </a>
                            <a class="alerta-erro" href="../controller/excluirUsuarios.php?idUsuario=<?= $usuario['idUsuario']; ?>">
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
<?php
session_start();

require_once "../conexao/Conexao.php";
require_once "../model/Cliente.php";

$pdo = Conexao::getInstance();
$cliente = new Cliente($pdo);
$clientes = $cliente->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Lista de Clientes</title>
</head>
<body>
    
    <?php include 'includes/menu.php'; ?>

    <main class="container">

        <h2 class="tituloForm">Lista de Clientes</h2>

        <table class="tabela-preco">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($clientes)): ?>
                    <?php foreach($clientes as $c): ?>
                        <tr>
                            <td><?= $c['idCliente'] ?></td>
                            <td><?= $c['nomeCliente'] ?></td>
                            <td><?= $c['telefone'] ?></td>
                            <td><?= $c['email'] ?></td>

                            <td>
                                <a href="editarClientes.php?idCliente=<?= $c['idCliente'] ?>" class="tecnologias">
                                    Editar
                                </a>

                                <a href="../controller/ClienteController.php?acao=excluir&idCliente=<?= $c['idCliente'] ?>" class="alerta-erro" onclick="return confirm('Deseja realmente excluir este cliente?')">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="texto" style="text-align: center;">
                            Nenhum cliente cadastrado.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
<!-- listarClientes.php -->
<?php
session_start();

require_once "../conexao/Conexao.php";
require_once "../model/Cliente.php";

$pdo = Conexao::getInstance();
$cliente = new Cliente($pdo);
$clientes = $cliente->listar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include 'includes/head.php'; ?>
<title>Lista de Clientes</title>
</head>

<body>

<?php include 'includes/menu.php'; ?>

<div class="container">

<h2>Lista de Clientes</h2>

<table>
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
<?php foreach($clientes as $c): ?>
<tr>
    <td><?= $c['idCliente'] ?></td>
    <td><?= $c['nomeCliente'] ?></td>
    <td><?= $c['telefone'] ?></td>
    <td><?= $c['email'] ?></td>

    <td>
        <a class="editar"
           href="editarClientes.php?idCliente=<?= $c['idCliente'] ?>">
           Editar
        </a>

        <a class="excluir"
           href="../controller/ClienteController.php?acao=excluir&idCliente=<?= $c['idCliente'] ?>"
           onclick="return confirm('Deseja excluir?')">
           Excluir
        </a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>

</table>

</div>

</body>
</html>
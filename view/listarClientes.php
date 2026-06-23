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
<div class="container-voltar">
        <a href="painelAdmin.php" class="btn-voltar">
            &larr; Voltar ao Painel
        </a>
    </div>
<div class="container">

<h2>Lista de Clientes</h2>

<table class="tabela">
<thead>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>CPF</th>
    <th>CNPJ</th>
    <th>Razão Social</th>
    <th>Telefone</th>
    <th>Ações</th>
</tr>
</thead>

<tbody>
<?php foreach($clientes as $c): ?>
<tr>
    <td><?= $c['idCliente'] ?></td>
    <td><?= $c['nomeCliente'] ?></td>
    <td><?= $c['email'] ?></td>
    <td><?= $c['cpf'] ?></td>
    <td><?= $c['cnpj'] ?></td>
    <td><?= $c['razaoSocial'] ?></td>
    <td><?= $c['telefone'] ?></td>


    <td>
        <a class="btn-card"
           href="editarClientes.php?idCliente=<?= $c['idCliente'] ?>">
           Editar
        </a>

        <a class="alerta-erro"
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

<?php include 'includes/footer.php'; ?>
</body>
</html>

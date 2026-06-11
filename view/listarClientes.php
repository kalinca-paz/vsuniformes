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
<meta charset="UTF-8">
<title>Lista de Clientes</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/estilo.css">

<style>
body {
    font-family: Arial;
    background: #f4f7fc;
    margin: 0;
    padding: 30px;
}

.container {
    width: 95%;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background: #4CAF50;
    color: white;
}

a {
    padding: 6px 10px;
    text-decoration: none;
    color: white;
    border-radius: 5px;
}

.editar {
    background: #36b9cc;
}

.excluir {
    background: #e74a3b;
}
</style>
</head>

<body>

<header>
    <h1>MinhaEmpresa2</h1>
    <nav>
        <a href="../index.php">Início</a>

        <?php
        if (isset($_SESSION['nome'])) {
            echo "Bem-vindo, " . $_SESSION['nome'];
            echo " | <a href='../controller/logout.php'>Sair</a>";
        } else {
            echo '<a href="../view/login.php">Login</a>';
        }
        ?>
    </nav>
</header>

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
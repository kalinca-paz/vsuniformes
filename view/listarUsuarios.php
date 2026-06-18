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
<head>
    
    <title>Listar Usuários</title>
    

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 90%;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #4CAF50;
            color: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 4px;
            color: white;
            font-size: 14px;
        }

        a:first-child {
            background-color: #2196F3;
        }

        a:last-child {
            background-color: #f44336;
        }

        a:first-child:hover {
            background-color: #0b7dda;
        }

        a:last-child:hover {
            background-color: #da190b;
        }
    </style>
</head>

<body>
    <?php include 'includes/menu.php'; ?>
<div class="container">

    <h2>Listar Usuários</h2>

    <table border="1">
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
<?php
require_once "../conexao/Conexao.php";
require_once '../model/ClassUsuarioDAO.php';
require_once '../model/ClassUsuario.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 30px;
        }

        /* Container da tabela */
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            margin: auto;
        }

        /* Título */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Cabeçalho */
        thead {
            background-color: #4CAF50;
            color: white;
        }

        /* Células */
        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        /* Efeito hover */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Links */
        a {
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 4px;
            color: white;
            font-size: 14px;
        }

        /* Botão editar */
        a:first-child {
            background-color: #2196F3;
        }

        /* Botão excluir */
        a:last-child {
            background-color: #f44336;
        }

        /* Hover dos botões */
        a:first-child:hover {
            background-color: #0b7dda;
        }

        a:last-child:hover {
            background-color: #da190b;
        }
    </style>

</head>

<body>
    <div class="container">
        <h2>Listar Usuários </h2>
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
                        <td> /*INSIRA CÓDIGO AQUI */ </td>
                        <td> /*INSIRA CÓDIGO AQUI */ </td>
                        <td> /*INSIRA CÓDIGO AQUI */ </td>
                        <td> /*INSIRA CÓDIGO AQUI */</td>
                        <td> /*INSIRA CÓDIGO AQUI */</td>
                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>

    </div>
</body>

</html>
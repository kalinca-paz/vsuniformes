<?php 
require_once "../conexao/Conexao.php";
require_once '../model/ClassUsuarioDAO.php';
require_once '../model/ClassUsuario.php';  

session_start();
echo "<h2 style='text-align:center;'>Bem vindo ".$_SESSION['nome']."</h2>";

$usuarioDAO = new ClassUsuarioDAO();
$novoUsuario =$usuarioDAO->listarUsuarios() ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php';?>
<title>Listar Usuários</title>
    <?php include 'includes/menu.php';?>
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
            <td><?php echo $usuario['id']; ?></td>
            <td><?php echo $usuario['nome']; ?></td>
            <td><?php echo $usuario['email']; ?></td>
            <td><?php echo $usuario['tipo']; ?></td>

            <td>
                <a href="editarUsuarios.php?id=<?php echo $usuario['id']; ?>">
                    Editar
                </a>
 
               <a href="../controller/excluirUsuarios.php?id=<?php echo $usuario['id']; ?>">
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

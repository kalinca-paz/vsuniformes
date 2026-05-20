<!--editarUsuarios.php -->
<?php
require_once "../conexao/Conexao.php";
require_once "../model/ClassUsuarioDAO.php";
require_once "../model/ClassUsuario.php";

$usuarioDAO = new ClassUsuarioDAO();
$id = $_GET['id'];
$usuario = $usuarioDAO->buscarUsuarioPorId($id);

if ($_POST) {
    $novoUsuario = new ClassUsuario();

    $novoUsuario->setId($_POST['id']);
    $novoUsuario->setNome($_POST['nome']);
    $novoUsuario->setEmail($_POST['email']);
    $novoUsuario->setTipo($_POST['tipo']);

    $resultado = $usuarioDAO->alterarUsuario($novoUsuario);
    if($resultado) {
        echo "<script>
                alert('Usuário alterado com sucesso!');
                window.location.href = 'listarUsuarios.php';
            </script>";
    } else {
        echo "Erro ao alterar usuário";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <style>
    body {
        font-family: Arial;
        background-color: #f4f4f4;
        padding: 30px;
    }

    .container {
        width: 400px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
    }

    input,
    select {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 15px;
    }

    button {
        width: 100%;
        padding: 10px;
        background: #2196F3;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background: #0b7dda;
    }
    </style>
</head>
<body>

<div class="container">
    <h2>Editar Usuário</h2>
    <form method="POST">
        <input type="hidden" name="id"
        value="<?php echo $usuario['id']; ?>">
        <label>Nome</label>
        <input type="text" name="nome"
        value="<?php echo $usuario['nome']; ?>">
        <label>Email</label>
        <input type="email" name="email"
        value="<?php echo $usuario['email']; ?>">
        <label>Tipo</label>

        <select name="tipo">
            <option value="admin"
                <?php
                    if($usuario['tipo']=="admin"){
                        echo "selected";
                    }
                ?>>
                Admin
            </option>

            <option value="usuario"
                <?php
                if($usuario['tipo']=="usuario"){
                    echo "selected";
                }
                ?>>
              Usuário
            </option>
        </select>

        <button type="submit">
            Salvar Alterações
        </button>
    </form>
</div>
</body>
</html>
<!-- editarUsuarios.php -->
<?php
session_start();
require_once "../conexao/Conexao.php";
require_once "../model/ClassUsuarioDAO.php";
require_once "../model/ClassUsuario.php";

$usuarioDAO = new ClassUsuarioDAO();

$id = $_GET['idUsuario'];

$usuario = $usuarioDAO->buscarUsuarioPorId($id);

if ($_POST) {

    $novoUsuario = new ClassUsuario();

    $novoUsuario->setId($_POST['idUsuario']);
    $novoUsuario->setNome($_POST['nome']);
    $novoUsuario->setEmail($_POST['email']);
    $novoUsuario->setTipo($_POST['tipo']);

    // senha opcional
    $novoUsuario->setSenha($_POST['senha']);

    $resultado = $usuarioDAO->alterarUsuario($novoUsuario);

    if ($resultado) {
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
    <?php include 'includes/head.php'; ?>
    <title>Editar Usuário</title>
</head>
<body>

<?php include 'includes/menu.php'; ?>

<div class="container">

    <h2>Editar Usuário</h2>

    <form method="POST">

        <input type="hidden" name="idUsuario"
               value="<?= $usuario['idUsuario']; ?>">

        <label>Nome</label>
        <input type="text" name="nome"
               value="<?= $usuario['nome']; ?>">

        <label>Senha (deixe vazio para não alterar)</label>
        <input type="password" name="senha">

        <label>Email</label>
        <input type="email" name="email"
               value="<?= $usuario['email']; ?>">

        <label>Tipo</label>
        <select name="tipo">

            <option value="admin"
                <?= ($usuario['tipo'] == "admin") ? "selected" : ""; ?>>
                Admin
            </option>

            <option value="usuario"
                <?= ($usuario['tipo'] == "usuario") ? "selected" : ""; ?>>
                Usuário
            </option>

        </select>

        <button type="submit">Salvar Alterações</button>

    </form>

</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>

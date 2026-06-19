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
        echo "<div class='container'><div class='alerta-erro'>Erro ao alterar usuário.</div></div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Editar Usuário</title>
</head>
<body>

    <?php include 'includes/menu.php'; ?>

    <main class="container">

        <h2 class="tituloForm">Editar Usuário</h2>

        <form method="POST" class="form">

            <input type="hidden" name="idUsuario" value="<?= $usuario['idUsuario']; ?>">

            <div class="input-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" value="<?= $usuario['nome']; ?>" required>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= $usuario['email']; ?>" required>
            </div>

            <div class="input-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Deixe vazio para não alterar">
            </div>

            <div class="input-group">
                <label for="tipo">Tipo de Conta</label>
                <select id="tipo" name="tipo">
                    <option value="admin" <?= ($usuario['tipo'] == "admin") ? "selected" : ""; ?>>
                        Administrador
                    </option>
                    <option value="usuario" <?= ($usuario['tipo'] == "usuario") ? "selected" : ""; ?>>
                        Usuário Padrão
                    </option>
                </select>
            </div>

            <div class="botoes-grupo">
                <button type="submit">Salvar Alterações</button>
            </div>

        </form>

    </main>

    <?php include 'includes/footer.php'; ?>

</body>
</html>
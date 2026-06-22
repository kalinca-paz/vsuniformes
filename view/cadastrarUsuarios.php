<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include 'includes/head.php'; ?>

    <title>Cadastro</title>
</head>

<body>
<?php include 'includes/menu.php'; ?>
<div class="container-voltar">
        <a href="painelAdmin.php" class="btn-voltar">
            &larr; Voltar ao Painel
        </a>
    </div>

<h1 class="tituloForm">Cadastro de Usuário</h1>

<form class="form" action="../controller/UsuarioController.php" method="post">

    <p>
        <label>Nome completo:</label><br>
        <input type="text" name="nome" required>
    </p>

    <p>
        <label>Email:</label><br>
        <input type="email" name="email" required>
    </p>

    <p>
        <label>Senha:</label><br>
        <input type="password" name="senha" required>
    </p>

    <p>
        <label>Tipo de usuário:</label><br>
        <select name="tipo" required>
            <option value="cliente">Cliente</option>
            <option value="admin">Administrador</option>
        </select>
    </p>

    <p>
        <button class="btn-orcamento" type="submit">Cadastrar</button>
        <button type="button" onclick="history.back()">Voltar</button>
    </p>

</form>
<?php include 'includes/footer.php'; ?>
</body>
</html>
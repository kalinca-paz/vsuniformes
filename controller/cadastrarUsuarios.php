<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<header>
    <h1>MinhaEmpresa</h1>
    <nav>
        <a href="../index.php">Início</a>
        <a href="#">Sobre</a>
        <a href="#">Serviços</a>
    </nav>
</header>

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
            <option value="">Selecione</option>
            <option value="usuario">Usuário</option>
            <option value="admin">Admin</option>
        </select>
    </p>

    <p>
        <button type="submit">Cadastrar</button>
        <button type="button" onclick="history.back()">Voltar</button>
    </p>

</form>

</body>
</html>
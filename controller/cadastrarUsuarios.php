<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="../css/style.css">
</head>

<body>

    <!-- HEADER -->
    <header>
        <h1>MinhaEmpresa</h1>
        <nav>
            <a href="index.php">Início</a>
            <a href="#">Sobre</a>
            <a href="#">Serviços</a>
        </nav>
    </header>

    <h1 class="tituloForm">Cadastro</h1>

    <form class="form" action="../controller/controleUsuarios.php" method="post">

        <p>
            <label for="nome">Nome completo:</label><br>
            <input type="text" id="nome" name="nome" required>
        </p>

        <p>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
        </p>

        <p>
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" required>
        </p>

        <p>
            <label for="tipo">Tipo de usuário:</label><br>
            <select id="tipo" name="tipo" required>
                <option value="">Selecione</option>
                <option value="usuario">Usuário</option>
                <option value="admin">Admin</option>
            </select>
        </p>

        <p>
            <button type="submit">Cadastrar</button>
            &nbsp;
            <button type="button" onclick="history.back()">
                Voltar
            </button>
        </p>

    </form>



</body>

</html>
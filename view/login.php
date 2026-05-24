<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="../css/style.css">
</head>
<body>
    <?php include 'menu.php'; ?>
<center>

    <h1>--Login--</h1>

    <form action="../controller/validarLogin.php" method="post">

        <p>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required>
        </p>

        <p>
            <label for="senha">Senha:</label><br>
            <input type="password" id="senha" name="senha" required>
        </p>

        <p>
            <button type="submit">Entrar </button>
            <button type="button"> <a href="../controller/cadastrarUsuarios.php"> Cadastrar </a>  </button>
        </p>
    </form>
    
       

</center>

</body>
</html>

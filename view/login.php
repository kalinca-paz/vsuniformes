<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/head.php';?>
</head>
<body>
    <?php include 'includes/menu.php';?>
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

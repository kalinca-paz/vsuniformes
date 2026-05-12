<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="../css/estilo.css">
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
<center>

    <h1>Login</h1>
<form action="../model/processaLogin.php" method="post">


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

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    </head>
<body>
    <?php include 'includes/menu.php'; ?>

    <main class="login-container">
        <div class="login-box card">
            <h1 class="tituloForm">Acesso ao Sistema</h1>
            
            <form action="../controller/validarLogin.php" method="post" class="form">
                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                </div>

                <div class="input-group">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                </div>

                <div class="botoes-grupo">
                    <button type="submit" class="btn-entrar">Entrar</button>
                    <a href="../controller/cadastrarUsuarios.php" class="btn-cadastrar">Cadastrar</a>
                </div>
            </form>
        </div>
    </main>
     <?php include 'includes/footer.php'; ?>

</body>
</html>
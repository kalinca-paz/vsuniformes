<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Login</title>
</head>
<body>
    <?php include 'includes/menu.php'; ?>

    <main class="container">
        <div class="login-container">
            <div class="login-box card">
                <h1 class="tituloForm">Login</h1>
                
                <?php if (isset($_SESSION['mensagem'])): ?>
                    <div class="alerta-erro">
                        <?= $_SESSION['mensagem']; ?>
                    </div>
                    <?php unset($_SESSION['mensagem']); ?>
                <?php endif; ?>
                
                <form action="../controller/validarLogin.php" method="post" class="form card-login">
                    <div class="input-group">
                        <label for="email" class="tecnologias">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-group">
                        <label for="senha" class="tecnologias">Senha</label>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                    </div>

                    <div class="botoes-grupo">
                        <button type="submit" class="btn-orcamento">Entrar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
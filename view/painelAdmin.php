<?php
session_start();
// Dica: Futuramente, adicione aqui a verificação se o usuário logado realmente é do tipo 'admin'
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Painel de Administração</title>
</head>
<body>

    <?php include 'includes/menu.php'; ?>

    <main class="container">
        <h2 class="tituloForm">Painel Administrativo</h2>

        <div class="grid">

            <div class="card" style="text-align: center; flex: 1 1 calc(33.333% - 30px); min-width: 250px;">
                <a href="listarUsuarios.php">
                    <img src="../img/boneco.png" alt="Usuários" class="logo" style="width: 80px; height: auto; margin: 0 auto 15px auto;">
                    <h3>Usuários</h3>
                </a>
                <p class="texto">Gerenciar perfis de acessos</p>
            </div>

            <div class="card" style="text-align: center; flex: 1 1 calc(33.333% - 30px); min-width: 250px;">
                <a href="listarClientes.php">
                    <img src="../img/boneco.png" alt="Clientes" class="logo" style="width: 80px; height: auto; margin: 0 auto 15px auto;">
                    <h3>Clientes</h3>
                </a>
                <p class="texto">Visualizar clientes ativos</p>
            </div>

            <div class="card" style="text-align: center; flex: 1 1 calc(33.333% - 30px); min-width: 250px;">
                <a href="cadastrarCliente.php">
                    <img src="../img/boneco.png" alt="Cadastrar Clientes" class="logo" style="width: 80px; height: auto; margin: 0 auto 15px auto;">
                    <h3>Cadastrar Clientes</h3>
                </a>
                <p class="texto">Dar acesso a novos clientes</p>
            </div>

            <div class="card" style="text-align: center; flex: 1 1 calc(33.333% - 30px); min-width: 250px;">
                <a href="listarProdutos.php">
                    <img src="../img/boneco.png" alt="Produtos" class="logo" style="width: 80px; height: auto; margin: 0 auto 15px auto;">
                    <h3>Produtos</h3>
                </a>
                <p class="texto">Catálogo de peças e bordados</p>
            </div>

            <div class="card" style="text-align: center; flex: 1 1 calc(33.333% - 30px); min-width: 250px;">
                <a href="cadastrarProdutos.php">
                    <img src="../img/boneco.png" alt="Cadastrar Produtos" class="logo" style="width: 80px; height: auto; margin: 0 auto 15px auto;">
                    <h3>Cadastrar Produtos</h3>
                </a>
                <p class="texto">Inserir novos exemplares no site</p>
            </div>

            <div class="card" style="text-align: center; flex: 1 1 calc(33.333% - 30px); min-width: 250px;">
                <a href="listarProdutosCarrinho.php">
                    <img src="../img/boneco.png" alt="Carrinho" class="logo" style="width: 80px; height: auto; margin: 0 auto 15px auto;">
                    <h3>Carrinho</h3>
                </a>
                <p class="texto">Gerenciar itens e orçamentos</p>
            </div>

        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

</body>
</html>
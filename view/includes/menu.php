<!-- menu.php -->
<header>
    <a href="../view/sobre.php">
        <img src="../img/home1.png" class="logo" alt="logo da vs uniformes">
    </a>

    <nav>
        <ul>

            <?php if (isset($_SESSION['nome'])): ?>
                <li>
                    <span class="welcome-text">
                        Logado como <?php echo htmlspecialchars($_SESSION['nome']); ?>
                    </span>
                </li>
            <?php endif; ?>

            <li><a href="../index.php">Início</a></li>
            <li><a href="sobre.php">Sobre</a></li>
            <li><a href="contatos.php">Contato</a></li>
            <li><a href="portfolio.php">Portfólio</a></li>

            <?php if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin'): ?>

                <li>
                    <a href="painelAdmin.php">Painel</a>
                </li>

            <?php elseif (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'cliente'): ?>

                <li>
                    <a href="listarProdutosCarrinho.php">Comprar</a>
                </li>

                <?php
                $qtdeCarrinho = 0;

                if (isset($_SESSION['carrinho'])) {
                    foreach ($_SESSION['carrinho'] as $item) {
                        $qtdeCarrinho += $item['quantidade'];
                    }
                }
                ?>

                <li>
                    <a href="carrinho.php">
                        Carrinho (<?= $qtdeCarrinho; ?>)
                    </a>
                </li>

            <?php endif; ?>

            <?php if (isset($_SESSION['nome'])): ?>
                <li>
                    <a href="../controller/logout.php" class="sair">
                        Sair
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <a href="login.php">
                        Login
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </nav>
</header>
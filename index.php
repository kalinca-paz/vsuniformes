<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <title>Início - VS Uniformes</title>
</head>
<body>

    <header>
        <h1>VS uniformes</h1>
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="view/sobre.php">Sobre</a></li>
                <li><a href="view/contatos.php">Contato</a></li>
                <li><a href="view/portfolio.php">Portfólio</a></li> 
                <li><a href="view/login.php">Login</a></li>
            </ul>
        

        <div class="user-area">
            <?php
            if (isset($_SESSION['nome'])) {
                echo "<span>Bem-vindo, " . htmlspecialchars($_SESSION['nome']) . "</span> ";
                
                if ($_SESSION['tipo'] == 'admin') {
                    echo "<ul>";
                    echo "<li><a href='view/painelAdmin.php'>Painel</a></li>";
                    echo "<li><a href='controller/logout.php'>Sair</a></li>";
                    echo "</ul>";
                }
                
                
            } else {
                echo "<a href='view/login.php'>Login</a>";
            }
            ?>
        </div>
    </nav>
    </header>

    <section class="hero">
        <h2>Uniformes com profissionalismo e excelência</h2>
        <p>Confecção de uniformes executivos e profissionais</p>
        <a class="btn-orcamento" href="view/orcamento.php"> Faça seu orçamento </a>
    </section>

    <section class="sobre">
        <div class="container">
            <h2>Sobre Nós</h2>
            <p>Somos uma empresa familiar focada em confecção de uniformes e bordados profissionais e executivos com qualidade para nossos clientes.</p>
        </div>
    </section>

    <section class="servicos">
        <div class="container">
            <h2>Serviços</h2>
            <div class="grid">
                <div class="card">
                    <h3>Bordados</h3>
                    <p>Personalização de alta qualidade para sua marca.</p>
                </div>

                <div class="card">
                    <h3>Profissionais</h3>
                    <p>Uniformes operacionais confortáveis e resistentes.</p>
                </div>

                <div class="card">
                    <h3>Executivos</h3>
                    <p>Linha social fina para escritórios e atendimento.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contato">
        <div class="container">
            <h2>Contato</h2>
            <p>Email: u.vsuniformes@gmail.com</p>
            <p>Telefone: (61) 9 9545-5248</p>
        </div>
    </section>

    <?php include 'view/includes/footer.php'; ?>

</body>
</html>
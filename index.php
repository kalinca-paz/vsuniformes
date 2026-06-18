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
        <a href="view/sobre.php">
            <img src="img/home1.png" class="logo" alt="logo da vs uniformes">
        </a>
        <nav>
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="view/sobre.php">Sobre</a></li>
                <li><a href="view/contatos.php">Contato</a></li>
                <li><a href="view/portfolio.php">Portfólio</a></li>

                <?php if (isset($_SESSION['nome'])): ?>
                    <li><span class="welcome-text">Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?></span></li>

                    <?php if ($_SESSION['tipo'] == 'admin'): ?>
                        <li><a href="view/painelAdmin.php">Painel</a></li>
                    <?php endif; ?>

                    <li><a href="controller/logout.php">Sair</a></li>

                <?php else: ?>
                    <li><a href="view/login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h2>Uniformes com profissionalismo e excelência</h2>
        <p>Confecção de uniformes executivos e profissionais</p>
        <a class="btn-orcamento" href="view/orcamento.php"> Faça seu orçamento </a>
    </section>

    <section class="portfolio">
        <div class="texto-slide">
            <h1>Nosso Trabalho</h1>
            <p>Cada uniforme do nosso portfólio é construído com dedicação e precisão. Cuidamos de cada etapa da produção para garantir que sua equipe vista excelência, conforto e durabilidade.</p>
        </div>
        <div class="carrossel">
            <div class="slides">
                <img src="img/Gemini_Generated_Image_es2cbaes2cbaes2c (1).png">
                <img src="img/Gemini_Generated_Image_fjiorfjiorfjiorf.png">
                <img src="img/Gemini_Generated_Image_ktkxnpktkxnpktkx.png">
            </div>
            <button class="btn-slide esquerda">&#10094;</button>
            <button class="btn-slide direita">&#10095;</button>
        </div>
    </section>

    <section class="servicos">
        <div class="container">
            <h2>Nossos Serviços</h2>
            <div class="grid">
                <div class="card">
                    <h3>Bordados Computadorizados</h3>
                    <p>Personalização de alta precisão com fios resistentes, garantindo a identidade da sua marca em destaque e com alta durabilidade.</p>
                </div>

                <div class="card">
                    <h3>Uniformes Operacionais</h3>
                    <p>Linha profissional desenvolvida com tecidos reforçados, oferecendo máximo conforto, segurança e resistência para o dia a dia.</p>
                </div>

                <div class="card">
                    <h3>Linha Executiva</h3>
                    <p>Camisaria e alfaiataria social fina com caimento impecável, ideal para transmitir elegância e credibilidade no ambiente corporativo.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contato">
        <div class="container">
            <h2>Contato</h2>
            
            <div class="grid-contato">
                <div class="info-contato">
                    <div class="info-item">
                        <h4>E-mail Comercial</h4>
                        <p>u.vsuniformes@gmail.com</p>
                    </div>
                    
                    <div class="info-item">
                        <h4>Telefone / WhatsApp</h4>
                        <p>(61) 9 9545-5248</p>
                    </div>
                </div>

                <div class="mapa-container">
                     </div>
            </div>
        </div>
    </section>

    <?php include 'view/includes/footer.php'; ?>
    <script src="slide.js"></script>
</body>

</html>
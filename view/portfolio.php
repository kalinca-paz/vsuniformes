<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Portfólio</title>
</head>
<body>
    <?php include 'includes/menu.php'; ?>

    <main class="container">
        <div class="portfolio">
            
            <div class="texto-slide">
                <h1>Nosso Portfólio</h1>
                <p>
                    Conheça uma seleção dos nossos melhores trabalhos em uniformes empresariais, escolares e operacionais. 
                    Trabalhamos com tecidos de alta qualidade e bordados computadorizados premium de alta definição para garantir o melhor resultado para a sua marca.
                </p>
            </div>

            <div class="carrossel">
                <div class="slides">
                    <img src="../img/portfolio1.png" alt="Exemplar de Uniforme 1">
                    <img src="../img/portfolio2.png" alt="Exemplar de Uniforme 2">
                    <img src="../img/portfolio3.png" alt="Exemplar de Uniforme 3">
                </div>

                <button class="btn-slide esquerda" onclick="passarSlide(-1)">&#10094;</button>
                <button class="btn-slide direita" onclick="passarSlide(1)">&#10095;</button>
            </div>

        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
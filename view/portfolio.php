<!-- portfolio.php -->
 <?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Portfólio</title>
</head>
<body>
    <?php include 'includes/menu.php'; ?>
<main class="container">

    <h2>Nosso Portfólio</h2>

    <div class="portfolio-galeria">

        <div class="portfolio-item">
            <img src="../img/coral.png" alt="Uniforme Profissional">
            <div class="portfolio-legenda">Uniforme De Coral</div>
        </div>

        <div class="portfolio-item">
            <img src="../img/minha-clinica-cliente.png" alt="Camisa Polo">
            <div class="portfolio-legenda">Uniformes Femininos Bordados</div>
        </div>

        <div class="portfolio-item">
            <img src="../img/irmas.png" alt="Bordado Boné">
            <div class="portfolio-legenda">Uniformes femininos Personalizados</div>
        </div>

    </div>

</main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>

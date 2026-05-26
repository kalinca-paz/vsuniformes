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

    <!-- CABEÇALHO PADRÃO HTML -->
    
    <title>Início - VS Uniformes</title>
</head>
<body>
    <!-- HERO -->
    <section class="hero">
        <h2>Uniformes com profissionalismo e excelência</h2>
        <p>Confecção de uniformes executivos e profissionais</p>
        <a class="btn-orcamento" href="view/orcamento.php"> Faça seu orçamento </a>
    </section>
    <!-- MENU -->
<!-- menu.php -->
<!-- menu.php -->
<header>
    <h1>VS uniformes</h1>
    <nav>
        <ul>
            <li><a href="../index.php">Início</a></li>
            <li><a href="../view/sobre.php">Sobre</a></li>
            <li><a href="../view/contatos.php">Contato</a></li>
            <li><a href="../view/portifolio.php">Portifólio</a></li> 
            <li><a href="../view/login.php">Login</a></li>
        </ul>
    </nav
  <?php //include 'view/includes/menu.php'; ?>  
<?php
if (isset($_SESSION['nome'])) {
    echo "Bem-vindo," . $_SESSION['nome'];
    if ($_SESSION['tipo']=='admin') {
        echo "<a href='view/painelAdmin.php'>Painel Admin</a> ";
    echo "<a href='controller/logout.php'>Sair</a> ";
    } else {
        echo "<a href='view/login.php/'>Login</a>";
    }
}
?>
  

    <!-- SOBRE -->
    <section>
        <div class="container">
            <h2>Sobre Nós</h2>
            <p>Somos uma empresa familiar focada em confecção de uniformes e bordados profissionais e executivos com qualidade 
                clientes.</p>
        </div>
    </section>

    <!-- SERVIÇOS -->
    <section>
        <div class="container">
            <h2>Serviços</h2>
            <div class="grid">
                <div class="card">
                    <h3>Bordados</h3>
                    <p>Criação de sites responsivos e modernos.</p>
                </div>

                <div class="card">
                    <h3>Profissionais</h3>
                    <p>Interfaces bonitas e focadas na experiência do usuário.</p>
                </div>

                <div class="card">
                    <h3>Executivos</h3>
                    <p>Orientação para transformar sua presença digital.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTATO -->
    <section>
        <div class="container">
            <h2>Contato</h2>
            <p>Email: contato@empresa.com</p>
            <p>Telefone: (61) 99999-9999</p>
        </div>
    </section>

    <!-- RODAPÉ -->
    <?php include 'view/includes/footer.php'; ?>


</body>

</html>
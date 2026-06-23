<!-- informacao.php -->
 <?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include 'includes/head.php'; ?>
    <title>Contatos</title>
</head>
<body>
<?php include 'includes/menu.php'; ?>
<section>
    <div class="card-contato">
        <div class="card">
            <h3>Silvana</h3>
            <p>
                Costureira
            </p>
            <p> WhatsApp: (11) 1111-1111
            </p> 
            <p>Ceo da VS Uniformes</p>
        </div>
        <div class="card">
            <h3>Vicente</h3>
            <p>
                Motoboy e assistente
            </p>
            <p> WhatsApp: (22) 2222-2222
            </p> 
            <p>Funcionário</p>
        </div>
    </div>
</section>
<section>
    <div style="max-width: 500px; margin: 20px auto;">
    <table class="tabela">
        <thead>
            <tr>
                <th>Dia da Semana</th>
                <th>Horário de Funcionamento</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Segunda-feira</td>
                <td>08:00 às 18:00</td>
            </tr>
            <tr>
                <td>Terça-feira</td>
                <td>08:00 às 18:00</td>
            </tr>
            <tr>
                <td>Quarta-feira</td>
                <td>08:00 às 18:00</td>
            </tr>
            <tr>
                <td>Quinta-feira</td>
                <td>08:00 às 18:00</td>
            </tr>
            <tr>
                <td>Sexta-feira</td>
                <td>08:00 às 17:00</td>
            </tr>
            <tr>
                <td>Sábado</td>
                <td>08:00 às 12:00</td>
            </tr>
            <tr>
                <td>Domingo</td>
                <td><span style="color: var(--erro); font-weight: bold;">Fechado</span></td>
            </tr>
        </tbody>
    </table>
</div>
</section>



<!-- MAPA -->
<section>
    <div class="container">
        <h2 class="tituloForm">Onde nos encontrar</h2>
        <div class="mapa-container card">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122830.01183613781!2d-48.26766855664062!3d-15.833567400000009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935bcd7b0f3a4701%3A0x4a690f5173df8d7a!2sVS%20Uniformes!5e0!3m2!1spt-BR!2sbr!4v1779665397130!5m2!1spt-BR!2sbr" title="Localização da VS Uniformes" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>
</body>
</html>
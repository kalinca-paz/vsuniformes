<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Contatos</title>
</head>
<body>
    <?php include 'includes/menu.php'; ?>

    <main class="container">
        
        <h2 class="tituloForm">Fale Conosco</h2>

        <div class="grid" style="gap: 30px; align-items: start;">
            
            <form action="../controller/enviarContato.php" method="POST" class="form" style="flex: 2; min-width: 300px;">
                
                <div class="input-group">
                    <label for="nome">Seu Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                </div>

                <div class="input-group">
                    <label for="email">Seu E-mail</label>
                    <input type="email" id="email" name="email" placeholder="Ex: contato@email.com" required>
                </div>

                <div class="input-group">
                    <label for="assunto">Assunto</label>
                    <input type="text" id="assunto" name="assunto" placeholder="Ex: Dúvida sobre uniformes" required>
                </div>

                <div class="input-group">
                    <label for="mensagem">Mensagem</label>
                    <textarea id="mensagem" name="mensagem" rows="5" placeholder="Escreva sua mensagem aqui..." required></textarea>
                </div>

                <div class="botoes-grupo">
                    <button type="submit" class="btn-orcamento">Enviar Mensagem</button>
                </div>

            </form>

            <div class="card card-admin" style="flex: 1; min-width: 250px; padding: 20px;">
                <h3 class="tecnologias" style="margin-bottom: 15px; border-bottom: 1px solid var(--borda); padding-bottom: 5px;">
                    Canais de Atendimento
                </h3>
                
                <p class="texto" style="margin-bottom: 15px;">
                    <strong>📍 Endereço:</strong><br>
                    Rua Principal, 123 - Centro<br>
                    Cidade - UF
                </p>

                <p class="texto" style="margin-bottom: 15px;">
                    <strong>📞 Telefone:</strong><br>
                    (11) 99999-9999
                </p>

                <p class="texto" style="margin-bottom: 15px;">
                    <strong>✉️ E-mail:</strong><br>
                    comercial@vsuniformes.com.br
                </p>

                <p class="texto">
                    <strong>⏰ Horário de Funcionamento:</strong><br>
                    Segunda a Sexta: 08:00 às 18:00
                </p>
            </div>

        </div>

    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
<?php
session_start();

// Verifica se existe o ID do usuário logado na sessão para evitar falhas de FK
$idUsuarioLogado = $_SESSION['idUsuario'] ?? '';

// Captura o tipo selecionado e os dados preenchidos para não perdê-los no recarregamento
$tipo = $_POST['tipo'] ?? '';
$nomeCliente = $_POST['nomeCliente'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$cep = $_POST['cep'] ?? '';
$bairro = $_POST['bairro'] ?? '';
$cidade = $_POST['cidade'] ?? '';
$uf = $_POST['uf'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$email = $_POST['email'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Cadastrar Cliente</title>
</head>
<body>
    <?php include 'includes/menu.php'; ?>

    <main class="container">

        <h2 class="tituloForm">Cadastro de Cliente</h2>

        <form action="cadastrarCliente.php" method="post" class="form">
            
            <input type="hidden" name="acao" value="cadastrar">
            
            <input type="hidden" name="Usuario_idUsuario" value="<?= $idUsuarioLogado; ?>">

            <div class="input-group">
                <label for="nomeCliente">Nome / Nome Fantasia</label>
                <input type="text" id="nomeCliente" name="nomeCliente" value="<?= htmlspecialchars($nomeCliente); ?>" required>
            </div>

            <div class="grid">
                <div class="input-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($endereco); ?>" required>
                </div>

                <div class="input-group">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" value="<?= htmlspecialchars($cep); ?>" required>
                </div>
            </div>

            <div class="grid">
                <div class="input-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro" value="<?= htmlspecialchars($bairro); ?>" required>
                </div>

                <div class="input-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" value="<?= htmlspecialchars($cidade); ?>" required>
                </div>

                <div class="input-group">
                    <label for="uf">UF</label>
                    <input type="text" id="uf" name="uf" maxlength="2" value="<?= htmlspecialchars($uf); ?>" required>
                </div>
            </div>

            <div class="grid">
                <div class="input-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($telefone); ?>" required>
                </div>

                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email); ?>" required>
                </div>
            </div>

            <div class="grid">
                <div class="input-group">
                    <label for="tipo">Tipo de Cliente</label>
                    <select id="tipo" name="tipo" required>
                        <option value="">Escolha o tipo</option>
                        <option value="pf" <?= ($tipo == 'pf') ? 'selected' : '' ?>>Pessoa Física</option>
                        <option value="pj" <?= ($tipo == 'pj') ? 'selected' : '' ?>>Pessoa Jurídica</option>
                    </select>
                </div>

                <div class="input-group">
                    <label>Atualizar Campos</label>
                    <button type="submit" name="escolher_tipo">Confirmar tipo</button>
                </div>
            </div>

            <?php if ($tipo == 'pf'): ?>
                <div class="input-group">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" required>
                </div>
            <?php elseif ($tipo == 'pj'): ?>
                <div class="grid">
                    <div class="input-group">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" id="cnpj" name="cnpj" required>
                    </div>
                    <div class="input-group">
                        <label for="razaoSocial">Razão Social</label>
                        <input type="text" id="razaoSocial" name="razaoSocial" required>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($tipo != ''): ?>
                <div class="botoes-grupo">
                    <button type="submit" class="btn-orcamento" formaction="../controller/ClienteController.php">
                        Salvar Cliente
                    </button>
                </div>
            <?php endif; ?>

        </form>

    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
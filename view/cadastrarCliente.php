<?php
session_start();

// Verifica se existe o ID do usuário logado na sessão para evitar falhas de FK
$idUsuarioLogado = $_GET['idUsuario'] ?? $_POST['idUsuario'] ?? $_SESSION['idUsuario'] ?? '';

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
    <div class="container-voltar">
        <a href="painelAdmin.php" class="btn-voltar">
            &larr; Voltar ao Painel
        </a>
    </div>

    <main class="container">

        <h2 class="tituloForm">Cadastro de Cliente</h2>

        <form action="cadastrarCliente.php" method="post" class="form">

            <input type="hidden" name="acao" value="cadastrar">

            <input type="hidden" name="Usuario_idUsuario" value="<?= $idUsuarioLogado; ?>">
            <input type="hidden" name="idUsuario" value="<?= $idUsuarioLogado; ?>">

            <div class="input-group">
                <label for="nomeCliente">Nome / Nome Fantasia</label>
                <input type="text" id="nomeCliente" name="nomeCliente" minlength="3" maxlength="100" value="<?= htmlspecialchars($nomeCliente); ?>" required>
            </div>

            <div class="grid">
                <div class="input-group">
                    <label for="endereco">Endereço</label>
                    <input type="text" id="endereco" name="endereco" maxlength="150" value="<?= htmlspecialchars($endereco); ?>" required>
                </div>

                <div class="input-group">
                    <label for="cep">CEP (Apenas números)</label>
                    <input type="text" id="cep" name="cep" inputmode="numeric" pattern="[0-9]{8}" maxlength="8" value="<?= htmlspecialchars($cep); ?>" required>
                </div>
            </div>

            <div class="grid">
                <div class="input-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro" maxlength="50" value="<?= htmlspecialchars($bairro); ?>" required>
                </div>

                <div class="input-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" maxlength="50" value="<?= htmlspecialchars($cidade); ?>" required>
                </div>

                <div class="input-group">
                    <label for="uf">UF</label>
                    <select id="uf" name="uf" required>
                        <option value="">--</option>
                        <?php
                        $estados = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];
                        foreach ($estados as $e): ?>
                            <option value="<?= $e; ?>" <?= ($uf == $e) ? 'selected' : ''; ?>><?= $e; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="grid">
                <div class="input-group">
                    <label for="telefone">Telefone (DDD + Número)</label>
                    <input type="text" id="telefone" name="telefone" inputmode="numeric" pattern="[0-9]{10,11}" maxlength="11" value="<?= htmlspecialchars($telefone); ?>" required>
                </div>

                <div class="input-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" maxlength="100" value="<?= htmlspecialchars($email); ?>" required>
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
                    <button type="submit" class="btn-card" name="escolher_tipo" style="width: 100%; height: 43px; padding: 0;">Confirmar tipo</button>
                </div>
            </div>

            <?php if ($tipo == 'pf'): ?>
                <div class="input-group">
                    <label for="cpf">CPF (Apenas números)</label>
                    <input type="text" id="cpf" name="cpf" inputmode="numeric" pattern="[0-9]{11}" maxlength="11" placeholder="Ex: 12345678901" required>
                </div>
            <?php elseif ($tipo == 'pj'): ?>
                <div class="grid">
                    <div class="input-group">
                        <label for="cnpj">CNPJ (Apenas números)</label>
                        <input type="text" id="cnpj" name="cnpj" inputmode="numeric" pattern="[0-9]{14}" maxlength="14" placeholder="Ex: 12345678000199" required>
                    </div>
                    <div class="input-group">
                        <label for="razaoSocial">Razão Social</label>
                        <input type="text" id="razaoSocial" name="razaoSocial" maxlength="100" required>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($tipo != ''): ?>
                <div class="botoes-grupo" style="margin-top: 20px;">
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
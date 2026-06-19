<?php
require_once "../conexao/Conexao.php";
require_once "../model/Cliente.php";

session_start();

$pdo = Conexao::getInstance();
$cliente = new Cliente($pdo);

$id = $_GET['idCliente'] ?? null;

$dados = $cliente->buscarPorId($id);

if (!$dados) {
    die("<div class='container'><div class='alerta-erro'>Cliente não encontrado.</div></div>");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php';?>
    <title>Vs Uniformes - Editar Cliente</title>
</head>
<body>
    <?php include 'includes/menu.php';?>

    <main class="container">

        <h2 class="tituloForm">Editar Cliente</h2>

        <form action="../controller/ClienteController.php" method="post" class="form">

            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="idCliente" value="<?= $dados['idCliente'] ?>">

            <div class="input-group">
                <label for="nomeCliente">Nome do Cliente</label>
                <input type="text" id="nomeCliente" name="nomeCliente" value="<?= $dados['nomeCliente'] ?>" required>
            </div>

            <div class="grid" style="gap: 15px;">
                <div class="input-group" style="flex: 2; min-width: 250px;">
                    <label for="endereco">Endereço</label>
                    <input type="text" id="endereco" name="endereco" value="<?= $dados['endereco'] ?>" required>
                </div>

                <div class="input-group" style="flex: 1; min-width: 130px;">
                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" value="<?= $dados['cep'] ?>" required>
                </div>
            </div>

            <div class="grid" style="gap: 15px; margin-top: -5px;">
                <div class="input-group" style="flex: 2; min-width: 180px;">
                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro" value="<?= $dados['bairro'] ?>" required>
                </div>

                <div class="input-group" style="flex: 2; min-width: 180px;">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" value="<?= $dados['cidade'] ?>" required>
                </div>

                <div class="input-group" style="flex: 1; min-width: 70px;">
                    <label for="uf">UF</label>
                    <input type="text" id="uf" name="uf" value="<?= $dados['uf'] ?>" maxlength="2" required>
                </div>
            </div>

            <div class="grid" style="gap: 15px; margin-top: -5px;">
                <div class="input-group" style="flex: 1; min-width: 180px;">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" value="<?= $dados['telefone'] ?>" required>
                </div>

                <div class="input-group" style="flex: 1; min-width: 180px;">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= $dados['email'] ?>" required>
                </div>
            </div>

            <h3 class="tecnologias" style="margin-top: 15px; border-bottom: 1px solid var(--borda); padding-bottom: 5px;">Dados Jurídicos / Fiscais</h3>

            <div class="grid" style="gap: 15px;">
                <div class="input-group" style="flex: 1; min-width: 150px;">
                    <label for="tipo">Tipo de Cliente</label>
                    <select id="tipo" name="tipo">
                        <option value="Pessoa Física" <?= ($dados['tipo'] == 'Pessoa Física') ? 'selected' : '' ?>>
                            Pessoa Física
                        </option>
                        <option value="Pessoa Jurídica" <?= ($dados['tipo'] == 'Pessoa Jurídica') ? 'selected' : '' ?>>
                            Pessoa Jurídica
                        </option>
                    </select>
                </div>

                <div class="input-group" style="flex: 1; min-width: 150px;">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" value="<?= $dados['cpf'] ?>">
                </div>

                <div class="input-group" style="flex: 1; min-width: 150px;">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" id="cnpj" name="cnpj" value="<?= $dados['cnpj'] ?>">
                </div>
            </div>

            <div class="input-group">
                <label for="razaoSocial">Razão Social</label>
                <input type="text" id="razaoSocial" name="razaoSocial" value="<?= $dados['razaoSocial'] ?>">
            </div>

            <div class="botoes-grupo" style="flex-direction: row; gap: 15px; margin-top: 20px;">
                <button type="submit" style="flex: 2;" class="btn-orcamento">Atualizar Cliente</button>
                <a href="listarClientes.php" style="flex: 1; display: block;">
                    <button type="button" style="width: 100%;">Voltar</button>
                </a>
            </div>

        </form>

    </main>

    <?php include 'includes/footer.php'?>
</body>
</html>
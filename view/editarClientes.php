<?php
require_once "../conexao/Conexao.php";
require_once "../model/Cliente.php";

session_start();

$pdo = Conexao::getInstance();
$cliente = new Cliente($pdo);

$id = $_GET['idCliente'] ?? null;

$dados = $cliente->buscarPorId($id);

if (!$dados) {
    die("Cliente não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include 'includes/head.php';?>
<title>Editar Cliente</title>

</head>
<body>
<?php include 'includes/menu.php';?>


<h2>Editar Cliente</h2>

<form action="../controller/ClienteController.php" method="post">

    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="nomeCliente" value="<?= $dados['nomeCliente'] ?>">

    Nome:<br>
    <input type="text" name="nomeCliente"
           value="<?= $dados['nomeCliente'] ?>" required>

    Endereço:<br>
    <input type="text" name="endereco"
           value="<?= $dados['endereco'] ?>" required>

    CEP:<br>
    <input type="text" name="cep"
           value="<?= $dados['cep'] ?>" required>

    Bairro:<br>
    <input type="text" name="bairro"
           value="<?= $dados['bairro'] ?>" required>

    Cidade:<br>
    <input type="text" name="cidade"
           value="<?= $dados['cidade'] ?>" required>

    UF:<br>
    <input type="text" name="uf"
           value="<?= $dados['uf'] ?>" maxlength="2" required>

    Telefone:<br>
    <input type="text" name="telefone"
           value="<?= $dados['telefone'] ?>" required>

    Email:<br>
    <input type="email" name="email"
           value="<?= $dados['email'] ?>" required>

    CPF:<br>
    <input type="text" name="cpf"
           value="<?= $dados['cpf'] ?>">

    CNPJ:<br>
    <input type="text" name="cnpj"
           value="<?= $dados['cnpj'] ?>">

    Tipo:<br>
    <select name="tipo">
        <option value="Pessoa Física"
            <?= ($dados['tipo'] == 'Pessoa Física') ? 'selected' : '' ?>>
            Pessoa Física
        </option>

        <option value="Pessoa Jurídica"
            <?= ($dados['tipo'] == 'Pessoa Jurídica') ? 'selected' : '' ?>>
            Pessoa Jurídica
        </option>
    </select>

    <br><br>

    Razão Social:<br>
    <input type="text" name="razaoSocial"
           value="<?= $dados['razaoSocial'] ?>">

    <br><br>

    <button type="submit">Atualizar</button>

</form>
<?php include 'includes/footer.php'?>

</body>
</html>
<!-- cadastrarProdutos.php -->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Cadastrar Produto</title>
</head>
<body>
<?php include 'includes/menu.php'; ?>

<h2>Cadastro de Produto</h2>

<?php
if(isset($_SESSION['mensagem'])){
    echo "<p>" . $_SESSION['mensagem'] . "</p>";
    unset($_SESSION['mensagem']);
}
?>

<form action="../controller/ProdutoController.php"
      method="post"
      enctype="multipart/form-data">

    <label>Nome</label>
    <input type="text" name="nomeProd" required>

    <label>Categoria</label>
    <input type="text" name="categoria" required>

    <label>Modelo</label>
    <input type="text" name="modelo" required>

    <label>Tamanho</label>
    <input type="text" name="tamanho" required>

    <label>Cor</label>
    <input type="text" name="cor" required>

    <label>Preço</label>
    <input type="number" step="0.01" name="preco" required>

    <label>Descrição</label>
    <textarea name="descricao" rows="5" required></textarea>

    <label>Estoque</label>
    <input type="number" name="estoque" required>

    <label>Foto 1</label>
    <input type="file" name="foto1">

    <label>Foto 2</label>
    <input type="file" name="foto2">

    <label>Foto 3</label>
    <input type="file" name="foto3">

    <button type="submit">Salvar Produto</button>

</form>

<?php include 'includes/footer.php'; ?>
</body>
</html>

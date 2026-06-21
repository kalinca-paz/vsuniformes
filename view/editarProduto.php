<!-- editarProduto.php -->
<?php
session_start();
require_once "../conexao/Conexao.php";
require_once "../model/ClassProdutoDAO.php";

if (!isset($_GET['idProduto'])) {
    die("Produto não informado.");
}

$idproduto = $_GET['idProduto'];

$produtoDAO = new ClassProdutoDAO();
$produto = $produtoDAO->buscarProduto($idproduto);

if (!$produto) {
    die("Produto não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include 'includes/head.php'; ?>
    <title>Editar Produto</title>
</head>

<body>

<?php include 'includes/menu.php'; ?>

<h2>Editar Produto</h2>

<form action="../controller/atualizarProduto.php"
      method="post"
      enctype="multipart/form-data">

    <input type="hidden"
           name="idProduto"
           value="<?php echo $produto['idProduto']; ?>">

    <label>Nome</label>
    <input type="text"
           name="nomeProd"
           value="<?php echo $produto['nomeProd']; ?>"
           required>

    <label>Categoria</label>
    <input type="text"
           name="categoria"
           value="<?php echo $produto['categoria']; ?>"
           required>


    <label>Modelo</label>
    <input type="text"
           name="modelo"
           value="<?php echo $produto['modelo']; ?>"
           required>

    <label>Tamanho</label>
    <input type="text"
           name="tamanho"
           value="<?php echo $produto['tamanho']; ?>"
           required>

    <label>Cor</label>
    <input type="text"
           name="cor"
           value="<?php echo $produto['cor']; ?>"
           required>

    <label>Preço</label>
    <input type="number"
           step="0.01"
           name="preco"
           value="<?php echo $produto['preco']; ?>"
           required>

    <label>Descrição</label>
    <textarea name="descricao"
              rows="6"
              required><?php echo $produto['descricao']; ?></textarea>

    <label>Estoque</label>
    <input type="number"
           name="estoque"
           value="<?php echo $produto['estoque']; ?>"
           required>

    <!-- IMAGENS -->

    <div class="foto">
        <label>Foto 1 Atual</label><br>

        <?php if (!empty($produto['foto1'])): ?>
            <img src="../uploads/produtos/<?php echo $produto['foto1']; ?>" width="150">
        <?php endif; ?>

        <input type="file" name="foto1">

        <input type="hidden" name="foto1_atual" value="<?php echo $produto['foto1']; ?>">
    </div>

    <div class="foto">
        <label>Foto 2 Atual</label><br>

        <?php if (!empty($produto['foto2'])): ?>
            <img src="../uploads/produtos/<?php echo $produto['foto2']; ?>" width="150">
        <?php endif; ?>

        <input type="file" name="foto2">
        <input type="hidden" name="foto2_atual" value="<?php echo $produto['foto2']; ?>">
    </div>

    <div class="foto">
        <label>Foto 3 Atual</label><br>

        <?php if (!empty($produto['foto3'])): ?>
            <img src="../uploads/produtos/<?php echo $produto['foto3']; ?>" width="150">
        <?php endif; ?>

        <input type="file" name="foto3">
        <input type="hidden" name="foto3_atual" value="<?php echo $produto['foto3']; ?>">
    </div>

    <button type="submit">Atualizar Produto</button>

    <a href="listarProdutos.php">
        <button type="button">Voltar</button>
    </a>

</form>

<?php include 'includes/footer.php'; ?>

</body>
</html>
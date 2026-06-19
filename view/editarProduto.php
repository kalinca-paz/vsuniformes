<?php
session_start();
require_once "../conexao/Conexao.php";
require_once "../model/ClassProdutoDAO.php";

if (!isset($_GET['idProduto'])) {
    die("<div class='container'><div class='alerta-erro'>Produto não informado.</div></div>");
}

$idproduto = $_GET['idProduto'];

$produtoDAO = new ClassProdutoDAO();
$produto = $produtoDAO->buscarProduto($idproduto);

if (!$produto) {
    die("<div class='container'><div class='alerta-erro'>Produto não encontrado.</div></div>");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/head.php'; ?>
    <title>Vs Uniformes - Editar Produto</title>
</head>
<body>

    <?php include 'includes/menu.php'; ?>

    <main class="container">

        <h2 class="tituloForm">Editar Produto</h2>

        <form action="../controller/atualizarProduto.php" method="post" enctype="multipart/form-data" class="form">

            <input type="hidden" name="idProduto" value="<?= $produto['idProduto']; ?>">

            <div class="input-group">
                <label for="nomeProd">Nome do Produto</label>
                <input type="text" id="nomeProd" name="nomeProd" value="<?= $produto['nomeProd']; ?>" required>
            </div>

            <div class="grid" style="gap: 15px;">
                <div class="input-group" style="flex: 1; min-width: 200px;">
                    <label for="categoria">Categoria</label>
                    <input type="text" id="categoria" name="categoria" value="<?= $produto['categoria']; ?>" required>
                </div>

                <div class="input-group" style="flex: 1; min-width: 200px;">
                    <label for="modelo">Modelo</label>
                    <input type="text" id="modelo" name="modelo" value="<?= $produto['modelo']; ?>" required>
                </div>
            </div>

            <div class="grid" style="gap: 15px; margin-top: -5px;">
                <div class="input-group" style="flex: 1; min-width: 130px;">
                    <label for="tamanho">Tamanho</label>
                    <input type="text" id="tamanho" name="tamanho" value="<?= $produto['tamanho']; ?>" required>
                </div>

                <div class="input-group" style="flex: 1; min-width: 130px;">
                    <label for="cor">Cor</label>
                    <input type="text" id="cor" name="cor" value="<?= $produto['cor']; ?>" required>
                </div>

                <div class="input-group" style="flex: 1; min-width: 130px;">
                    <label for="preco">Preço (R$)</label>
                    <input type="number" id="preco" step="0.01" name="preco" value="<?= $produto['preco']; ?>" required>
                </div>

                <div class="input-group" style="flex: 1; min-width: 130px;">
                    <label for="estoque">Estoque</label>
                    <input type="number" id="estoque" name="estoque" value="<?= $produto['estoque']; ?>" required>
                </div>
            </div>

            <div class="input-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" rows="5" required><?= $produto['descricao']; ?></textarea>
            </div>

            <h3 class="tecnologias" style="margin-top: 10px; border-bottom: 1px solid var(--borda); padding-bottom: 5px;">Imagens do Produto</h3>
            
            <div class="grid" style="justify-content: space-between; gap: 20px;">
                
                <div class="input-group" style="flex: 1; min-width: 150px; text-align: center;">
                    <label>Foto Principal</label>
                    <?php if (!empty($produto['foto1'])): ?>
                        <img src="../uploads/produtos/<?= $produto['foto1']; ?>" class="card-admin" style="display: block; margin: 10px auto; max-height: 120px; width: auto;" alt="Foto 1">
                    <?php endif; ?>
                    <input type="file" name="foto1" style="font-size: 12px; padding: 5px;">
                    <input type="hidden" name="foto1_atual" value="<?= $produto['foto1']; ?>">
                </div>

                <div class="input-group" style="flex: 1; min-width: 150px; text-align: center;">
                    <label>Foto Lateral / Detalhe</label>
                    <?php if (!empty($produto['foto2'])): ?>
                        <img src="../uploads/produtos/<?= $produto['foto2']; ?>" class="card-admin" style="display: block; margin: 10px auto; max-height: 120px; width: auto;" alt="Foto 2">
                    <?php endif; ?>
                    <input type="file" name="foto2" style="font-size: 12px; padding: 5px;">
                    <input type="hidden" name="foto2_atual" value="<?= $produto['foto2']; ?>">
                </div>

                <div class="input-group" style="flex: 1; min-width: 150px; text-align: center;">
                    <label>Foto Traseira / Interna</label>
                    <?php if (!empty($produto['foto3'])): ?>
                        <img src="../uploads/produtos/<?= $produto['foto3']; ?>" class="card-admin" style="display: block; margin: 10px auto; max-height: 120px; width: auto;" alt="Foto 3">
                    <?php endif; ?>
                    <input type="file" name="foto3" style="font-size: 12px; padding: 5px;">
                    <input type="hidden" name="foto3_atual" value="<?= $produto['foto3']; ?>">
                </div>

            </div>

            <div class="botoes-grupo" style="flex-direction: row; gap: 15px; margin-top: 20px;">
                <button type="submit" style="flex: 2;" class="btn-orcamento">Atualizar Produto</button>
                <a href="listarProdutos.php" style="flex: 1; display: block;">
                    <button type="button" style="width: 100%;">Voltar</button>
                </a>
            </div>

        </form>

    </main>

    <?php include 'includes/footer.php'; ?>

</body>
</html>
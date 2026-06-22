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
<div class="container-voltar">
        <a href="painelAdmin.php" class="btn-voltar">
            &larr; Voltar ao Painel
        </a>
    </div>

<main class="container">

    <h1 class="tituloForm">Cadastro de Produto</h1>

    <?php
    if(isset($_SESSION['mensagem'])){
        echo "<p class='alerta-sucesso'>" . $_SESSION['mensagem'] . "</p>";
        unset($_SESSION['mensagem']);
    }
    ?>

    <form action="../controller/ProdutoController.php"
          method="post"
          enctype="multipart/form-data" class="form">

    <p class="input-group">
        <label>Nome</label>
        <input type="text" name="nomeProd" required>
    </p>

    <p class="input-group">
        <label>Categoria</label>
        <input type="text" name="categoria" required>
    </p>

    <p class="input-group">
        <label>Modelo</label>
        <input type="text" name="modelo" required>
    </p>

    <p class="input-group">
        <label>Tamanho</label>
        <select name="tamanho" required>
            <option value="" disabled selected>Selecione o tamanho</option>
            <option value="P">P</option>
            <option value="M">M</option>
            <option value="G">G</option>
            <option value="GG">GG</option>
            <option value="EXG">EXG</option>
            <option value="Único">Tamanho Único</option>
        </select>
    </p>

    <p class="input-group">
        <label>Cor</label>
        <select name="cor" required>
            <option value="" disabled selected>Selecione a cor</option>
            <option value="Branco">Branco</option>
            <option value="Preto">Preto</option>
            <option value="Azul Marinho">Azul Marinho</option>
            <option value="Azul Royal">Azul Royal</option>
            <option value="Cinza">Cinza</option>
            <option value="Vermelho">Vermelho</option>
            <option value="Verde">Verde</option>
        </select>
    </p>

    <p class="input-group">
        <label>Preço</label>
        <input type="number" step="0.01" name="preco" required>
    </p>

    <p class="input-group">
        <label>Descrição</label>
        <textarea name="descricao" rows="5" required></textarea>
    </p>

    <p class="input-group">
        <label>Estoque</label>
        <input type="number" name="estoque" required>
    </p>

    <p class="input-group">
        <label>Foto 1</label>
        <input type="file" name="foto1">
    </p>

    <p class="input-group">
        <label>Foto 2</label>
        <input type="file" name="foto2">
    </p>

    <p class="input-group">
        <label>Foto 3</label>
        <input type="file" name="foto3">
    </p>

        <button type="submit" class="btn-orcamento">Salvar Produto</button>

    </form>

</main>

<?php include 'includes/footer.php'; ?>
</body>
</html>
<?php
require_once("../model/Produto.php");
session_start();

function uploadImagem($campo)
{
    if (
        isset($_FILES[$campo]) &&
        $_FILES[$campo]['error'] == 0) {
        $nomeArquivo = time() . "_" . basename($_FILES[$campo]['name']);
        $destino = "../uploads/produtos/" . $nomeArquivo;
        if (move_uploaded_file($_FILES[$campo]['tmp_name'], $destino)) {
            return $nomeArquivo;
        }
    }
    return null;
}
try {
    // Upload das imagens
    $foto1 = uploadImagem("foto1");
    $foto2 = uploadImagem("foto2");
    $foto3 = uploadImagem("foto3");

    // Cria o objeto
    $produto = new Produto();

    // Preenche os atributos do objeto
    $produto->setNome($_POST['nome']);
    $produto->setCategoria($_POST['categoria']);
    $produto->setPreco($_POST['preco']);
    $produto->setFoto1($foto1);
    $produto->setFoto2($foto2);
    $produto->setFoto3($foto3);
    $produto->setDescricao($_POST['descricao']);
    $produto->setEstoque($_POST['estoque']);

    // Salva no banco
    if ($produto->salvar()) {
        $_SESSION['mensagem'] = "Produto cadastrado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar produto.";
    }
} catch (Exception $e) {

    $_SESSION['mensagem'] = "Erro: " . $e->getMessage();

}
// header("Location: ../view/cadastrarProduto.php");
echo "
<script>
    alert('Produto cadastrado com sucesso!');
    window.location.href='../index.php';
</script>
";
exit;

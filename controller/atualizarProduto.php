<!-- atualizarProduto.php -->
<?php

require_once "../model/ClassProduto.php";
require_once "../model/ClassProdutoDAO.php";

$produto = new ClassProduto();

$produto->setId($_POST['idProduto']);
$produto->setNome($_POST['nomeProd']);
$produto->setCategoria($_POST['categoria']);
$produto->setModelo($_POST['modelo'] ?? '');
$produto->setTamanho($_POST['tamanho'] ?? '');
$produto->setCor($_POST['cor'] ?? '');
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);
$produto->setEstoque($_POST['estoque']);


$diretorio = "../uploads/produtos/";

$foto1 = $_POST['foto1_atual'];
$foto2 = $_POST['foto2_atual'];
$foto3 = $_POST['foto3_atual'];

if(!empty($_FILES['foto1']['name']))
{
    $foto1 = time()."_1_".$_FILES['foto1']['name'];

    move_uploaded_file(
        $_FILES['foto1']['tmp_name'],
        $diretorio.$foto1
    );
}

if(!empty($_FILES['foto2']['name']))
{
    $foto2 = time()."_2_".$_FILES['foto2']['name'];

    move_uploaded_file(
        $_FILES['foto2']['tmp_name'],
        $diretorio.$foto2
    );
}

if(!empty($_FILES['foto3']['name']))
{
    $foto3 = time()."_3_".$_FILES['foto3']['name'];

    move_uploaded_file(
        $_FILES['foto3']['tmp_name'],
        $diretorio.$foto3
    );
}

$produto->setFoto1($foto1);
$produto->setFoto2($foto2);
$produto->setFoto3($foto3);

$produtoDAO = new ClassProdutoDAO();

if($produtoDAO->atualizarProduto($produto))
{
    echo "
    <script>
        alert('Produto atualizado com sucesso!');
        window.location.href='../view/listarProdutos.php';
    </script>
    ";
}
else
{
    echo "
    <script>
        alert('Erro ao atualizar produto!');
        history.back();
    </script>
    ";
}
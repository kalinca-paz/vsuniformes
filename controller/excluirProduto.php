<!-- excluirProduto -->
 <?php

require_once "../model/ClassProdutoDAO.php";

if (!isset($_GET['idProduto'])) {
    die("Produto não informado.");
}

$idproduto = $_GET['idProduto'];

$produtoDAO = new ClassProdutoDAO();

/* Busca os dados do produto */
$produto = $produtoDAO->buscarProduto($idproduto);

if (!$produto) {
    die("Produto não encontrado.");
}

/* Exclui as imagens da pasta uploads */
if (!empty($produto['foto1']) && file_exists("../uploads/produtos/" . $produto['foto1'])) {
    unlink("../uploads/produtos/" . $produto['foto1']);
}

if (!empty($produto['foto2']) && file_exists("../uploads/produtos/" . $produto['foto2'])) {
    unlink("../uploads/produtos/" . $produto['foto2']);
}

if (!empty($produto['foto3']) && file_exists("../uploads/produtos/" . $produto['foto3'])) {
    unlink("../uploads/produtos/" . $produto['foto3']);
}

/* Exclui o registro do banco */
if ($produtoDAO->excluirProduto($idproduto)) {

    echo "
    <script>
        alert('Produto excluído com sucesso!');
        window.location.href='../view/listarProdutos.php';
    </script>
    ";

} else {

    echo "
    <script>
        alert('Erro ao excluir o produto!');
        window.location.href='../view/listarProdutos.php';
    </script>
    ";
}
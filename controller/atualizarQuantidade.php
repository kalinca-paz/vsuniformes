<?php
session_start();
$id = $_POST['id'];
$quantidade = $_POST['quantidade'];
if(isset($_SESSION['carrinho'][$id])){
    if($quantidade > 0){
        $_SESSION['carrinho'][$id]['quantidade'] = $quantidade;
    }else{
        unset($_SESSION['carrinho'][$id]);
    }
}
header("Location: ../view/carrinho.php");
exit;
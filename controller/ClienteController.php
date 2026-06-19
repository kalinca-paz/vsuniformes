<?php
session_start();
require_once "../conexao/Conexao.php";
require_once "../model/Cliente.php";


$pdo = Conexao::getInstance();
$cliente = new Cliente($pdo);

$acao = $_POST['acao'] ?? $_GET['acao'] ?? '';

switch($acao){

    case 'cadastrar':

        $dados = [
            'nomeCliente'   => $_POST['nomeCliente'],
            'telefone'      => $_POST['telefone'],
            'email'         => $_POST['email'],
            'cpf'           => $_POST['cpf'],
            'cnpj'          => $_POST['cnpj'],
            'endereco'      => $_POST['endereco'],
            'cep'           => $_POST['cep'],
            'bairro'        => $_POST['bairro'],
            'cidade'        => $_POST['cidade'],
            'uf'            => $_POST['uf'],
            'tipo'          => $_POST['tipo'],
            'razaoSocial'   => $_POST['razaoSocial'],
            'Usuario_idUsuario' => $_SESSION['id'] ?? null
        ];

        $cliente->cadastrar($dados);

        echo "<script>
            alert('Cliente cadastrado com sucesso!');
            window.location='../view/listarClientes.php';
        </script>";
    break;

    case 'editar':

        $dados = [
            'nomeCliente'   => $_POST['nomeCliente'],
            'telefone'      => $_POST['telefone'],
            'email'         => $_POST['email'],
            'cpf'           => $_POST['cpf'] ?? null,
            'cnpj'          => $_POST['cnpj'] ?? null,
            'endereco'      => $_POST['endereco'],
            'cep'           => $_POST['cep'],
            'bairro'        => $_POST['bairro'],
            'cidade'        => $_POST['cidade'],
            'uf'            => $_POST['uf'],
            'tipo'          => $_POST['tipo'],
            'razaoSocial'   => $_POST['razaoSocial'] ?? null,
            'Usuario_idUsuario' => $_SESSION['id']
        ];

        $cliente->atualizar($dados);

        echo "<script>
            alert('Cliente atualizado com sucesso!');
            window.location='../view/listarClientes.php';
        </script>";
    break;

    case 'excluir':

    $id = $_GET['idCliente'] ?? null;
    $cliente->excluir($id);
        $cliente->excluir($id);

        echo "<script>
            alert('Cliente excluído com sucesso!');
            window.location='../view/listarClientes.php';
        </script>";
    break;
}
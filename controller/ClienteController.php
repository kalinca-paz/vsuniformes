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
            'nomeCliente'       => $_POST['nomeCliente'],
            'telefone'          => $_POST['telefone'],
            'email'             => $_POST['email'],
            'cpf'               => $_POST['cpf'] ?? null,
            'cnpj'              => $_POST['cnpj'] ?? null,
            'endereco'          => $_POST['endereco'],
            'cep'               => $_POST['cep'],
            'bairro'            => $_POST['bairro'],
            'cidade'            => $_POST['cidade'],
            'uf'                => $_POST['uf'],
            'tipo'              => $_POST['tipo'],
            'razaoSocial'       => $_POST['razaoSocial'] ?? null,
            // CORREÇÃO AQUI: Verifica primeiro o campo enviado pelo form e depois a sessão correta
            'Usuario_idUsuario' => $_POST['Usuario_idUsuario'] ?? $_SESSION['idUsuario'] ?? null
        ];

        // Validação preventiva se o ID continuar vindo nulo por falta de login
        if (empty($dados['Usuario_idUsuario'])) {
            die("<script>
                    alert('Erro: Não foi possível identificar o usuário logado para realizar esta ação.');
                    window.history.back();
                 </script>");
        }

        $cliente->cadastrar($dados);

        echo "<script>
            alert('Cliente cadastrado com sucesso!');
            window.location='../view/listarClientes.php';
        </script>";
    break;

    case 'editar':
        $dados = [
            'idCliente'         => $_POST['idCliente'],
            'nomeCliente'       => $_POST['nomeCliente'],
            'telefone'          => $_POST['telefone'],
            'email'             => $_POST['email'],
            'cpf'               => $_POST['cpf'] ?? null,
            'cnpj'              => $_POST['cnpj'] ?? null,
            'endereco'          => $_POST['endereco'],
            'cep'               => $_POST['cep'],
            'bairro'            => $_POST['bairro'],
            'cidade'            => $_POST['cidade'],
            'uf'                => $_POST['uf'],
            'tipo'              => $_POST['tipo'],
            'razaoSocial'       => $_POST['razaoSocial'] ?? null,
            // CORREÇÃO AQUI: Garante o mesmo ajuste para a rotina de edição
            'Usuario_idUsuario' => $_POST['Usuario_idUsuario'] ?? $_SESSION['idUsuario'] ?? null
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

        echo "<script>
            alert('Cliente excluído com sucesso!');
            window.location='../view/listarClientes.php';
        </script>";
    break;
}
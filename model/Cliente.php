<?php

class Cliente {
    private $pdo;

    public function __construct($conexao){
        $this->pdo = $conexao;
    }

    public function cadastrar($dados){

        $sql = "INSERT INTO clientes (
            nomeCliente,
            telefone,
            email,
            cpf,
            cnpj,
            endereco,
            cep,
            bairro,
            cidade,
            uf,
            tipo,
            razaoSocial,
            dataCadastro,
            Usuario_idUsuario
        ) VALUES (
            :nomeCliente,
            :telefone,
            :email,
            :cpf,
            :cnpj,
            :endereco,
            :cep,
            :bairro,
            :cidade,
            :uf,
            :tipo,
            :razaoSocial,
            NOW(),
            :Usuario_idUsuario
        )";
    
        $stmt = $this->pdo->prepare($sql);
    
        return $stmt->execute([
            ':nomeCliente'        => $dados['nomeCliente'],
            ':telefone'           => $dados['telefone'],
            ':email'              => $dados['email'],
            ':cpf'                => $dados['cpf'],
            ':cnpj'              => $dados['cnpj'],
            ':endereco'          => $dados['endereco'],
            ':cep'               => $dados['cep'],
            ':bairro'            => $dados['bairro'],
            ':cidade'            => $dados['cidade'],
            ':uf'                => $dados['uf'],
            ':tipo'              => $dados['tipo'],
            ':razaoSocial'       => $dados['razaoSocial'],
            ':Usuario_idUsuario' => $dados['Usuario_idUsuario']
        ]);
    }

    public function listar(){

        $sql = "
            SELECT *
            FROM clientes
            ORDER BY nomeCliente
        ";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id){

        $sql = "
            SELECT *
            FROM clientes
            WHERE idCliente = :id
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($dados){

        $sql = "UPDATE clientes SET
            nomeCliente = :nomeCliente,
            telefone = :telefone,
            email = :email,
            cpf = :cpf,
            cnpj = :cnpj,
            endereco = :endereco,
            cep = :cep,
            bairro = :bairro,
            cidade = :cidade,
            uf = :uf,
            tipo = :tipo,
            razaoSocial = :razaoSocial
        WHERE idCliente = :idCliente";
    
        $stmt = $this->pdo->prepare($sql);
    
        return $stmt->execute([
            ':nomeCliente'   => $dados['nomeCliente'],
            ':telefone'      => $dados['telefone'],
            ':email'         => $dados['email'],
            ':cpf'           => $dados['cpf'],
            ':cnpj'          => $dados['cnpj'],
            ':endereco'      => $dados['endereco'],
            ':cep'           => $dados['cep'],
            ':bairro'        => $dados['bairro'],
            ':cidade'        => $dados['cidade'],
            ':uf'            => $dados['uf'],
            ':tipo'          => $dados['tipo'],
            ':razaoSocial'   => $dados['razaoSocial'],
            ':idCliente'     => $dados['idCliente']
        ]);
    }

    public function excluir($id){

    $sql = "DELETE FROM clientes WHERE idCliente = :id";

    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
}
}

?>
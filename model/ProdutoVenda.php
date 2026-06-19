<?php

// Como o arquivo está dentro da pasta 'model', ele precisa voltar um nível 
// para depois entrar na pasta 'conexao'
require_once __DIR__ . '/../conexao/Conexao.php';

class ProdutoVenda {

    public function salvar($produtos_id, $vendas_id, $itemVendido, $valorItem) {
        try {
            // Obtém a instância de conexão ativa do seu projeto
            $pdo = Conexao::getInstance();

            // Instrução SQL para inserir o produto na tabela intermediária da venda/orçamento
            // NOTA: Se o nome da tabela no seu banco não for 'produtos_vendas', mude apenas esse nome abaixo.
            $sql = "INSERT INTO produtos_vendas (produtos_id, vendas_id, itemVendido, valorItem) 
                    VALUES (:produtos_id, :vendas_id, :itemVendido, :valorItem)";

            $stmt = $pdo->prepare($sql);

            // Vincula os parâmetros de forma segura usando o PDO
            $stmt->bindValue(':produtos_id', $produtos_id, PDO::PARAM_INT);
            $stmt->bindValue(':vendas_id',   $vendas_id,   PDO::PARAM_INT);
            $stmt->bindValue(':itemVendido', $itemVendido, PDO::PARAM_STR);
            $stmt->bindValue(':valorItem',   $valorItem);

            // Executa e retorna true caso salve com sucesso
            return $stmt->execute();

        } catch (PDOException $erro) {
            // Em caso de erro (ex: coluna errada no banco), ele imprime a mensagem e retorna false
            echo "Erro no banco de dados: " . $erro->getMessage();
            return false;
        }
    }
}
?>
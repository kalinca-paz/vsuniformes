<!-- Conexao 
->user root ou admin
->banco nome do banco
senhamysql-> "" sem espaço ou "123456"
-->
<?php
    class Conexao {
        public static function getInstance(){
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=vsuniformes","root","");
                return $pdo;
            } catch (PDOException $erro){
                    echo $erro->getMessage();
                }
            } //FIM CLASSE MÉTODO getInstance()
        } //FIM CLASSE Conexao
    
?>
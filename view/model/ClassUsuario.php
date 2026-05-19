<!-- ClassUsuario.php -->
<?php

class ClassUsuario { //COMEÇO ClassUsuario
private $nome; //visível somente nesse arquivo;
private $email;
private $senha;
private $tipo;
private $id;

//GETTERS
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getId(){
        return $this->id;
    }
// SETTERS

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
    public function setId($id){
        $this->id = $id;
    }

}//FIM ClassUsuario.php



?>

<?php

class ClassUsuario
{
    private $idUsuarios;
    private $nome;
    private $email;
    private $senha;
    private $tipo;

    // GETTERS

    public function getId()
    {
        return $this->idUsuarios;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    // SETTERS

    public function setId($idUsuarios)
    {
        $this->idUsuarios = $idUsuarios;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
}
?>
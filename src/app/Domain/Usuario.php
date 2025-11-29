<?php
require_once __DIR__ . '/../Interfaces/Autenticavel.php';

abstract class Usuario implements Autenticavel {
    protected $email;
    protected $senha;

    public function __construct($email, $senha) {
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    abstract public function getPerfil();

    public function homePath() {
        return '';
    }
}
?>

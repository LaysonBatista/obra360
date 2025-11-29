<?php
require_once __DIR__ . '/../Interfaces/Autenticavel.php';

class AuthService {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login(Autenticavel $u) {
        if ($u->getPerfil() === 'cliente') {
            $st = $this->pdo->prepare('SELECT id_cliente,email_cliente,senha_cliente FROM clientes WHERE email_cliente=:email_cliente AND senha_cliente=:senha_cliente;');
            $st->execute(array(
                ':email_cliente' => $u->getEmail(),
                ':senha_cliente' => $u->getSenha()
            ));
            $row = $st->fetch();
            return $row ? $row : null;
        } else {
            $st = $this->pdo->prepare('SELECT id_func_const,email_func_const,senha_func_const FROM funcionarios_construtora WHERE email_func_const=:email_func_const AND senha_func_const=:senha_func_const;');
            $st->execute(array(
                ':email_func_const' => $u->getEmail(),
                ':senha_func_const' => $u->getSenha()
            ));
            $row = $st->fetch();
            return $row ? $row : null;
        }
    }
}
?>

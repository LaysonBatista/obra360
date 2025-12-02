<?php
require_once __DIR__ . '/Usuario.php';

class FuncionarioConstrutora extends Usuario {
    public function getPerfil() {
        return 'construtora';
    }

    public function homePath() {
        return '../public/views/tela_principal_construtora.php';
    }
}
?>

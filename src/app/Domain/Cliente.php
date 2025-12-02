<?php
require_once __DIR__ . '/Usuario.php';

class Cliente extends Usuario {
    public function getPerfil() {
        return 'cliente';
    }

    public function homePath() {
        return '../public/views/tela_principal_cliente.php';
    }
}
?>

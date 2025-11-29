<?php
require_once __DIR__ . '/Usuario.php';

class Cliente extends Usuario {
    public function getPerfil() {
        return 'cliente';
    }

    public function homePath() {
        return '../../content/tela_principal_cliente.php';
    }
}
?>

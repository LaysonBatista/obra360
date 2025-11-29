<?php
require_once __DIR__ . '/../database/conexao.php';
require_once __DIR__ . '/Interfaces/Autenticavel.php';
require_once __DIR__ . '/Domain/Usuario.php';
require_once __DIR__ . '/Domain/Cliente.php';
require_once __DIR__ . '/Domain/FuncionarioConstrutora.php';
require_once __DIR__ . '/Domain/Obra.php';
require_once __DIR__ . '/Services/AuthService.php';

$pdo = isset($dbh) ? $dbh : null;
?>

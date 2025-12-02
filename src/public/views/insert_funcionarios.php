<?php
require_once __DIR__ . '/../../app/bootstrap.php';
if (isset($_POST['nome_funcionario'], $_POST['cargo_funcionario']) && $_POST['nome_funcionario'] != '') {
  $nome_funcionario = $_POST['nome_funcionario'];
  $cargo_funcionario = $_POST['cargo_funcionario'];  
} else {
  echo 'Variaveis não definidas';
  die();
}
try {
  $query = $pdo->prepare('INSERT INTO funcionarios (nome_funcionario, cargo_funcionario) VALUES(:nome_funcionario, :cargo_funcionario);');

  $query->execute(array(
    ':nome_funcionario' => $nome_funcionario,
    ':cargo_funcionario' => $cargo_funcionario
  ));
 
  
} catch (PDOException $e) {
  echo 'erro';
}

header('Location: tela_principal_construtora.php');
?>

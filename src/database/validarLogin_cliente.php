<?php
require_once '../app/bootstrap.php';

$email_cliente = $_POST['email_cliente'];
$senha_cliente = $_POST['senha_cliente'];

if (empty($email_cliente) || empty($senha_cliente)){
    echo "<script>alert('Campos obrigatórios vazios')</script>";
}else{
    try{
        $auth = new AuthService($pdo);
        $user = new Cliente($email_cliente, $senha_cliente);
        $row = $auth->login($user);
        if(empty($row)){
            echo "<script>alert('Usuário e/ou senha invalidos')</script>";
        }else{
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id'] = $row['id_cliente'];
            $_SESSION['email'] = $row['email_cliente'];
            header('Location: ' . $user->homePath());
        }
    } catch(Exception $e){
        echo $e;
    }
}
?>

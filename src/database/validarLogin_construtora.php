<?php
require_once '../app/bootstrap.php';

$email_func_const = $_POST['email_func_const'];
$senha_func_const = $_POST['senha_func_const'];

if (empty($email_func_const) || empty($senha_func_const)){
    echo "<script>alert('Campos obrigatórios vazios')</script>";
}else{
    try{
        $auth = new AuthService($pdo);
        $user = new FuncionarioConstrutora($email_func_const, $senha_func_const);
        $row = $auth->login($user);
        if(empty($row)){
            echo "<script>alert('Usuário e/ou senha invalidos')</script>";
        }else{
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['id'] = $row['id_func_const'];
            $_SESSION['email'] = $row['email_func_const'];
            header('Location: ' . $user->homePath());
        }
    } catch(Exception $e){
        echo $e;
    }
}
?>

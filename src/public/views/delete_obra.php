<?php
    //print_r($_GET);
    require_once __DIR__ . '/../../app/bootstrap.php';
    if(isset($_GET['idObra'])){
        $idObra = $_GET['idObra'];
    }else{
        echo 'Variaveis não definidas';
        die();
    }

    try{
        $query = $pdo->prepare('DELETE FROM obras WHERE id_obra=:idObra;');

        $query->execute(array(
            ':idObra' => $idObra)
        );
        
    }catch(PDOException $e){
        echo 'erro';
    }

    header('Location: tela_principal_construtora.php');
?>

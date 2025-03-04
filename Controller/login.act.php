<?php 
    extract($_POST);
    require("../model/connect.php");

    session_start();
    $destino = "";
    $msg = "";

    $busca = mysqli_query($con, "SELECT * FROM `empresa` WHERE `email` = '$email'");
    var_dump($busca);

    if($busca->num_rows > 0){
        $empresa = mysqli_fetch_assoc($busca); 
        
        if(password_verify($senha, $empresa['senha'])){ // Verifica se a senha está correta
            
            $_SESSION["logado"] = true;
            $_SESSION["nome"]=$empresa["nome_empresa"];

            $destino = "../View/gerenciamento.php";
            $msg = "Bem-vindo, " . $_SESSION["nome"];
        } else {  
            $destino = "../View/login.php";
            $msg = "Email ou senha incorretos!";
        }
    } else {
        $destino = "../View/login.php";
        $msg = "Email ou senha incorretos!" ; 
    }

    $_SESSION["msg"] = $msg;
    header("location:$destino");
    exit; 
?>

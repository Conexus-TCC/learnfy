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
            
            $_SESSION["nome"]=$empresa["nome_empresa"];
            $_SESSION["id_empresa"]=$empresa["id_empresa"];
            $_SESSION["cnpj"]=$empresa["cnpj"];
            $_SESSION["ie"]=$empresa["ie"];
            $_SESSION["cep"]=$empresa["cep"];
            $_SESSION["telefone"]=$empresa["telefone"];
            $_SESSION["logo"]=$empresa["logo"];
            $_SESSION["email"]=$empresa["email"];

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

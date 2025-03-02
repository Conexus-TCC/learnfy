<?php 

    extract($_POST);

    require("../model/connect.php");

   

    session_start();
    $destino = "";
    $msg = "";
    $busca = mysqli_query($con, "SELECT * FROM `empresa` WHERE `email` = '$email'");
    if($busca->num_rows == 1){
    
        $empresa = mysqli_fetch_assoc($busca);
        var_dump($empresa['senha']);
        echo password_verify($senha,$empresa['senha']);
        if(password_verify($senha,$empresa['senha'])){
            //senha correta
            $_SESSION["logado"] = true;
            $_SESSION["nome"] = $empresa['nome'];
            $_SESSION["email"] =$empresa["email"];
            $_SESSION["foto"] = $empresa["foto"];
            $destino = "../View/gerenciamento.php";
            $msg = "Bem vindo " . $_SESSION["nome"];
        }else{  
            $destino = "../View/login.php";
            $msg = "Email ou senha incorretos1";
           

        }


    }else{
        $destino = "../View/login.php";
         $msg = "Email ou senha incorretos2";


    }
        echo $msg;
        $_SESSION["msg"] = $msg;
        header("location:$destino");




?>
<?php 


require("../model/connect.php");
extract($_POST);
extract($_FILES);
@session_start();

$dir = "../fotosSite/" .md5(time()) . ".jpg";

$busca = mysqli_query($con, "SELECT * FROM `empresa` WHERE `email` = '$email'");



if($busca->num_rows == 0){
    $senha = password_hash($senha,PASSWORD_DEFAULT);
    if(mysqli_query($con, "INSERT INTO empresa (nome_empresa,cnpj, cep,email, senha, logo,ddd, telefone) VALUES('$nome', '$cnpj' ,'$cep','$email','$senha', '$logo', null, '$telefone');")){
        move_uploaded_file($logo['tmp_name'],$dir);
        $_SESSION["msg"] = "Sucessoooo";
    }else{
        $_SESSION["msg"] = "erro!";
    }

}else{
    $_SESSION["msg"] = "Email já existente";
}


header("location:../View/cadastroEmpresa.php");










?>
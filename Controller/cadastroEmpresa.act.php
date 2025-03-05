<?php 


require("../model/connect.php");
extract($_POST);
extract($_FILES);
@session_start();

$dir = "../fotosSite/" .md5(time()) . ".jpg";
if(!file_exists("../fotosSite/empresa")){
    mkdir("../fotosSite/empresa", 0777, true);
}
$busca = mysqli_query($con, "SELECT * FROM `empresa` WHERE `email` = '$email'");



if($busca->num_rows == 0){
    $senha = password_hash($senha,PASSWORD_DEFAULT);
    if(mysqli_query($con, "INSERT INTO empresa (nome_empresa,cnpj, cep,email, senha, logo,ddd, telefone,ie) VALUES('$nome', '$cnpj' ,'$cep','$email','$senha', '$dir', null, '$telefone','$ie');")){
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
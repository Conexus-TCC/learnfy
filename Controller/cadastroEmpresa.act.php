<?php 
require("../model/connect.php");
extract($_POST);
extract($_FILES);
@session_start();

$dir = "../fotosSite/" .md5(time()) . ".jpg";
$busca = mysqli_query($con, "SELECT * FROM `empresa` WHERE `email` = '$email'");

if($busca->num_rows == 0){
    $senha = password_hash($senha,PASSWORD_DEFAULT);
    
    if(mysqli_query($con, "INSERT INTO empresa (nome_empresa,cnpj, cep,email, senha, logo,ddd, telefone,ie) VALUES('$nome', '$cnpj' ,'$cep','$email','$senha', '$dir', null, '$telefone','$ie');")){
        move_uploaded_file($logo['tmp_name'],$dir);
        $_SESSION['msg'] = "Sucesso!";
        $_SESSION['alertMsg'] = "Cadastro Realizado!";
        $_SESSION['alertIcon'] = "success";
    } else {
        $_SESSION['msg'] = "Erro!";
        $_SESSION['alertMsg'] = "Erro ao Cadastrar!";
        $_SESSION['alertIcon'] = "error";
    }

} else {
    $_SESSION['msg'] = "Email já existente!";
    $_SESSION['alertMsg'] = "Este email já está cadastrado!";
    $_SESSION['alertIcon'] = "error";
}

header("Location: ../View/cadastroEmpresa.php");
exit();
?>

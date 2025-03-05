<?php

require("../model/connect.php");
extract($_POST);
extract($_FILES);
@session_start();

$dir = "../fotosSite/colaborador" . md5(time()) . ".jpg";
if(!file_exists("../fotosSite/colaborador")){
    mkdir("../fotosSite/colaborador", 0777, true);
}

$buscaCpf = mysqli_query($con, "SELECT * FROM `usuario` WHERE `cpf` = '$cpf'");
$buscaEmail = mysqli_query($con, "SELECT * FROM `usuario` WHERE `email` = '$email'");

if($buscaCpf->num_rows == 0 && $buscaEmail->num_rows == 0){
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $query = "INSERT INTO usuario (nome_usuario, data_nascimento, sexo, ddd, telefone, email, senha, cpf, foto, status) 
         VALUES ('$nome', '$data_nascimento', '$sexo', '$ddd', '$telefone', '$email', '$senha', '$cpf', '$dir', $status)";
    if(mysqli_query($con, $query)){
        move_uploaded_file($logo['tmp_name'], $dir);
        $_SESSION["msg"] = "Sucesso!";
    } else {
        $_SESSION["msg"] = "Erro ao cadastrar: " . mysqli_error($con);
    }
} else {
    $_SESSION["msg"] = "Email ou CPF já cadastrado!";
}

header("location:../View/colaboradores.php");



// TUDO CERTO!



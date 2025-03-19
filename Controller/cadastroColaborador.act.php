<?php

require("../model/connect.php");
extract($_POST);
extract($_FILES);
@session_start();

$dir = "../fotosSite/" . md5(time()) . ".jpg";

$buscaCpf = mysqli_query($con, "SELECT * FROM `usuario` WHERE `cpf` = '$cpf'");
$buscaEmail = mysqli_query($con, "SELECT * FROM `usuario` WHERE `email` = '$email'");
$idEmpresa = $_SESSION["id_empresa"];

if($buscaCpf->num_rows == 0 && $buscaEmail->num_rows == 0){
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $query = "INSERT INTO usuario (nome_usuario, data_nascimento, sexo, ddd, telefone, email, senha, cpf, foto, status , id_empresa) VALUES ('$nome', '$data_nascimento', '$sexo', '$ddd', '$telefone', '$email', '$senha', '$cpf', '$dir', $status ,$idEmpresa)";
    if(mysqli_query($con, $query)){
        move_uploaded_file($logo['tmp_name'], $dir);
        $_SESSION['msg'] = "Sucesso!";
        $_SESSION['alertMsg'] = "Usuario cadastrado com sucesso!";
        $_SESSION['alertIcon'] = "success";
    } else {
        $_SESSION["msg"] = "Erro ao cadastrar: " . mysqli_error($con);
    }
} else {
    $_SESSION["msg"] = "Email ou CPF já cadastrado!";
    $_SESSION['alertMsg'] = "Erro ao Cadastrar!";
    $_SESSION['alertIcon'] = "error";
}
$_SESSION["contexto"] = "colaboradores";
header("location:../View/gerenciamento_empresa/colaboradores.php");



// TUDO CERTO!



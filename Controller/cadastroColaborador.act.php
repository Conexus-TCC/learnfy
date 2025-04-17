<?php

require("../model/connect.php");
extract($_POST);
extract($_FILES);
@session_start();

$dir = "../fotosSite/" . md5(time()) . ".jpg";

function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}

$buscaCpf = mysqli_query($con, "SELECT * FROM `usuario` WHERE `cpf` = '$cpf'");
$buscaEmail = mysqli_query($con, "SELECT * FROM `usuario` WHERE `email` = '$email'");
$idEmpresa = $_SESSION["id_empresa"];

if(!validaCPF($cpf)) {
    $_SESSION['msg'] = "CPF inválido!";
    $_SESSION['alertMsg'] = "CPF inválido!";
    $_SESSION['alertIcon'] = "error";
 
    header("Location: ../View/gerenciamento_empresa/colaboradores.php");
    exit();
}

if($buscaCpf->num_rows == 0 && $buscaEmail->num_rows == 0){
    $senha = password_hash($senha, PASSWORD_DEFAULT);
    $query = "INSERT INTO usuario 
    (nome_usuario, data_nascimento, sexo, ddd, telefone, email, senha, cpf, foto, status , id_empresa,nivel) 
    VALUES ('$nome', '$data_nascimento', '$sexo', '$ddd', '$telefone', '$email', '$senha', '$cpf', '$dir', $status ,$idEmpresa,$nivel)";
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



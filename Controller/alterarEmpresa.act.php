<?php
require("../model/Empresa.php");
session_start();
$id =  $_SESSION["id_empresa"];
$empresa = pegarEmpresa($id);
$email =  $empresa["email"]; 
$dir;
extract($_POST);
extract($_FILES);
if($empresa==0){
    $_SESSION['msg'] = "Error!";
    $_SESSION['alertMsg'] = "Empresa não encontrada!";
    $_SESSION['alertIcon'] = "error";
    header("location:../View/login.php");
    exit;
}
$dir = $empresa['logo'];
if($logo['size']>0){
    unlink($empresa['logo']);
    $dir = "../fotosSite/" .md5(time()) . ".jpg";
    if(!file_exists("../fotosSite/")){
        mkdir("../fotosSite/", 0777, true);
    }
    move_uploaded_file($logo['tmp_name'],$dir);
  }
  $dados = array("id_empresa"=>$id,"nome_empresa"=>$nome,"cnpj"=>$cnpj,"cep"=>$cep,"ie"=>$ie,"logo"=>$dir,"telefone"=>$telefone,"email"=>$email);
if(alterarEmpresa($dados)){
    $_SESSION["nome"] = $dados["nome_empresa"];
    $_SESSION["id_empresa"] = $dados["id_empresa"];
    $_SESSION["cnpj"] = $dados["cnpj"];
    $_SESSION["ie"] = $dados["ie"];
    $_SESSION["cep"] = $dados["cep"];
    $_SESSION["telefone"] = $dados["telefone"];
    $_SESSION["logo"] = $dados["logo"];
    $_SESSION["email"] = $dados["email"];
    $_SESSION['msg'] = "Sucesso!";
    $_SESSION['alertMsg'] = "Empresa Alterada com sucesso!";
    $_SESSION['alertIcon'] = "success";
    header("location:../View/gerenciamento_empresa/dashboard.php");

    exit;
}else{
    $_SESSION['msg'] = "erro!";
    $_SESSION['alertMsg'] = "Erro ao Alterar !";
    $_SESSION['alertIcon'] = "error";
    header("location:../View/gerenciamento_empresa/editarEmpresa.php");
    exit;
}

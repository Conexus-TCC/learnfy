<?php
require("../model/Empresa.php");
session_start();
$id =  $_SESSION["id_empresa"];
$empresa = pegarEmpresa($id);
$email =  $empresa["email"]; 
$dir;
extract($_POST);
extract($_FILES);
$dir = $empresa['logo'];
if($empresa==0){
    $_SESSION["msg"]= "Empresa não encontrada!";
    header("location:../View/login.php");
    exit;
}
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
    $_SESSION["msg"] = "Alterado com sucesso!";
   $_SESSION["empresa"] = $dados;
    header("location:../View/gerenciamento.php");

    exit;
}else{
    $_SESSION["msg"] = "Erro ao alterar!";
    header("location:../View/editarEmpresa.php");
    exit;
}

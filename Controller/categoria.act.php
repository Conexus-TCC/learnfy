<?php

require("../model/connect.php");
extract($_POST);
@session_start();

$idEmpresa =$_SESSION["id_empresa"];

    $query = "INSERT INTO categoria_curso (nome_categoria, id_empresa) VALUES ('$nome', '$idEmpresa')";
    if(mysqli_query($con, $query)){
        
        $_SESSION['msg'] = "Sucesso!";
        $_SESSION['alertMsg'] = "Categoria cadastrada com sucesso!";
        $_SESSION['alertIcon'] = "success";
    } else {
        $_SESSION["msg"] = "Erro ao cadastrar: " . mysqli_error($con);
    }

$_SESSION["contexto"] = "categorias";
header("location:../View/gerenciamento_empresa/");



// TUDO CERTO!



<?php
require("../model/connect.php");
@session_start();

if (isset($_POST['id_categoria'])) {
    $id_categoria = $_POST['id_categoria'];

    // Deleta o colaborador do banco de dados
    $query = "DELETE FROM categoria_curso WHERE id_categoria = '$id_categoria'";
    if (mysqli_query($con, $query)) {
        $_SESSION['msg'] = "Sucesso!";
    $_SESSION['alertMsg'] = "Categoria deletado com sucesso!";
    $_SESSION['alertIcon'] = "success";
    } else {
        $_SESSION["msg"] = "Erro ao excluir categoria: " . mysqli_error($con);
        $_SESSION['alertMsg'] = "Erro ao Cadastrar!";
        $_SESSION['alertIcon'] = "error";
    }
} else {
    $_SESSION["msg"] = "ID do colaborador não fornecido!";
    $_SESSION['alertMsg'] = "Erro ao excluir!";
    $_SESSION['alertIcon'] = "error";
}
$_SESSION["contexto"] = "categorias";
header("location:../View/gerenciamento_empresa/categorias.php");
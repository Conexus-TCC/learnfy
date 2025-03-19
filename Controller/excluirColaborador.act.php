<?php
require("../model/connect.php");
@session_start();

if (isset($_POST['id_usuario'])) {
    $id_usuario = $_POST['id_usuario'];

    // Deleta o colaborador do banco de dados
    $query = "DELETE FROM usuario WHERE id_usuario = '$id_usuario'";
    if (mysqli_query($con, $query)) {
        $_SESSION['msg'] = "Sucesso!";
    $_SESSION['alertMsg'] = "Colaborador deletado com sucesso!";
    $_SESSION['alertIcon'] = "success";
    } else {
        $_SESSION["msg"] = "Erro ao excluir colaborador: " . mysqli_error($con);
        $_SESSION['alertMsg'] = "Erro ao Cadastrar!";
        $_SESSION['alertIcon'] = "error";
    }
} else {
    $_SESSION["msg"] = "ID do colaborador não fornecido!";
    $_SESSION['alertMsg'] = "Erro ao Cadastrar!";
    $_SESSION['alertIcon'] = "error";
}
$_SESSION["contexto"] = "colaboradores";
header("location:../View/gerenciamento_empresa/colaboradores.php");
?>
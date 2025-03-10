<?php
require("../model/connect.php");
@session_start();

if (isset($_POST['id_usuario'])) {
    $id_usuario = $_POST['id_usuario'];

    // Deleta o colaborador do banco de dados
    $query = "DELETE FROM usuario WHERE id_usuario = '$id_usuario'";
    if (mysqli_query($con, $query)) {
        $_SESSION["msg"] = "Colaborador excluído com sucesso!";
    } else {
        $_SESSION["msg"] = "Erro ao excluir colaborador: " . mysqli_error($con);
    }
} else {
    $_SESSION["msg"] = "ID do colaborador não fornecido!";
}
$_SESSION["contexto"] = "colaboradores";
header("location:../View/gerenciamento.php");
?>
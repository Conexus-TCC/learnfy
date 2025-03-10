<?php
// filepath: /C:/xampp/htdocs/learnfy-main/Controller/alterarColaborador.act.php

require("../model/connect.php");
@session_start();

if (isset($_POST['id_usuario'])) {
    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $sexo = $_POST['sexo'];
    $ddd = $_POST['ddd'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $status = $_POST['status'];
    $senha = isset($_POST['senha']) && !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : null;

    // Atualiza os dados do colaborador no banco de dados
    $query = "UPDATE usuario SET 
                nome_usuario = '$nome', 
                data_nascimento = '$data_nascimento', 
                sexo = '$sexo', 
                ddd = '$ddd', 
                telefone = '$telefone', 
                email = '$email', 
                cpf = '$cpf', 
                status = '$status'";

    // Atualiza a senha apenas se foi fornecida
    if ($senha) {
        $query .= ", senha = '$senha'";
    }

    $query .= " WHERE id_usuario = '$id_usuario'";

    if (mysqli_query($con, $query)) {
        // Verifica se um novo arquivo de logo foi enviado
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] == UPLOAD_ERR_OK) {
            $dir = "../imagens/" . md5(time()) . ".jpg";
            move_uploaded_file($_FILES['logo']['tmp_name'], $dir);

            // Atualiza o caminho da foto no banco de dados
            $query = "UPDATE usuario SET foto = '$dir' WHERE id_usuario = '$id_usuario'";
            mysqli_query($con, $query);
        }

        $_SESSION["msg"] = "Colaborador atualizado com sucesso!";
    } else {
        $_SESSION["msg"] = "Erro ao atualizar colaborador: " . mysqli_error($con);
    }
} else {
    $_SESSION["msg"] = "ID do colaborador não fornecido!";
}
$_SESSION["contexto"] ="colaboradores";
header("location:../View/gerenciamento.php");
?>
<?php
@session_start();
echo "id da empresa ".$_SESSION["id_empresa"] ."<hr>";
echo "id_categoria " . $_POST["id_categoria"] . "<hr>";
echo "nome " . $_POST["nome"] . "<hr>";

require_once "../Model/connect.php";

if (isset($_POST['id_categoria'])) {
    $id_categoria = $_POST['id_categoria'];
    $nome = $_POST['nome'];
   

    // Atualiza os dados do categoria no banco de dados
    $query = "UPDATE categoria_curso SET 
                nome_categoria = '$nome' WHERE id_categoria = '$id_categoria'";

    if (mysqli_query($con, $query)) {
        // Verifica se um novo arquivo de logo foi enviado
       

        $_SESSION["msg"] = "sucesso!";
        $_SESSION['alertMsg'] = "Categoria atualizado com sucesso";
        $_SESSION['alertIcon'] = "succses";
    } else {
        $_SESSION["alertMsg"] = "Erro ao atualizar categoria: " . mysqli_error($con);
        $_SESSION['msg'] = "Erro ao Cadastrar!";
        $_SESSION['alertIcon'] = "error";
    }
} else {
    $_SESSION["msg"] = "erro ao Atualizar Categoria";
    $_SESSION['alertMsg'] = "ID da categoria não fornecido!";
    $_SESSION['alertIcon'] = "error";
}
$_SESSION["contexto"] ="categorias";
header("location:../View/gerenciamento_empresa/");




?>



<?php
require "../Model/connect.php";
@session_start();
$idEmpresa = $_SESSION["id_empresa"];
$nome_empresa = $_SESSION["nome"];
$query = mysqli_query($con, "Select * from categoria_curso where id_empresa = $idEmpresa ");
$categorias = array();
while (($a = $query->fetch_assoc()) != null) {
    array_push($categorias, $a);
}
/* Descomentear para ativar a necessidade do login
 */

// if(!isset($_SESSION["id_usuario"])){
//     $_SESSION["msg"] = "Você deve estar cadastrado para acessar essa pagina";
//     $_SESSION['alertMsg'] = "Acesso negado";
//     $_SESSION['alertIcon'] = "error";
//     header("location:login.php");
// }
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnFY</title>
    <?php include("parts/head.php") ?>
    <link rel="stylesheet" href="../Css/cursos.css">

<body>
    <?php
    include("parts/header.php");
    ?>

    <div id="principal">

        <div id="bar">
            <h1>Cursos <?= $nome_empresa ?></h1>
        </div>
        <div class="pesquisar">
            <div class="search-box">
                <span class="search-icon">Q</span>
                <input type="text" placeholder="Pesquisar curso" class="search-input">
            </div>
        </div>
        <?php
        foreach ($categorias as $key => $categoria) { 
        $query= "SELECT * FROM `cursos`
         WHERE id_empresa = $idEmpresa AND categoria = $categoria[id_categoria] "
          
            ?>

            <div class="categorias">

                <h1 id="tituloCategoria"><?=$categoria["nome_categoria"] ?></h1>
                <div>
                    <div class="cursos">
                        <img src="../Imagens/image 62.png" alt="">
                        <div class="barra">
                            <h1>$categoria</h1>
                        </div>

                        <h1>$nomeCurso</h1>
                        <div class="conteudoCard" id="oferecidoPor">
                            <p>Oferecido por:</p> <img src="../fotosSite/image 53.png" alt="">
                        </div>
                        <div class="conteudoCard">
                            <div>
                                <img src="../icones/image 8.png" alt="">
                                <p id="qtdAlunos">$500</p>
                            </div>
                            <button class="btnSituacao">$situacao</button>
                        </div>
                    </div>

                </div>

            </div>

        <?php } ?>


        <?php
        include("parts/footer.php");
        ?>
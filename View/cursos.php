<?php
/* Descomentear para ativar a necessidade do login
 */

// @session_start();
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

    <div id="bar"><h1>Cursos $nome_empresa</h1></div>
    <div class="pesquisar">
        <div class="search-box">
            <span class="search-icon">Q</span>
            <input type="text" placeholder="Pesquisar curso" class="search-input">
        </div>
    </div>

    <div class="categorias">

        <h1>$categoria</h1>
        <div>

            <div class="cursos">
                <img src="../fotosSite/image 62.png" alt="">
                <div><h1>$categoria</h1></div>
                <h1>$nomeCurso</h1>
                <div><p>Oferecido por:</p> <img src="" alt=""></div>
                <div><img src="../icones/image 8.png" alt=""> <p>500</p> <button>$situacao</button></div>
            </div>

        </div>

    </div>

    </div>

<?php 
    include("parts/footer.php");
?>
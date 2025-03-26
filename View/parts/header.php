<?php
@session_start();
$img = "../icones/usuario.svg";
$msg = "fazer login";
$link = "login.php";
if (isset($_SESSION["empresa"])) {
    $img = $_SESSION["empresa"]["logo"];
    $msg = $_SESSION["empresa"]["nome_empresa"];
    $link = "gerenciamento.php";
}
?>
<div class="fundo"></div>
<header id="nav"> <!--Nav-->

    <div>
        <a href="login.php"><img src="../Imagens/LogoLearnFy.png" id="logo"></a>
    </div>

    <div id="botoesNav">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="cursos.php">Cursos</a></li>
            <li><a href="sobre.php">Sobre</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
    </div>

    <div id="navLog">
        <a href="<?= $link ?>"><img src="<?= $img ?>" alt="Ícone de Usuário"></a>
        <p><a href="<?= $link ?>"><?= $msg ?></a></p>
    </div>
    <div class="burger">
        <div class="fatia"></div>
        <div class="fatia"></div>
        <div class="fatia"></div>
    </div>
    <div class="menu">
        <div>
            <a href="<?= $link ?>"><img src="<?= $img ?>" alt="Ícone de Usuário"></a>
            <div class="burger">
                <div class="fatia"></div>
                <div class="fatia"></div>
                <div class="fatia"></div>
            </div>
        </div>
        <a href="index.php">Home</a>
        <a href="#">Cursos</a>
        <a href="sobre.php">Sobre</a>
        <a href="contato.php">Contato</a>
    </div>

</header><!--Fim nav-->
<script src="../js/burger.js"></script>
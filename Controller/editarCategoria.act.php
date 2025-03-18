<?php
@session_start();
echo "id da empresa ".$_SESSION["id_empresa"] ."<hr>";
echo "id_categoria " . $_POST["id_categoria"] . "<hr>";
echo "nome " . $_POST["nome"] . "<hr>";

?>
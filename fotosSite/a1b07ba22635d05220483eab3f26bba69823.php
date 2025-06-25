<?php
    if(!$con = mysqli_connect('localhost','root','','calculadora')){
        echo "Erro ao se conectar com a base de dados";
    }
    else{
    // echo "conectado com a base de dados";

    }

    // mysqli_query($con,"SET NAMES utf8");

    date_default_timezone_set("America/Sao_Paulo")
    ?>
<?php
@session_start();
require_once "../Model/connect.php";
// var_dump($_POST);
extract($_POST);
if(mysqli_query($con,"select id_aula from progresso where id_aula = $idAula")->num_rows==0){
  mysqli_query($con,"INSERT INTO `progresso` (`id_usuario`,`id_aula`,`tempo_assistido`) VALUES 
  ('$_SESSION[id_usuario]',$idAula,$tempoAssistido) ");
    echo "Criado ";
}else{
  
  mysqli_query($con, "UPDATE `progresso` set `tempo_assistido` = $tempoAssistido 
  where `id_aula`= $idAula AND `id_usuario`= $_SESSION[id_usuario] ");
  echo "Atualizado";
}
?>
<?php
@session_start();
require "../Model/connect.php";
if(!isset($_GET["id"])){
die("sem id");
}
$idCurso =$_GET["id"];
$query = mysqli_query($con, "SELECT id_aula,video FROM `aula` where id_curso = '$idCurso'");
$arr = array();
while ($a = $query->fetch_assoc()) {
  array_push($arr, $a);
}

foreach ($arr as $key => $idAula) {
  $a =  mysqli_query($con, "SELECT caminho FROM `materiais_aula` WHERE id_aula = '$idAula[id_aula]' ");
  if ($a->num_rows > 0) {
    while (($row = $a->fetch_assoc()) != null) {
      @unlink($row["caminho"]);
    }
  }
  $a= mysqli_query($con,"SELECT * from quiz where id_aula = '$idAula[id_aula]' ");
  if($a->num_rows>0){
    while (($row = $a->fetch_assoc()) != null) {
      $q=mysqli_query($con,"SELECT id_pergunta from pergunta where id_quiz=$row[id_quiz]");
      if ($q->num_rows > 0) {
        while (($row2 = $q->fetch_assoc()) != null){
          mysqli_query($con,"DELETE FROM resposta where id_pergunta = $row2[id_pergunta]");
          mysqli_query($con, "DELETE FROM pergunta where id_pergunta = $row2[id_pergunta]");
      }
        mysqli_query($con, "DELETE FROM quiz where id_quiz = $row[id_quiz]");
    }
  }
  }
  @unlink($idAula["video"]);
  $sqlErr1 = " DELETE FROM `materiais_aula` WHERE `id_aula` = '$idAula[id_aula]'";
  $sqlErr2 = "DELETE FROM `aula` WHERE `id_aula` = '$idAula[id_aula]'";
  
  mysqli_query($con, $sqlErr1);
  mysqli_query($con, $sqlErr2);
 if(isset($_GET["curso"])){

  mysqli_query($con,"DELETE FROM `curso` where id_curso = $idCurso");
 }
 echo mysqli_error($con);
}
?>
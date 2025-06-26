<?php
require_once "../Model/connect.php";
require_once "../helpers/getid3/getid3.php";
$getId3 = new getID3;
@session_start();
// header("Content-Type: application/json; charset=UTF-8");

$id_curso = $_SESSION["id_curso"];
/*
em caso de erro executar o seguinte comando no banco de dados:
*/
function err($id_curso,$con){
  $query = mysqli_query($con,"SELECT id_aula FROM `aula` where id_curso = '$id_curso'" );
  $arr= array();
  while($a =$query->fetch_assoc()){
    array_push($arr,$a["id_aula"]);
  }
  
  foreach ($arr as $key => $idAula) {
    $a =  mysqli_query($con,"SELECT caminho FROM `materiais_aula` WHERE id_aula = '$idAula' ");
    if($a->num_rows>0){
      while (($row = $a->fetch_assoc()) != null) {
        @unlink($row["caminho"]);
      }
    }
    $sqlErr1 = " DELETE FROM `materiais_aula` WHERE `id_aula` = '$idAula'";
    $sqlErr2 = "DELETE FROM `aula` WHERE `id_aula` = '$idAula'";
    mysqli_query($con,$sqlErr1);
    mysqli_query($con,$sqlErr2);
    mysqli_error($con);
  }
}
// json_encode($_FILES);
extract($_POST);
extract($_FILES);

foreach ($_POST as $key => $value) {
  if(!isset($_POST[$key])|| $_POST[$key] == "" ){
    echo json_encode(array("msg" => "error", "alertMsg" => "o campo $key esta faltando", "alertIcon" => "error"));
    http_response_code("400");  
    err($id_curso,$con);
    exit();
  }
}
if(!isset($video_aula)){
  echo json_encode(array("msg" => "error", "alertMsg" => "A aula de conter um video - aula", "alertIcon" => "error"));
  http_response_code("400");
  err($id_curso, $con);
  exit();
}
if(!str_contains($video_aula['type'], 'video/')){
  err($id_curso, $con);
   echo json_encode(array("msg"=>"error","alertMsg"=>"Formato de video inválido!","alertIcon"=>"error"));
    http_response_code("400");
    exit();
}

$caminhoVideo = "../fotosSite/". md5(time()) . rand(1,1000) .$id_curso . ".mp4";
@move_uploaded_file($video_aula['tmp_name'], $caminhoVideo);
$tempoEmSegundos = $getId3->analyze($caminhoVideo)["playtime_seconds"];

if(mysqli_query($con,"INSERT INTO `aula` (`nome`, `descricao`, `id_curso`, `video`,`tempo_em_segundos`) 
VALUES ('$titulo_aula', '$descricao_aula', '$id_curso','$caminhoVideo',$tempoEmSegundos) ")){
$idAula= mysqli_insert_id($con);
  mysqli_query($con,"INSERT INTO `quiz` (`id_aula`) values ($idAula)");
 $idQuiz = mysqli_insert_id($con);
 
 foreach ($questoes as $questao) {
   $index = $questao["respostaCorreta"];
  //  echo "INSERT INTO `pergunta` (`pergunta`,`id_quiz`) values('$questao[pergunta]',$idQuiz";
    mysqli_query($con, "INSERT INTO `pergunta` (`pergunta`,`id_quiz`) values('$questao[pergunta]',$idQuiz)");
   $idPergunta = mysqli_insert_id($con);
  $respostas =array();
  foreach($questao["respostas"] as $resposta){
    mysqli_query($con,"INSERT INTO `resposta` (`resposta`,`id_pergunta`) values('$resposta',$idPergunta)");
    array_push($respostas,mysqli_insert_id($con));
  }
 mysqli_query($con,"UPDATE `pergunta` set `id_res_certa` = $respostas[$index] WHERE `id_pergunta`= $idPergunta;" );
 

}


$cont = count($input_materiais["name"]);
for($i=0;$i<$cont;$i++){
  if($input_materiais["name"][$i]!=""){
    $ext = pathinfo($input_materiais["full_path"][$i], PATHINFO_EXTENSION);
    $caminhoMaterial = "../fotosSite/". md5(time()) .rand(1, 1000) .$id_curso . ".".$ext;
    $filename = $input_materiais["name"][$i];
    $sql = "INSERT INTO `materiais_aula` (`filename`, `caminho`, `id_aula`) VALUES ('$filename', '$caminhoMaterial', '$idAula')";
    if(mysqli_query($con,$sql)){
      @move_uploaded_file($input_materiais["tmp_name"][$i],$caminhoMaterial);
    }else{
      echo json_encode(array("msg"=>"error","alertMsg"=>"Erro ao cadastrar o material!","alertIcon"=>"error"));
      http_response_code("400");
      err($id_curso, $con);
      exit();
    }

  }
}
  echo json_encode(array("msg" => "success", "alertMsg" => "Aula cadastrada com sucesso!", "alertIcon" => "success"));
  http_response_code("200");
  unset($_SESSION["contexto"]);
  exit();
}else{
  err($id_curso, $con);
 echo json_encode(array("msg" => "error", "alertMsg" => "Erro ao cadastrar a aula!", "alertIcon" => "error"));
  http_response_code("400");
  exit();
}


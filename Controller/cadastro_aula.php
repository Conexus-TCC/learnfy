<?php
require_once "../Model/connect.php";
@session_start();
header("Content-Type: application/json; charset=UTF-8");

$id_curso = $_SESSION["id_curso"];
/*
em caso de erro executar o seguinte comando no banco de dados:
*/
$sqlErr = "delete from `aula` where `id_curso` = $id_curso";
json_encode($_FILES);
extract($_POST);
extract($_FILES);
if(!str_contains($video_aula['type'], 'video/')){
  mysqli_query($con,$sqlErr);
   echo json_encode(array("msg"=>"error","alertMsg"=>"Formato de video inválido!","alertIcon"=>"error"));
    http_response_code("400");
    exit();
}
$caminhoVideo = "../fotosSite/". md5(time()) .$id_curso . ".mp4";

if(mysqli_query($con,"INSERT INTO `aula` (`nome`, `descricao`, `id_curso`, `video`) 
VALUES ('$titulo_aula', '$descricao_aula', '$id_curso','$caminhoVideo') ")){
$id_aula= mysqli_insert_id($con);
move_uploaded_file($video_aula['tmp_name'],$caminhoVideo);
$cont = count($input_materiais["name"]);
for($i=0;$i<$cont;$i++){
  if($input_materiais["name"][$i]!=""){
    $ext = pathinfo($input_materiais["full_path"][$i], PATHINFO_EXTENSION);
    $caminhoMaterial = "../fotosSite/". md5(time()) .$id_curso . ".".$ext;
    $filename = $input_materiais["name"][$i];
    $sql = "INSERT INTO `materiais_aula` (`filename`, `caminho`, `id_aula`) VALUES ('$filename', '$caminhoMaterial', '$id_aula')";
    if(mysqli_query($con,$sql)){
      move_uploaded_file($input_materiais["tmp_name"][$i],$caminhoMaterial);
     echo json_encode(array("msg"=>"success","alertMsg"=>"Aula cadastrada com sucesso!","alertIcon"=>"success"));
      http_response_code("200");
    }else{
      mysqli_query($con,$sqlErr);
      echo json_encode(array("msg"=>"error","alertMsg"=>"Erro ao cadastrar o material!","alertIcon"=>"error"));
      http_response_code("400");
      exit();
    }

  }
}
}else{
  mysqli_query($con, $sqlErr);
 echo json_encode(array("msg" => "error", "alertMsg" => "Erro ao cadastrar a aula!", "alertIcon" => "error"));
  http_response_code("400");
  exit();
}
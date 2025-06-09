<?php
@session_start();
require "../Model/connect.php";
extract($_POST);
header("content-type:json/application");
$sql = "SELECT id_res_certa FROM `pergunta` where id_pergunta = $idPergunta";
$res =  mysqli_query($con,$sql)->fetch_assoc();
if(mysqli_query($con, "SELECT id_usuario from perguntas_respondidas where id_usuario ='$_SESSION[id_usuario]' AND id_pergunta = $idPergunta")->num_rows>0){
  die(json_encode(array("status" => false, "motivo" => "Erro interno", "resp" => $resposta)));
}
if($res["id_res_certa"]==$resposta){
  if(mysqli_query($con, "INSERT INTO `perguntas_respondidas` (`id_usuario`,`id_pergunta`,`acertado`) VALUES 
  ('$_SESSION[id_usuario]',$idPergunta,1) ")){
    echo json_encode(array("status"=>true, "resp" => $resposta));
  }else{
    echo json_encode(array("status" => false,"motivo"=>"Erro interno","resp"=>$resposta));
  }
  exit;
}else{
  if (mysqli_query($con, "INSERT INTO `perguntas_respondidas` (`id_usuario`,`id_quiz`,`tempo_assistido`) VALUES 
  ('$_SESSION[id_usuario]',$idQuiz,0) "))
  echo json_encode(array("status" => false, "motivo" => "Resposta Errada", "resp" => $resposta));
  exit;
}
?>
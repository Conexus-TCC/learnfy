<?php
@session_start();
require "../Model/connect.php";
extract($_POST);
header("content-type:json/application");
$sql = "SELECT id_res_certa FROM `pergunta` where id_pergunta = $idPergunta";
$res =  mysqli_query($con,$sql)->fetch_assoc();
if($res["id_res_certa"]==$resposta){
  if(mysqli_query($con, "INSERT INTO `progresso` (`id_usuario`, `id_pergunta`, `id_quiz`) VALUES ('$_SESSION[id_usuario]', '$idPergunta', '$idQuiz') ")){
    echo json_encode(array("status"=>true));
  }else{
    echo json_encode(array("status" => false,"motivo"=>"Erro interno","resp"=>$resposta));
  }
  exit;
}else{
  echo json_encode(array("status" => false, "motivo" => "Resposta Errada", "resp" => $resposta));
  exit;
}
?>
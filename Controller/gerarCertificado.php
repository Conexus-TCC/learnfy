<?php
@session_start();
require_once "../Model/connect.php";
if(!isset($_GET["curso"])&& !isset($_SESSION["id_usuario"])){
  $_SESSION['msg'] = "Errro";
  $_SESSION['alertMsg'] = "Curso invalido";
  $_SESSION['alertIcon'] = "error";
  header("location:../View/conteudoCurso.php");
  die();
}
$idUsuario = $_SESSION["id_usuario"];
$idCurso = $_GET["curso"];


$cert= mysqli_query($con, "SELECT id_certificado from certificado where id_usuario = $idUsuario AND id_curso = $idCurso");
if($cert->num_rows >= 1){
  $a = $cert->fetch_assoc()["id_certificado"];
  header("location:../View/certificado.php?id=$a");
  die();
}


$query = "SELECT SUM(aula.tempo_em_segundos) tempo_total, SUM(progresso.tempo_assistido) as tempo_assitido,quer.corretas,COUNT(pergunta.id_pergunta) as perguntas  from curso 
RIGHT JOIN usuario on usuario.id_usuario = $idUsuario
INNER JOIN aula on aula.id_curso = curso.id_curso
LEFT JOIN quiz on quiz.id_aula = aula.id_aula
left JOIN pergunta on pergunta.id_quiz = quiz.id_aula
LEFT JOIN progresso on progresso.id_usuario = usuario.id_usuario AND progresso.id_aula = aula.id_aula
left JOIN(SELECT COUNT(DISTINCT perguntas_respondidas.id_pergunta) as corretas,usuario.id_usuario FROM pergunta 
LEFT JOIN perguntas_respondidas on perguntas_respondidas.id_pergunta = pergunta.id_pergunta AND perguntas_respondidas.acertado =1
left JOIN usuario on perguntas_respondidas.id_usuario = usuario.id_usuario
GROUP by usuario.id_usuario
)as quer on quer.id_usuario = usuario.id_usuario
WHERE curso.id_curso=$idCurso
GROUP BY curso.id_curso";
$res = mysqli_query($con, $query);
if($res){
  $data = $res->fetch_assoc();
  $percTempo= round($data["tempo_total"] * 0.70);
  $percPerguntas= round($data["perguntas"] * 0.70);
  if($data["tempo_assitido"] >=$percTempo &&$data["corretas"]>=$percPerguntas){
    echo "true";
    if(mysqli_query($con,"INSERT INTO `certificado`(id_curso,id_usuario) values ($idCurso,$idUsuario) ")){
      $idCert = mysqli_insert_id($con);
      header("location:../View/certificado.php?id=$idCert");
    };
    die();
  }else{
    echo($idCurso."<br>".$idUsuario);
    $_SESSION['msg'] = "Erro";
    $_SESSION['alertMsg'] = "Você não Atigiu os requesitos minimos para resgatar o seu certificado";
    $_SESSION['alertIcon'] = "error";
    header("location:../View/conteudoCurso.php?curso=$idCurso");
    die();
  }
}else{
  $_SESSION['msg'] = "Erro";
  $_SESSION['alertMsg'] = "Erro Interno";
  $_SESSION['alertIcon'] = "error";
  header("location:../View/conteudoCurso.php");
  die();
}
?>
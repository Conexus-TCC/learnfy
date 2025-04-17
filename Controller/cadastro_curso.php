<?php
  session_start();
  if(!isset($_SESSION["id_empresa"])){
  $_SESSION["msg"] = "Error";
  $_SESSION['alertMsg'] = "voce não está logado!";
  $_SESSION['alertIcon'] = "error";
    header("Location: ../View/login.php");
    exit();
  }
$idEmpresa=$_SESSION["id_empresa"];
  extract($_POST);
  extract($_FILES);
 if(!str_contains($imagem['type'], 'image/')){
    $_SESSION['alertMsg'] = "Formato de imagem inválido!";
    $_SESSION['alertIcon'] = "error";
    header("Location: ../View/gerenciamento_empresa/cursos.php");
    exit();
  }
  require_once "../Model/connect.php";
  $descricao = mysqli_real_escape_string($con, $descricao);
  $caminho = "../fotosSite/". md5(time()) .$idEmpresa . ".jpg";
  $sql = "insert into `curso` (`nome`, `descricao`, `imagem`, `categoria`, `id_empresa`,`nivel`) 
  values ('$titulo', '$descricao', '$caminho', '$categoria', '$idEmpresa',$nivel)";
  if(mysqli_query($con,$sql)){
    move_uploaded_file($imagem['tmp_name'],$caminho);
    $_SESSION["nome_curso"]=$titulo;
    $_SESSION["id_curso"]=mysqli_insert_id($con);
    $_SESSION['contexto']="aulas";
  header("location:../View/gerenciamento_empresa/aulas.php");
}
?>
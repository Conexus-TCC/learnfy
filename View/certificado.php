<!DOCTYPE html>
<html lang="en">
<?php
require "../Model/connect.php";
if (!isset($_GET["id"])) {
  $_SESSION['msg'] = "Errro";
  $_SESSION['alertMsg'] = "Certificado não existente";
  $_SESSION['alertIcon'] = "error";
  header("location:../View/");
  die();
}
$query = "SELECT empresa.nome_empresa,
usuario.nome_usuario,
curso.nome as curso_nome,
certificado.data_emissao,
SUM(aula.tempo_em_segundos)as tempo
FROM certificado 
left JOIN usuario on usuario.id_usuario = certificado.id_usuario
left JOIN empresa on empresa.id_empresa = usuario.id_Empresa
left JOIN curso on curso.id_curso = certificado.id_curso
left JOIN aula on aula.id_curso = certificado.id_curso
WHERE certificado.id_certificado=$_GET[id]";
$result = mysqli_query($con, $query)->fetch_assoc();
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificado</title>
</head>

<body>
  <h3><?= $result["nome_empresa"] ?> Certifica que</h3>
  <h1> <?= $result["nome_usuario"] ?> </h1>
  <h3>Completou o curso <h1><?= $result["curso_nome"] ?> </h1> com sucesso</h3>
  <h3>em <?= $result["data_emissao"] ?></h3>
  <p>Representado o total de <?= $result["tempo"] ?></p>


</body>

</html>
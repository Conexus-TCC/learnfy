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
curso.nome as nome_curso,
empresa.logo,
certificado.data_emissao,
SUM(aula.tempo_em_segundos)as tempo
FROM certificado 
left JOIN usuario on usuario.id_usuario = certificado.id_usuario
left JOIN empresa on empresa.id_empresa = usuario.id_Empresa
left JOIN curso on curso.id_curso = certificado.id_curso
left JOIN aula on aula.id_curso = certificado.id_curso
WHERE certificado.id_certificado=$_GET[id]";
$result = mysqli_query($con, $query)->fetch_assoc();
$svg = file_get_contents("../icones/selo.svg");
function horaOuMinutos($horas)
{
  if (round($horas / 3600) > 0) {
    return round($horas / 3600) . " hora(s)";
  } else {
    return round($horas / 60) . " minutos(s)";
  }
}
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Certificado</title>
  <?php require "parts/head.php"; ?>
  <link rel="stylesheet" href="../Css/certificado.css" />
</head>

<body>
  <main>
    <h3>CERTIFICADO</h3>
    <div class="texto">
      A <strong><?= $result['nome_empresa'] ?></strong> e a <strong>Learnfy</strong> certifica, <strong><?= $result['nome_usuario'] ?></strong>,
      que concluiu com êxito o curso
      <strong><?= $result["nome_curso"] ?></strong> com uma carga horaria de <strong><?= horaOuMinutos($result["tempo"]) ?></strong> em
      <strong><?= date_format(date_create($result["data_emissao"]), "d/n/Y") ?></strong>
    </div>
    <div class="baixo">
      <img crossorigin="anonymous" src="<?= $result['logo'] ?>" alt="">
      <div class="assinatura">
        <p>Conexus</p>
        <div class="barra"></div>
        <p>Assinatura</p>
      </div>
      <img  class="selo" src="data:image/svg+xml;base64,<?=base64_encode($svg)?>">
    </div>
  </main>

</body>

</html>
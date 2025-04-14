<?php
#require "../Model/connect.php";
#$idCurso = $_GET["curso"];
#$SQL = "SELECT
# curso.*,materiais_aula.*, aula.* FROM `curso` 
#RIGHT JOIN aula on curso.id_curso = aula.id_curso 
#RIGHT JOIN materiais_aula on materiais_aula.id_aula = aula.id_aula 
#where curso.id_curso = $idCurso";
#$query = mysqli_query($con,$SQL);
#if($query->num_rows<=0){
#  echo "CURSO Não ENCONTRADO";
#  exit();
#}
#$dados = array();
#
#while(($a = $query->fetch_assoc())!=null){
#  array_push($dados,$a);
#}
#
#var_dump($dados);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Curso $nome_curso</title>
</head>
<?php require "./parts/head.php" ?>

<body>
  <?php require "./parts/header.php" ?>
  <main>
    <h2>Insira Aqui</h2>
  </main>

  <?php require "./parts/footer.php" ?>


</body>

</html>
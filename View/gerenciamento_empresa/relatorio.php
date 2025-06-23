<?php
@session_start();
require "../../model/connect.php";
$_SESSION["contexto"] = "relatorio";
$sql = "SELECT usuario.nome_usuario as nome, usuario.foto, usuario.email, usuario.nivel, COUNT(curso.id_curso) as cursos, SUM(progresso.tempo_assistido) as tempoAssistido 
          FROM usuario 
          LEFT JOIN curso ON curso.id_empresa = usuario.id_empresa AND curso.nivel <= usuario.nivel 
          LEFT JOIN progresso ON progresso.id_usuario = usuario.id_usuario 
          WHERE usuario.id_empresa = $_SESSION[id_empresa] 
          GROUP BY usuario.id_usuario;";
$funcs = [];
$res = mysqli_query($con, $sql);
while ($a = $res->fetch_array()) {
  $funcs[] = $a;
}
?>

<link rel="stylesheet" href="/learnfy/Css/relaotorio.css">
<script src="/learnfy/js/sweetalert.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<main>
  <div class="funcionarios">
    <?php foreach ($funcs as $funcionario): ?>
      <div class="card">
        <div class="imagem">
          <img src="../<?= $funcionario['foto'] ?>" alt="Foto de <?= $funcionario['nome'] ?>">
        </div>
        <div class="campos">
          <h1><?= $funcionario['nome'] ?></h1>
          <h2><?= $funcionario['email'] ?></h2>
          <h3>Nível: <?= $funcionario['nivel'] ?></h3>
          <p>Cursos Disponíveis: <?= $funcionario['cursos'] ?></p>
          <p>Tempo Assistido: <?= sprintf('%02dH %02dM', $funcionario["tempoAssistido"] / 3600, floor($funcionario["tempoAssistido"] / 60) % 60)?>H</p>
          <a href="#">Estatísticas</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>
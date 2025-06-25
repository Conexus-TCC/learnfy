<?php
@session_start();
include '../parts/head.php'
?>
<!DOCTYPE html>
<link rel="stylesheet" href="../../Css/gerenciamento.css">
<link rel="stylesheet" href="../../Css/colaboradores.css">
<link rel="stylesheet" href="../../Css/cadastro_Aula.css">
<script src="../../js/jquery-3.7.1.min.js"></script>
<div class="page-header">
  <div class="page-title">
    <h1>Aulas</h1>
    <p class="page-subtitle">configure as aulas do "<?= $_SESSION["nome_curso"] ?>"</p>
  </div>
</div>
<button class="btn-Add-Aula">
  <svg width="20" height="20" viewBox="0 0 384 380" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M192 79.167V300.834M80 190H304" stroke="#92386B" stroke-width="50" stroke-linecap="round" stroke-linejoin="round" />
  </svg>
  <span>adicionar aula</span> </button>
<div class="aulas">
  <script>
    const idCurso = <?= $_SESSION["id_curso"]?>
  </script>
</div>
<button id="enviar" type="submit">Próximo</button>
<script type="module" src="../../js/addAula.js"> </script>
<script>
  function colapsar(id, btn) {
    console.log(btn.style);
    const div = document.querySelector(`.campos.a${id}`);
    div.classList.toggle("colapsed");
    btn.style.rotate = btn.style.rotate == 0 + "deg" ? 180 + "deg" : 0 + "deg";
    btn.style.transition = "0.5s";
  }

  function deletar(id) {
    document.querySelector(`${id}`).remove()
  }
</script>
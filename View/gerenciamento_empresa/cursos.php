<?php
session_start();
$_SESSION["contexto"] = "cursos";
require '../../Model/connect.php';
?>
<link rel="stylesheet" href="../../Css/gerenciamento.css">
<link rel="stylesheet" href="../../Css/cadastro_cursos.css">
<link rel="stylesheet" href="../../Css/colaboradores.css">
<div class="page-header">
  <div class="page-title">
    <h1>Cursos</h1>
    <p class="page-subtitle">Cadastre um curso para seus colaboradores</p>
  </div>
</div>

<div class="page-content">
  <form action="../../Controller/cadastro_curso.php" method="post" class="form-cadastro" enctype="multipart/form-data">
    <div class="row">
      <label for="titulo">
        <p>Titulo do curso</p>
        <input type="text" name="titulo" id="titulo">
      </label>

      <label for="categoria">
        <p>Categoria do curso</p>
        <select name="categoria" id="categoria">
          <option value="">Selecione uma categoria</option>
          <?php
          $sql = "SELECT * FROM categoria_curso WHERE id_empresa = $_SESSION[id_empresa] ";
          $result = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='$row[id_categoria]'>$row[nome_categoria] </option>";
          }
          ?>
        </select>
    </div>

    <label for="descricao">
      <p>Descrição do curso</p>
      <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea>
    </label>

    <label for="">
      <p>Nivel do Curso</p>
      <select name="nivel" id="">
        <option value="NULL">insira o nivel do curso</option>
        <option value="0">Para todos</option>
        <option value="1">Para alguns</option>
        <option value="2">Para Poucos </option>
      </select>
    </label>
    
    <label for="imagem" class="label-imagem">
      <p>Clique ou arraste o banner da imagem</p>
      <img src="" alt="" id="preview" style="display: none;">
      <input type="file" name="imagem" id="imagem">
    </label>



    <button class="enviar" type="submit">Enviar</button>
  </form>
</div>
<script>
  const fileInput = document.getElementById("imagem")
  const label = document.querySelector(".label-imagem")
  const img = document.querySelector("#preview")
  const span = document.querySelector(".label-imagem>p")
  fileInput.addEventListener("change", e => {
    const file = e.target.files[0]
    console.log(file)
    const reader = new FileReader()
    if (file && file.type.startsWith("image/")) {
      reader.readAsDataURL(file)
      reader.onload = () => {
        img.src = reader.result
        span.innerText = ""
        img.style.display = "block"
        label.style.backgroundColor = "white"
      }
    } else {
      span.innerText = "Formato de arquivo inválido. Por favor, selecione uma imagem."
      img.style.display = "none"
    }

  })
  label.addEventListener("dragover", e => {
    e.preventDefault()
    span.innerText = "solte o arquivo"
  })
  label.addEventListener("dragleave", e => {
    e.preventDefault()
    span.innerText = "click ou arraste"
  })
  label.addEventListener("drop", e => {
    e.preventDefault()
    console.log(e)
    const file = e.dataTransfer.files[0]
    const reader = new FileReader()
    if (file && file.type.startsWith("image/")) {
      reader.readAsDataURL(file)
      reader.onload = () => {
        img.src = reader.result
        span.innerText = ""
        img.src = reader.result
        img.style.display = "block"
        label.style.backgroundColor = "white"
      }
    }
  })
</script>
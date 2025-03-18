<?php
@session_start();
$_SESSION["contexto"] = "categorias";
?>
<link rel="stylesheet" href="/learnfy/Css/Colaboradores.css">
<!-- Conteúdo específico da página de colaboradores -->
<div class="page-header">
  <div class="page-title">
    <h1>Categorias cursos</h1>
    <p class="page-subtitle">Gerencie os categoria de cursos da sua empresa</p>
  </div>
</div>

<?php


@session_start();



$idEmpresa = $_SESSION["id_empresa"];


?>
<!-- ---------- cadastro -->
<div id="telaCadastro">
  <!-- Coluna do Ícone -->
  <div id="iconeCadastro">
    <p>Cadastro categorias</p>
    <img src="/learnfy/Imagens/categoria.png" alt="Ícone" id="imagemEmpresa">
  </div>
  <!-- Coluna do Formulário -->

  <form id="cadastro" action="/learnfy/Controller/categoria.act.php" method="post" name="cadastroColaborador">
    <div class="container">

      <div class="row">
        <label for="nome">
          Nome
          <input type="text" id="nome" name="nome" required>
        </label>

      </div>
      <button class="enviar" type="submit">
        <img src="../../icones/Send.svg" alt="">
        <span>Cadastrar</span></button>
    </div>
  </form>
</div>

<!-- Mostrar Colaboradores -->
<div class="mostrarColaboradores">
  <h2>Categorias cadastradas</h2>
  <table class="colaboradores-table">
    <thead>
      <tr>
        <th>Nome</th>

        <th>Ações</th>
      </tr>
    </thead>

    <tbody id="colaboradores-tbody">
      <?php
      @session_start();
      require("../../model/connect.php");



      $busca = mysqli_query($con, "SELECT * from categoria_curso WHERE id_empresa= $idEmpresa");

      if ($busca->num_rows > 0) {
        while ($row = $busca->fetch_assoc()) {

          echo '<td>' . $row['nome_categoria'] . '</td>';

          echo '<td>';
          echo "<button onclick='alterarColaborador(" . json_encode($row) . ")' class='alterar-btn'>Alterar</button>";
          echo '<form action="/learnfy/Controller/excluirCategoria.act.php" method="post" style="display:inline;">
                          <input type="hidden" name="id_categoria" value="' . $row['id_categoria'] . '">
                          <button type="submit" class="excluir-btn">Excluir</button>
                        </form>';
          echo '</td>';
          echo '</tr>';
        }
      } else {
        echo '<tr><td colspan="8">Nenhum categoria cadastrada.</td></tr>';
      }
      ?>
    </tbody>
  </table>
</div>

<!-- Formulário de Edição -->


<script src="../../js/file.js"></script>

<!-- ---------- fim cadastro -->
</div>

<script>
  // Toggle sidebar
  const sidebar = document.getElementById('sidebar');
  const sidebarToggle = document.getElementById('sidebar-toggle');

  sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
  });

  function alterarColaborador(obj) {
    scrollTo({
      top: 0,
      behavior: "smooth"
    })
    document.querySelector("#iconeCadastro>p").innerText = "Editar Categoria"
    document.querySelector(".enviar>span").innerText = "Editar"
    const form = document.querySelector("#cadastro")
    let inputhidden = document.querySelector("#inputIdCategoria")
    console.log(inputhidden)
    if (inputhidden) {
      inputhidden.value = obj.id_categoria
    } else {
      inputhidden = document.createElement("input")
      inputhidden.type="hidden"
      form.appendChild(inputhidden)
      inputhidden.id = "inputIdCategoria"
      inputhidden.value = obj.id_categoria
      inputhidden.name = "id_categoria"

    }

    const inputNome = document.querySelector("#nome");
    inputNome.value = obj.nome_categoria
    form.action = "/learnfy/Controller/editarCategoria.act.php"
  }
</script>

</body>

</html>

<!-- < ?php  -->
<!-- 
    @session_start();
    if (isset($_SESSION["msg"])) {
        echo "<p>" . $_SESSION["msg"] . "</p>";
        unset($_SESSION["msg"]); 
    }
  -->
<!-- ?>  -->
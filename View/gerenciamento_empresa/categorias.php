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

      <form id="cadastro" action="/learnfy/Controller/categoria.act.php" method="post" enctype="multipart/form-data" name="cadastroColaborador">
        <div class="container">

          <div class="row">
            <label for="nome">
              Nome
              <input type="text" id="nome" name="nome" required>
            </label>
            
            <input type="hidden" name="idEmpresa" value="<?=$idEmpresa?>">

            <button class="enviar" type="submit">
              <img src="../../icones/Send.svg" alt="">
              Cadastrar</button>
          </div>
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
            //   echo '<button class="alterar-btn">Alterar</button>';
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

      // Script para preencher e exibir o formulário de edição
      document.addEventListener('DOMContentLoaded', function() {
        const editarForm = document.getElementById('editarForm');
        const editarColaborador = document.getElementById('editarColaborador');
        const colaboradoresTbody = document.getElementById('colaboradores-tbody');

        colaboradoresTbody.addEventListener('click', function(event) {
          if (event.target.classList.contains('alterar-btn')) {
            const row = event.target.closest('tr');
            const cells = row.getElementsByTagName('td');

            document.getElementById('editar_id_usuario').value = row.getAttribute('data-id');
            document.getElementById('editar_nome').value = cells[0].textContent;
            document.getElementById('editar_email').value = cells[1].textContent;
            document.getElementById('editar_telefone').value = cells[2].textContent;
            document.getElementById('editar_data_nascimento').value = cells[3].textContent;
            document.getElementById('editar_sexo').value = cells[4].textContent === 'Masculino' ? 'M' : 'F';
            document.getElementById('editar_cpf').value = cells[5].textContent;
            document.getElementById('editar_status').value = cells[6].textContent === 'Ativo' ? '1' : '0';
            document.getElementById('editar_ddd').value = row.getAttribute('data-ddd');

            editarColaborador.style.display = 'block';

            alert('Colaborador selecionado para edição!');
          }
        });
      });
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

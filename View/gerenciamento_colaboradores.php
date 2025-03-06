    <link rel="stylesheet" href="../Css/Colaboradores.css">
      <!-- Conteúdo específico da página de colaboradores -->
      <div class="page-header">
        <div class="page-title">
          <h1>Colaboradores</h1>
          <p class="page-subtitle">Gerencie os colaboradores da sua empresa</p>
        </div>
      </div>

      <!-- ---------- cadastro -->
      <div id="telaCadastro">
      <!-- Coluna do Ícone -->
      <div id="iconeCadastro">
        <p>Cadastro Colaborador</p>
        <img src="../Imagens/icon.png" alt="Ícone" id="imagemEmpresa">
      </div>
      <!-- Coluna do Formulário -->
       
      <form id="cadastro" action="../Controller/cadastroColaborador.act.php" method="post" enctype="multipart/form-data" name="cadastroColaborador">
        <div class="container">

          <div class="row">
          <label for="nome">
            Nome
            <input type="text" id="nome" name="nome" required>
          </label>
          </div> 

          <div class="row">
            <label for="data_nascimento">
              Data de Nascimento
              <input type="date" id="data_nascimento" name="data_nascimento" required>
            </label>
          </div>

          <div class="row">
            <label for="sexo">
              Sexo
              <select id="sexo" name="sexo" required>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
              </select>
            </label>
          </div>

          <div class="row">
            <label for="ddd">
              DDD
              <input type="text" id="ddd" name="ddd" maxlength="3" required>
            </label>

            <label for="telefone">
              Telefone
              <input type="text" id="telefone" name="telefone" placeholder="000000000" maxlength="9" required>
            </label>
          </div> 

          <div class="row">
            <label for="email">
              Email
              <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            </label> 

            <label for="senha">
              Senha
              <input type="password" id="senha" name="senha">
            </label> 
          </div>

          <div class="row">
            <label for="cpf">
              CPF
              <input type="text" id="cpf" name="cpf" maxlength="14" required>
            </label>
          </div>

          <div class="row">
            <label for="status">
              Status
              <select id="status" name="status" required>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
              </select>
            </label>
          </div>

          <div class="row">

          <label for="file" class="file">
            <div class="icone">
           <img src="../icones/file.svg" alt="">
          </div>
            <p>Inserir Arquivo</p>
            <input type="file" name="logo" id="file" required>
          </label>

          <button class="enviar" type="submit"> 
            <img src="../icones/Send.svg" alt="">
            Cadastrar</button>
        </div>
        </div>
      </form>
    </div>

    <!-- Mostrar Colaboradores -->
    <div class="mostrarColaboradores">
      <h2>Lista de Colaboradores</h2>
      <table class="colaboradores-table">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
            <th>Sexo</th>
            <th>CPF</th>
            <th>Status</th>
            <th>Ações</th>
          </tr>
        </thead>

        <tbody id="colaboradores-tbody">
          <?php
          require("../model/connect.php");

          $busca = mysqli_query($con, "SELECT id_usuario, nome_usuario AS nome, email, telefone, data_nascimento, sexo, cpf, status, ddd FROM usuario");

          if ($busca->num_rows > 0) {
              while ($row = $busca->fetch_assoc()) {
                  echo '<tr data-id="' . $row['id_usuario'] . '" data-ddd="' . $row['ddd'] . '">';
                  echo '<td>' . $row['nome'] . '</td>';
                  echo '<td>' . $row['email'] . '</td>';
                  echo '<td>' . $row['telefone'] . '</td>';
                  echo '<td>' . $row['data_nascimento'] . '</td>';
                  echo '<td>' . $row['sexo'] . '</td>';
                  echo '<td>' . $row['cpf'] . '</td>';
                  echo '<td>' . ($row['status'] ? 'Ativo' : 'Inativo') . '</td>';
                  echo '<td>';
                  echo '<button class="alterar-btn">Alterar</button>';
                  echo '<form action="../Controller/excluirColaborador.act.php" method="post" style="display:inline;">
                          <input type="hidden" name="id_usuario" value="' . $row['id_usuario'] . '">
                          <button type="submit" class="excluir-btn">Excluir</button>
                        </form>';
                  echo '</td>';
                  echo '</tr>';
              }
          } else {
              echo '<tr><td colspan="8">Nenhum colaborador encontrado.</td></tr>';
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Formulário de Edição -->
    <div id="editarColaborador" style="display: none;">
      <h2>Editar Colaborador</h2>
      <form id="editarForm" action="../Controller/alterarColaborador.act.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="editar_id_usuario" name="id_usuario">
        <div class="container">
          <div class="row">
            <label for="editar_nome">
              Nome
              <input type="text" id="editar_nome" name="nome" required>
            </label>
          </div> 

          <div class="row">
            <label for="editar_data_nascimento">
              Data de Nascimento
              <input type="date" id="editar_data_nascimento" name="data_nascimento" required>
            </label>
          </div>

          <div class="row">
            <label for="editar_sexo">
              Sexo
              <select id="editar_sexo" name="sexo" required>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
              </select>
            </label>
          </div>

          <div class="row">
            <label for="editar_ddd">
              DDD
              <input type="text" id="editar_ddd" name="ddd" maxlength="3">
            </label>

            <label for="editar_telefone">
              Telefone
              <input type="text" id="editar_telefone" name="telefone" placeholder="0000-00000" maxlength="9" required>
            </label>
          </div> 

          <div class="row">
            <label for="editar_email">
              Email
              <input type="email" id="editar_email" name="email" placeholder="Digite seu email" required>
            </label> 

            <label for="editar_senha">
              Senha
              <input type="password" id="editar_senha" name="senha">
            </label> 
          </div>

          <div class="row">
            <label for="editar_cpf">
              CPF
              <input type="text" id="editar_cpf" name="cpf" maxlength="14" required>
            </label>
          </div>

          <div class="row">
            <label for="editar_status">
              Status
              <select id="editar_status" name="status" required>
                <option value="1">Ativo</option>
                <option value="0">Inativo</option>
              </select>
            </label>
          </div>

          <div class="row">
            <label for="editar_logo" class="file">
            <p>Foto</p>
              <div class="icone">
                <img src="../Ícones/file.svg" alt="">
              </div>
              <p>Inserir Arquivo</p>
              <input type="file" name="logo" id="editar_logo">
            </label>

            <button class="enviar" type="submit"> 
              <img src="../Ícones/Send.svg" alt="">
              Atualizar
            </button>
          </div>
        </div>
      </form>
    </div>

    <script src="../js/file.js"></script>

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
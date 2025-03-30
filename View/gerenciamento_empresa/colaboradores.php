    <?php
    @session_start();
    $_SESSION["contexto"] = "colaboradores"
    ?>
    <link rel="stylesheet" href="/learnfy/Css/Colaboradores.css">
    <script src="/learnfy/js/sweetalert.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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
        <img src="/learnfy/Imagens/icon.png" alt="Ícone" id="imagemEmpresa">
      </div>
      <!-- Coluna do Formulário -->

      <form id="cadastro" action="/learnfy/Controller/cadastroColaborador.act.php" method="post" enctype="multipart/form-data" name="cadastroColaborador">
        <div class="container">

          <div class="row">
            <label for="nome">
              Nome
              <input type="text" id="nome" name="nome" required>
            </label>
            <label for="data_nascimento">
              Data de Nascimento
              <input type="date" id="data_nascimento" name="data_nascimento" required>
            </label>
          </div>

          <div class="row">
            <label for="sexo">
              Sexo
              <select id="sexo" name="sexo" required>
                <option value="NULL">Selecione</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="O">Outros</option>
              </select>
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
                <img src="../../icones/file.svg" alt="">
              </div>
              <p>Inserir Arquivo</p>
              <input type="file" name="logo" id="file" required>
            </label>

            <button class="enviar" type="submit">
              <img src="../../icones/Send.svg" alt="">
              <span>Cadastrar</span></button>
          </div>
        </div>
      </form>
    </div>

    <!-- Mostrar Colaboradores -->
    <div class="mostrarColaboradores">
      <h2>Últimos colaboradores cadastrados</h2>
      <table class="colaboradores-table">
        <input type="text" id="inputBusca" placeholder="Pesquise o nome do funcionario">
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
          @session_start();
          require("../../model/connect.php");


          $idEmpresa = $_SESSION["id_empresa"];
          $busca = mysqli_query($con, "SELECT id_usuario, nome_usuario AS nome, email, telefone, data_nascimento, sexo, cpf, status, ddd,foto FROM usuario WHERE id_empresa= $idEmpresa");

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
              echo "<button onclick=alterarColaborador(" . json_encode($row) . ") class='alterar-btn'>Alterar</button>";
              echo '<form action="/learnfy/Controller/excluirColaborador.act.php" method="post" style="display:inline;">
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


    <script src="../../js/file.js"></script>
    <script type="module" src="../../js/pesquisa_colaborador.js"></script>
    <script>
      function alterarColaborador(obj) {
        console.log(obj)
        scrollTo({
          top: 0,
          behavior: "smooth"
        });

        document.querySelector("#iconeCadastro>p").innerText = "Editar Colaborador";
        document.querySelector(".enviar>span").innerText = "Editar";

        const form = document.querySelector("#cadastro");

        // Atualizar os campos do formulário com os dados do colaborador
        document.querySelector("#nome").value = obj.nome;
        document.querySelector("#imagemEmpresa").src = obj.foto.replace("..", "../../")
        document.querySelector("#data_nascimento").value = obj.data_nascimento;
        document.querySelector("#sexo").value = obj.sexo;
        document.querySelector("#file").required = false
        document.querySelector("#senha")
        document.querySelector("#telefone").value = obj.telefone;
        document.querySelector("#email").value = obj.email;
        document.querySelector("#cpf").value = obj.cpf;
        document.querySelector("#status").value = obj.status;

        // Adicionar ou atualizar o campo hidden para o ID do colaborador
        let inputHidden = document.querySelector("#inputIdUsuario");
        if (inputHidden) {
          inputHidden.value = obj.id_usuario;
        } else {
          inputHidden = document.createElement("input");
          inputHidden.type = "hidden";
          inputHidden.id = "inputIdUsuario";
          inputHidden.name = "id_usuario";
          inputHidden.value = obj.id_usuario;
          form.appendChild(inputHidden);
        }

        // Atualizar a ação do formulário para o endpoint de edição
        form.action = "/learnfy/Controller/alterarColaborador.act.php";
      }
    </script>
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
    <script>
      $(document).ready(function() {
        $("#cpf").mask("000.000.000-00"); // Máscara para CPF
        $("#telefone").mask("(00) 00000-0000"); // Máscara para telefone
       
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
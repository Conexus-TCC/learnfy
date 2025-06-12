 <?php

  @session_start();
  $_SESSION["contexto"] = "dashboard"
  ?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <link rel="stylesheet" href="../../Css/gerenciamento.css">
 <!-- Header da Página -->
 <div class="page-header">
   <div class="page-title">
     <h1>Dashboard</h1>
     <p class="page-subtitle">Bem-vindo ao painel de gerenciamento da sua empresa</p>
   </div>
 </div>


 <?php

  @session_start();
  require("../../Model/connect.php");
  $consulta = mysqli_query($con, "SELECT *, count(id_usuario) AS totUser FROM `usuario` WHERE `id_empresa` = {$_SESSION['id_empresa']}");
  $consulta2 = mysqli_query($con, "SELECT *, count(id_curso) AS totCurso FROM `curso` WHERE `id_empresa` = {$_SESSION['id_empresa']}");




  ?>
 <!-- Cartões de Estatísticas -->
 <div class="stats-grid">
   <div class="stat-card">
     <div class="stat-info">
       <h3>Colaboradores Ativos</h3>
       <div class="stat-value"><?php while ($totUser = mysqli_fetch_assoc($consulta)) {
                                  echo $totUser["totUser"];
                                } ?></div>
       <!-- <div class="stat-trend trend-up">
         +12% <span style="color: var(--muted);">vs. último mês</span>
       </div> -->
     </div>
     <div class="stat-icon">👥</div>
   </div>

   <div class="stat-card">
     <div class="stat-info">
       <h3>Cursos Publicados</h3>
       <div class="stat-value"><?php while ($totCurso = mysqli_fetch_assoc($consulta2)) {
                                  echo $totCurso["totCurso"];
                                } ?></div>
       <div class="stat-trend trend-up">
         <!-- +4% <span style="color: var(--muted);">vs. último mês</span> -->
       </div>
     </div>
     <div class="stat-icon">📚</div>
   </div>
   <!-- 
   <div class="stat-card">
     <div class="stat-info">
       <h3>Taxa de Conclusão</h3>
       <div class="stat-value">76%</div>
       <div class="stat-trend trend-up">
         +2% <span style="color: var(--muted);">vs. último mês</span>
       </div>
     </div>
     <div class="stat-icon">🏆</div>
   </div>

   <div class="stat-card">
     <div class="stat-info">
       <h3>Tempo Médio</h3>
       <div class="stat-value">4.2h</div>
       <div class="stat-trend trend-down">
         -0.5% <span style="color: var(--muted);">vs. último mês</span>
       </div>
     </div>
     <div class="stat-icon">⏱️</div>
   </div> -->
 </div>
 <!-- Gráficos -->

 <script type="text/javascript">
   google.charts.load('current', {
     'packages': ['corechart']
   });
   google.charts.setOnLoadCallback(drawChart);

   function drawChart() {
     var data = google.visualization.arrayToDataTable([
       ['Mês', 'Sales', 'Expenses'],
       ['Janeiro', 1000, 400],
       ['Fevereiro', 1170, 460],
       ['Março', 660, 1120],
       ['Abril', 1030, 540]
     ]);

     var options = {
       curveType: 'function',
       legend: {
         position: 'bottom'
       }
     };

     var chart = new google.visualization.LineChart(document.getElementById('performace'));

     chart.draw(data, options);
   }
 </script>

 <div class="charts-grid">
   <div class="chart-card">
     <div class="chart-header">
       <h3 class="chart-title">Performance ao Longo do Ano</h3>
     </div>
     <div class="chart-container">
       <div id="performace"></div>
     </div>
   </div>

   <div class="chart-card">
     <div class="chart-header">
       <h3 class="chart-title">Engajamento dos Colaboradores</h3>
     </div>
     <div class="chart-container">
       <div id="performace"></div>
     </div>
   </div>
 </div>

 <!-- Cursos e Progresso -->
 <div class="content-grid">
   <!-- Cursos -->
   <div>
     <div class="section-header">
       <h2 class="section-title">Cursos Recentes</h2>
       <a href="#" class="view-all">Ver todos &rarr;</a>
     </div>
     <?php
      $query = "SELECT curso.*,categoria_curso.nome_categoria as categoria,aula.tempo_aula , COUNT(usuario.id_usuario) as funcionarios
      FROM curso
       inner join categoria_curso on categoria_curso.id_categoria = curso.categoria
        right JOIN usuario on usuario.id_Empresa = curso.id_empresa AND curso.nivel <= usuario.nivel 
        Right JOIN (SELECT curso.id_curso, SUM(aula.tempo_em_segundos)as tempo_aula from aula
                    INNER JOIN curso on curso.id_curso =aula.id_aula
                    GROUP BY curso.id_curso)as aula  ON aula.id_curso = curso.id_curso 
        where curso.id_empresa =$_SESSION[id_empresa]
        GROUP BY curso.id_curso 
      LIMIT 5
  ";


      ?>
     <div class="courses-grid">

       <?php
        $res = mysqli_query($con, $query);
        while ($curso = $res->fetch_assoc()) { 
          $t = $curso["tempo_aula"];
          ?>

         <div class="course-card">
           <div class="course-image">

             <img src="../<?= $curso["imagem"] ?>" alt="Marketing Digital">
             <div class="course-tag"><?= $curso["categoria"] ?></div>
           </div>
           <div class="course-content">
             <h3 class="course-title"><?= $curso["nome"] ?></h3>
             <div class="course-meta">
               <div class="meta-item">⏱️ <?= sprintf('%02dH %02dM', $t / 3600, floor($t / 60) % 60) ?></div>
               <div class="meta-item">👥 <?= $curso["funcionarios"] ?> alunos</div>
             </div>
             <div class="progress-container">
               <div class="progress-bar" style="width: 85%;"></div>
             </div>
             <div class="progress-stats">
               <span>Progresso: 85%</span>
             </div>
             <div class="course-actions">
             </div>
           </div>
         </div>
       <?php } ?>

     </div>
   </div>

   <!-- Progress Cards -->

 </div>

 <!-- Tabela de Colaboradores -->
 <div class="employees-section">
   <div class="section-header">
     <h2 class="section-title">Colaboradores em Destaque</h2>
     <a href="#" class="view-all">Ver todos &rarr;</a>
   </div>

   <?php
    $sql = "SELECT usuario.nome_usuario as nome,
    SUM(aula.tempo_em_segundos) as tempo_total,
    COALESCE(SUM(progresso.tempo_assistido),0) as tempo_assistido 
     from usuario 
INNER JOIN curso on curso.id_empresa =usuario.id_Empresa AND usuario.nivel>=curso.nivel
INNER JOIN aula on curso.id_curso = aula.id_aula
LEFT JOIN progresso on progresso.id_usuario = usuario.id_usuario
WHERE usuario.id_Empresa = $_SESSION[id_empresa]
GROUP BY usuario.id_usuario;";
    function formatarTempo($seconds)
    {
      $t = round($seconds);
      return sprintf('%02d:%02d:%02d', $t / 3600, floor($t / 60) % 60, $t % 60);
    }

    ?>

   <div class="employees-table-container">
     <table class="employees-table">
       <thead>
         <tr>
           <th>Nome</th>
           <th>horas disponiveis</th>
           <th>horas Assistidas</th>
           <th>Progresso</th>
         </tr>
       </thead>
       <tbody>
         <?php
          $res = mysqli_query($con, $sql);
          while ($fun = $res->fetch_assoc()) {
            $perc = round($fun["tempo_assistido"] * 100 / $fun["tempo_total"]);

          ?>
           <tr>
             <td><?= $fun["nome"] ?></td>
             <td><?= formatarTempo($fun["tempo_total"]) ?></td>
             <td><?= formatarTempo($fun["tempo_assistido"]) ?></td>
             <td>
               <div class="progress-cell">
                 <div class="table-progress">
                   <div class="table-progress-bar" style="width: <?= $perc ?>%;"></div>
                 </div>
                 <span><?= $perc ?>%</span>
               </div>
             </td>
           <tr>
           <?php } ?>



           </tr>




       </tbody>
     </table>
   </div>
 </div>
 </div>

 <!-- Modal de Edição de Curso -->
 <div class="modal-overlay" id="course-modal">
   <div class="modal">
     <div class="modal-header">
       <h2 class="modal-title">Editar Curso</h2>
       <button class="modal-close" onclick="closeModal()">&times;</button>
     </div>
     <div class="modal-body">
       <form id="course-form">
         <div class="form-group">
           <label class="form-label" for="course-title">Título do Curso</label>
           <input type="text" class="form-input" id="course-title" placeholder="Digite o título do curso">
         </div>
         <div class="input-group">
           <div class="form-group">
             <label class="form-label" for="course-category">Categoria</label>
             <select class="form-select" id="course-category">
               <option value="marketing">Marketing</option>
               <option value="lideranca">Liderança</option>
               <option value="tecnologia">Tecnologia</option>
               <option value="financas">Finanças</option>
               <option value="vendas">Vendas</option>
             </select>
           </div>
           <div class="form-group">
             <label class="form-label" for="course-duration">Duração (horas)</label>
             <input type="number" class="form-input" id="course-duration" placeholder="Ex: 4.5">
           </div>
         </div>
         <div class="form-group">
           <label class="form-label" for="course-description">Descrição</label>
           <textarea class="form-textarea" id="course-description" placeholder="Descreva o curso"></textarea>
         </div>
         <div class="form-group">
           <label class="form-label" for="course-image">Imagem do Curso (URL)</label>
           <input type="text" class="form-input" id="course-image" placeholder="URL da imagem">
         </div>
       </form>
     </div>
     <div class="modal-footer">
       <button class="btn btn-secondary" onclick="closeModal()">Cancelar</button>
       <button class="btn btn-primary" onclick="saveCourse()">Salvar</button>
     </div>
   </div>
 </div>


 <!-- <script>
    // Toggle sidebar
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    
    sidebarToggle.addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
    });

    // Modal functions
    const modal = document.getElementById('course-modal');
    const createCourseBtn = document.getElementById('create-course-btn');
    const courseTitleInput = document.getElementById('course-title');
    
    createCourseBtn.addEventListener('click', () => {
      courseTitleInput.value = '';
      openModal();
    });

    function openModal() {
      modal.classList.add('open');
    }

    function closeModal() {
      modal.classList.remove('open');
    }

    function openEditModal(title) {
      courseTitleInput.value = title;
      openModal();
    }

    function saveCourse() {
      // Simulação de salvamento (em um app real, isso enviaria dados para o backend)
      alert(`Curso "${courseTitleInput.value}" salvo com sucesso!`);
      closeModal();
    }

    // Fechar modal quando clicar fora
    modal.addEventListener('click', (e) => {
      if (e.target === modal) {
        closeModal();
      }
    });
  </script> -->
 <script src="/learnfy/js/sweetalert.js"></script>
 <?php
  @session_start();
  if (isset($_SESSION["msg"])) {
    echo "<script>
  
            Swal.fire({
                title: '{$_SESSION['msg']}',
                text: '{$_SESSION['alertMsg']}',
                icon: '{$_SESSION['alertIcon']}'
            });
        </script>";
    unset($_SESSION["msg"]);
    unset($_SESSION["alertMsg"]);
    unset($_SESSION["alertIcon"]);
  }
  ?>
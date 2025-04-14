 <?php

  @session_start();
  $_SESSION["contexto"] = "dashboard"
  ?>

 <link rel="stylesheet" href="../../Css/gerenciamento.css">
 <!-- Header da Página -->
 <div class="page-header">
   <div class="page-title">
     <h1>Dashboard</h1>
     <p class="page-subtitle">Bem-vindo ao painel de gerenciamento da sua empresa</p>
   </div>
   <div class="header-actions">
     <button class="create-btn" id="create-course-btn">
       <span>➕</span>
       Novo Curso
     </button>
   </div>
 </div>

 <!-- Cartões de Estatísticas -->
 <div class="stats-grid">
   <div class="stat-card">
     <div class="stat-info">
       <h3>Colaboradores Ativos</h3>
       <div class="stat-value">245</div>
       <div class="stat-trend trend-up">
         +12% <span style="color: var(--muted);">vs. último mês</span>
       </div>
     </div>
     <div class="stat-icon">👥</div>
   </div>

   <div class="stat-card">
     <div class="stat-info">
       <h3>Cursos Publicados</h3>
       <div class="stat-value">48</div>
       <div class="stat-trend trend-up">
         +4% <span style="color: var(--muted);">vs. último mês</span>
       </div>
     </div>
     <div class="stat-icon">📚</div>
   </div>

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
   </div>
 </div>
 <!-- Gráficos -->
 <div class="charts-grid">
   <div class="chart-card">
     <div class="chart-header">
       <h3 class="chart-title">Performance ao Longo do Ano</h3>
     </div>
     <div class="chart-container">
       <div class="chart-placeholder">
         <span>Gráfico de Performance</span>
       </div>
     </div>
   </div>

   <div class="chart-card">
     <div class="chart-header">
       <h3 class="chart-title">Engajamento dos Colaboradores</h3>
     </div>
     <div class="chart-container">
       <div class="chart-placeholder">
         <span>Gráfico de Engajamento</span>
       </div>
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

     <div class="courses-grid">
       <div class="course-card">
         <div class="course-image">
           <img src="https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80" alt="Marketing Digital">
           <div class="course-tag">Marketing</div>
         </div>
         <div class="course-content">
           <h3 class="course-title">Introdução ao Marketing Digital</h3>
           <div class="course-meta">
             <div class="meta-item">⏱️ 4h 30min</div>
             <div class="meta-item">👥 78 alunos</div>
           </div>
           <div class="progress-container">
             <div class="progress-bar" style="width: 85%;"></div>
           </div>
           <div class="progress-stats">
             <span>Progresso: 85%</span>
           </div>
           <div class="course-actions">
             <button class="edit-btn" onclick="openEditModal('Introdução ao Marketing Digital')">
               <span>✏️</span> Editar
             </button>
           </div>
         </div>
       </div>

       <div class="course-card">
         <div class="course-image">
           <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Liderança">
           <div class="course-tag">Liderança</div>
         </div>
         <div class="course-content">
           <h3 class="course-title">Liderança e Gestão de Equipes</h3>
           <div class="course-meta">
             <div class="meta-item">⏱️ 6h 15min</div>
             <div class="meta-item">👥 124 alunos</div>
           </div>
           <div class="progress-container">
             <div class="progress-bar" style="width: 62%;"></div>
           </div>
           <div class="progress-stats">
             <span>Progresso: 62%</span>
           </div>
           <div class="course-actions">
             <button class="edit-btn" onclick="openEditModal('Liderança e Gestão de Equipes')">
               <span>✏️</span> Editar
             </button>
           </div>
         </div>
       </div>

       <div class="course-card">
         <div class="course-image">
           <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Dados">
           <div class="course-tag">Dados</div>
         </div>
         <div class="course-content">
           <h3 class="course-title">Fundamentos de Análise de Dados</h3>
           <div class="course-meta">
             <div class="meta-item">⏱️ 5h 45min</div>
             <div class="meta-item">👥 96 alunos</div>
           </div>
           <div class="progress-container">
             <div class="progress-bar" style="width: 38%;"></div>
           </div>
           <div class="progress-stats">
             <span>Progresso: 38%</span>
           </div>
           <div class="course-actions">
             <button class="edit-btn" onclick="openEditModal('Fundamentos de Análise de Dados')">
               <span>✏️</span> Editar
             </button>
           </div>
         </div>
       </div>
     </div>
   </div>

   <!-- Progress Cards -->
   <div>
     <div class="section-header">
       <h2 class="section-title">Progresso</h2>
       <a href="#" class="view-all">Detalhes &rarr;</a>
     </div>

     <div class="progress-cards">
       <div class="progress-card">
         <div class="card-header">
           <h3 class="card-title">Cursos Publicados</h3>
           <span class="percentage">80%</span>
         </div>
         <div class="progress-container">
           <div class="progress-bar" style="width: 80%;"></div>
         </div>
         <div class="progress-stats">
           <span>48 concluídos</span>
           <span>60 total</span>
         </div>
       </div>

       <div class="progress-card">
         <div class="card-header">
           <h3 class="card-title">Colaboradores Treinados</h3>
           <span class="percentage">77%</span>
         </div>
         <div class="progress-container">
           <div class="progress-bar" style="width: 77%;"></div>
         </div>
         <div class="progress-stats">
           <span>189 concluídos</span>
           <span>245 total</span>
         </div>
       </div>

       <div class="progress-card">
         <div class="card-header">
           <h3 class="card-title">Conteúdos Produzidos</h3>
           <span class="percentage">78%</span>
         </div>
         <div class="progress-container">
           <div class="progress-bar" style="width: 78%;"></div>
         </div>
         <div class="progress-stats">
           <span>156 concluídos</span>
           <span>200 total</span>
         </div>
       </div>
     </div>
   </div>
 </div>

 <!-- Tabela de Colaboradores -->
 <div class="employees-section">
   <div class="section-header">
     <h2 class="section-title">Colaboradores em Destaque</h2>
     <a href="#" class="view-all">Ver todos &rarr;</a>
   </div>

   <div class="employees-table-container">
     <table class="employees-table">
       <thead>
         <tr>
           <th>Nome</th>
           <th>Cargo</th>
           <th>Departamento</th>
           <th>Cursos Concluídos</th>
           <th>Progresso</th>
           <th>Performance</th>
         </tr>
       </thead>
       <tbody>
         <tr>
           <td>Ana Silva</td>
           <td>Analista de Marketing</td>
           <td>Marketing</td>
           <td>8</td>
           <td>
             <div class="progress-cell">
               <div class="table-progress">
                 <div class="table-progress-bar" style="width: 92%;"></div>
               </div>
               <span>92%</span>
             </div>
           </td>
           <td><span class="performance-badge badge-up">9.4 ↗</span></td>
         </tr>
         <tr>
           <td>Carlos Oliveira</td>
           <td>Gerente de Vendas</td>
           <td>Comercial</td>
           <td>12</td>
           <td>
             <div class="progress-cell">
               <div class="table-progress">
                 <div class="table-progress-bar" style="width: 100%;"></div>
               </div>
               <span>100%</span>
             </div>
           </td>
           <td><span class="performance-badge badge-up">9.8 ↗</span></td>
         </tr>
         <tr>
           <td>Mariana Costa</td>
           <td>Desenvolvedora Front-end</td>
           <td>Tecnologia</td>
           <td>5</td>
           <td>
             <div class="progress-cell">
               <div class="table-progress">
                 <div class="table-progress-bar" style="width: 64%;"></div>
               </div>
               <span>64%</span>
             </div>
           </td>
           <td><span class="performance-badge badge-up">7.5 ↗</span></td>
         </tr>
         <tr>
           <td>Felipe Martins</td>
           <td>Analista Financeiro</td>
           <td>Financeiro</td>
           <td>3</td>
           <td>
             <div class="progress-cell">
               <div class="table-progress">
                 <div class="table-progress-bar" style="width: 28%;"></div>
               </div>
               <span>28%</span>
             </div>
           </td>
           <td><span class="performance-badge badge-down">6.2 ↘</span></td>
         </tr>
         <tr>
           <td>Juliana Ferreira</td>
           <td>Recursos Humanos</td>
           <td>Administrativo</td>
           <td>9</td>
           <td>
             <div class="progress-cell">
               <div class="table-progress">
                 <div class="table-progress-bar" style="width: 85%;"></div>
               </div>
               <span>85%</span>
             </div>
           </td>
           <td><span class="performance-badge badge-up">8.7 ↗</span></td>
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
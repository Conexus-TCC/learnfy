<link rel="stylesheet" href="/learnfy/Css/sidebar.css">
<aside class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <div class="sidebar-logo">
      <div class="sidebar-logo-icon"></div>
      <h1><?php
          @session_start();
          echo $_SESSION["nome"];
          ?></h1>
    </div>
    <button class="sidebar-toggle" id="sidebar-toggle">
      &#9776;
    </button>
  </div>

  <ul class="sidebar-menu">
    <li class="sidebar-menu-item">
      <a onclick="trocarSite('dashboard.php',this)" class="sidebar-menu-link active">
        <span class="sidebar-menu-icon">📊</span>
        <span class="sidebar-menu-text">Dashboard</span>
      </a>
      <div class="tooltip">Dashboard</div>
    </li>
    <li class="sidebar-menu-item">
      <a onclick="trocarSite('cursos.php',this)" class="sidebar-menu-link">
        <span class="sidebar-menu-icon">📚</span>
        <span class="sidebar-menu-text">Cursos</span>
      </a>
      <div class="tooltip">Cursos</div>
    </li>
    <li class="sidebar-menu-item">
      <a onclick="trocarSite('colaboradores.php',this)" class="sidebar-menu-link">
        <span class="sidebar-menu-icon">👥</span>
        <span class="sidebar-menu-text">Colaboradores</span>
      </a>
      <div class="tooltip">Colaboradores</div>
    </li>
    <li class="sidebar-menu-item">
      <a href="#" class="sidebar-menu-link">
        <span class="sidebar-menu-icon">📈</span>
        <span class="sidebar-menu-text">Relatórios</span>
      </a>
      <div class="tooltip">Relatórios</div>
    </li>
    <li class="sidebar-menu-item">
      <a onclick="trocarSite('editarEmpresa.php',this)" class="sidebar-menu-link">
        <span class="sidebar-menu-icon">🏢</span>
        <span class="sidebar-menu-text">Empresa</span>
      </a>
      <div class="tooltip">Empresa</div>
    </li>

    <li class="sidebar-menu-item">
      <a onclick="trocarSite('categorias.php',this)" class="sidebar-menu-link">
        <span class="sidebar-menu-icon">🔣</span>
        <span class="sidebar-menu-text">categoria Cursos</span>
      </a>
      <div class="tooltip">Empresa</div>
    </li>


    <li class="sidebar-menu-item">
      <a href="#" class="sidebar-menu-link">
        <span class="sidebar-menu-icon">⚙️</span>
        <span class="sidebar-menu-text">Configurações</span>
      </a>
      <div class="tooltip">Configurações</div>
    </li>
  </ul>

  <div class="sidebar-footer">
    <a href="../../Controller/logout.php" class="logoff-btn">
      <span class="sidebar-menu-icon">🚪</span>
      <span class="logoff-btn-text">Sair</span>
    </a>
  </div>
</aside>
<script>
  // Toggle sidebar
  const sidebar = document.getElementById('sidebar');
  const sidebarToggle = document.getElementById('sidebar-toggle');

  sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
  });
</script>
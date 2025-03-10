<link rel="stylesheet" href="../Css/sidebar.css">
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
      <a onclick="trocarSite('gerenciamento_index.php',this)" href="#" class="sidebar-menu-link active">
        <span class="sidebar-menu-icon">📊</span>
        <span class="sidebar-menu-text">Dashboard</span>
      </a>
      <div class="tooltip">Dashboard</div>
    </li>
    <li class="sidebar-menu-item">
      <a href="#" class="sidebar-menu-link">
        <span class="sidebar-menu-icon">📚</span>
        <span class="sidebar-menu-text">Cursos</span>
      </a>
      <div class="tooltip">Cursos</div>
    </li>
    <li class="sidebar-menu-item">
      <a onclick="trocarSite('gerenciamento_colaboradores.php',this)" href="#" class="sidebar-menu-link">
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
      <a href="#" class="sidebar-menu-link">
        <span class="sidebar-menu-icon">🏢</span>
        <span class="sidebar-menu-text">Empresa</span>
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
    <a href="../Controller/logout.php" class="logoff-btn">
      <span class="sidebar-menu-icon">🚪</span>
      <span class="logoff-btn-text">Sair</span>
    </a>
  </div>
</aside>
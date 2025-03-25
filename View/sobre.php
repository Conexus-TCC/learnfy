
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sobre a LearnFY</title>
  
  <link rel="stylesheet" href="../Css/sobre.css">
  <?php include("parts/head.php") ?>
</head>
<body>

<?php 

include ("parts/header.php");

?>



  <!-- Hero Section -->
  <section class="hero-section">
    <h1>Sobre a LearnFY</h1>
    <p>Transformando o desenvolvimento profissional através de soluções de aprendizagem corporativa inovadoras e acessíveis.</p>
  </section>

  <!-- História Section -->
  <section class="section">
    <h2 class="section-title">Nossa História</h2>
    <div class="card">
      <p>A LearnFY surgiu em 2024 a partir da visão de um grupo de estudantes apaixonados por tecnologia. Que Identificaram uma lacuna significativa no mercado: empresas precisavam de uma forma eficiente de capacitar seus colaboradores, mas as soluções existentes eram complexas e inacessíveis.</p>
      <br>
      <p>Nossa jornada começou com uma plataforma simples que permitia o compartilhamento de materiais didáticos. Hoje, a LearnFY evoluiu para um ecossistema completo de aprendizagem, ajudando organizações de todos os tamanhos a desenvolverem o potencial humano através da educação continuada e personalizada.</p>
    </div>
  </section>

  <!-- Missão Section -->
  <section class="section bg-gray">
    <h2 class="section-title">Nossa Missão</h2>
    <div class="card text-center">
      <div class="icon-container bg-teal">
        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
        </svg>
      </div>
      <p>Capacitar organizações a desenvolverem o potencial de seus colaboradores através de soluções de aprendizagem inovadoras, acessíveis e personalizadas.</p>
    </div>
  </section>

  <!-- Visão Section -->
  <section class="section">
    <h2 class="section-title">Nossa Visão</h2>
    <div class="card text-center">
      <div class="icon-container bg-purple">
        <svg class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
        </svg>
      </div>
      <p>Ser a plataforma de aprendizagem corporativa mais intuitiva e eficaz do mercado, transformando a maneira como as empresas capacitam seus talentos em todo o mundo.</p>
    </div>
  </section>

  <!-- Valores Section -->
  <section class="section bg-gray">
    <h2 class="section-title">Nossos Valores</h2>
    <div class="values-grid">
      <!-- Valor 1 -->
      <div class="value-card">
        <div class="value-header">
          <div class="value-icon bg-teal">
            <svg class="icon" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <h3 class="value-title">Inovação</h3>
        </div>
        <p>Buscamos constantemente novas formas de melhorar a experiência de aprendizado de nossos usuários.</p>
      </div>
      
      <!-- Valor 2 -->
      <div class="value-card">
        <div class="value-header">
          <div class="value-icon bg-purple">
            <svg class="icon" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <h3 class="value-title">Excelência</h3>
        </div>
        <p>Comprometimento com a qualidade em tudo o que fazemos, desde o desenvolvimento de plataforma até o suporte ao cliente.</p>
      </div>
      
      <!-- Valor 3 -->
      <div class="value-card">
        <div class="value-header">
          <div class="value-icon bg-teal">
            <svg class="icon" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <h3 class="value-title">Acessibilidade</h3>
        </div>
        <p>Tornamos o conhecimento acessível para todos, independentemente de limitações técnicas ou físicas.</p>
      </div>
      
      <!-- Valor 4 -->
      <div class="value-card">
        <div class="value-header">
          <div class="value-icon bg-purple">
            <svg class="icon" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <h3 class="value-title">Colaboração</h3>
        </div>
        <p>Acreditamos no poder do trabalho em equipe e na troca de conhecimentos entre empresas e colaboradores.</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <?php 
  
    include("parts/footer.php")
  
  ?>

</body>
</html>

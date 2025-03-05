<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard de Cursos</title>
  <?php include './parts/head.php' ?>
  
</head>

<body>
  <div class="app-container">
    <!-- Sidebar -->
    <?php include("./parts/sidebar.php") ?>

    <!-- Conteúdo Principal -->
     <main class="main-content">
   <?php   include("./gerenciamento_index.php") ?>
     </main>
   <script src="../js/sidebar.js"></script>
</body>

</html>
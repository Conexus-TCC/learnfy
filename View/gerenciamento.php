<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard de Cursos</title>
  <?php include './parts/head.php' ?>
  <link rel="stylesheet" href="../Css/gerenciamento.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
</head>

<?php
  @session_start();
    // if (isset($_SESSION["logado"])) {
    //     echo "<script>
    //         Swal.fire({
    //             title: '{$_SESSION['msg']}',
    //             text: '{$_SESSION['alertMsg']}',
    //             icon: '{$_SESSION['alertIcon']}'
    //         });
    //     </script>";
    //     unset($_SESSION["msg"]);
    //     unset($_SESSION["alertMsg"]);
    //     unset($_SESSION["alertIcon"]);
    // }
    ?>



<body>

  <div class="app-container">
    <!-- Sidebar -->
    <?php include("./parts/sidebar.php") ?>

    <!-- Conteúdo Principal -->
     <main class="main-content">

   <?php   
    $local = "index";
    if(isset($_SESSION["contexto"])){
      $local = $_SESSION["contexto"];
    }
   
   include("./gerenciamento_$local.php") ?>
     </main>
   <script src="../js/sidebar.js"></script>
</body>

</html>
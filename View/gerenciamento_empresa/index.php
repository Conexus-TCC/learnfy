<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerenciamento da Empresa</title>
  <?php include '../parts/head.php' ?>
  <link rel="stylesheet" href="/learnfy/Css/gerenciamento.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>




<body>

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
  <div class="app-container">
    <!-- Sidebar -->
    <?php include("./sidebar.php") ?>

    <!-- Conteúdo Principal -->
    <main class="main-content">

      <?php
      $local = "dashboard";
      // var_dump($_SESSION);
      if (isset($_SESSION["contexto"])) {
        $local = $_SESSION["contexto"];
      }

      ?>
      <iframe src="<?= "./$local.php" ?>" frameborder="0"></iframe>
    </main>
    <script id="sidebar" src="/learnfy/js/sidebar.js"></script>
</body>

</html>
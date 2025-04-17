<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "./parts/head.php" ?>
</head>

<body>
    <?php include "./parts/header.php";
    @session_start(); ?>
    <div style="display: flex;flex-direction:column;justify-content: center;align-items: center;">
        <h1>Login Usuario</h1>
        <?= $_SESSION["nome"]; ?>
        <img style="width: 10%;" src="<?= $_SESSION['foto'] ?>" alt="">
    </div>
    <?php
     foreach ($_SESSION as $key => $value) {
        if($key=="sla"){
            var_dump($value);
            continue;
        }
        echo "$key:$value <hr>";
     }
     ?>
    <a href="../Controller/logout.php" style="background-color:red;padding:5px 20px;border-radius: 5px;" class="logoff-btn">Sair</a>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login Usuario</h1>
    <?php 
    echo $_SESSION["nome_usuario"]
    ?>
    <img src="<?=$_SESSION['foto']?>" alt="">

<a href="../Controller/logout.php" class="logoff-btn">Sair</a>
</body>
</html>
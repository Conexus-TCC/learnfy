<?php
require("../Model/Connect.php");
session_start();
// var_dump($_SESSION);
extract($_SESSION);
$id = $empresa["id_empresa"];
$res = mysqli_query($con, "SELECT * FROM `empresa` WHERE `id_empresa` = '$id'");
$empresaBd = mysqli_fetch_assoc($res);
?>
<h2>Banco de dadoas</h2>
<p><?= $empresaBd["nome_empresa"] ?></p>
<p><?= $empresaBd["cnpj"] ?></p>
<p><?= $empresaBd["ie"] ?></p>
<p><?= $empresaBd["email"] ?></p>
<p><?= $empresaBd["telefone"] ?></p>
<p><?= $empresaBd["cep"] ?></p>
<img src="<?= $empresaBd["logo"] ?>" alt="">
<hr>
<h2>Session</h2>
<?= var_dump($empresa); ?>
<p><?= $empresa["nome_empresa"] ?></p>
<p><?= $empresa["cnpj"] ?></p>
<p><?= $empresa["ie"] ?></p>
<p><?= $empresa["email"] ?></p>
<p><?= $empresa["telefone"] ?></p>
<p><?= $empresa["cep"] ?></p>
<img src="<?= $empresa["logo"] ?>" alt="">
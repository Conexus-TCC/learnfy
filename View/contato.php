<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="../Css/geral.css">
    <link rel="stylesheet" href="../Css/contato.css">
    <?php include("parts/head.php") ?>
</head>
<body>

    <?php include("parts/header.php") ?>

    <div id="principal">

        <div id="contato">
            <h1>Contato</h1>
            <div id="cont">
            
            <div>
            <div>
            <img src="../icones/Mail.png" alt="">
            </div>
           <a href=""><p>Email: learnfy.help@conexus.com</p></a>
            </div>
            
            <div>
            <div>
            <img src="../icones/Phone.png" alt="">
            </div>
            <a href=""><p>Telefone: +55 (11) 8765-4321</p></a>
            </div>

            <div>
            <div>
            <img src="../icones/Smartphone.png" alt=""> 
            </div>
            <a href=""><p>Celular\WhatsApp: +55 (11) 91264-8687</p></a>
            </div>

            </div>
        </div>

        <div id="formulario">
            <h1>Fale Conosco</h1>
            <form action="" method="post">
                <label for="Email">E-mail <input type="email" name="email"></label>
                <label for="text">Assunto <input type="text" name="assunto"></label>
                <label for="text">Conteúdo <textarea id="conteudo" type="text" name="conteudo"></textarea></label>
                <input type="submit">
            </form>
        </div>

    </div>

  <?php include("parts/footer.php") ?>
    
</body>
</html>
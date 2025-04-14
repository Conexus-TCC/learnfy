<?php
@session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Css/cadastroEmpresa.css" />
    <title>Cadastro</title>
    <?php include("parts/head.php") ?>
    <script src="../js/jquery.mask.js"></script>
    <link rel="stylesheet" href="../Css/geral.css">
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

  <body>

    <?php
    if (isset($_SESSION["msg"])) {
        echo "<script>
            Swal.fire({
                title: '{$_SESSION['msg']}',
                text: '{$_SESSION['alertMsg']}',
                icon: '{$_SESSION['alertIcon']}'
            }).then(e=>{
              location.href='login.php'
            });
        </script>";
        unset($_SESSION["msg"]);
        unset($_SESSION["alertMsg"]);
        unset($_SESSION["alertIcon"]);
    }
    ?>

    <div id="telaCadastro">
      <div id="iconeCadastro">
        <p>Faça seu cadastro</p>
        <img src="../Imagens/imagemEmpresa.png" alt="Ícone" id="imagemEmpresa">
      </div>

      <form id="cadastro" action="../Controller/cadastroEmpresa.act.php" method="post" enctype="multipart/form-data" name="cadastroEmpresa">
        <div class="container">
          <div class="row">
            <label for="nome">
              Nome Empresa *
              <input type="text" id="nome" name="nome" required>
            </label>

            
          </div>

          <div class="row">
          <label for="cnpj">
              CNPJ * 
              <input type="text" id="cnpj" required name="cnpj" placeholder="00.000.000.0000-00"/>
            </label>

            <label for="telefone">
              Telefone *
              <input type="text" id="telefone" required name="telefone" placeholder="(00) 0000-0000"/>
            </label> 
          </div>

          <div class="row">
            <div class="cep">
              <label for="cep">
                CEP * 
                <input required type="text" id="cep" name="cep" placeholder="00000-000" />
              </label>
              <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank" rel="noopener noreferrer">Não sabe o CEP?</a>
            </div>

            <label for="rua">
              Rua
              <input type="text" id="rua" disabled />
            </label>
          </div>

          <div class="row">
            <label for="bairro">
              Bairro
              <input type="text" id="bairro" disabled />
            </label>

            <label for="cidade">
              Cidade
              <input type="text" id="cidade" disabled />
            </label>

            <label for="estado">
              Estado
              <input type="text" id="estado" disabled />
            </label>
          </div>

          <div class="row">
            <label for="email">
              Email *
              <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            </label>

            <label for="senha">
              Senha * 
              <input type="password" id="senha" name="senha" required>
            </label>
          </div>

          <div class="row">
            <label for="file" class="file">
              <div class="icone">
                <img src="../icones/file.svg" alt="">
              </div>
              <p>Inserir Arquivo *</p>
              <input type="file" name="logo" id="file" onfocus="()=>{document.querySelector('.file').style.border='1px solid red'}" required>
            </label>

            <button class="enviar" type="submit"> 
              <img src="../icones/Send.svg" alt="">
              Cadastrar
            </button>
          </div>
        </div>
      </form>
    </div>

    <script type="text/javascript">
      $(document).ready(function () {
        $("#telefone").mask("99 9999-9999");
        $("#whatsapp").mask("99 99999-9999");
        $("#cnpj").mask("00.000.000/0000-00", { reverse: true });
        $("#cep").mask("00000-000");
        $("#ie").mask("000.000.000.000");
      });
    </script>

    <script src="../js/cep.js"></script>
    <script src="../js/file.js"></script>

  </body>
</html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Css/cadastroEmpresa.css" />
    <link rel="stylesheet" href="../Css/geral.css">
    <title>Cadastro</title>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/jquery.mask.js"></script>
    <script src="../js/main.js"> </script>
  </head>

  <p class="message">
        <?php

    @session_start();
        if (isset($_SESSION["msg"])) {
            echo $_SESSION["msg"];
            unset($_SESSION["msg"]);
        }


        ?>
    </p>

  <body>
    <div id="telaCadastro">
      <!-- Coluna do Ícone -->
      <div id="iconeCadastro">
        <p>Faça seu cadastro</p>
        <img src="../Imagens/imagemEmpresa.png" alt="Ícone" id="imagemEmpresa">
      </div>
      <!-- Coluna do Formulário -->
      <form id="cadastro" action="../Controller/cadastroEmpresa.act.php" method="post" enctype="multipart/form-data" name="cadastroEmpresa">
      <input type="hidden" name="cadastroEmpresa" value="value">
        <div class="container">

          <div class="row">
          <label for="nome">
            Nome Empresa
            <input type="text" id="nome" name="nome" required>
          </label>

           <label for="cnpj">
            CNPJ
            <input type="text" id="cnpj" name="cnpj" placeholder="00.000.000.0000-00"/>
          </label>
          </div>

          <div class="row">
          <label for="ie">
            IE (Inscrição Estadual)
            <input type="text" id="ie" name="ie" placeholder="000.000.000.000"/>
          </label>
 
          <label for="telefone">
            Telefone
            <input type="text" id="telefone" name="telefone" placeholder="(00) 0000-0000"/>
          </label> 
        </div>

          <div class="row">
          <div class="cep">
            <label for="cep">
              CEP
              <input type="text" id="cep" name="cep" placeholder="00000-000" />
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
            Email
            <input type="email" id="email" name="email" placeholder="digite seu email" required>
          </label>

          <label for="senha">
            Senha
            <input type="password" id="senha" name="senha" required>
          </label>

        </div>
        <div class="row">

          <label for="file" class="file">
            <div class="icone">
           <img src="../Ícones/file.svg" alt="">
          </div>
            <p>Inserir Arquivo</p>
            <input type="file" name="logo" id="file" required>
          </label>

          <button class="enviar" type="submit"> 
            <img src="../Ícones/Send.svg" alt="">
            Cadastrar</button>
        </div>
        </div>
      </form>
    </div>

    <script type="text/javascript">
      //mascaras
      $(document).ready(function () {
        $("#telefone").mask("99 9999-9999");
        $("#whatsapp").mask("99 99999-9999");
        $("#cnpj").mask("00.000.000/0000-00", { reverse: true });
        $("#cep").mask("00000-000");
        $("#ie").mask("000.000.000.000");
        })
    </script>
    <script src="../js/cep.js"></script>
    <script src="../js/file.js"></script>
  </body>
</html>

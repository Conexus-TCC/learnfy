<?php
/* 
A fazer: verificar o tipo do login 
*/
@session_start();
require("../../Model/Empresa.php");
$empresa = pegarEmpresa($_SESSION["id_empresa"]);
if (!isset($_SESSION) || $empresa == 0) {
  $_SESSION["msg"] = "Você não tem permissão para acessar essa página!";
  header("location:../login.php");
  // var_dump(!isset($_SESSION) || !$_SESSION["logado"]);
  exit;
}
?>
<?php
$_SESSION["contexto"] = "editarEmpresa"
?>



<script src="../../js/jquery-3.7.1.min.js"></script>
<script src="../../js/jquery.mask.js"></script>
<link rel="stylesheet" href="../../Css/cadastroEmpresa.css">
<script src="/learnfy/js/sweetalert.js"></script>
<div class="page-header">
  <div class="page-title">
    <h1>Empresa</h1>
    <p class="page-subtitle">Edite os dados da sua Empresa</p>
  </div>
</div>
<div id="telaCadastro">
  <!-- Coluna do Ícone -->
  <div id="iconeCadastro">
    <p>Edite seu cadastro</p>
    <img src="<?= str_replace("..", "/learnfy", $empresa['logo']) ?>" alt="Ícone" id="imagemEmpresa">
  </div>
  <!-- Coluna do Formulário -->
  <form id="cadastro" action="../../Controller/alterarEmpresa.act.php" method="post" enctype="multipart/form-data" name="cadastroEmpresa">
    <div class="container">
      <div class="row">
        <label for="nome">
          Nome Empresa
          <input type="text" id="nome" name="nome" value="<?= $empresa['nome_empresa'] ?>" required>
        </label>

        <label for="cnpj">
          CNPJ
          <input type="text" id="cnpj" readonly style="background-color: gainsboro;" name="cnpj" value="<?= $empresa['cnpj'] ?>" placeholder="00.000.000.0000-00" />
        </label>
      </div>

      <div class="row">
        <label for="ie">
          IE (Inscrição Estadual)
          <input type="text" id="ie" name="ie" value="<?= $empresa['ie'] ?>" placeholder="000.000.000.000" />
        </label>

        <label for="telefone">
          Telefone
          <input type="text" id="telefone" value="<?= $empresa['telefone'] ?>" name="telefone" placeholder="(00) 0000-0000" />
        </label>
      </div>

      <div class="row">
        <div class="cep">
          <label for="cep">
            CEP
            <input type="text" id="cep" name="cep" value="<?= $empresa['cep'] ?>" placeholder="00000-000" />
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

        <label for="file" class="file">
          <div class="icone">
            <img src="../../icones/file.svg" alt="">
          </div>
          <p>Inserir Arquivo</p>
          <input type="file" name="logo" id="file" accept="image/*" />
        </label>

        <button class="enviar" type="submit">
          <img src="../../icones/Send.svg" alt="">
          Editar</button>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
  //mascaras
  $(document).ready(function() {
    $("#telefone").mask("99 9999-9999");
    $("#whatsapp").mask("99 99999-9999");
    $("#cnpj").mask("00.000.000/0000-00", {
      reverse: true
    })
    $("#cep").mask("00000-000");
    $("#ie").mask("000.000.000.000");
  })
</script>
<script src="../../js/cep.js?=121"></script>
<script src="../../js/file.js?=121"></script>
<script>
  $("#cep").focus();
  $("#nome").focus();
</script>
<?php 
require("../model/connect.php");
extract($_POST);
extract($_FILES);
@session_start();

function validar_cnpj($cnpj) {
    // Verificar se foi informado
  if(empty($cnpj))
    return false;
  // Remover caracteres especias
  $cnpj = preg_replace('/[^0-9]/', '', $cnpj);
  // Verifica se o numero de digitos informados
  if (strlen($cnpj) != 14)
    return false;
      // Verifica se todos os digitos são iguais
  if (preg_match('/(\d)\1{13}/', $cnpj))
    return false;
  $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    for ($i = 0, $n = 0; $i < 12; $n += $cnpj[$i] * $b[++$i]);
    if ($cnpj[12] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
        return false;
    }
    for ($i = 0, $n = 0; $i <= 12; $n += $cnpj[$i] * $b[$i++]);
    if ($cnpj[13] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
        return false;
    }
  return true;
}

$dir = "../fotosSite/" .md5(time()) . ".jpg";
$busca = mysqli_query($con, "SELECT * FROM `empresa` WHERE `email` = '$email' or `cnpj` = '$cnpj'");

if($busca->num_rows == 0){
    $senha = password_hash($senha,PASSWORD_DEFAULT);

    
    if(!validar_cnpj($cnpj)){
        $_SESSION['msg'] = "CNPJ inválido!";
        $_SESSION['alertMsg'] = "CNPJ inválido!";
        $_SESSION['alertIcon'] = "error";
        header("Location: ../View/cadastroEmpresa.php");
        exit();
    }
    
    if(mysqli_query($con, "INSERT INTO empresa (nome_empresa,cnpj, cep,email, senha, logo,ddd, telefone) VALUES('$nome', '$cnpj' ,'$cep','$email','$senha', '$dir', null, '$telefone');")){
        move_uploaded_file($logo['tmp_name'],$dir);
        $_SESSION['msg'] = "Sucesso!";
        $_SESSION['alertMsg'] = "Cadastro Realizado!";
        $_SESSION['alertIcon'] = "success";
    } else {
        $_SESSION['msg'] = "Erro!";
        $_SESSION['alertMsg'] = "Erro ao Cadastrar!";
        $_SESSION['alertIcon'] = "error";
    }

} else {
    $_SESSION['msg'] = "Email ou CNPJ já existente!";
    $_SESSION['alertMsg'] = "Este email ou CPNJ já está cadastrado!";
    $_SESSION['alertIcon'] = "error";
}

header("Location: ../View/cadastroEmpresa.php");
exit();
?>

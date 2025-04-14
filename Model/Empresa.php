<?php 
$root = str_replace( "Empresa.php","connect.php", __FILE__);
function adicionarEmpresa($dados)
{
    $root = str_replace("Empresa.php", "connect.php", __FILE__);
    require("$root");

    $busca = mysqli_query($con, "SELECT * FROM `empresa` WHERE `email` = $dados[email]");

    if($busca->num_rows == 0){

    $sql = "INSERT INTO empresa (nome_empresa,cnpj, cep,email, senha, logo,ddd, telefone) VALUES ('{$dados["nome_empresa"]}', '{$dados["cnpj"]}','{$dados["cep"]}','{$dados["email"]}','{$dados["senha"]}''{$foto['foto']}',null,'{$dados["telefone"]}')";
    $result = $con->query($sql);

    if ($result == true) { 
           
        
            $con->close();
            return 1;
        
    } else {
        $con->close();
        return 0;
    }

    }else{
        $_SESSION["msg"] = "Email já existente";
    }
}

function pegarEmpresa($id){
    $root = str_replace("Empresa.php", "connect.php", __FILE__);
    require("$root");
    $sql = "SELECT * FROM empresa WHERE id_empresa = $id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $con->close();
        return $row;
    } else {
        $con->close();
        return 0;
    }
}
function alterarEmpresa($dados)
{
    $root = str_replace("Empresa.php", "connect.php", __FILE__);
    require("$root");

    $sql = "UPDATE empresa 
    SET nome_empresa = '{$dados["nome_empresa"]}',
    cnpj = '{$dados["cnpj"]}', cep = '{$dados["cep"]}', 
    logo = '{$dados["logo"]}',
    telefone = '{$dados["telefone"]}'
         WHERE id_empresa = {$dados["id_empresa"]}";

    $result = $con->query($sql);

    if ($result == true) {
        $con->close();
        return 1;
    } else {
        $con->close();
        return 0;
    }
}






?>
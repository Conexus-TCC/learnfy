<?php 

function adicionarEmpresa($dados)
{
    require_once "../Model/connect.php";

    $busca = mysqli_query($con, "SELECT * FROM `empresa` WHERE `email` = $dados[email]");

    if($busca->num_rows == 0){

    $sql = "INSERT INTO empresa (nome_empresa,cnpj, cep,email, senha, logo,ddd, telefone) VALUES ('{$dados["nome_empresa"]}', '{$dados["cnpj"]}','{$dados["cep"]}','{$dados["ie"]}','{$dados["email"]}','{$dados["senha"]}''${$foto['foto']}',null,'{$dados["telefone"]}')";
    $result = $conn->query($sql);

    if ($result == true) { 
           
        
            $conn->close();
            return 1;
        
    } else {
        $conn->close();
        return 0;
    }

    }else{
        $_SESSION["msg"] = "Email já existente";
    }
}







?>
<?php
// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "db_learnfy");

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Array de funcionários
$funcionarios = [
  ["Ana", "1990-01-01", "F", "11", "999999999", "ana@email.com", "senha123", "12345678901", "foto1.jpg", 1, 2, 1],
  ["Bruno", "1985-05-15", "M", "21", "988888888", "bruno@email.com", "senha123", "23456789012", "foto2.jpg", 1, 2, 2],
  ["Carlos", "1992-03-10", "M", "31", "977777777", "carlos@email.com", "senha123", "34567890123", "foto3.jpg", 1, 2, 1],
  ["Daniela", "1995-07-20", "F", "41", "966666666", "daniela@email.com", "senha123", "45678901234", "foto4.jpg", 1, 2, 2],
  ["Eduardo", "1988-11-25", "M", "51", "955555555", "eduardo@email.com", "senha123", "56789012345", "foto5.jpg", 1, 2, 1],
  ["Fernanda", "1993-09-12", "F", "61", "944444444", "fernanda@email.com", "senha123", "67890123456", "foto6.jpg", 1, 2, 2],
  ["Gabriel", "1990-04-18", "M", "71", "933333333", "gabriel@email.com", "senha123", "78901234567", "foto7.jpg", 1, 2, 1],
  ["Helena", "1997-06-30", "F", "81", "922222222", "helena@email.com", "senha123", "89012345678", "foto8.jpg", 1, 2, 2],
  ["Igor", "1989-02-14", "M", "91", "911111111", "igor@email.com", "senha123", "90123456789", "foto9.jpg", 1, 2, 1],
  ["Juliana", "1994-08-05", "F", "71", "900000000", "juliana@email.com", "senha123", "01234567890", "foto10.jpg", 1, 2, 2],
];

// Inserção no banco de dados
foreach ($funcionarios as $funcionario) {
  $senha = password_hash($funcionario[6], PASSWORD_DEFAULT);
  $query = "INSERT INTO usuario 
        (nome_usuario, data_nascimento, sexo, ddd, telefone, email, senha, cpf, foto, status, id_empresa, nivel) 
        VALUES 
        ('$funcionario[0]',
         '$funcionario[1]', 
         '$funcionario[2]', 
         '$funcionario[3]', 
         '$funcionario[4]', 
         '$funcionario[5]', 
         '$senha', 
         '$funcionario[7]', 
         '../fotosSite/pessoa.jpg', 
           $funcionario[9],
          $funcionario[10], 
          $funcionario[11])";

  if ($conn->query($query) === TRUE) {
    echo "Funcionário {$funcionario[0]} cadastrado com sucesso!<br>";
  } else {
    echo "Erro ao cadastrar {$funcionario[0]}: " . $conn->error . "<br>";
  }
}

// Fechar conexão
$conn->close();

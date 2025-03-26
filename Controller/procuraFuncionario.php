<?php
  @session_start();
  require "../Model/connect.php";
  $pesquisa = $_GET["nome"];
  $idEmpresa =$_SESSION["id_empresa"];
  $append= "";
  if($pesquisa==""){
    $append= "LIMIT 10";
  }
  
$fetch = mysqli_query($con, "SELECT id_usuario,
 nome_usuario AS nome,
  email, telefone,
   data_nascimento,
    sexo, cpf,
     status,
      ddd,foto
      FROM usuario WHERE id_empresa= $idEmpresa AND
        nome_usuario like '%$pesquisa%'
      ORDER BY id_usuario desc $append");
      $res =array();
      if($fetch->num_rows<=0){
      header("content-type:text/html");
      echo "<h3>nenhum colaborador encontrado</h3>";
      }else{
          while($row=$fetch->fetch_assoc()){
    echo '<tr data-id="' . $row['id_usuario'] . '" data-ddd="' . $row['ddd'] . '">';
    echo '<td>' . $row['nome'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['telefone'] . '</td>';
    echo '<td>' . $row['data_nascimento'] . '</td>';
    echo '<td>' . $row['sexo'] . '</td>';
    echo '<td>' . $row['cpf'] . '</td>';
    echo '<td>' . ($row['status'] ? 'Ativo' : 'Inativo') . '</td>';
    echo '<td>';
    echo "<button onclick=alterarColaborador(" . json_encode($row) . ") class='alterar-btn'>Alterar</button>";
    echo '<form action="/learnfy/Controller/excluirColaborador.act.php" method="post" style="display:inline;">
                          <input type="hidden" name="id_usuario" value="' . $row['id_usuario'] . '">
                          <button type="submit" class="excluir-btn">Excluir</button>
                        </form>';
    echo '</td>';
    echo '</tr>';
      }
    }
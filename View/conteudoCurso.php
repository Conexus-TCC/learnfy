<?php
require "../Model/connect.php";
@session_start();
if (!isset($_GET["curso"])) {
    $_SESSION["msg"] = "Nenhum curso encotrado";
    $_SESSION['alertMsg'] = "Acesso negado";
    $_SESSION['alertIcon'] = "error";
    header("location:cursos.php");
    exit();
}
$id_empresa = $_SESSION["id_empresa"];
$nivel = $_SESSION["nivel"];
$id_curso = $_GET["curso"];
$curso = mysqli_query($con, "SELECT curso.nome,COUNT(aula.id_aula) as contagem_de_aulas from curso 
LEFT JOIN aula on aula.id_curso = curso.id_curso 
WHERE curso.id_curso = $id_curso
GROUP by curso.id_curso; ")->fetch_assoc();
if (!isset($curso)) {
    $_SESSION["msg"] = "Nenhum curso encotrado";
    $_SESSION['alertMsg'] = "Acesso negado";
    $_SESSION['alertIcon'] = "error";
    header("location:cursos.php");
    exit();
}
$aulas = array();
$q = mysqli_query($con, "SELECT nome,id_aula as id from aula where id_curso= $id_curso");
while (($a = $q->fetch_assoc()) != null) {
    array_push($aulas, $a);
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnFY</title>
    <?php include("parts/head.php") ?>
    <link rel="stylesheet" href="../Css/contCurso.css">
    <script src="../js/contCurso.js" defer></script>

<body>
    <?php
    include("parts/header.php");
    ?>
    <div id="principal">

        <div id="esq">

            <div id="contCurso">
                <h1>Conteúdo do curso</h1>
                <p><!--$Aulas--><?= $curso["contagem_de_aulas"] ?> Aulas - <!--$Minutos-->480 Minutos</p>

                <?php
                foreach ($aulas as $aula) { ?>
                    <div class="aulas <?php
                                        if (isset($_GET["aula"]) && $aula["id"] == $_GET["aula"]) {
                                            echo "selecionado";
                                        }

                                        ?>">
                        <a href="<?= "$_SERVER[PHP_SELF]?curso=$id_curso&aula=$aula[id]" ?>"><!--$LinkOutraAula-->
                            <div><img src="../icones/play.png" alt=""></div> <!--$icone-->
                            <div>
                                <h1><?= $aula["nome"] ?> <!--$nomeAula--></h1>
                                <p>45 min <!--$horario da aula--></p>
                            </div>
                        </a>
                    </div>

                <?php } ?>
            </div>

        </div>


        <div id="dir">
            <div id="barra">
                <?php
                $sql = "SELECT * from aula WHERE id_curso = $id_curso ";
                if (isset($_GET["aula"])) {
                    $sql = $sql . " AND id_aula = $_GET[aula]";
                }
                $aula  = mysqli_query($con, $sql)->fetch_assoc();
                $materiais = array();
                $q = mysqli_query($con, "SELECT * FROM materiais_aula WHERE id_aula = $aula[id_aula]");
                while (($a = $q->fetch_assoc()) != null) {
                    array_push($materiais, $a);
                }
                ?>
                <div>
                    <h1><?= $curso["nome"] ?> <!--$nomeCurso--></h1>
                    <p><?= $aula["nome"] ?> <!--nomeAula--></p>
                </div>

                <div id="btn">
                    <button>Anterior</button>
                    <button>Próxima</button>
                </div>

            </div>

            <div id="cont">
                <div href="" id="btnVideo"><img src="../icones/arquivo-de-video.png" alt="">
                    <p>Vídeo</p>
                </div>
                <div href="" id="btnMateriais"><img src="../icones/arquivos.png" alt="">
                    <p>Matériais</p>
                </div>
                <div href="" id="btnQuiz"><img src="../icones/correto.png" alt="">
                    <p>Quiz</p>
                </div>
            </div>

            <div id="boxVideo" class="boxVideo">
                <video width="900" height="400" src="<?= $aula["video"] ?>" controls>
                    Your browser does not support the video tag.
                </video>

            </div>

            <div id="boxQuiz">
                <?php
                $qeury = mysqli_query($con, "SELECT pergunta.id_pergunta,pergunta.pergunta, GROUP_CONCAT(resposta.resposta) as resp_concat  from quiz 
                    RIGHT JOIN pergunta on pergunta.id_quiz = quiz.id_quiz
                     LEFT join resposta on resposta.id_pergunta = pergunta.id_pergunta 
                     where id_aula = $aula[id_aula]
                     GROUP BY pergunta.id_pergunta; ");
                     $i = 1;
                while ($pergunta = $qeury->fetch_assoc()) {
                    $respostas = explode(",", $pergunta["resp_concat"]);
                ?>
                    <form>
                        <h1> <?= $i . ") " . $pergunta["pergunta"] ?></h1>

                        <?php
                        foreach ($respostas as $resposta) { ?>
                            <label for="">
                                <input type="radio" name="reposta" id="" value="<?= $resposta ?>">
                                <p><?= $resposta ?></p>
                            </label>
                    
            <?php }
                        $i++;
            echo "</form>";
            // echo "<hr>"
                    } ?>

            </div>

            <div id="boxMateriais" class="boxMateriais">
                <h1>Materiais complementares</h1>
                <?php
                foreach ($materiais as $material) { ?>
                    <div>
                        <section>
                            <img src="../icones/pdf.png" alt="">
                            <div>
                                <h1><?= $material["filename"] ?> <!--$nomeArquivo--></h1>
                                <!---TODO: ADICIONAR DETECTAR O FILE TYPE 
                                https://pt.stackoverflow.com/questions/38877/extrair-informa%C3%A7%C3%B5es-de-um-v%C3%ADdeo-no-momento-do-upload
                            -->
                            <p>Documento PDF <!--$tipoArquivo--></p>
                            </div>
                        </section>

                        <div style="display:flex; flex-direction: row; align-items:center;">

                            <a download="<?= $material['filename'] ?>" href="<?= $material['caminho'] ?>">
                                <img src="../icones/download-direto.png" alt="">
                            </a>
                            <a download="<?= $materiail['filename'] ?>" href="<?= $material['caminho'] ?>">
                                <p>Baixar</p>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>



        </div>

    </div>

</body>
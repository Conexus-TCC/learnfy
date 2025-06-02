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
                $qeury = mysqli_query($con, "SELECT pergunta.id_pergunta,pergunta.pergunta,
                quiz.id_quiz,
                 GROUP_CONCAT(resposta.resposta) as resp_concat ,
                 GROUP_CONCAT(resposta.id_resposta) as ids_resposta,
                 pergunta.id_res_certa
                  from quiz 
                    RIGHT JOIN pergunta on pergunta.id_quiz = quiz.id_quiz
                     LEFT join resposta on resposta.id_pergunta = pergunta.id_pergunta 
                     where id_aula = $aula[id_aula]
                     GROUP BY pergunta.id_pergunta; ");
                $i = 1;
                while ($pergunta = $qeury->fetch_assoc()) {
                    $nums = mysqli_query($con, "SELECT id_pergunta from progresso where id_pergunta = $pergunta[id_pergunta]")->num_rows;
                    $repondido = $nums > 0 ? true : false;

                    $respostas = explode(",", $pergunta["resp_concat"]);
                    $idsResposta = explode(",", $pergunta["ids_resposta"])
                ?>
                    <?= $repondido ?
                        '<form method="post" action="">'
                        :   '<form method="post" action="../Controller/responder.php">'
                    ?>
                    <input type="hidden" name="idQuiz" value="<?= $pergunta["id_quiz"] ?>">
                    <input type="hidden" name="idPergunta" value="<?= $pergunta["id_pergunta"] ?>">
                    <h1> <?= $i . ") " . $pergunta["pergunta"] ?></h1>

                    <?php
                    foreach ($respostas  as $key => $resposta) { ?>
                        <label id="lb<?= $idsResposta[$key] ?>" class="<?= $idsResposta[$key] == $pergunta["id_res_certa"] && $repondido ? "certo" : "" ?>" for="">
                            <input type="radio" name="resposta" id="" value="<?= $idsResposta[$key] ?>" <?= $idsResposta[$key] == $pergunta["id_res_certa"] && $repondido ? "checked" : "" ?>>
                            <p><?= $resposta ?></p>
                        </label>

                <?php }

                    $i++;
                    echo "<p class='invisivel'></p>";
                    echo "</form>";
                    // echo "<hr>"
                } ?>
                <button class="enviar">Enviar</button>
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
    <script>
        const Forms = document.querySelectorAll("form")
        /**
         * @type HTMLButtonElement
         */
        const btnEnviar = document.querySelector(".enviar")
        const statuss = [];
        btnEnviar.addEventListener("click", e => {
            // e.preventDefault()
            Forms.forEach(async form => {
                const bodyForm = new FormData(form)
                const res = await fetch(form.action, {
                    method: form.method,
                    body: bodyForm
                })
                const data = await res.json();
                if (data.status) {
                    statuss.push(true);
                    document.querySelector("#lb" + data.resp).classList.add("certo")
                } else {
                    statuss.push(false);
                    document.querySelector("#lb" + data.resp).classList.add("errado")
                    const p = form.querySelector("form>p")
                    p.classList.remove("invisivel")
                    p.innerText = data.motivo
                }
            })
        })
    </script>
</body>
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
                <p><!--$Aulas-->4 Aulas - <!--$Minutos-->480 Minutos</p>

                <div class="aulas">
                    <a href=""><!--$LinkOutraAula-->
                        <div><img src="../icones/play.png" alt=""></div> <!--$icone-->
                        <div>
                            <h1>Introdução ao HTML5 <!--$nomeAula--></h1>
                            <p>45 min <!--$horario da aula--></p>
                        </div>
                    </a>
                </div>

                <div class="aulas">
                    <a href="">
                        <div><img src="../icones/play.png" alt=""></div>
                        <div>
                            <h1>Introdução ao HTML5 <!--$nomeAula--></h1>
                            <p>45 min <!--$horario da aula--></p>
                        </div>
                    </a>
                </div>

            </div>

        </div>


        <div id="dir">
            <div id="barra">

                <div>
                    <h1>Desenvolvimento Web Completo <!--$nomeCurso--></h1>
                    <p>Aula 1: Introdução ao HTML5 <!--nomeAula--></p>
                </div>

                <div id="btn">
                    <button>Anterior</button>
                    <button>Próxima</button>
                </div>

            </div>

            <div id="cont">
                <a href="" id="btnVideo"><img src="../icones/arquivo-de-video.png" alt="">
                    <p>Vídeo</p>
                </a>
                <a href="" id="btnMateriais"><img src="../icones/arquivos.png" alt="">
                    <p>Matériais</p>
                </a>
                <a href="" id="btnQuiz"><img src="../icones/correto.png" alt="">
                    <p>Quiz</p>
                </a>
            </div>

            <div id="boxVideo" class="boxVideo">
                <video width="900" height="400" src="../Imagens/202743-918944206_tiny.mp4" controls>    
                    Your browser does not support the video tag.
                </video>

            </div>

            <div id="boxMateriais" class="boxMateriais">
                <h1>Materiais complementares</h1>
                <div>
                    <section>
                        <img src="../icones/pdf.png" alt="">
                        <div>
                            <h1>Guia de HTML5 <!--$nomeArquivo--></h1>
                            <p>Documento PDF <!--$tipoArquivo--></p>
                        </div>
                    </section>

                    <div style="display:flex;
                flex-direction: row;
                align-items:center;">
                        <a href=""><!--$caminhoArquivo--><img src="../icones/download-direto.png" alt=""></a>
                        <a href=""><!--$caminhoArquivo-->
                            <p>Baixar</p>
                        </a>
                    </div>
                </div>
            </div>

            <div id="boxQuiz">

            </div>

        </div>

    </div>

</body>
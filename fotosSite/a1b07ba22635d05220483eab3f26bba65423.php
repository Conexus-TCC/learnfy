<!DOCTYPE html>
<html lang="pt- br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>o jogo</title>
    <link rel="icon" href="imagens/tabuada.webp">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="ricardo"></div>

    <div class="pagina">
        <div id="placar">
            <p>Acertos:
            <div id="divacertos">0</div>
            </p>
        </div>
        <div class="jogo">
            <div class="titulo">
                <h1>Calculadora The Jogo</h1>
            </div>
            <form>
                <input type="text" name="valor1" id="txtValor1">
                <h1>X</h1>
                <input type="text" name="Valor2" id="txtValor2">

                <h1>=</h1>
                <input type="text" placeholder="responda aqui" id="txtresposta"> <br>

                <input type="text" id="txtnome" placeholder="nome" required> <br>
                <div class="botoes">
                    <input type="button" value="iniciar" id="começar" onclick="iniciar()"
                        class="habilitado"><br>
                    <p id="display"></p>
                    <input type="button" value="zerar" id="acabar" onclick="zerar()" class="desabilitado"> <br>
                    <input type="button" value="gravar" id="gravarbt" onclick="gravar(), parô()" class="habilitado">
                </div>

        </div>
        <div id="placar">
            <p>erros:
            <div id="diverros">0</div>
            </p>
        </div>
    </div>
    <div id="servidor">
        <p onclick="placar()">Melhores jogadores</p>
        <div class="nome"></div>
        <div class="acertos"></div>
        <div class="data"></div>
    </div>
    </form>
    <script src="libs/code.jquery.com_jquery-3.7.0.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
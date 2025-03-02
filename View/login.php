<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../Css/login.css">
    <?php include("parts/head.php") ?>  
</head>
<body>
   
<?php 

include("parts/header.php");

?>
<p class="message">
        <?php

    @session_start();
        if (isset($_SESSION["msg"])) {
            echo $_SESSION["msg"];
            unset($_SESSION["msg"]);
        }


        ?>
    </p>

    <div class="login-container">
        <!-- Seção de boas-vindas -->
        <div class="welcome-section">
            <div class="welcome-content">
                <h1 class="welcome-title">Bem-vindo</h1>
                <p class="welcome-text">
                    Faça seu cadastro, crie cursos para sua empresa e qualifique seus colaboradores.
                </p>
                <button class="signup-button"><a href="cadastroEmpresa.php">Cadastre-se </a></button>
            </div>
        </div>

        <!-- Seção de login -->
        <div class="login-section">
            <div class="login-form">
                <h2 class="login-title">Faça login</h2>
                <form enctype="multipart/form-data" method="post" action="../controller/login.act.php">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <div class="input-container">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <input type="email" name="email" class="form-input" placeholder="Digite seu email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Senha</label>
                        <div class="input-container">
                            <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <input type="password" class="form-input" placeholder="Digite sua senha" name="senha" required>
                        </div>
                    </div>

                    <a href="#" class="forgot-password">Esqueci a senha</a>
                    <button type="submit" class="login-button">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    
    <footer>
        <div id="rodape"><!--Rodape-->
        
            <div>
                <img src="../Imagens/LogoLearnFy.png" alt="">
            </div>
        
            <div>
        
                <strong><h1>Ajuda</h1></strong>
                <ul>
                    <li><a href=""><p>Termos de Uso</p></a></li>
                    <li><a href=""><p>Quem somos</p></a></li>
                    <li><a href=""><p>Perguntas frequentes</p></a></li>
                </ul>
        
            </div>
        
            <div>
        
                <h1>Contate-nos</h1>
                <p>R. Virgínia Ferni, 400 - Itaquera, São Paulo - SP, 08253-000</p>
            <a href=""><p style="color: black;">contato@learnfy.com.br</p></a>
                <ul id="icones">
                    <li><a href="#"><img class="icon" src="../Ícones/facebook.svg" alt=""></a></li>
                    <li><a href="#"><img class="icon" src="../Ícones/instagram.svg" alt=""></a></li>
                    <li><a href="#"><img class="icon" src="../Ícones/x-twitter.svg" alt=""></a></li>
                    <li><a href="#"><img class="icon" src="../Ícones/whatsapp.svg" alt=""></a></li>
                </ul>
        
            </div>
        
        </div><!--Fim Rodape-->
        
        <div id="direitos"><!--Direitos Reservados-->
            <h3>
                Copyright © 2025 LearnFY | Desenvolvido por Conexus Technology
            </h3>
        </div><!--Fim Direitos Reservados-->
        </footer>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/loginUsuario.css">
    
    <?php include "./parts/head.php" ?>
</head>

<body>
    <?php include "./parts/header.php";
    @session_start(); ?>
    <div class="container">
        <header class="header">
            <h1>Perfil do Usuário</h1>
            
        </header>
        
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar">
                  <img src="<?=$_SESSION['foto']?>" id="fotoUser" alt="">
                </div>
                <div class="profile-name">
                    <h2><?=$_SESSION['nome']?></h2>
                    <div class="profile-company"><?=$_SESSION['nome_empresa']?></div>
                </div>
            </div>
            
            <div class="profile-details">
                <h3 class="section-title">Informações Pessoais</h3>
                <div class="detail-group">
                    <div class="detail-item">
                        <div class="detail-label">Data de Nascimento</div>
                        <div class="detail-value"><?=$_SESSION['data_nascimento']?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">CPF</div>
                        <div class="detail-value"><?=$_SESSION["cpf"]?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Sexo</div>
                        <div class="detail-value"><?php 
                        
                        if($_SESSION["sexo"] == "M"){
                            echo "Masculino";
                        }
                        else if($_SESSION["sexo"] == "F"){
                            echo "Feminino";
                        }
                        else{
                            echo "Outro";
                        }
                        ?></div>
                    </div>
                </div>
                
                <h3 class="section-title">Contato</h3>
                <div class="detail-group">
                    <div class="detail-item">
                        <div class="detail-label">E-mail</div>
                        <div class="detail-value"><?=$_SESSION["email"]?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Telefone</div>
                        <div class="detail-value"><?=$_SESSION["telefone"]?></div>
                    </div>
                </div>
            </div>
            
            <div class="courses-section">
                <h3 class="section-title">Cursos Realizados</h3>
                <div class="courses-grid">
                    <div class="course-card">
                        <div class="course-image">
                            🖥️
                        </div>
                        <div class="course-content">
                            <h4 class="course-title">Desenvolvimento Web Completo</h4>
                            <div class="course-info">
                                <span>8 aulas</span>
                                <span>120 minutos</span>
                            </div>
                            <div class="course-completion">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width:100%"></div>
                                </div>
                                <span>100%</span>
                            </div>
                            <div class="certificate-badge">Certificado Emitido</div>
                        </div>
                    </div>
                    
                   
                    
                    <div class="course-card">
                        <div class="course-image">
                            🧠
                        </div>
                        <div class="course-content">
                            <h4 class="course-title">Inteligência Artificial e Machine Learning</h4>
                            <div class="course-info">
                                <span>15 aulas</span>
                                <span>240 minutos</span>
                            </div>
                            <div class="course-completion">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width:65%"></div>
                                </div>
                                <span>65%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div style="display: flex;flex-direction:column;justify-content: center;align-items: center;">
        <h1>Login Usuario</h1>
      
    </div>
   
</body>

</html>
<?php
require_once '../Model/connect.php';
@session_start();

// Buscando os cursos realizados pelo usuário
$id_usuario = $_SESSION['id_usuario'];
$idEmpresa = $_SESSION["id_empresa"];
$queryCursos = "SELECT c.nome AS nome_curso, COUNT(a.id_aula) AS qtd_aulas, SUM(a.tempo_em_segundos) AS tempo_total,
                IFNULL((SELECT 100 FROM certificado WHERE id_usuario = $id_usuario AND id_curso = c.id_curso), 0) AS certificado_emitido,
                c.imagem
                FROM curso c
                LEFT JOIN aula a ON c.id_curso = a.id_curso
                WHERE id_empresa = $idEmpresa
                GROUP BY c.id_curso";
$resultCursos = mysqli_query($con, $queryCursos);
$cursos = [];

if ($resultCursos && mysqli_num_rows($resultCursos) > 0) {
    while ($row = mysqli_fetch_assoc($resultCursos)) {
        $row['tempo_total'] = round($row['tempo_total'] / 60); // Convertendo segundos para minutos
        $cursos[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <link rel="stylesheet" href="../css/loginUsuario.css">
    <?php include "./parts/head.php" ?>
</head>

<body>
    <?php include "./parts/header.php"; ?>
    <div class="container">
        <header class="header">
            <h1>Perfil do Usuário</h1>
        </header>

        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar">
                    <img src="<?= $_SESSION['foto'] ?>" id="fotoUser" alt="">
                </div>
                <div class="profile-name">
                    <h2><?= $_SESSION['nome'] ?></h2>
                    <div class="profile-company"><?= $_SESSION['nome_empresa'] ?></div>
                </div>
            </div>

            <?php
            $dataFormatada = date("d/m/Y", strtotime($_SESSION['data_nascimento']));
            ?>

            <div class="profile-details">
                <h3 class="section-title">Informações Pessoais</h3>
                <div class="detail-group">
                    <div class="detail-item">
                        <div class="detail-label">Data de Nascimento</div>
                        <div class="detail-value"><?= $dataFormatada ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">CPF</div>
                        <div class="detail-value"><?= $_SESSION["cpf"] ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Sexo</div>
                        <div class="detail-value">
                            <?php
                            if ($_SESSION["sexo"] == "M") {
                                echo "Masculino";
                            } else if ($_SESSION["sexo"] == "F") {
                                echo "Feminino";
                            } else {
                                echo "Outro";
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <h3 class="section-title">Contato</h3>
                <div class="detail-group">
                    <div class="detail-item">
                        <div class="detail-label">E-mail</div>
                        <div class="detail-value"><?= $_SESSION["email"] ?></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Telefone</div>
                        <div class="detail-value"><?= $_SESSION["telefone"] ?></div>
                    </div>
                </div>
            </div>

            <div class="courses-section">
                <h3 class="section-title">Cursos Realizados</h3>
                <div class="courses-grid">
                    <?php foreach ($cursos as $curso): ?>
                        <div class="course-card">
                            <div class="course-image" style="background-image: url(<?= $curso["imagem"] ?>)">
                            </div>
                            <div class="course-content">
                                <h4 class="course-title"><?= $curso['nome_curso'] ?></h4>
                                <div class="course-info">
                                    <span><?= $curso['qtd_aulas'] ?> aulas</span>
                                    <span><?= $curso['tempo_total'] ?> minutos</span>
                                </div>
                                <?php if ($curso['certificado_emitido']): ?>
                                    <div class="certificate-badge">Certificado Emitido</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <a class="btn-sair" href="../Controller/logout.php">Sair 🚪</a>
    </div>
</body>

</html>
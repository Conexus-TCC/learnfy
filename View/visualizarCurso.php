<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso de Desenvolvimento Web - LearnFy</title>
    <link rel="stylesheet" href="student-course.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Css/visualizarCurso.css">
</head>

<body>
    <div class="course-container">
        <aside class="course-sidebar">
            <div class="course-info">
                <h2>Desenvolvimento Web Completo</h2>
                <p>8 aulas • 120 minutos</p>
            </div>
            <nav class="lesson-list">
                <div class="lesson active">
                    <span class="lesson-number">1</span>
                    <div class="lesson-details">
                        <h3>Introdução ao HTML</h3>
                        <p>10 minutos</p>
                    </div>
                    <span class="lesson-status">▶</span>
                </div>
                <div class="lesson">
                    <span class="lesson-number">2</span>
                    <div class="lesson-details">
                        <h3>Fundamentos de CSS</h3>
                        <p>15 minutos</p>
                    </div>
                    <span class="lesson-status">✓</span>
                </div>
                <div class="lesson">
                    <span class="lesson-number">3</span>
                    <div class="lesson-details">
                        <h3>JavaScript Básico</h3>
                        <p>20 minutos</p>
                    </div>
                    <span class="lesson-status">🔒</span>
                </div>
                <!-- More lessons would go here -->
            </nav>
        </aside>

        <main class="course-content">
            <header class="content-header">
                <div class="header-info">
                    <h1>Aula 1: Introdução ao HTML</h1>
                    <div class="navigation-buttons">
                        <button class="btn-prev" disabled>Anterior</button>
                        <button class="btn-next">Próxima</button>
                    </div>
                </div>
            </header>

            <div class="lesson-tabs">
                <div class="tabs">
                    <button class="tab active" data-tab="video">Vídeo</button>
                    <button class="tab" data-tab="materials">Materiais</button>
                    <button class="tab" data-tab="quiz">Quiz</button>
                </div>

                <div class="tab-content active" id="video-tab">
                    <div class="video-container">
                        <iframe
                            src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                            frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                    <div class="video-description">
                        <h2>Introdução ao HTML</h2>
                        <p>Aprenda os conceitos básicos de HTML e como criar sua primeira página web.</p>
                    </div>
                </div>

                <div class="tab-content" id="materials-tab">
                    <h2>Materiais Complementares</h2>
                    <div class="materials-list">
                        <div class="material">
                            <span class="material-icon">📄</span>
                            <div class="material-info">
                                <h3>Guia Completo de HTML</h3>
                                <p>Documento PDF • 5 MB</p>
                            </div>
                            <button class="btn-download">Baixar</button>
                        </div>
                        <div class="material">
                            <span class="material-icon">🔗</span>
                            <div class="material-info">
                                <h3>Referência MDN Web Docs</h3>
                                <p>Link Externo</p>
                            </div>
                            <button class="btn-link">Acessar</button>
                        </div>
                    </div>
                </div>

                <div class="tab-content" id="quiz-tab">
                    <div class="quiz-container">
                        <h2>Quiz de Introdução ao HTML</h2>
                        <div class="quiz-question">
                            <p>O que significa HTML?</p>
                            <div class="quiz-options">
                                <label>
                                    <input type="radio" name="q1" value="a">
                                    High Text Markup Language
                                </label>
                                <label>
                                    <input type="radio" name="q1" value="b">
                                    Hyper Text Markup Language
                                </label>
                                <label>
                                    <input type="radio" name="q1" value="c">
                                    Hyperlinks and Text Markup Language
                                </label>
                            </div>
                        </div>
                        <div class="quiz-actions">
                            <button class="btn-submit-quiz">Finalizar Quiz</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const tabId = tab.getAttribute('data-tab');

                    // Remove active class from all tabs and tab contents
                    tabs.forEach(t => t.classList.remove('active'));
                    tabContents.forEach(tc => tc.classList.remove('active'));

                    // Add active class to clicked tab and corresponding tab content
                    tab.classList.add('active');
                    document.getElementById(`${tabId}-tab`).classList.add('active');
                });
            });

            // Optional: Simple quiz submission simulation
            const submitQuizButton = document.querySelector('.btn-submit-quiz');
            if (submitQuizButton) {
                submitQuizButton.addEventListener('click', () => {
                    const selectedOption = document.querySelector('input[name="q1"]:checked');
                    if (selectedOption && selectedOption.value === 'b') {
                        alert('Resposta correta! 🎉');
                    } else {
                        alert('Resposta incorreta. Tente novamente! 🤔');
                    }
                });
            }
        });
    </script>
</body>

</html>
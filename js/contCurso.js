const boxVideo = document.getElementById("boxVideo");
const boxMateriais = document.getElementById("boxMateriais");
const btnVideo = document.getElementById("btnVideo");
const btnMateriais = document.getElementById("btnMateriais");
const boxQuiz = document.getElementById("boxQuiz");
const btnQuiz = document.getElementById("btnQuiz");

boxMateriais.style.display = "none";
boxQuiz.style.display="none";
btnVideo.classList.add("ativo");
btnVideo.style.backgroundColor = "rgb(209, 206, 206)";

btnVideo.addEventListener('click', () => {
    event.preventDefault();
    btnVideo.style.backgroundColor = "rgb(209, 206, 206)";
    btnMateriais.style.backgroundColor = "white";
    btnQuiz.style.backgroundColor = "white";
    btnVideo.classList.add("ativo");
    btnVideo.classList.remove("desativado")
    btnMateriais.classList.remove("ativo");
    btnMateriais.classList.add("desativado");
     btnQuiz.classList.remove("ativo");
     btnQuiz.classList.add("desativado");
    boxVideo.style.display="flex";
    boxMateriais.style.display = "none";
    boxQuiz.style.display = "none";
});

btnMateriais.addEventListener('click', () => {
    event.preventDefault();
    btnMateriais.style.backgroundColor = "rgb(209, 206, 206)";
    btnVideo.style.backgroundColor = "white";
    btnQuiz.style.backgroundColor = "white";
    boxMateriais.style.display = "flex";
    boxVideo.style.display = "none";
    boxQuiz.style.display = "none";
    btnVideo.classList.remove("ativo");
    btnVideo.classList.add("desativado");
    btnMateriais.classList.remove("desativado");
    btnMateriais.classList.add("ativo");
     btnQuiz.classList.remove("ativo");
     btnQuiz.classList.add("desativado");
});

btnQuiz.addEventListener('click', () => {
    event.preventDefault();
    btnQuiz.style.backgroundColor = "rgb(209, 206, 206)";
    btnVideo.style.backgroundColor = "white";
    btnMateriais.style.backgroundColor = "white";
    boxQuiz.style.display = "flex";
    boxVideo.style.display = "none";
    boxMateriais.style.display = "none";
    btnVideo.classList.remove("ativo");
    btnVideo.classList.add("desativado");
    btnMateriais.classList.remove("ativo");
    btnMateriais.classList.add("desativado");
    btnQuiz.classList.remove("desativado");
    btnQuiz.classList.add("ativo");
});
const boxVideo = document.getElementById("boxVideo");
const boxMateriais = document.getElementById("boxMateriais");
const btnVideo = document.getElementById("btnVideo");
const btnMateriais = document.getElementById("btnMateriais");

boxVideo.style.display = "none";
boxMateriais.style.display = "none";

btnVideo.addEventListener('click', () => {
    event.preventDefault();
    btnVideo.style.backgroundColor="rgb(241, 241, 241)";
    btnMateriais.style.backgroundColor="white";
    boxMateriais.style.display = "none";
    boxVideo.style.display = "flex";
});

btnMateriais.addEventListener('click', () => {
    event.preventDefault();
    btnMateriais.style.backgroundColor="rgb(241, 241, 241)";
    btnVideo.style.backgroundColor="white";
    boxVideo.style.display = "none";
    boxMateriais.style.display = "flex";
});
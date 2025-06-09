const video  = document.querySelector("video")
let a;
video.addEventListener("play",()=>{
  a=setInterval(Assistir,1000)
})
video.addEventListener("pause",()=>{
  clearInterval(a)
})

function Assistir(){
   const tempoAssistido = Number.parseInt(video.currentTime);
   const form = new FormData();
   form.append("tempoAssistido", tempoAssistido);
   form.append("idUsuario", data.idUsuario);
   form.append("idAula", String(data.idQuiz));
   fetch("../controller/assistir.php", {
     method: "POST",
     body: form,
   });
}
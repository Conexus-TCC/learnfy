const btnCriarAula = document.querySelector(".btn-Add-Aula");


const enviar = document.querySelector("#enviar");
const aulas = document.querySelector(".aulas");
btnCriarAula.addEventListener("click", function () {
  console.log("../../controller/deletarAula.php?id="+idCurso);
  let i = document.querySelectorAll(".campos-Curso").length+1;
  const evento = new CustomEvent("criar-aula", { detail: { index: i } });
  console.log(evento.detail);
  const aula = document.createElement("div");
  aula.innerHTML = ` <form method="POST" enctype="multipart/form-data" id="form-${i}" class="campos-Curso">
    <div class="cabecalho">
      <div class="flex">
        <div class="bola">
          ${i}
        </div>
        <span>Aula ${i}</span>
      </div>
      <div class="btns">
        <button class="btn-delete" onclick="deletar('#form-${i}')" type="button">
          <svg width="48" height="48" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_iconCarrier" stroke="#92386B">
              <path
                d="M10 12L14 16M14 12L10 16M18 6L17.1991 18.0129C17.129 19.065 17.0939 19.5911 16.8667 19.99C16.6666 20.3412 16.3648 20.6235 16.0011 20.7998C15.588 21 15.0607 21 14.0062 21H9.99377C8.93927 21 8.41202 21 7.99889 20.7998C7.63517 20.6235 7.33339 20.3412 7.13332 19.99C6.90607 19.5911 6.871 19.065 6.80086 18.0129L6 6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
          </svg>
        </button>
        <button class="btn-collapse" onclick="colapsar(${i},this)" style="rotate:0deg;transiton:0.5s" type="button">
          <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="Arrow down" stroke="#985C7E">
              <path id="Icon" d="M24 10V38M24 38L38 24M24 38L10 24" stroke-width="4" stroke-linecap="round"
                stroke-linejoin="round" />
            </g>
          </svg>
        </button>
      </div>
    </div>
    <div class="campos a${i}">
      <label for="titulo-aula-${i}">
        <p>Titulo da aula</p>
        <input type="text" name="titulo_aula" id="titulo-aula-${i}">
      </label>

      <label for="descricao-aula-${i}">
        <p>Descrição da aula</p>
        <textarea name="descricao_aula" placeholder="descreva o conteudo da aula" class="descricao-aula"
          id="descricao-aula-${i}" cols="30" rows="10"></textarea>
      </label>

      <label for="video-aula-${i}" class="label-videos">
        <p>Video Do Curso</p>
        <div>
          <svg width="117" height="110" viewBox="0 0 117 110" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M68.25 9.16699H29.25C26.6641 9.16699 24.1842 10.1328 22.3557 11.8518C20.5272 13.5709 19.5 15.9025 19.5 18.3337V91.667C19.5 94.0981 20.5272 96.4297 22.3557 98.1488C24.1842 99.8679 26.6641 100.834 29.25 100.834H87.75C90.3359 100.834 92.8158 99.8679 94.6443 98.1488C96.4728 96.4297 97.5 94.0981 97.5 91.667V36.667M68.25 9.16699L97.5 36.667M68.25 9.16699V36.667H97.5M58.5 82.5003V55.0003M43.875 68.7503H73.125"
              stroke="#92386B" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <span>Arraste ou clique para adicionar o video</span>

        </div>
        <input type="file" accept="video/*" name="video_aula" id="video-aula-${i}">
      </label>

      <div id="sla${i}" class="materiais-complementares">
        <p>Materiais Complementares</p>
        <div>
          <label for="input-materiais-${i}">
            clicar para adicionar materiais
            <input type="file" multiple name="input_materiais" id="input-materiais-${i}">
          </label>
          <div class="materiais-selecionados">
          </div>
        </div>

      </div>
      <div class="quiz">
        <p>Questões</p>
        <button id="AdicionarQuizCurso" type="button" class="caixaAdicionar">
          <svg width="20" height="20" viewBox="0 0 384 380" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M192 79.167V300.834M80 190H304" stroke="#92386B" stroke-width="50" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <p>Adicionar Questão</p>
        </button>
        <div class="container">
        </div>
      </div>
    </div>

  </form>  `;
  aulas.appendChild(aula);
  dispatchEvent(evento);
  scrollTo({ top: aulas.scrollHeight, behavior: "smooth" });
});
enviar.addEventListener("click", async (e) => {
  e.preventDefault();
  e.target.disable = true;
  const forms = document.querySelectorAll(".campos-Curso");
  let i = 0;
  let success = true;
  for (const form of forms) {
    i++;
    console.log(form);
    const formData = new FormData();
    const titulo = form.querySelector("#titulo-aula-" + i).value;
    const descricao = form.querySelector("#descricao-aula-" + i).value;
    const video = form.querySelector("#video-aula-" + i).files[0];
    const materiais = form.querySelector("#input-materiais-" + i).files;
    formData.append("titulo_aula", titulo);
    formData.append("descricao_aula", descricao);
    formData.append("video_aula", video);
    for (const material of materiais) {
      formData.append("input_materiais[]", material);
    }
    const questoes = form.querySelectorAll(".questao");
    let j =0
    questoes.forEach((questao, index) => {
     j++
      const pergunta = questao.querySelector(
        `input[name='pergunta[]']`
      ).value;
      const respostas = Array.from(
        questao.querySelectorAll(`input[name='resposta${j}[]']`)
      ).map((input) => input.value);
      const respostaCorretaIndex = Array.from(
        questao.querySelectorAll(`input[name='respostaCheck${j}']`)
      ).findIndex((input) => input.checked);
      formData.append(`questoes[${index}][pergunta]`, pergunta);
      respostas.forEach((resposta, respostaIndex) => {
        formData.append(`questoes[${index}][respostas][${respostaIndex}]`, resposta);
      });
      formData.append(`questoes[${index}][respostaCorreta]`, respostaCorretaIndex);
    });

    $.ajax({
      type: "POST",
      url: "../../controller/cadastro_aula.php",
      data: formData,
      processData: false,
      contentType: false,
      error: function (response) {
        success = false;
        fetch("../../controller/deletarAula.php?id="+idCurso)
        console.log(response);
        const { responseJSON } = response;
        if (responseJSON) {
          Swal.fire({
            icon: responseJSON.alertIcon,
            title: responseJSON.msg,
            text: responseJSON.alertMsg,
          }).then(() => {
            form.querySelector(".btn-collapse").click();
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Arquivos muito grande ",
            text: "O video e/ou  os materias superam o limite de 40MB",
          }).then(() => {
            form.querySelector(".btn-collapse").click();
          });
        }
        e.target.disable = true;
      },
      success: function (response) {
        console.log(response);
        if (i - 1 < forms.length && success) {
          Swal.fire({
            icon: "success",
            title: "Aulas cadastradas com sucesso!",
            text: "🎉🥳",
          }).then(() => {
          //  window.location.href = "./dashboard.php";
          });
          return;
        }
      },
    });
    if (success == false) break;
  }
});
window.addEventListener("criar-aula", function (e) {
  const { index: i } = e.detail;
  const fileInput = document.getElementById(`video-aula-${i}`);
  const label = document.querySelector(`label[for='video-aula-${i}']`);
  const span = label.querySelector("span");
  fileInput.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file && file.type.startsWith("video/")) {
      span.innerText = file.name;
    } else {
      span.innerText =
        "Formato de arquivo inválido. Por favor, selecione um video";
    }
  });
  label.addEventListener("dragover", (e) => {
    e.preventDefault();
    span.innerText = "solte o arquivo";
  });
  label.addEventListener("dragleave", (e) => {
    e.preventDefault();
    span.innerText = "click ou arraste";
  });
  label.addEventListener("drop", (e) => {
    e.preventDefault();
    console.log(e);
    const file = e.dataTransfer.files[0];
    fileInput.files = e.dataTransfer.files;
    if (file && file.type.startsWith("video/")) {
      span.innerText = file.name;
    } else {
      span.innerText =
        "Formato de arquivo inválido. Por favor, selecione um video";
    }
  });
});

window.addEventListener("criar-aula", function (e) {
  console.log(e);
  const { index: i } = e.detail;
  console.log(i);
  ovidorCurso(`#form-${i}`);
  const input = document.getElementById(`input-materiais-${i}`);
  const divMateriais = document.querySelector(
    "#sla" + i + " .materiais-selecionados"
  );
  input.addEventListener("change", (e) => {
    const files = e.target.files;
    divMateriais.innerHTML = "";
    for (const file of files) {
      const div = document.createElement("div");
      div.classList.add("materiais-selecionados-item");
      div.innerHTML = "<p>" + file.name + "</p>";
      divMateriais.appendChild(div);
    }
  });
});


function ovidorCurso(contexto) {
  const btnQuiz = document.querySelector( contexto+" #AdicionarQuizCurso");
  btnQuiz.addEventListener("click", (e) => {
    let k = document.querySelectorAll(contexto+" .questao").length + 1;
    const container = document.querySelector(contexto+" .container");
    const questao = document.createElement("div");
    questao.classList.add("questao");
    questao.id = "questao" + k;
    questao.innerHTML = `
            <div class="header">
              <div class="bola">${k}</div>
              <input type="text" id="pergunta" placeholder="insira a questão" name="pergunta[]">
              <button type="button" class="btn-delete" onclick="deletar('#questao${k}')">
              <svg width="48" height="48" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_iconCarrier" stroke="#92386B">
              <path
                d="M10 12L14 16M14 12L10 16M18 6L17.1991 18.0129C17.129 19.065 17.0939 19.5911 16.8667 19.99C16.6666 20.3412 16.3648 20.6235 16.0011 20.7998C15.588 21 15.0607 21 14.0062 21H9.99377C8.93927 21 8.41202 21 7.99889 20.7998C7.63517 20.6235 7.33339 20.3412 7.13332 19.99C6.90607 19.5911 6.871 19.065 6.80086 18.0129L6 6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
          </svg>
              </button>
            
              </div>
            <div class="inputs">
              <div class="radios">
                <div class="resposta">
                  <input type="radio" checked name="respostaCheck${k}" id="">
                  <input type="text" name="resposta${k}[]" placeholder="resposta 1">
                </div>
                <div class="resposta">
                  <input type="radio" name="respostaCheck${k}" id="">
                  <input type="text" name="resposta${k}[]" placeholder="resposta 2">
                </div>
                <div class="resposta">
                  <input type="radio" name="respostaCheck${k}" id="">
                  <input type="text" name="resposta${k}[]" placeholder="resposta 3">
                </div>
                <div class="resposta">
                  <input type="radio" name="respostaCheck${k}" id="">
                  <input type="text" name="resposta${k}[]" placeholder="resposta 4">
                </div>
              </div>
            </div>
  `;
    container.appendChild(questao);
  });
}


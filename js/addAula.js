const btn = document.querySelector(".btn-Add-Aula");
let i = 0;
const enviar = document.querySelector("#enviar");
const aulas = document.querySelector(".aulas");
btn.addEventListener("click", function () {
  i++;
  const evento = new CustomEvent("criar-aula", { detail: { index:i } });
  console.log(evento.detail)
  const aula = document.createElement("div");
  aula.innerHTML = `
  <form method="POST" enctype="multipart/form-data" class="campos-Curso">
    <div class="cabecalho">
      <div class="bola">
        ${i}
      </div>
      <span>Aula ${i}</span>
    </div>
    <div class="campos">
      <label for="titulo-aula-${i}">
        <p>Titulo da aula</p>
        <input type="text" name="titulo_aula" id="titulo-aula-${i}">
      </label>

      <label for="descricao-aula-${i}">
        <p>Descrição da aula</p>
        <textarea name="descricao_aula" placeholder="descreva o conteudo da aula" class="descricao-aula" id="descricao-aula-${i}" cols="30" rows="10"></textarea>
      </label>

      <label for="video-aula-${i}" class="label-videos">
        <p>Video Do Curso</p>
        <div>
          <svg width="117" height="110" viewBox="0 0 117 110" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M68.25 9.16699H29.25C26.6641 9.16699 24.1842 10.1328 22.3557 11.8518C20.5272 13.5709 19.5 15.9025 19.5 18.3337V91.667C19.5 94.0981 20.5272 96.4297 22.3557 98.1488C24.1842 99.8679 26.6641 100.834 29.25 100.834H87.75C90.3359 100.834 92.8158 99.8679 94.6443 98.1488C96.4728 96.4297 97.5 94.0981 97.5 91.667V36.667M68.25 9.16699L97.5 36.667M68.25 9.16699V36.667H97.5M58.5 82.5003V55.0003M43.875 68.7503H73.125" stroke="#92386B" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          <span>Arraste ou clique para adicionar o video</span>

        </div>
        <input type="file" accept="video/*" name="video_aula" id="video-aula-${i}">
        <script type="text/javascript">
          
        </script>
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
        <script>
          
        </script>

      </div>
    </div>

  </form>
  `;
  aulas.appendChild(aula);
  dispatchEvent(evento)
  scrollTo({ top: aulas.scrollHeight, behavior: "smooth" });
});
enviar.addEventListener("click", async (e) => {
  e.preventDefault();
  const forms = document.querySelectorAll(".campos-Curso");
  let    i = 0;
  forms.forEach(async (form) => {
    i++;
    console.log(form);
    const formData = new FormData();
    const titulo = form.querySelector("#titulo-aula-"+i).value;
    const descricao = form.querySelector("#descricao-aula-"+i).value;
    const video = form.querySelector("#video-aula-"+i).files[0];
    const materiais = form.querySelector("#input-materiais-"+i).files;
    formData.append("titulo_aula", titulo);
    formData.append("descricao_aula", descricao);
    formData.append("video_aula", video);
    for (const material of materiais) {
      formData.append("input_materiais[]", material);
    }
    $.ajax({
      type: "POST",
      url: "../../controller/cadastro_aula.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log(response);
        Swal.fire({
          icon: response.alertIcon,
          title: response.msg,
          text: response.alertMsg,
        }).then(()=>{
          if (response.alertIcon == "success") {
            window.location.href = "../cursos.php";
          }
        });
      },
    });
  });
});
window.addEventListener("criar-aula", function (e) {
const {index:i} =e.detail
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

})
window.addEventListener("criar-aula", function (e) { 
console.log(e)
  const {index:i} =e.detail
  console.log(i) 
const input = document.getElementById(`input-materiais-${i}`);
const divMateriais = document.querySelector("#sla"+i+" .materiais-selecionados");
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

})
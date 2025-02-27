const cep = $('#cep');
const rua = $('#rua');
const bairro = $('#bairro');
const cidade = $('#cidade');
const estado = $('#estado');
cep.on("blur", async function (envent) {
  const res = await fetch(`https://viacep.com.br/ws/${cep.val().replace("-","")}/json/`)
  const data = await res.json();
  console.log(data)
  if(data.erro){
   cep.addClass("erro");
    return;
  }
  cep.removeClass("erro");
  rua.val(data.logradouro);
  bairro.val(data.bairro);
  cidade.val(data.localidade);
  estado.val(data.uf);
});
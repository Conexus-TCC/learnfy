const cep = $('#cep');
const rua = $('#rua');
const bairro = $('#bairro');
const cidade = $('#cidade');
const estado = $('#estado');
cep.on("blur", async function () {
  if(cep.val().length < 9){
    cep.addClass("erro");
    return;
  }
  const res = await fetch(`https://viacep.com.br/ws/${cep.cleanVal()}/json/`)
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
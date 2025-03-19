async function fetchPesquisa(pesquisa) { 
 try {
   const search = new URLSearchParams({nome:pesquisa})
   const req = await fetch("/learnfy/controller/procuraFuncionario.php?"+search.toString())
     return await req.text()
   
 } catch (error) {
  return "erro interno"
 }
 }
 async function exibir(pesquisa) {
  const tbody =document.querySelector("#colaboradores-tbody")
  tbody.innerHTML=""
  const data = await fetchPesquisa(pesquisa)
    tbody.innerHTML=data
  
 }
 document.querySelector("#inputBusca").addEventListener(
   "keyup",
   debounce(function (e) {
     exibir(e.target.value);
   },500)
 );
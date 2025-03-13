/**
 * 
 * @param {string} site 
 * @param {HTMLAnchorElement} butao 
 */
function trocarSite(site,butao) {
  console.log(butao);
  let botoes = document.querySelectorAll(".sidebar-menu a");
 const iframe = document.querySelector("iframe")
  botoes.forEach(b => {b.classList.remove("active")});
  butao.classList.add("active");
  iframe.src=site
}

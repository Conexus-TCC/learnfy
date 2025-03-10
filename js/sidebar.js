/**
 * 
 * @param {string} site 
 * @param {HTMLAnchorElement} butao 
 */
function trocarSite(site,butao) {
  console.log(butao);
  let botoes = document.querySelectorAll(".sidebar-menu a");
  botoes.forEach(b => {b.classList.remove("active")});
  butao.classList.add("active");
  try {
    fetch(site)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.text();
      })
      .then(html => {
        document.querySelector('main').innerHTML = html;
      })
      .catch(error => {
        console.error('Fetch error:', error);
        document.querySelector("main").innerHTML = "<h1>Erro ao carregar a página</h1>";
      });
  } catch (error) {
    console.error('Error:', error);
    document.querySelector("main").innerHTML =
      "<h1>Erro ao carregar a página</h1>";
  }
}

const burger = document.querySelectorAll('.burger');
const fatias = document.querySelectorAll('.fatia');
const menu  = document.querySelector('.menu');
const fundo = document.querySelector('.fundo');
burger.forEach((b) => {
  b.addEventListener('click', () => {
  menu.classList.toggle('ativado')
    fundo.classList.toggle('ativado')
fatias.forEach((f) => { f.classList.toggle('ativado')})
})
})
fundo.addEventListener('click', () => {
  menu.classList.remove('ativado')
  fundo.classList.remove('ativado')
  fatias.forEach((f) => { f.classList.remove('ativado')})
})
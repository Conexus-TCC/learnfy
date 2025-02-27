/**
 * @type {HTMLInputElement}
 */
const inputFile = document.querySelector('#file');
const p  = document.querySelector(".file>p")
inputFile.addEventListener("change",function(e){
const file = inputFile.files[0]
p.innerHTML= file.name
const reader = new FileReader()
reader.readAsDataURL(file)
reader.onload = function(){
    const img = document.querySelector("img")
    img.src = reader.result
}

})
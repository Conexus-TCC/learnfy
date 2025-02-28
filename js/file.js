/**
 * @type {HTMLInputElement}
 */
const inputFile = document.querySelector('#file');
const p  = document.querySelector(".file>p")
inputFile.addEventListener("change",function(e){
const file = inputFile.files[0]
p.innerHTML= file.name
if(file.type !== "image/jpeg" && file.type !== "image/png"){
    alert("Invalid file type")
    return
}
const reader = new FileReader()
reader.readAsDataURL(file)
reader.onload = function(){
    const img = document.querySelector("img")
    img.src = reader.result
}

})
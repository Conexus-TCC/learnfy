/**
 * @type {HTMLInputElement}
 */
 inputFile = document.querySelector('#file');
 p  = document.querySelector(".file>p")
inputFile.addEventListener("change",function(e){
 file = inputFile.files[0]
p.innerHTML= file.name
if(file.type !== "image/jpeg" && file.type !== "image/png"){
    alert("Invalid file type")
    return
}
 reader = new FileReader()
reader.readAsDataURL(file)
reader.onload = function(){
     img = document.querySelector("img")
    img.src = reader.result
}

})
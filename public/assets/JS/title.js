const barre = document.querySelectorAll(".burger__menu");
const menu = document.querySelector(".content")

barre.addEventListener("click", ()=>{
 menu.classList.toggle("view");
})

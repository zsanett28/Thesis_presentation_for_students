const menuIcon = document.querySelector(" .hamburger");
const navigacio = document.querySelector(" .navigacio");

menuIcon.addEventListener("click", () => {
    navigacio.classList.toggle("change");
})

function feedback(){
    alert("Sikeres bejelentkezés!");
}
const menuIcon = document.querySelector(" .hamburger");
const navigacio = document.querySelector(" .navigacio");

menuIcon.addEventListener("click", () => {
    navigacio.classList.toggle("change");
})

function feedback(){
    alert("Sikeres bejelentkezés!");
}

var dfebr = new Date("Febr 11, 2020 23:59:59").getTime();

var f = setInterval(function () {

    var now = new Date().getTime();

    var time = dfebr - now;

    var days = Math.floor(time / (1000 * 60 * 60 * 24));

    var hours = Math.floor((time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

    var minutes = Math.floor((time % (1000 * 60 * 60)) / (1000 * 60));

    var seconds = Math.floor((time % (1000 * 60)) / 1000);

    document.getElementById("leadas-februar").innerHTML = days + " nap " + hours + " óra " + minutes + " perc " + seconds + " másodperc ";

    if(time < 0){
        clearInterval(dfebr);
        document.getElementById("leadas-februar").innerHTML = "Lejárt az idő!";
    }
}, 1000);

var djun = new Date("Jun 23, 2020 23:59:59").getTime();

var j = setInterval(function () {

    var now = new Date().getTime();

    var time = djun - now;

    var days = Math.floor(time / (1000 * 60 * 60 * 24));

    var hours = Math.floor((time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

    var minutes = Math.floor((time % (1000 * 60 * 60)) / (1000 * 60));

    var seconds = Math.floor((time % (1000 * 60)) / 1000);

    document.getElementById("leadas-junius").innerHTML = days + " nap " + hours + " óra " + minutes + " perc " + seconds + " másodperc ";

    if(time < 0){
        clearInterval(djun);
        document.getElementById("leadas-junius").innerHTML = "Lejárt az idő!";
    }
}, 1000);

function appear(element){

    if (document.getElementById(element).style.display == "none") {
        document.getElementById(element).style.display = "block";
      }
    else {
        document.getElementById(element).style.display = "none";
    }   
}
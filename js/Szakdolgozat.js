const menuIcon = document.querySelector(" .hamburger");
const navigacio = document.querySelector(" .navigacio");

menuIcon.addEventListener("click", () => {
    navigacio.classList.toggle("change");
})

function feedback(){
    alert("A kitöltött űrlapot sikeresen elküldtük!");
}

var dfebr = new Date("Febr 11, 2020 23:59:59").getTime();

var f = setInterval(function () {

    var now = new Date().getTime();

    var time = dfebr - now;

    var days = Math.floor(time / (1000 * 60 * 60 * 24));

    var hours = Math.floor((time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

    var minutes = Math.floor((time % (1000 * 60 * 60)) / (1000 * 60));

    var seconds = Math.floor((time % (1000 * 60)) / 1000);

    document.getElementById("fdays").innerHTML = days;
    document.getElementById("fd").innerHTML = "nap";
    document.getElementById("fhours").innerHTML = hours;
    document.getElementById("fh").innerHTML = "óra";
    document.getElementById("fminutes").innerHTML = minutes;
    document.getElementById("fm").innerHTML = "perc";
    document.getElementById("fseconds").innerHTML = seconds;
    document.getElementById("fs").innerHTML = "másodperc";

    if(time < 0){
        clearInterval(dfebr);
        document.getElementById("fdays").innerHTML = "";
        document.getElementById("fd").innerHTML = "";
        document.getElementById("fhours").innerHTML = "";
        document.getElementById("fh").innerHTML = "";
        document.getElementById("fminutes").innerHTML = "";
        document.getElementById("fm").innerHTML = "";
        document.getElementById("fseconds").innerHTML = "";
        document.getElementById("fs").innerHTML = "";
        document.getElementById("timeout1").innerHTML = "Lejárt az idő!";
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

    document.getElementById("jdays").innerHTML = days;
    document.getElementById("jd").innerHTML = "nap";
    document.getElementById("jhours").innerHTML = hours;
    document.getElementById("jh").innerHTML = "óra";
    document.getElementById("jminutes").innerHTML = minutes;
    document.getElementById("jm").innerHTML = "perc";
    document.getElementById("jseconds").innerHTML = seconds;
    document.getElementById("js").innerHTML = "másodperc";

    if(time < 0){
        clearInterval(djun);
        document.getElementById("jdays").innerHTML = "";
        document.getElementById("jd").innerHTML = "";
        document.getElementById("jhours").innerHTML = "";
        document.getElementById("jh").innerHTML = "";
        document.getElementById("jminutes").innerHTML = "";
        document.getElementById("jm").innerHTML = "";
        document.getElementById("jseconds").innerHTML = "";
        document.getElementById("js").innerHTML = "";
        document.getElementById("timeout2").innerHTML = "Lejárt az idő!";
    }
}, 1000);

/*function appear(element){

    if (document.getElementById(element).style.display == "none" || document.getElementById(element).style.display == "") {
        document.getElementById(element).style.display = "block";
      }
    else {
        document.getElementById(element).style.display = "none";
    }   
}*/


$(document).ready(function(){
    $(".show-hide").click(function(){
        if($(".hidden-text").css("display") == "none"){
            $(".hidden-text").show("slow");
        }
        else{
            $(".hidden-text").hide("slow");
        }
    });
});

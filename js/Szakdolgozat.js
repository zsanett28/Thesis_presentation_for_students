const menuIcon = document.querySelector(" .hamburger");
const navigacio = document.querySelector(" .navigacio");

menuIcon.addEventListener("click", () => {
    navigacio.classList.toggle("change");
})

/*function feedback(){
    alert("A kitöltött űrlapot sikeresen elküldtük!");
}*/

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

$(document).ready(function (){
    $("#second-name-error").hide();
    $("#first-name-error").hide();
    $("#matricol-error").hide();
    $("#email-error").hide();
    $("#tel-error").hide();
    $("#egyeb-szakirany-error").hide();
    $("#tema1-error").hide();
    $("#tema2-error").hide();
    $("#tanar1-error").hide();
    $("#tanar2-error").hide();


    var error_second_name = false;
    var error_first_name = false;
    var error_matricol = false;
    var error_email = false;
    var error_tel = false;
    var error_egyeb_szakirany = false;
    var error_tema1 = false;
    var error_tema2 = false;
    var error_tanar1 = false;
    var error_tanar2 = false;

    $("#second-name").focusout(function(){
        check_second_name();
    });

    $("#first-name").focusout(function(){
        check_first_name();
    });

    $("#matricol").focusout(function(){
        check_matricol();
    });

    $("#email").focusout(function(){
        check_email();
    });

    $("#tel").focusout(function(){
        check_tel();
    });

    $("#egyeb-szakirany").focusout(function(){
        check_egyeb_szakirany();
    });

    $("#tema1").focusout(function(){
        check_tema1();
    });

    $("#tema2").focusout(function(){
        check_tema2();
    });

    $("#tanar1").focusout(function(){
        check_tanar1();
    });

    $("#tanar2").focusout(function(){
        check_tanar2();
    });

    function check_second_name(){

        var second_name_length = $("#second-name").val().length;
        if(second_name_length < 2){
            $("#second-name-error").html("Helytelen családnév!");
            $("#second-name-error").show();
            error_second_name = true;
        }
        else{
            var pattern = new RegExp(/^[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]+[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*$/i);

            if(pattern.test($("#second-name").val())){
                $("#second-name-error").hide();
            }
            else{
                $("#second-name-error").html("Helytelen családnév!");
                $("#second-name-error").show();
                error_second_name = true;
            }
            
        }
    }
    function check_first_name(){

        var first_name_length = $("#first-name").val().length;
        if(first_name_length < 2){
            $("#first-name-error").html("Helytelen keresztnév!");
            $("#first-name-error").show();
            error_first_name = true;
        }
        else{
            var pattern = new RegExp(/^[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]+[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*$/i);

            if(pattern.test($("#first-name").val())){
                $("#first-name-error").hide();
            }
            else{
                $("#first-name-error").html("Helytelen keresztnév!");
                $("#first-name-error").show();
                error_first_name = true;
            }
            
        }

    }

    function check_matricol(){
        var pattern = new RegExp(/^[0-9]{4}$/i);

        if(pattern.test($("#matricol").val())){
            $("#matricol-error").hide();
        }
        else{
            $("#matricol-error").html("Helytelen anyakönyvi szám!");
            $("#matricol-error").show();
            error_matricol = true;
        }    
    }

    function check_email(){

        var email_length = $("#email").val().length;
        if(email_length < 3){
            $("#email-error").html("Helytelen e-mail cím!");
            $("#email-error").show();
            error_email = true;
        }
        else{
            var pattern = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-z]{1,3}$/i);

            if(pattern.test($("#email").val())){
                $("#email-error").hide();
            }
            else{
                $("#email-error").html("Helytelen e-mail cím!");
                $("#email-error").show();
                error_email = true;
            }
            
        }

    }

    function check_tel(){
        var pattern = new RegExp(/^[0-9]{10,15}$/i);

        if(pattern.test($("#tel").val())){
            $("#tel-error").hide();
        }
        else{
            $("#tel-error").html("Helytelen telefonszám!");
            $("#tel-error").show();
            error_tel = true;
        }
        
    }

    function check_egyeb_szakirany(){
        var pattern = new RegExp(/^[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]+[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*$/i);

        if(pattern.test($("#egyeb-szakirany").val())){
            $("#egyeb-szakirany-error").hide();
        }
        else{
            $("#egyeb-szakirany-error").html("Helytelen szakiránynév!");
            $("#egyeb-szakirany-error").show();
            error_egyeb_szakirany = true;
        }
        
    }

    function check_tema1(){
        var pattern = new RegExp(/^[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]+[0-9 ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[0-9 ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[0-9 ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[0-9 ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*$/i);

        if(pattern.test($("#tema1").val())){
            $("#tema1-error").hide();
        }
        else{
            $("#tema1-error").html("Helytelen témanév!");
            $("#tema1-error").show();
            error_tema1 = true;
        }
        
    }

    function check_tema2(){
        var pattern = new RegExp(/^[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]+[0-9 ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[0-9 ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[0-9 ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[0-9 ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*$/i);

        if(pattern.test($("#tema2").val())){
            $("#tema2-error").hide();
        }
        else{
            $("#tema2-error").html("Helytelen témanév!");
            $("#tema2-error").show();
            error_tema2 = true;
        }
        
    }

    function check_tanar1(){

        var tanar1_length = $("#tanar1").val().length;
        if(tanar1_length < 5){
            $("#tanar1-error").html("Helytelen név!");
            $("#tanar1-error").show();
            error_tanar1 = true;
        }
        else{
            var pattern = new RegExp(/^[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]+[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*$/i);

            if(pattern.test($("#tanar1").val())){
                $("#tanar1-error").hide();
            }
            else{
                $("#tanar1-error").html("Helytelen név!");
                $("#tanar1-error").show();
                error_tanar1 = true;
            }
            
        }

    }

    function check_tanar2(){

        var tanar2_length = $("#tanar2").val().length;
        if(tanar2_length < 5){
            $("#tanar2-error").html("Helytelen név!");
            $("#tanar2-error").show();
            error_tanar2 = true;
        }
        else{
            var pattern = new RegExp(/^[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]+[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*[ ]*[-]*[a-záéúőóüöA-ZÁÉÚŐÓÜÖÍ]*$/i);

            if(pattern.test($("#tanar2").val())){
                $("#tanar2-error").hide();
            }
            else{
                $("#tanar2-error").html("Helytelen név!");
                $("#tanar2-error").show();
                error_tanar2 = true;
            }
            
        }

    }

    /*var r1 = $("input[name=radiobutton1]:checked").length;
    var r2 = $("input[name=radiobutton2]:checked").length;
    var check = $("input[name=check]:checked").length;

    if(r1 < 1){
        alert("Jelöld meg, melyik vizsgára jelentkezel!");
    }
    if(r2 < 1){
        alert("Jelöld meg, milyen oktatási formán tanulsz!");
    }
    if(check < 1){
        alert("Fogadd el a beleegyezési feltételeket!");
    }*/

});

function feedback(){

    var g1 = document.getElementById("drop-down1").value;
    var g2 = document.getElementById("drop-down2").value;
    var g3 = document.getElementById("drop-down3").value;
    var g4 = document.getElementById("drop-down4").value;
    
    if(g1 == "Válaszd ki" || g2 == "Válaszd ki" || g3 == "Válaszd ki" || g4 == "Válaszd ki"){

        alert("Nincs minden mező kiválasztva/kitöltve!");

    }
    else{
        if(g3 == g4){
            alert("Ajánlott a két opcióhoz más-más tanárt választani!");
        }
    }

    /*$("form1").submit(function (){

        error_second_name = false;
        error_first_name = false;
        error_matricol = false;
        error_email = false;
        error_tel = false;
        error_egyeb_szakirany = false;
        error_tema1 = false;
        error_tema2 = false;
        error_tanar1 = false;
        error_tanar2 = false;
    
        check_second_name();
        check_first_name();
        check_matricol();
        check_email();
        check_tel();
        check_egyeb_szakirany();
        check_tema1();
        check_tema2();
        check_tanar1();
        check_tanar2();
    
        if(error_second_name == false && error_first_name == false && error_matricol == false && error_email == false && error_tel == false && error_egyeb_szakirany == false && error_tema1 == false && error_tema2 == false && error_tanar1 == false && error_tanar2 == false){
            alert("Az űrlap sikeresen elküldve!");
            return true;
        }
        else{
            alert("Az űrlap nem került elküldésre! Tartalmaz helyetelenül vagy egyáltalán nem kitöltött mezőket!");
            return false;
        }
    
    });*/

}

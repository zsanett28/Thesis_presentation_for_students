/*Hamburger menu*/

const menuIcon = document.querySelector("#hamburger");
const navigacio = document.querySelector(".navigacio");

menuIcon.addEventListener("click", () => {
    navigacio.classList.toggle("change");
    if(document.getElementById("navbar").style.top <= "0px"){
        document.getElementById("navbar").style.top = "-50px";
    }
    else{
        document.getElementById("navbar").style.top = "0px";
    }
})

function scrollFunction(height) {
    if (document.body.scrollTop > height || document.documentElement.scrollTop > height) {
      document.getElementById("navbar").style.top = "0px";
      document.getElementById("hamburger").setAttribute("style", "top: 0.2%;");
    } else {
      document.getElementById("navbar").style.top = "-50px";
      document.getElementById("hamburger").setAttribute("style", "top: 3%;");
    }
}

$(function() {
    var height = document.getElementById("background").height;
    $(window).resize(function(){
        height = document.getElementById("background").height;
      });
    window.onscroll = function() {scrollFunction(height)};
});

/*Accordion JQURAY*/

$(function(){
    var element = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < element.length; i++) {
        element[i].addEventListener("click",function() {
            this.classList.toggle("active-panel");
            $(this.nextElementSibling).toggle(600);
        });
    }

    var element = document.getElementsByClassName("list-accordion");
    var i;

    for (i = 0; i < element.length; i++) {
        element[i].addEventListener("click",function() {
            $(this.nextElementSibling).slideToggle("slow");
        });
    }

});

$(function() {
    $("#harmonica1").accordion({heightStyle: "content", animate: 200}); 
});

$(function() {
    $("#harmonica2").accordion({heightStyle: "content", animate: 200});
});

/* Form validator functions */

function checkName($input){

    const value =  $input.val();
    const $error = $input.next(".error");

    const pattern = new RegExp(/^[a-záéúőóüö]+[ ]*[-]*[a-záéúőóüö \-]*$/i);

    if(pattern.test(value)){
        $error.hide();
    }
    else{
        $error.html("Helytelen név!").show();
        return false;
    }
    
    return true;
}

function check_matricol(){

    const pattern = new RegExp(/^[0-9]{4}$/i);

    if(pattern.test($("#matricol").val())){
        $("#matricol-error").hide();
    }
    else{
        $("#matricol-error").html("Helytelen anyakönyvi szám!").show();
        return false;
    }  
    return true;  
}

function check_email(){

    var email_length = $("#email").val().length;
    if(email_length < 3){
        $("#email-error").html("Helytelen e-mail cím!");
        $("#email-error").show();
        return false;
    }
    else{
        const pattern = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-z]{1,3}$/i);

        if(pattern.test($("#email").val())){
            $("#email-error").hide();
        }
        else{
            $("#email-error").html("Helytelen e-mail cím!");
            $("#email-error").show();
            return false;
        }
    }
    return true;
}

function check_tel(){
    const pattern = new RegExp(/^[0-9]{10,15}$/i);

    if(pattern.test($("#tel").val())){
        $("#tel-error").hide();
    }
    else{
        $("#tel-error").html("Helytelen telefonszám!");
        $("#tel-error").show();
        return false;
    }
    return true;
}

function check_egyeb_szakirany(){
    const value =  $("#egyeb-szakirany").val();
    const $error = $("#egyeb-szakirany").next(".error");

    if($("#egyeb-szakirany").prop("disabled")) {
        $error.hide();
        return true;
    }

    var input_length = value.length;
    if(input_length < 5){
        $error.html("Helytelen szakiránynév!").show();
        return false;
    }
    else{
        const pattern = new RegExp(/^[a-záéúőóüö]+[ ]*[-]*[a-záéúőóüö \-]*$/i);

        if(pattern.test($("#egyeb-szakirany").val())){
            $("#egyeb-szakirany-error").hide();
        }
        else{
            $("#egyeb-szakirany-error").html("Helytelen szakiránynév!").show();
            return false;
        }
    }
    
    return true;
}

function checkTheme($input){
    const value =  $input.val();
    const $error = $input.next(".error");

    var input_length = value.length;
    if(input_length < 5){
        $error.html("Helytelen témanév!").show();
        return false;
    }
    else{
        const pattern = new RegExp(/^[a-záéúőóüö0-9]+[ ]*[-]*[a-záéúőóüö0-9%$& \-]*$/i);

        if(pattern.test(value)){
            $error.hide();
        }
        else{
            $error.html("Helytelen témanév!").show();
            return false;
        }
    }
    return true;
}

function checkFullName($input){
    const value =  $input.val();
    const $error = $input.next(".error");

    if($input.prop("disabled")) {
        $error.hide();
        return true;
    }

    var input_length = value.length;
    if(input_length < 5){
        $error.html("Helytelen név!").show();
        return false;
    }
    else{
        const pattern = new RegExp(/^[a-záéúőóüö]+[ ]*[-]*[a-záéúőóüö \-]*$/i);

        if(pattern.test(value)){
            $error.hide();
        }
        else{
            $error.html("Helytelen név!").show();
            return false;
        }
    }
    return true;
}

/*function check_dropdown(){

    var list1 = $("#dropdown1").find(":selected").text();
    var list2 = $("#dropdown2").find(":selected").text();
    var list3 = $("#dropdown3").find(":selected").text();
    var list4 = $("#dropdown4").find(":selected").text();

    if(list1 === "Válaszd ki" || list2 === "Válaszd ki" || list3 === "Válaszd ki" || list4 === "Válaszd ki"){
        alert("Nincs minden mező kiválasztva/kitöltve!");
    }else{
        if(list3 == list4){
            alert("Ajánlott a két opcióhoz más-más tanárt választani!");
        }
    }

    var g1 = document.getElementById("dropdown1").value;
    var g2 = document.getElementById("dropdown2").value;
    var g3 = document.getElementById("dropdown3").value;
    var g4 = document.getElementById("dropdown4").value;
    
    if(g1 == "Válaszd ki" || g2 == "Válaszd ki" || g3 == "Válaszd ki" || g4 == "Válaszd ki"){

        alert("Nincs minden mező kiválasztva/kitöltve!");

    }
    else{
        if(g3 == g4){
            alert("Ajánlott a két opcióhoz más-más tanárt választani!");
        }
    }
}*/

/*Form validation JQUARY*/

$(function (){

    $(".error").hide();

    $("#form1 input#matricol").change(function(){
        if(!check_matricol()){
            isValid = false;
        }
    });

    $("#form1 input#email").change(function(){
        if(!check_email()){
            isValid = false;
        }
    });

    $("#form1 input#tel").change(function(){
        if(!check_tel()){
            isValid = false;
        }
    });

    $("#form1 input#egyeb-szakirany").change(function(){
        if(!check_egyeb_szakirany()){
            isValid = false;
        }
    });

    $("#form1 input.full-name").change(function (){
        if(!checkFullName($(this))) {
            isValid = false;
        }
    });

    $("#form1 input.one-name").change(function (){
        if(!checkName($(this))) {
            isValid = false;
        }
    });

    $("#form1 input.theme-name").change(function (){
        if(!checkTheme($(this))) {
            isValid = false;
        }
    });

    $(".select-group select").change(function(e) {
        const value = $(this).children("option:selected").val();
        const $textInput = $(this).parent().next().find("input[type=text]");

        if(value === "Más vezető tanár" || value === "Egyéb") {
            $textInput.prop("disabled", false);
        } else {
            $textInput.prop("disabled", true);
        }
    })

    $("#form1").on('submit', function(e){

        var isValid = true;

        $("#form1 input.full-name").each(function (){
            if(!checkFullName($(this))) {
                isValid = false;
            }
        });

        $("#form1 input.one-name").each(function (){
            if(!checkName($(this))) {
                isValid = false;
            }
        });

        $("#form1 input.theme-name").each(function (){
            if(!checkTheme($(this))) {
                isValid = false;
            }
        });

        $("#form1 input#matricol").each(function(){
            if(!check_matricol()){
                isValid = false;
            }
        });
    
        $("#form1 input#email").each(function(){
            if(!check_email()){
                isValid = false;
            }
        });
    
        $("#form1 input#tel").each(function(){
            if(!check_tel()){
                isValid = false;
            }
        });
    
        $("#form1 input#egyeb-szakirany").each(function(){
            if(!check_egyeb_szakirany()){
                isValid = false;
            }
        });

        /*$("form1 #dropdown1").find("option:selected").each(function(){
            if(!check_dropdown()){
                isValid = false;
            }
        });*/

        return isValid;
    })

});


/*$(function() {
    $("#form1").on('submit', function(e){    
        var isValid = true;

        $("#form1 input.full-name").each(function (){
            if(!checkFullName($(this))) {
                isValid = false;
            }
        });

        return isValid;
    })

    $("#form1 input.full-name").change(function (){
        if(!checkFullName($(this))) {
            isValid = false;
        }
    });
})*/

/*$(function() {
    $(".select-group select").change(function(e) {
        const value = $(this).children("option:selected").val();
        const $textInput = $(this).parent().next().find("input[type=text]");

        if(value === "Más vezető tanár" || value === "Egyéb") {
            $textInput.prop("disabled", false);
        } else {
            $textInput.prop("disabled", true);
            //checkFullName($textInput);
        }
    })
})*/

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


/*function feedback(){

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

    $("#form1").submit(function (){

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
    
    });

}*/

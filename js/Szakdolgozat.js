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
    scrollFunction(height);
});

/*Accordion JQUERY*/

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

function checkDropdown($input){

    const value =  $input.val();
    const $error = $input.next(".error");

    if(value === ""){
        $error.html("Válassz ki egy opciót!").show();
        return false;
    }
    
    $error.hide();
    return true;
}

function checkLastTwoDropdown(){

    const value1 = $("#dropdown3").val();
    const value2 = $("#dropdown4").val();

    if(value1 == value2 && value1 != ""){
        return false;
    }
    return true;
}

function checkRadioButton($buttonGroup) {
    const $selectedInput = $buttonGroup.find("input:checked:first")[0];
    const $error = $buttonGroup.next(".error");

    if($selectedInput === undefined){
        $error.html("Válassz ki egy opciót!").show();
        return false;
    }

    $error.hide();
    return true;
}

function checkCheckBox(){
    const $checkbox = $("#form1 #check-box");
    const $error = $checkbox.parent().next().next(".error");

    if($checkbox.is(":not(:checked)")){
        $error.html("Kérjük fogadd el!").show();
        return false;
    }

    $error.hide();
    return true;
}

/*Form validation JQUERY*/

$(function (){

    //ha valtozik az ertek, megint leellenzorni, hogy helyes-e

    $("#form1 input#matricol").change(function(){
        check_matricol();
    });

    $("#form1 input#email").change(function(){
        check_email();
    });

    $("#form1 input#tel").change(function(){
        check_tel();
    });

    $("#form1 input#egyeb-szakirany").change(function(){
        check_egyeb_szakirany();
    });

    $("#form1 input.full-name").change(function (){
        checkFullName($(this));
    });

    $("#form1 input.one-name").change(function (){
        checkName($(this));
    });

    $("#form1 input.theme-name").change(function (){
        checkTheme($(this));
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

    $("#form1 select.dropdown").change(function(){
        checkDropdown($(this));
    });

    $("#form1 .radio-button-group").click(function(){
        checkRadioButton($(this));
    });

    $("#form1 #check-box").click(function(){
        checkCheckBox();
    });

    $("#form1").on('submit', function(e){

        //leellenorizzuk, hogy helyesek-e az beirt adatok

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

        if(!check_matricol()){
            isValid = false;
        }

    
        if(!check_email()){
            isValid = false;
        }

        if(!check_tel()){
            isValid = false;
        }
    
        if(!check_egyeb_szakirany()){
            isValid = false;
        }


        $("#form1 .dropdown").each(function(){
            if(!checkDropdown($(this))){
                isValid = false;
            }
        });


        if(!checkLastTwoDropdown()){
            isValid = false;
            alert("Válassz ki két különböző tanárt az opcióknál!");
        }

        $("#form1 .radio-button-group").each(function(){
            if(!checkRadioButton($(this))){
                isValid = false;
            }
        });

        if(!checkCheckBox()){
            isValid = false;
        }

        return isValid;
    })

});

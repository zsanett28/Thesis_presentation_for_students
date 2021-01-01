/*Hamburger menu*/

const menuIcon = document.querySelector("#hamburger");
const navigation = document.querySelector(".navigation");

menuIcon.addEventListener("click", function() {
    navigation.classList.toggle("change");
    if(document.getElementById("navbar").style.top <= "0px"){
        document.getElementById("navbar").style.top = "-50px";
    }
    else{
        document.getElementById("navbar").style.top = "0px";
    }
});

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


/*Form validation functions*/

//returns true if the input is valid for file "kutatasi terv", else return false
function validDataKutatasi(input) {
    if (input.files.length == 0) {
        return false;
    }

    var size = input.files[0].size;
    if (size > 600000) { 
        return false;
    }

    var res = input.files[0].name.split(".").pop();
    if(res != "pdf") {
        return false;
    }

    return true;   
}

//returns true if the input is valid for file "szakdolgozat", else return false
function validDataSzakdolgozat(input) {
    if (input.files.length == 0) {
        return false;
    }

    var size = input.files[0].size;
    if (size > 5000000) { 
        return false;
    }

    var res = input.files[0].name.split(".").pop();
    if(res != "pdf") {
        return false;
    } 

    return true;   
}

//check if the input is valid for file "kutatasi terv" 
//if it is valid returns true
//else returns false
function checkKutatasiterv() {
    var input = document.getElementById("kutTerv");
    console.log(input);
    if (!validDataKutatasi(input)) {
        document.getElementById("error1").style.display = "unset";
        document.getElementById("error1").innerHTML = "Helytelen kiterjesztés vagy méret!";
        return false;
    } else {
        alert("Sikeresen feltöltöttük a kutatási terved új változatát!\nFigyelem! Az állomány neve a követelményeknek megfelelően módosult!");
        return true;
    }
}

//disappearance of the error message for file "kutatasi terv"
function changeFileKutatasi() {
    document.getElementById("error1").style.display = "none";
}

//check if the input is valid for file "szakdolgozat"
//if it is valid returns true
//else returns false
function checkSzakdolgozat() {
    var input = document.getElementById("szakdolg");
    if (!validDataSzakdolgozat(input)) {
        document.getElementById("error2").style.display = "unset";
        document.getElementById("error2").innerHTML = "Helytelen kiterjesztés vagy méret!";
        return false;
    } else {
        alert("Sikeresen feltöltöttük a szakdolgozatod új változatát!\nFigyelem! Az állomány neve a követelményeknek megfelelően módosult!");
        return true;
    }
}

//disappearance of the error message for file "szakdolgozat"
function changeFileSzakdolgozat() {
    document.getElementById("error2").style.display = "none";
}

//disappearance or appearance of error message if the the check box is checked or not
function changeCheckBox() {
    var value = document.getElementById("check-box").checked;
    if (value) {
        document.getElementById("error-checkbox").style.display = "none";
    } else {
        document.getElementById("error-checkbox").style.display = "unset";
        document.getElementById("error-checkbox").innerHTML = "Kérjük fogadd el!";
    }
}

//check if the check box is checked
function checkCheckBox() {
    if(!document.getElementById("check-box").checked) {
        return false;
    }
    return true;
}

//disappearance or appearance of error message depending on the selected value from dropdown list
function changeDropDown() {
    var e = document.getElementById("dropdown-temak");
    var value = e.options[e.selectedIndex].value;
    if (value == "") {
        document.getElementById("error-drop2").style.display = "unset";
        document.getElementById("error-drop2").innerHTML = "Válassz ki egy témát!";
    } else {
        document.getElementById("error-drop2").style.display = "none";
    }
}

//check if an option is selected from dropdown list
function checkDropDown() {
    var e = document.getElementById("dropdown-temak");
    var res = e.options[e.selectedIndex].value;
    if (res == "") {
        return false;
    }
    return true;
}

//check if the form could be sent
function checkBeiratkozasForm() {
    if (!checkDropDown()) {
        document.getElementById("error-drop2").style.display = "unset";
        document.getElementById("error-drop2").innerHTML = "Válassz ki egy témát!";
        return false;
    }

    if (!checkCheckBox()) {
        document.getElementById("error-checkbox").style.display = "unset";
        document.getElementById("error-checkbox").innerHTML = "Kérjük fogadd el!";
        return false;
    }

    alert("Sikeresen beiratkoztál a szakdolgozat elkészítésére!");
    return true;
}

//disappearance or appearance of error message depending on value of the input
function changeEmail() {
    var input = document.getElementById("email").value;
    if (input == "") {
        document.getElementById("email-error").style.display = "unset";
        document.getElementById("email-error").innerHTML = "Írd be az email címed!";
    } else {
        document.getElementById("email-error").style.display = "none";
    }
}

//disappearance or appearance of error message depending on value of the input
function changeSubject() {
    var input = document.getElementById("subject").value;
    if (input == "") {
        document.getElementById("subject-error").style.display = "unset";
        document.getElementById("subject-error").innerHTML = "Írd be az üzenet tárgyát!";
    } else {
        document.getElementById("subject-error").style.display = "none";
    }
}

//disappearance or appearance of error message depending on value of the input
function changeMessage() {
    var input = document.getElementById("message").value;
    if (input == "") {
        document.getElementById("message-error").style.display = "unset";
        document.getElementById("message-error").innerHTML = "Írd be az üzenetet!";
    } else {
        document.getElementById("message-error").style.display = "none";
    }
}

function checkEmail() {
    var input = document.getElementById("email").value;
    if (input == "") {
        return false;
    }
    return true;
}

function checkSubject() {
    var input = document.getElementById("subject").value;
    if (input == "") {
        return false;
    }
    return true;
}

function checkMessage() {
    var input = document.getElementById("message").value;
    if (input == "") {
        return false;
    }
    return true;
}

//check if the form could be sent
function checkKapcsolatForm() {
    if (!checkEmail()) {
        document.getElementById("email-error").style.display = "unset";
        document.getElementById("email-error").innerHTML = "Írd be az email címed!";
        return false;
    }

    if (!checkSubject()) {
        document.getElementById("subject-error").style.display = "unset";
        document.getElementById("subject-error").innerHTML = "Írd be az üzenet tárgyát!";
        return false;
    }

    if (!checkMessage()) {
        document.getElementById("message-error").style.display = "unset";
        document.getElementById("message-error").innerHTML = "Írd be az üzenetet!";
        return false;
    }

    alert("Sikeresen elküldtük a leveled!");
    return true;
}

//disappearance or appearance of error message depending on the selected value from dropdown list
function changeDropDownDiak() {
    var e = document.getElementById("dropdown-diak-jegy");
    var value = e.options[e.selectedIndex].value;
    if (value == "") {
        document.getElementById("error-drop3").style.display = "unset";
        document.getElementById("error-drop3").innerHTML = "Válassz ki egy diákot!";
    } else {
        document.getElementById("error-drop3").style.display = "none";
    }
}

//check if an option is selected from dropdown list
function checkDropDownDiak() {
    var e = document.getElementById("dropdown-diak-jegy");
    var res = e.options[e.selectedIndex].value;
    if (res == "") {
        return false;
    }
    return true;
}

function changeJegyKut() {
    var input = document.getElementById("kut-jegy").value;
    if (input == "") {
        document.getElementById("jegy-error").style.display = "unset";
        document.getElementById("jegy-error").innerHTML = "Add meg a jegyet!";
    } else {
        document.getElementById("jegy-error").style.display = "none";
    }
}

function checkJegyKut() {
    var value = document.getElementById("kut-jegy").value;
    if (value == "") {
        return false;
    }
    return true;
}

//check if the form could be sent
function checkJegyadasKut() {
    if (!checkDropDownDiak()) {
        document.getElementById("error-drop3").style.display = "unset";
        document.getElementById("error-drop3").innerHTML = "Válassz ki egy diákot!";
        return false;
    }
    if (!checkJegyKut()) {
        document.getElementById("jegy-error").style.display = "unset";
        document.getElementById("jegy-error").innerHTML = "Add meg a jegyet!";
        return false;
    }
    return true;
}

//disappearance or appearance of error message depending on the selected value from dropdown list
function changeDropDownDiak2() {
    var e = document.getElementById("dropdown-diak-szakjegy");
    var value = e.options[e.selectedIndex].value;
    if (value == "") {
        document.getElementById("error-drop4").style.display = "unset";
        document.getElementById("error-drop4").innerHTML = "Válassz ki egy diákot!";
    } else {
        document.getElementById("error-drop4").style.display = "none";
    }
}

function changeJegySzak() {
    var input = document.getElementById("szak-jegy").value;
    if (input == "") {
        document.getElementById("szak-jegy-error").style.display = "unset";
        document.getElementById("szak-jegy-error").innerHTML = "Add meg a jegyet!";
    } else {
        document.getElementById("szak-jegy-error").style.display = "none";
    }
}

//check if an option is selected from dropdown list
function checkDropDownDiak2() {
    var e = document.getElementById("dropdown-diak-szakjegy");
    var res = e.options[e.selectedIndex].value;
    if (res == "") {
        return false;
    }
    return true;
}

function checkJegySzak() {
    var value = document.getElementById("szak-jegy").value;
    if (value == "") {
        return false;
    }
    return true;
}

//check if the form could be sent
function checkJegyadasSzak() {
    if (!checkDropDownDiak2()) {
        document.getElementById("error-drop4").style.display = "unset";
        document.getElementById("error-drop4").innerHTML = "Válassz ki egy diákot!";
        return false;
    }
    if (!checkJegySzak()) {
        document.getElementById("szak-jegy-error").style.display = "unset";
        document.getElementById("szak-jegy-error").innerHTML = "Add meg a jegyet!";
        return false;
    }
    return true;
}

function changeEmailText() {
    var input = document.getElementById("email-cim").value;
    if (input == "") {
        document.getElementById("error-email").style.display = "unset";
        document.getElementById("error-email").innerHTML = "Írd be az email címed!";
    } else {
        document.getElementById("error-email").style.display = "none";
    }
}

function checkEmailText() {
    var value = document.getElementById("email-cim").value;
    if (value == "") {
        return false;
    }
    return true;
}

function checkEmail() {
    if (!checkEmailText()) {
        document.getElementById("error-email").style.display = "unset";
        document.getElementById("error-email").innerHTML = "Írd be az email címed!";
        return false;
    }

    alert("Sikeresen elküldtük a jelszavad az email címre!");
    return true;
}
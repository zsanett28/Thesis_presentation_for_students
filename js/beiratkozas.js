$(function() {
    $("#dropdown-tanarok").change(function(){
        window.location =  location.protocol + '//' + location.host + location.pathname + "?tanar=" + $(this).val() + "#dropdown-tanarok";
    });
});
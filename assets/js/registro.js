$(document).ready(function() {
    $("#ocultarLogin").click(function() {
       $("#loginFormulario").hide();
       $("#registroFormulario").show(); 
    });

    $("#ocultarRegistro").click(function(){
        $("#loginFormulario").show();
        $("#registroFormulario").hide();
    });
});
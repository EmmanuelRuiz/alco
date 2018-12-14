$(document).ready(function() {

    $("#form").hide();

    $("#btn-avanzar").click(function() {
        hola = "hola";

        var parametros = {
                "hola" : hola
        };



        $.ajax({
            type: "POST",
            url: "prueba.php",
            data: parametros,
            success: function(response) {
               
               $("#form").show();
            }
        });
        return false;
    });
});
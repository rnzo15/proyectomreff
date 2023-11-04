$(document).ready(function () {
    $("#agregar-ciudad-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/city_add.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajeaddcity").html(data);
            },
            error: function () {
                $("#mensajeaddcity").html("Error en la solicitud AJAX.");
            }
        });
    });
});

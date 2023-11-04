$(document).ready(function () {
    $("#modificar-ciudad-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/city_mod.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajemodcity").html(data);
            },
            error: function () {
                $("#mensajemodcity").html("Error en la solicitud AJAX.");
            }
        });
    });
});

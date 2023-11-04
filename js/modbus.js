$(document).ready(function () {
    $("#modificar-omnibus-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/bus_mod.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajemodbus").html(data);
            },
            error: function () {
                $("#mensajemodbus").html("Error en la solicitud AJAX.");
            }
        });
    });
});

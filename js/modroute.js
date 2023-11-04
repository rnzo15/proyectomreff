$(document).ready(function () {
    $("#modificar-ruta-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/route_mod.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajemod").html(data);
            },
            error: function () {
                $("#mensajemod").html("Error en la solicitud AJAX.");
            }
        });
    });
});

$(document).ready(function () {
    $("#modificar-parada-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/stop_mod.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajemodstop").html(data);
            },
            error: function () {
                $("#mensajemodstop").html("Error en la solicitud AJAX.");
            }
        });
    });
});

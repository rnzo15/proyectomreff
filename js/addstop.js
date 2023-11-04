$(document).ready(function () {
    $("#agregar-parada-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/stop_add.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajeaddstop").html(data);
            },
            error: function () {
                $("#mensajeaddstop").html("Error en la solicitud AJAX.");
            }
        });
    });
});

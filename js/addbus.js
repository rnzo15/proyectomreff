$(document).ready(function () {
    $("#agregar-omnibus-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/bus_add.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajeaddbus").html(data);
            },
            error: function () {
                $("#mensajeaddbus").html("Error en la solicitud AJAX.");
            }
        });
    });
});

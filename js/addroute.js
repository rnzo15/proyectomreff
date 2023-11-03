$(document).ready(function () {
    $("#crear-ruta-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/route_add.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensaje").html(data);
            },
            error: function () {
                $("#mensaje").html("Error en la solicitud AJAX.");
            }
        });
    });
});

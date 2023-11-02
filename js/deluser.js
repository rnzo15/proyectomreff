$(document).ready(function () {
    $("#eliminar-usuario-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/user_del.php",
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

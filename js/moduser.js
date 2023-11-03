$(document).ready(function () {
    $("#modificar-usuario-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/user_mod.php",
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
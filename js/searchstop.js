$(document).ready(function () {
    $("#buscar-parada-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/search_stop.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#resultado-parada").html(data);
            },
            error: function () {
                $("#resultado-parada").html("Error en la solicitud AJAX.");
            }
        });
    });
});

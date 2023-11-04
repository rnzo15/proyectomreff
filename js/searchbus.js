$(document).ready(function () {
    $("#buscar-omnibus-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/bus_search.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#resultadosbus").html(data);
            },
            error: function () {
                $("#resultadosbus").html("Error en la solicitud AJAX.");
            }
        });
    });
});

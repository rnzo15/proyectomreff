$(document).ready(function () {
    $("#buscar-ciudad-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/city_search.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#resultadocitysearch").html(data);
            },
            error: function () {
                $("#resultadocitysearch").html("Error en la solicitud AJAX.");
            }
        });
    });
});

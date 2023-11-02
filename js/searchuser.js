$(document).ready(function () {
    $("#buscar").click(function () {
        var busqueda = $("#busqueda").val();
        if (busqueda) {
            $.ajax({
                type: "POST",
                url: "../src/controlador/user_search.php", // Reemplaza con la URL de tu archivo PHP
                data: { busqueda: busqueda },
                success: function (data) {
                    $("#resultado").html(data);
                },
                error: function () {
                    $("#resultado").html("Error en la solicitud AJAX.");
                }
            });
        } else {
            $("#resultado").html("Ingrese un valor de búsqueda.");
        }
    });
});

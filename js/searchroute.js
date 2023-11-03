$(document).ready(function () {
    // Cargar las ciudades en las listas desplegables
    $.ajax({
        type: "POST",
        url: "../src/controlador/city_get.php", // Ruta al archivo PHP que carga las ciudades
        dataType: 'json',
        success: function (data) {
            const origenSelect = $("#origen");
            const destinoSelect = $("#destino");

            origenSelect.empty();
            destinoSelect.empty();

            origenSelect.append("<option value=''>Selecciona una ciudad de origen</option>");
            destinoSelect.append("<option value=''>Selecciona una ciudad de destino</option>");

            data.forEach(function (ciudad) {
                origenSelect.append(new Option(ciudad.NOM_CIUDAD, ciudad.ID_CIUDAD));
                destinoSelect.append(new Option(ciudad.NOM_CIUDAD, ciudad.ID_CIUDAD));
            });
        },
        error: function () {
            console.log("Error en la solicitud AJAX para cargar las ciudades.");
        }
    });

    // Manejar la búsqueda de rutas
    $("#buscar").click(function () {
        const idOrigen = $("#origen").val();
        const idDestino = $("#destino").val();

        if (idOrigen && idDestino) {
            // Realizar una solicitud AJAX para buscar rutas basadas en las ciudades de origen y destino
            $.ajax({
                type: "POST",
                url: "../src/controlador/route_search.php", // Ruta al archivo PHP que busca rutas
                data: {
                    idOrigen: idOrigen,
                    idDestino: idDestino
                },
                dataType: 'json',
                success: function (data) {
                    // Mostrar los resultados en el elemento "resultados"
                    const resultadosDiv = $("#resultados");
                    resultadosDiv.empty();

                    if (data.error) {
                        resultadosDiv.append(data.error); // Mostrar mensaje de error
                    } else {
                        resultadosDiv.append("<h2>Rutas Disponibles</h2>");
                        const listaRutas = $("<ul>");

                        data.forEach(function (ruta) {
                            listaRutas.append("<li>" + ruta.NOM_RUTA + "</li>");
                        });

                        resultadosDiv.append(listaRutas);
                    }
                },
                error: function () {
                    console.log("Error en la solicitud AJAX para buscar rutas.");
                }
            });
        } else {
            alert("Selecciona una ciudad de origen y una ciudad de destino.");
        }
    });
});

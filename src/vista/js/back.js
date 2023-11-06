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
$(document).ready(function () {
    $("#agregar-ciudad-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/city_add.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajeaddcity").html(data);
            },
            error: function () {
                $("#mensajeaddcity").html("Error en la solicitud AJAX.");
            }
        });
    });
});
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
$(document).ready(function () {
    $("#agregar-usuario-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/user_add.php",
            data: $(this).serialize(),
            dataType: 'json', // Especifica que se espera un JSON como respuesta
            success: function (data) {
                if (data.error) {
                    // Muestra el mensaje de error
                    $("#mensaje").html(data.error);
                } else {
                    // Muestra el mensaje de éxito y los datos del usuario
                    $("#mensaje").html("Usuario agregado con éxito.<br>" +
                        "ID: " + data.iduser + "<br>" +
                        "Nombre de usuario: " + data.username + "<br>" +
                        "Correo electrónico: " + data.email);
                }
            },
            error: function () {
                $("#mensaje").html("Error en la solicitud AJAX.");
            }
        });
    });
});
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
$(document).ready(function () {
    $("#modificar-omnibus-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/bus_mod.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajemodbus").html(data);
            },
            error: function () {
                $("#mensajemodbus").html("Error en la solicitud AJAX.");
            }
        });
    });
});
$(document).ready(function () {
    $("#modificar-omnibus-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/bus_mod.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajemodbus").html(data);
            },
            error: function () {
                $("#mensajemodbus").html("Error en la solicitud AJAX.");
            }
        });
    });
});
$(document).ready(function () {
    $("#modificar-ciudad-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/city_mod.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajemodcity").html(data);
            },
            error: function () {
                $("#mensajemodcity").html("Error en la solicitud AJAX.");
            }
        });
    });
});
$(document).ready(function () {
    $("#modificar-ruta-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/route_mod.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajemod").html(data);
            },
            error: function () {
                $("#mensajemod").html("Error en la solicitud AJAX.");
            }
        });
    });
});
$(document).ready(function () {
    $("#modificar-parada-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/stop_mod.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajemodstop").html(data);
            },
            error: function () {
                $("#mensajemodstop").html("Error en la solicitud AJAX.");
            }
        });
    });
});
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
$(document).ready(function () {
    $("#modificar-parada-form").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "../src/controlador/stop_mod.php",
            data: $(this).serialize(),
            success: function (data) {
                $("#mensajemodstop").html(data);
            },
            error: function () {
                $("#mensajemodstop").html("Error en la solicitud AJAX.");
            }
        });
    });
});
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
document.addEventListener("DOMContentLoaded", function () {
    const buscarRutaForm = document.getElementById("buscar-ruta-form");
    const resultadoDiv = document.getElementById("resultado2");

    buscarRutaForm.addEventListener("submit", function (e) {
        e.preventDefault();
        resultadoDiv.innerHTML = "";

        const idInput = buscarRutaForm.querySelector("input[name='id']");
        const id = idInput.value;

        if (!id) {
            resultadoDiv.innerHTML = "Por favor, ingrese un ID de ruta.";
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../src/controlador/route_search.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status === 200) {
                try {
                    const data = JSON.parse(xhr.responseText);
                    if (data && !data.error) {
                        resultadoDiv.innerHTML = "ID: " + data.ID_RUTA + "<br>" +
                            "Nombre: " + data.NOM_RUTA + "<br>" +
                            "Ciudad de Origen: " + data.ID_CIUDAD_ORIGEN + "<br>" +
                            "Ciudad de Destino: " + data.ID_CIUDAD_DESTINO + "<br>" +
                            "ID de Omnibus: " + data.ID_OMNIBUS;
                    } else {
                        resultadoDiv.innerHTML = data.error;
                    }
                } catch (error) {
                    resultadoDiv.innerHTML = "Error en la respuesta del servidor: " + error;
                }
            } else {
                resultadoDiv.innerHTML = "Error en la solicitud AJAX: " + xhr.statusText;
            }
        };

        xhr.onerror = function () {
            resultadoDiv.innerHTML = "Error en la solicitud AJAX.";
        };

        xhr.send("id=" + id);
    });
});
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
$(document).ready(function () {
    $("#buscar").click(function () {
        var busqueda = $("#busqueda").val();
        if (busqueda) {
            $.ajax({
                type: "POST",
                url: "../src/controlador/user_search.php",
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


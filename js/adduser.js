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
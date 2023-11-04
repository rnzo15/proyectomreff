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

document.addEventListener("DOMContentLoaded", function() {
    // Cargar destinos desde la base de datos
    fetch("getCiudades.php")
        .then(response => response.json())
        .then(data => {
            const destinoSelect = document.getElementById("destino");
            data.forEach(ciudad => {
                const option = document.createElement("option");
                option.value = ciudad.ID_CIUDAD;
                option.textContent = ciudad.NOMBRE_CIUDAD;
                destinoSelect.appendChild(option);
            });
        });

    // Actualizar la lista de ómnibus cuando se selecciona un destino
    document.getElementById("destino").addEventListener("change", function() {
        const destinoId = this.value;
        fetch(`getOmnibus.php?destino=${destinoId}`)
            .then(response => response.json())
            .then(data => {
                const omnibusSelect = document.getElementById("omnibus");
                omnibusSelect.innerHTML = "<option value=''>Selecciona un ómnibus</option>";
                data.forEach(omnibus => {
                    const option = document.createElement("option");
                    option.value = omibus.ID_OMNIBUS;
                    option.textContent = `Ómnibus #${omnibus.ID_OMNIBUS}`;
                    omnibusSelect.appendChild(option);
                });
            });
    });

    // Manejar el formulario de reserva
    document.getElementById("reservaForm").addEventListener("submit", function(event) {
        event.preventDefault();
        const destinoId = document.getElementById("destino").value;
        const omnibusId = document.getElementById("omnibus").value;
        const fecha = document.getElementById("fecha").value;

        if (!destinoId || !omnibusId || !fecha) {
            document.getElementById("mensaje").textContent = "Por favor, complete todos los campos.";
        } else {
            // Enviar datos al servidor para registrar la reserva
            fetch("reservar.php", {
                method: "POST",
                body: new URLSearchParams({ destino: destinoId, omnibus: omnibusId, fecha }),
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById("mensaje").textContent = data;
                });
        }
    });
});

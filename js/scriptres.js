// Ejemplo de script.js
document.addEventListener("DOMContentLoaded", function () {
    const asientosContainer = document.getElementById("asientos-container");
    const reservaForm = document.getElementById("reserva-form");
    const reservaIdInput = document.getElementById("reservaId");
    const asientoIdInput = document.getElementById("asientoId");

    // Generar los asientos dinámicamente
    const numAsientos = 40; // Número de asientos
    for (let i = 1; i <= numAsientos; i++) {
        const asiento = document.createElement("div");
        asiento.className = "asiento disponible";
        asiento.textContent = i;

        asiento.addEventListener("click", function () {
            if (asiento.classList.contains("disponible")) {
                asiento.classList.remove("disponible");
                asiento.classList.add("seleccionado");
                asientoIdInput.value = i;
            } else if (asiento.classList.contains("seleccionado")) {
                asiento.classList.remove("seleccionado");
                asiento.classList.add("disponible");
                asientoIdInput.value = "";
            }
        });

        asientosContainer.appendChild(asiento);
    }

    // Función para enviar la reserva
    function reservarAsiento() {
        if (asientoIdInput.value !== "") {
            reservaForm.submit();
        }
    }
});

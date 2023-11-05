<?php
require_once "../modelo/model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["reservar"])) {
        $rutaId = 1; // ID de la ruta seleccionada (debes ajustarlo según tu lógica)
        $asientoId = $_POST["asientoId"]; // ID del asiento seleccionado
        $reservaId = $_POST["reservaId"]; // ID de la reserva (puedes generarlo dinámicamente)
        
        $estadoAsientos = obtenerEstadoAsientos($rutaId);

        // Verificar si el asiento está disponible
        $asientoDisponible = array_search($asientoId, array_column($estadoAsientos, "ID_ASIENTO"));
        
        if ($asientoDisponible !== false && $estadoAsientos[$asientoDisponible]["ESTADO"] == 0) {
            // Reservar el asiento
            reservarAsiento($asientoId, $reservaId);
            echo "Asiento reservado con éxito.";
        } else {
            echo "El asiento ya está reservado.";
        }
    }
}

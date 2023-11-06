<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destinoId = $_POST["destino"];
    $omnibusId = $_POST["omnibus"];
    $fecha = $_POST["fecha"];

    if (empty($destinoId) || empty($omnibusId) || empty($fecha)) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Insertar datos de la reserva en la base de datos
        $query = "INSERT INTO RESERVA (ID_CIUDAD_DESTINO, ID_OMNIBUS, FECHA_RESERVA) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iis", $destinoId, $omnibusId, $fecha);

        if ($stmt->execute()) {
            echo "Reserva exitosa. ¡Gracias!";
        } else {
            echo "Hubo un problema al realizar la reserva. Por favor, inténtelo de nuevo.";
        }
    }
} else {
    echo "Acceso no autorizado.";
}

$conn->close();
?>

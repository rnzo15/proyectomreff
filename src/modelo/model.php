<?php
// Incluye el archivo de conexión a la base de datos
include '../libs/Conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén el ID del asiento desde el formulario
    $asientoId = $_POST['asientoId'];

    // Realiza la lógica de reserva, por ejemplo, actualiza el estado del asiento en la base de datos
    $query = "UPDATE ASIENTO SET ESTADO = 0 WHERE ID_ASIENTO = :asientoId";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':asientoId', $asientoId, PDO::PARAM_INT);
    $stmt->execute();

    // En este ejemplo, solo se muestra un mensaje de éxito
    echo "¡Asiento $asientoId reservado con éxito!";
} else {
    echo "Acceso no válido.";
}
?>

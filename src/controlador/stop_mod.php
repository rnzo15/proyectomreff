<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_parada = $_POST["id_parada"];
    $direccion_parada = $_POST["direccion_parada"];
    $horario = $_POST["horario"];
    $id_ruta = $_POST["id_ruta"];
    $id_ciudad = $_POST["id_ciudad"];

    try {
        $sql = "CALL ModificarParada(:id_parada, :direccion_parada, :horario, :id_ruta, :id_ciudad)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_parada', $id_parada, PDO::PARAM_INT);
        $stmt->bindParam(':direccion_parada', $direccion_parada, PDO::PARAM_STR);
        $stmt->bindParam(':horario', $horario, PDO::PARAM_STR);
        $stmt->bindParam(':id_ruta', $id_ruta, PDO::PARAM_INT);
        $stmt->bindParam(':id_ciudad', $id_ciudad, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Parada modificada con éxito.";
        } else {
            echo "Error al modificar la parada.";
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
} else {
    echo "La solicitud no es válida.";
}
?>

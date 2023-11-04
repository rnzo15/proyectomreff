<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $capacidad_maxima = $_POST["capacidad_maxima"];
    $numero_identificacion = $_POST["numero_identificacion"];
    $conductor_id = $_POST["conductor_id"];

    try {
        $sql = "CALL AgregarOmnibus(:capacidad_maxima, :numero_identificacion, :conductor_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':capacidad_maxima', $capacidad_maxima, PDO::PARAM_INT);
        $stmt->bindParam(':numero_identificacion', $numero_identificacion, PDO::PARAM_INT);
        $stmt->bindParam(':conductor_id', $conductor_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Ómnibus agregado con éxito.";
        } else {
            echo "Error al agregar el ómnibus.";
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
} else {
    echo "La solicitud no es válida.";
}
?>

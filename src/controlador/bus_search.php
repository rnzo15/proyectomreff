<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_omnibus = $_POST["id_omnibus"];

    try {
        $sql = "CALL ObtenerOmibusPorID(:id_omnibus)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_omnibus', $id_omnibus, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                echo "ID: " . $result['ID_OMNIBUS'] . "<br>";
                echo "Capacidad Máxima: " . $result['CAPACIDAD_MAXIMA'] . "<br>";
                echo "Número de Identificación: " . $result['NUMERO_IDENTIFICACION'] . "<br>";
                echo "ID del Conductor: " . $result['CONDUCTORID'] . "<br>";
            } else {
                echo "No se encontró ningún ómnibus con ese ID.";
            }
        } else {
            echo "Error al buscar el ómnibus.";
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
} else {
    echo "La solicitud no es válida.";
}
?>

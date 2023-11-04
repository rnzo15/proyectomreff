<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_parada = $_POST["id_parada"];

    try {
        $sql = "CALL BuscarParadaPorID(:id_parada)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_parada', $id_parada, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $parada = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($parada) {
                echo "ID de Parada: " . $parada['ID_PARADA'] . "<br>";
                echo "Dirección de Parada: " . $parada['DIRECCION_PARADA'] . "<br>";
                echo "Horario: " . $parada['HORARIO'] . "<br>";
                echo "ID de Ruta: " . $parada['ID_RUTA'] . "<br>";
                echo "ID de Ciudad: " . $parada['ID_CIUDAD'] . "<br>";
            } else {
                echo "No se encontró ninguna parada con ese ID.";
            }
        } else {
            echo "Error al buscar la parada.";
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
} else {
    echo "La solicitud no es válida.";
}
?>

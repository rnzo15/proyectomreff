<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_ciudad = $_POST["id_ciudad"];

    try {
        $sql = "CALL BuscarCiudadPorID(:id_ciudad)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_ciudad', $id_ciudad, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            echo "ID de Ciudad: " . $result['ID_CIUDAD'] . "<br>";
            echo "Nombre de Ciudad: " . $result['NOMBRE_CIUDAD'];
        } else {
            echo "Ciudad no encontrada.";
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
} else {
    echo "La solicitud no es válida.";
}
?>

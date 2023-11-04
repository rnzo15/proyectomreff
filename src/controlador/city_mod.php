<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_ciudad = $_POST["id_ciudad"];
    $nombre_ciudad = $_POST["nombre_ciudad"];

    try {
        $sql = "CALL ModificarCiudad(:id_ciudad, :nombre_ciudad)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_ciudad', $id_ciudad, PDO::PARAM_INT);
        $stmt->bindParam(':nombre_ciudad', $nombre_ciudad, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                echo $result['mensaje'];
            } else {
                echo "Error al modificar la ciudad.";
            }
        } else {
            echo "Error al modificar la ciudad.";
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
} else {
    echo "La solicitud no es válida.";
}
?>

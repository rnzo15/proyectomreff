<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre_ciudad = $_POST["nombre_ciudad"];

    try {
        $sql = "CALL AgregarCiudad(:nombre_ciudad)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre_ciudad', $nombre_ciudad, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Ciudad agregada con éxito.";
        } else {
            echo "Error al agregar la ciudad: " . $stmt->errorCode();
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
} else {
    echo "La solicitud no es válida.";
}

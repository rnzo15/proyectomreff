<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom_ruta = $_POST["nom_ruta"];
    $id_ciudad_origen = $_POST["id_ciudad_origen"];
    $id_ciudad_destino = $_POST["id_ciudad_destino"];
    $id_omnibus = $_POST["id_omnibus"];

    try {
        $sql = "CALL CrearRuta(:nom_ruta, :id_ciudad_origen, :id_ciudad_destino, :id_omnibus)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom_ruta', $nom_ruta, PDO::PARAM_STR);
        $stmt->bindParam(':id_ciudad_origen', $id_ciudad_origen, PDO::PARAM_INT);
        $stmt->bindParam(':id_ciudad_destino', $id_ciudad_destino, PDO::PARAM_INT);
        $stmt->bindParam(':id_omnibus', $id_omnibus, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Ruta creada con éxito.";
        } else {
            echo "Error al crear la ruta.";
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
} else {
    echo "La solicitud no es válida.";
}
?>

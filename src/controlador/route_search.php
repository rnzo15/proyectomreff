<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];

    try {
        $sql = "CALL BuscarRutaPorID(:id)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                echo json_encode($result);
            } else {
                echo json_encode(["error" => "No se encontró una ruta con ese ID."]);
            }
        } else {
            echo json_encode(["error" => "Error al buscar la ruta."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["error" => "Error de base de datos: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "La solicitud no es válida."]);
}
?>

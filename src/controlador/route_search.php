<?php
include '../libs/Conexion.php';
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idOrigen = $_POST["idOrigen"];
    $idDestino = $_POST["idDestino"];

    try {
        $sql = "CALL BuscarRutas(:idOrigen, :idDestino)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idOrigen', $idOrigen, PDO::PARAM_INT);
        $stmt->bindParam(':idDestino', $idDestino, PDO::PARAM_INT);
        $stmt->execute();

        $rutas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rutas) > 0) {
            echo json_encode($rutas);
        } else {
            echo json_encode(['error' => 'No se encontraron rutas para las ciudades seleccionadas.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error de base de datos: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'La solicitud no es válida.']);
}
?>

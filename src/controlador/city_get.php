<?php
include '../libs/Conexion.php';

try {
    $sql = "CALL ObtenerCiudades()";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $ciudades = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($ciudades);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error de base de datos: ' . $e->getMessage()]);
}
?>

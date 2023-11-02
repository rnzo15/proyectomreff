<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cedula = $_POST["cedula"];
    try {
        $sql = "CALL EliminarUsuarioPorCedula(:cedula)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar el usuario.";
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
} else {
    echo "La solicitud no es válida.";
}
?>

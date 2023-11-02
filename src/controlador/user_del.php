<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $iduser = $_POST["iduser"];

    try {
        $sql = "CALL EliminarUsuarioPorId(:iduser)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':iduser', $iduser, PDO::PARAM_INT);

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

<?php
include '../../libs/Conexion.php'; 

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        try {
        $correo = $_POST["correo"];
        $contrasena = $_POST["contrasena"];
        $direccion = $_POST["direccion"];
        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $fechanac = $_POST["fecha_nacimiento"];
        $sql = "CALL RegistrarUsuario(:nombre, :correo, :direccion, :contrasena, :cedula, :telefono, :fechanac)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        $stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':fechanac', $fechanac, PDO::PARAM_STR);
        if ($stmt->execute()) {
            header('Location: ../../../index.html');
        } else {
            echo "Error al registrar al usuario.";
        }
    } catch (PDOException $e) {
        echo "Error de conexión a la base de datos: " . $e->getMessage();
}
    }

// Cerrar la conexión
$conn = null;
?>
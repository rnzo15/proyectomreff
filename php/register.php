<?php
// Conexión a la base de datos (reemplaza los valores con los de tu configuración)
$servername = "localhost";
$username = "root";
$password = "6751";
$dbname = "FBUSESUY";

try {
    // Crear la conexión PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Procesar el formulario de registro cuando se envía
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $correo = $_POST["correo"];
        $contrasena = $_POST["contrasena"];
        $direccion = $_POST["direccion"];
        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $fechanac = $_POST["fecha_nacimiento"];

        // Llamar al procedimiento almacenado utilizando marcadores de posición
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
            header('Location: ../index.html');
        } else {
            echo "Error al registrar al usuario.";
        }
    }
} catch (PDOException $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>

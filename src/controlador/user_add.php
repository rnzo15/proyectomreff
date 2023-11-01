<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $direccion = $_POST["direccion"];
    $password = $_POST["password"];
    $cedula = $_POST["cedula"];
    $telefono = $_POST["telefono"];
    $fechanac = $_POST["fechanac"];

    try {
        $sql = "CALL AgregarUsuario(:username, :email, :direccion, :password, :cedula, :telefono, :fechanac)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':fechanac', $fechanac, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($result); // Devuelve un JSON con el mensaje y los datos del usuario
        } else {
            echo json_encode(['error' => 'Error al agregar el usuario']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error de base de datos: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'La solicitud no es válida.']);
}
?>

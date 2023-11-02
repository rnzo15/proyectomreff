<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $iduser = $_POST["iduser"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $direccion = $_POST["direccion"];
    $passwordu = $_POST["passwordu"];
    $cedula = $_POST["cedula"];
    $telefono = $_POST["telefono"];
    $rango = $_POST["rango"];
    $fechanac = $_POST["fechanac"];

    try {
        $sql = "CALL ModificarUsuario(:iduser, :username, :email, :direccion, :passwordu, :cedula, :telefono, :rango, :fechanac)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':iduser', $iduser, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam(':passwordu', $passwordu, PDO::PARAM_STR);
        $stmt->bindParam(':cedula', $cedula, PDO::PARAM_STR);
        $stmt->bindParam(':telefono', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':rango', $rango, PDO::PARAM_INT);
        $stmt->bindParam(':fechanac', $fechanac, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Usuario modificado con éxito.";
        } else {
            echo "Error al modificar el usuario.";
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
} else {
    echo "La solicitud no es válida.";
}
?>

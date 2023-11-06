<?php
session_start();
include '../src/libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  try {
    $resultado = null;
    $sql = "CALL Login(:email, :password, @resultado)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();

    $stmt->closeCursor();

    $stmt = $conn->query("SELECT @resultado");
    $resultadoConsulta = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultadoConsulta['@resultado'] == 1) {
        $stmt = $conn->prepare("SELECT rango FROM USUARIOS WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $rango = $usuario['rango'];

        if ($rango == 1) {
            header('Location: ../index.html');
        } elseif ($rango == 3) {
            $_SESSION['user_email'] = $email;
            header('Location: ../html/backoffice.php');
        }
    } else {
        echo "Credenciales inválidas. Usuario y/o contraseña incorrectos.";
    }
  } catch (PDOException $e) {
    echo "Error de conexión a la base de datos: " . $e->getMessage();
  }

  $conn = null;
}
?>

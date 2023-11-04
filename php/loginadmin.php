<?php
session_start();
include '../src/libs/Conexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

try {

  $resultado = null;
  $sql = "CALL LoginAdmin(:email, :password, @resultado)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':password', $password, PDO::PARAM_STR);
  $stmt->execute();
  
  // Liberar los resultados pendientes antes de realizar una nueva consulta
  $stmt->closeCursor();

  // Recuperar el resultado del procedimiento almacenado
  $stmt = $conn->query("SELECT @resultado");
  $resultadoConsulta = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($resultadoConsulta['@resultado'] == 1) {
      header('Location: ../html/backoffice.html');
  } else {
      echo "Credenciales inválidas. Usuario y/o contraseña incorrectos.";
  }
} catch (PDOException $e) {
  echo "Error de conexión a la base de datos: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;

// ...

}
?>

<?php
$servername = "localhost";
$usernameDB = "root";
$passwordDB = "6751";
$database = "FBUSESUY";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $usernameDB, $passwordDB);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Error de conexión a la base de datos: " . $e->getMessage();
}
?>

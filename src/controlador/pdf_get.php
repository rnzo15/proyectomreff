<?php
include '../libs/Conexion.php';

$sql = "SELECT archivo FROM archivos ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();

header("Content-Type: application/pdf");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['archivo'];
}
?>

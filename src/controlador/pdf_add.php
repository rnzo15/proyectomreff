<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['archivo']['name'];
        $archivoTmp = $_FILES['archivo']['tmp_name'];

        $archivoBinario = file_get_contents($archivoTmp);

        $sql = "INSERT INTO archivos (nombre_archivo, archivo) VALUES (:nombre_archivo, :archivo)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre_archivo', $nombreArchivo, PDO::PARAM_STR);
        $stmt->bindParam(':archivo', $archivoBinario, PDO::PARAM_LOB);
        $stmt->execute();
    }
}
?>

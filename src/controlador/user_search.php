<?php
include '../libs/Conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $busqueda = $_POST["busqueda"];

    try {
        $sql = "CALL BuscarUsuario(:busqueda)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':busqueda', $busqueda, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            foreach ($result as $row) {
                echo "ID de Usuario: " . $row["iduser"] . "<br>";
                echo "Nombre de Usuario: " . $row["username"] . "<br>";
                echo "Email: " . $row["email"] . "<br>";
                echo "<br>";
            }
        } else {
            echo "No se encontraron resultados para la búsqueda: " . $busqueda;
        }
    } catch (PDOException $e) {
        echo "Error de base de datos: " . $e->getMessage();
    }
} else {
    // Maneja el caso en el que la solicitud no sea POST
    echo "La solicitud no es válida.";
}
?>

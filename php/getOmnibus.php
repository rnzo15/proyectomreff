<?php
include 'db.php';

if ($_GET["destino"]) {
    $destinoId = $_GET["destino"];
    $query = "SELECT * FROM OMNIBUS WHERE ID_CIUDAD_DESTINO = $destinoId";
    $result = $conn->query($query);

    $omnibus = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $omnibus[] = $row;
        }
    }

    echo json_encode($omnibus);
} else {
    echo json_encode([]);
}

$conn->close();
?>

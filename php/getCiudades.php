<?php
include 'db.php';

$query = "SELECT * FROM CIUDAD";
$result = $conn->query($query);

$ciudades = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ciudades[] = $row;
    }
}

echo json_encode($ciudades);

$conn->close();
?>

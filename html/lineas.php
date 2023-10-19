<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/stylemenu.css">
    <link rel="stylesheet" href="../css/styletables.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <title>Lineas</title>
</head>

<body>
    <style>
        .wrapper{
            margin:50px;
        }
    </style>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../index.html"><img src="../img/VERSION MINIMA 1.png" alt="Logo" class="logo-img"></a>
            </div>
            <div class="nav-icons">
                <div class="account-icon">
                    <a href="../html/decision.html"><i class="fa-solid fa-user"></i></a>
                </div>
                <div class="menu-icon" onclick="toggleMenu()">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <ul class="menu-items" id="menuItems">
                    <a href="../html/lineas.php"><li>Lineas</li></a>
                    <a href="../html/abtus.html"><li>Sobre Nosotros</li></a>
                    <a href="../html/mapa.html"><li>Mapa</li></a>
                    <a href="../html/news.html"><li>Noticias</li></a>
                    <a href="../html/tarifas.html"><li>Tarifas</li></a>
                    <a href="../html/contact.html"><li>Contacto</li></a>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper">
        <div class="content">
            <?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "6751";
$dbname = "FBUSESUY";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}

// Consulta para obtener las ciudades
$sql_ciudades = "SELECT * FROM CIUDAD";
$result_ciudades = $conn->query($sql_ciudades);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Búsqueda</title>
</head>
<body>
    <h1>Buscador de Rutas y Horarios</h1>
    <form action="" method="POST">
        <label for="ciudad_origen">Ciudad de Origen:</label>
        <select name="ciudad_origen" id="ciudad_origen">
            <?php
            // Generar opciones para ciudades de origen
            while ($row = $result_ciudades->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['ID_CIUDAD'] . '">' . $row['NOMBRE_CIUDAD'] . '</option>';
            }
            ?>
        </select>

        <label for="ciudad_destino">Ciudad de Destino:</label>
        <select name="ciudad_destino" id="ciudad_destino">
            <?php
            $result_ciudades->execute(); 
            while ($row = $result_ciudades->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['ID_CIUDAD'] . '">' . $row['NOMBRE_CIUDAD'] . '</option>';
            }
            ?>
        </select>

        <input type="submit" value="Buscar Rutas y Horarios">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ciudad_origen = $_POST['ciudad_origen'];
        $ciudad_destino = $_POST['ciudad_destino'];
        $sql_rutas = "SELECT R.NOM_RUTA, P.DIRECCION_PARADA, P.HORARIO FROM RUTA R
                      INNER JOIN PARADA P ON R.ID_RUTA = P.ID_RUTA
                      WHERE R.ID_CIUDAD_ORIGEN = :ciudad_origen AND R.ID_CIUDAD_DESTINO = :ciudad_destino";
        $stmt = $conn->prepare($sql_rutas);
        $stmt->bindParam(':ciudad_origen', $ciudad_origen, PDO::PARAM_INT);
        $stmt->bindParam(':ciudad_destino', $ciudad_destino, PDO::PARAM_INT);
        $stmt->execute();

        $rutas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rutas) > 0) {
            echo "<h2>Rutas disponibles:</h2>";
            echo "<ul>";
            foreach ($rutas as $row) {
                echo "<li>Ruta: " . $row['NOM_RUTA'] . "<br>Parada: " . $row['DIRECCION_PARADA'] . "<br>Horario: " . $row['HORARIO'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No se encontraron rutas disponibles.</p>";
        }
    }

    $conn = null;
    ?>
</body>
</html>
        </div>
    </div>
    <footer class="footer">
        <img class="logo-left" src="../img/logo_6.png" alt="Logo Izquierdo">
        <span class="center-text">Pagina creada por M.R.E.F.F Software</span>
        <img class="logo-right" src="../img/VERSION MINIMA 1.png" alt="Logo Derecho">
    </footer>
<script src="../js/script.js"></script>
</body>

</html>
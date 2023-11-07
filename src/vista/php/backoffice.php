<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header('Location: ../html/login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/stylemenu.css">
    <link rel="stylesheet" href="../css/styleback.css">
    <script src="../js/back.js"></script>
    <script src="../js/pdfview.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BackOffice</title>
</head>
<style>
    a{
        color:black;
        text-decoration: none;
    }
    .account-icon{
        filter: invert(100%);
    }
</style>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="../../../index.html"><img src="../img/VERSION MINIMA 1.png" alt="Logo" class="logo-img"></a>
            </div>
            <div class="nav-icons">
                <div class="account-icon">
                <a href="./src/vista/html/decision.html"><i class="fa-solid fa-user"></i></a>

                </div>
                <div class="menu-icon" onclick="toggleMenu()">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <ul class="menu-items" id="menuItems">
                    <a href="../php/lineas.php">
                        <li>Lineas</li>
                    </a>
                    <a href="../html/mapa.html">
                        <li>Mapa</li>
                    </a>
                    <a href="../html/news.html">
                        <li>Noticias</li>
                    </a>
                    <a href="../html/tarifas.html">
                        <li>Tarifas</li>
                    </a>
                    <a href="../html/contact.html">
                        <li>Contacto</li>
                    </a>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="column"><i class="fa-solid fa-user"></i> ABM Usuarios
                        <div class="column" onclick="showSearchUser()"><i class="fa-solid fa-magnifying-glass"></i>
                            Buscar</div>
                        <div id="resultado"></div>
                        <div class="column" onclick="showAddUser()"><i class="fa-solid fa-user-plus"></i> Agregar user
                        </div>
                        <div class="column" onclick="showDelUser()"><i class="fa-solid fa-user-minus"></i> Eliminar
                        </div>
                        <div class="column" onclick="showModUser()"><i class="fa-solid fa-user-gear"></i> Modificar
                        </div>
                    </div>
                    <div class="column"><i class="fa-solid fa-route"></i> ABM Lineas
                        <div class="column" onclick="showSearchLine()"><i class="fa-solid fa-magnifying-glass"></i>
                            Buscar</div>
                        <div class="column" onclick="showAddLine()"><i class="fa-solid fa-plus"></i> Agregar</div>
                        <div class="column" onclick="showDelLine()"><i class="fa-solid fa-minus"></i> Borrar</div>
                        <div class="column" onclick="showModLine()"><i class="fa-solid fa-gear"></i> Modificar</div>
                    </div>
                    <div class="column"><i class="fa-solid fa-bus-simple"></i> ABM Buses
                        <div class="column" onclick="showSearchBus()"><i class="fa-solid fa-magnifying-glass"></i>
                            Buscar</div>
                        <div class="column" onclick="showAddBus()"><i class="fa-solid fa-plus"></i> Agregar</div>
                        <div class="column" onclick="showDelBus()"><i class="fa-solid fa-minus"></i> Eliminar</div>
                        <div class="column" onclick="showModBus()"><i class="fa-solid fa-gear"></i> Modificar</div>
                    </div>
                    <div class="column"><i class="fa-solid fa-location-dot"></i> ABM Paradas
                        <div class="column" onclick="showSearchParada()"><i class="fa-solid fa-magnifying-glass"></i>
                            Buscar</div>
                        <div class="column" onclick="showAddParada()"><i class="fa-solid fa-plus"></i> Agregar</div>
                        <div class="column" onclick="showDelParada()"><i class="fa-solid fa-minus"></i> Eliminar</div>
                        <div class="column" onclick="showModParada()"><i class="fa-solid fa-gear"></i> Modificar</div>
                    </div>
                    <div class="column"><i class="fa-solid fa-asterisk"></i> Otros
                        <div class="column"><i class="fa-solid fa-location-dot"></i><a href="https://www.google.com/maps/"> Ver mapa</a> </div>
                        <div class="column"><i class="fa-solid fa-bell"></i><a href="../html/Contact.html"> Reportes</a> </div>
                        <div class="column"><i class="fa-solid fa-calendar"></i> <a href="https://www.wincalendar.com/calendario/Uruguay"> Eventos</a></div>
                        <div class="column" onclick="showFileSettings()"><i class="fa-solid fa-file-export"></i> Subir
                            archivo</div>
                        <div class="column"><i class="fa-solid fa-envelope"></i> Quejas</div>
                    </div>
                </div>
                <div class="row">
                    <div class="column"><i class="fa-solid fa-city"></i> ABM Ciudades
                        <div class="column" onclick="showSearchCiudad()"><i class="fa-solid fa-magnifying-glass"></i>
                            Buscar</div>
                        <div class="column" onclick="showAddCiudad()"><i class="fa-solid fa-plus"></i> Agregar</div>
                        <div class="column" onclick="showDelCiudad()"><i class="fa-solid fa-minus"></i> Eliminar</div>
                        <div class="column" onclick="showModCiudad()"><i class="fa-solid fa-gear"></i> Modificar</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popupcont" id="filesetting">
        <div class="popup-content">
            <h1>Visor de PDF</h1>
            <iframe id="visor-pdf" width="100%" height="500" frameborder="0"></iframe>

            <input type="file" id="cargar-pdf" accept=".pdf">
            <button onclick="closePopupFileSettings()">Cerrar</button>
        </div>
    </div>
    <div class="popupcont" id="searchu">
        <div class="popup-content">
            <h2>Buscar usuario</h2>
            <input type="text" name="cedula" placeholder="Cedula usuario">
            <input type="text" name="id" placeholder="ID usuario">
            <input type="submit" value="Enviar">
            <button onclick="closePopupSearch()">Cerrar</button>
        </div>
    </div>
    <div class="popupcont" id="modus">
        <div class="popup-content">
            <h1>Modificar usuario</h1>
            <form id="modificar-usuario-form">
                <input type="number" name="iduser" placeholder="ID del usuario">
                <input type="text" name="username" placeholder="Nuevo nombre de usuario">
                <input type="text" name="email" placeholder="Nuevo correo electrónico">
                <input type="text" name="direccion" placeholder="Nueva dirección">
                <input type="password" name="passwordu" placeholder="Nueva contraseña">
                <input type="text" name="cedula" placeholder="Nueva cédula">
                <input type="text" name="telefono" placeholder="Nuevo teléfono">
                <input type="number" name="rango" placeholder="Nuevo rango">
                <input type="date" name="fechanac" placeholder="Nueva fecha de nacimiento">
                <button type="submit">Modificar Usuario</button>
            </form>

            <div id="mensaje"></div>
            <button onclick="closePopupMod()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="delus">
        <div class="popup-content">
            <form id="eliminar-usuario-form">
                <h1>Eliminar usuario</h1>
                <input type="number" name="iduser" placeholder="ID del usuario a eliminar">
                <button type="submit">Eliminar Usuario</button>
            </form>

            <div id="mensaje"></div>
            <button onclick="closePopupDel()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="addus">
        <div class="popup-content">
            <h1>Agregar usuario</h1>
            <form id="agregar-usuario-form">
                <input type="text" name="username" placeholder="Nombre de usuario">
                <input type="text" name="email" placeholder="Correo electrónico">
                <input type="text" name="direccion" placeholder="Dirección">
                <input type="password" name="password" placeholder="Contraseña">
                <input type="text" name="cedula" placeholder="Cédula">
                <input type="text" name="telefono" placeholder="Teléfono">
                <input type="date" name="fechanac">
                <button type="submit">Agregar Usuario</button>
            </form>
            <div id="mensaje"></div>
            <button onclick="closePopupAdd()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="searchline">
        <div class="popup-content">
            <h1>Buscar Ruta por ID</h1>
            <form id="buscar-ruta-form">
                <input type="number" name="id" placeholder="ID de la Ruta">
                <button type="submit">Buscar</button>
            </form>
            <div id="resultado2"></div>


            <button onclick="closePopupSearchLine()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="addLine">
        <div class="popup-content">
            <h1>Crear Ruta</h1>
            <form id="crear-ruta-form">
                <input type="text" name="nom_ruta" placeholder="Nombre de la ruta">
                <input type="number" name="id_ciudad_origen" placeholder="ID de la ciudad de origen">
                <input type="number" name="id_ciudad_destino" placeholder="ID de la ciudad de destino">
                <input type="number" name="id_omnibus" placeholder="ID del ómnibus">
                <button type="submit">Crear Ruta</button>
            </form>
            <div id="mensaje"></div>
            <button onclick="closePopupAddLine()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="delLine">
        <div class="popup-content">
            <!--  <form action="../php/delLine" method="post"> -->
            <h2>Eliminar Linea</h2>
            <input type="text" name="id" placeholder="ID Línea">
            <input type="submit" value="Eliminar">
            </form>
            <button onclick="closePopupDelLine()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="modLine">
        <div class="popup-content">
            <h1>Modificar Ruta</h1>
            <form id="modificar-ruta-form">
                <input type="number" name="id_ruta" placeholder="ID de la ruta a modificar">
                <input type="text" name="nombre_ruta" placeholder="Nuevo nombre de la ruta">
                <input type="number" name="id_ciudad_origen" placeholder="Nuevo ID de la ciudad de origen">
                <input type="number" name="id_ciudad_destino" placeholder="Nuevo ID de la ciudad de destino">
                <input type="number" name="id_omnibus" placeholder="Nuevo ID del ómnibus">
                <button type="submit">Modificar Ruta</button>
            </form>
            <div id="mensajemod"></div>
            <button onclick="closePopupModLine()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="searchBus">
        <div class="popup-content">
            <h1>Buscar Ómnibus por ID</h1>
            <form id="buscar-omnibus-form">
                <input type="number" name="id_omnibus" placeholder="ID del Ómnibus">
                <button type="submit">Buscar Ómnibus</button>
            </form>
            <div id="resultadosbus"></div>
            <button onclick="closePopupSearchBus()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="addBus">
        <div class="popup-content">
            <h1>Agregar Ómnibus</h1>
            <form id="agregar-omnibus-form">
                <input type="number" name="capacidad_maxima" placeholder="Capacidad Máxima">
                <input type="number" name="numero_identificacion" placeholder="Número de Identificación">
                <input type="number" name="conductor_id" placeholder="ID del Conductor">
                <button type="submit">Agregar Ómnibus</button>
            </form>
            <div id="mensajeaddbus"></div>
            <button onclick="closePopupAddBus()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="delBus">
        <div class="popup-content">
            <!-- <form action="../php/delBus" method="post"> -->
            <h2>Eliminar Bus</h2>
            <input type="text" name="id" placeholder="ID Bus">
            <input type="submit" value="Eliminar">
            </form>
            <button onclick="closePopupDelBus()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="modBus">
        <div class="popup-content">
            <h1>Modificar Ómnibus</h1>
            <form id="modificar-omnibus-form">
                <input type="number" name="id_omnibus" placeholder="ID del ómnibus a modificar">
                <input type="number" name="capacidad_maxima" placeholder="Nueva capacidad máxima">
                <input type="number" name="numero_identificacion" placeholder="Nuevo número de identificación">
                <input type="number" name="conductor_id" placeholder="Nuevo ID del conductor">
                <button type="submit">Modificar Ómnibus</button>
            </form>
            <div id="mensajemodbus"></div>
            <button onclick="closePopupModBus()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="searchParada">
        <div class="popup-content">
            <h1>Buscar Parada por ID</h1>
            <form id="buscar-parada-form">
                <input type="number" name="id_parada" placeholder="ID de la parada a buscar">
                <button type="submit">Buscar Parada</button>
            </form>
            <div id="resultado-parada"></div>
            <button onclick="closePopupSearchParada()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="addParada">
        <div class="popup-content">
            <h1>Agregar Parada</h1>
            <form id="agregar-parada-form">
                <input type="text" name="direccion_parada" placeholder="Dirección de la parada">
                <input type="time" name="horario" placeholder="Horario">
                <input type="number" name="id_ruta" placeholder="ID de la ruta">
                <input type="number" name="id_ciudad" placeholder="ID de la ciudad">
                <button type="submit">Agregar Parada</button>
            </form>
            <div id="mensajeaddstop"></div>
            <button onclick="closePopupAddParada()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="delParada">
        <div class="popup-content">
            <!-- <form action="../php/delParada" method="post"> -->
            <h2>Borrar Parada</h2>
            <input type="text" name="id" placeholder="ID Parada">
            <input type="submit" value="Borrar">
            </form>
            <button onclick="closePopupDelParada()">Cerrar</button>
        </div>
    </div>
    <div class="popupcont" id="modParada">
        <div class="popup-content">
            <h1>Modificar Parada</h1>
            <form id="modificar-parada-form">
                <input type="number" name="id_parada" placeholder="ID de la parada a modificar">
                <input type="text" name="direccion_parada" placeholder="Nueva dirección de la parada">
                <input type="time" name="horario" placeholder="Nuevo horario">
                <input type="number" name="id_ruta" placeholder="Nuevo ID de la ruta">
                <input type="number" name="id_ciudad" placeholder="Nuevo ID de la ciudad">
                <button type="submit">Modificar Parada</button>
            </form>
            <div id="mensajemodstop"></div>
            <button onclick="closePopupModParada()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="searchTarifa">
        <div class="popup-content">
            <!--<form action="../php/searchTarifa" method="post"> -->
            <h2>Buscar Tarifa</h2>
            <input type="text" name="id" placeholder="ID Tarifa">
            <input type="submit" value="Buscar">
            </form>
            <button onclick="closePopupSearchTarifa()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="addTarifa">
        <div class="popup-content">
            <!-- <form action="../php/addTarifa" method="post"> -->
            <h2>Agregar Tarifa</h2>
            <input type="text" name="id" placeholder="ID Tarifa">
            <input type="text" name="nom" placeholder="Nombre Tarifa">
            <input type="text" name="precio" placeholder="Precio Tarifa">
            <input type="submit" value="Agregar">
            </form>
            <button onclick="closePopupAddTarifa()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="delTarifa">
        <div class="popup-content">
            <!-- <form action="../php/delTarifa" method="post"> -->
            <h2>Eliminar Tarifa</h2>
            <input type="text" name="id" placeholder="ID Tarifa">
            <input type="submit" value="Eliminar">
            </form>
            <button onclick="closePopupDelTarifa()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="modTarifa">
        <div class="popup-content">
            <!-- <form action="../php/modTarifa" method="post"> -->
            <h2>Modificar Tarifa</h2>
            <input type="text" name="id" placeholder="ID Tarifa">
            <input type="text" name="nom" placeholder="Nombre Tarifa">
            <input type="text" name="precio" placeholder="Precio Tarifa">
            <input type="submit" value="Modificar">
            </form>
            <button onclick="closePopupModTarifa()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="searchCiudad">
        <div class="popup-content">
            <h1>Buscar Ciudad por ID</h1>
            <form id="buscar-ciudad-form">
                <input type="number" name="id_ciudad" placeholder="ID de la ciudad a buscar">
                <button type="submit">Buscar Ciudad</button>
            </form>
            <div id="resultadocitysearch"></div>
            <button onclick="closePopupSearchCiudad()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="addCiudad">
        <div class="popup-content">
            <h1>Agregar Ciudad</h1>
            <form id="agregar-ciudad-form">
                <input type="text" name="nombre_ciudad" placeholder="Nombre de la ciudad">
                <button type="submit">Agregar Ciudad</button>
            </form>
            <div id="mensajeaddcity"></div>
            <button onclick="closePopupAddCiudad()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="delCiudad">
        <div class="popup-content">
            <!-- <form action="../php/delCiudad" method="post"> -->
            <h2>Eliminar Ciudad</h2>
            <input type="text" name="id" placeholder="ID Ciudad">
            <input type="submit" value="Eliminar">
            </form>
            <button onclick="closePopupDelCiudad()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="modCiudad">
        <div class="popup-content">
            <h1>Modificar Ciudad</h1>
            <form id="modificar-ciudad-form">
                <input type="number" name="id_ciudad" placeholder="ID de la ciudad a modificar">
                <input type="text" name="nombre_ciudad" placeholder="Nuevo nombre de la ciudad">
                <button type="submit">Modificar Ciudad</button>
            </form>
            <div id="mensajemodcity"></div>

            <button onclick="closePopupModCiudad()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="addHorario">
        <div class="popup-content">
            <!--<form action="../php/addHorario" method="post"> -->
            <h2>Agregar Horario</h2>
            <input type="text" name="id" placeholder="ID Horario">
            <input type="time" name="horario">
            <input type="submit" value="Agregar">
            </form>
            <button onclick="closePopupAddHorario()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="delHorario">
        <div class="popup-content">
            <!-- <form action="../php/delHorario" method="post" -->
            <h2>Borrar Horario</h2>
            <input type="text" name="id" placeholder="ID Horario">
            <input type="submit" value="Borrar">
            </form>
            <button onclick="closePopupDelHorario()">Cerrar</button>
        </div>
    </div>

    <div class="popupcont" id="modHorario">
        <div class="popup-content">
            <!--<form action="../php/modHorario" method="post"> -->
            <h2>Modificar Horario</h2>
            <input type="text" name="id" placeholder="ID Horario">
            <input type="time" name="horario">
            <input type="submit" value="Modificar">
            </form>
            <button onclick="closePopupModHorario()">Cerrar</button>
        </div>
    </div>
    <footer class="footer">
        <img class="logo-left" src="../img/logo_6.png" alt="Logo Izquierdo">
        <span class="center-text">Pagina creada por M.R.E.F.F Software</span>
        <img class="logo-right" src="../img/VERSION MINIMA 1.png" alt="Logo Derecho">
    </footer>
    <script src="../js/script.js"></script>
    <script src="../js/scriptback.js"></script>
</body>

</html>
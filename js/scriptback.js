
// POPUP USUARIO

function showSearchUser() {
    var busqueda = prompt("Ingrese la cédula o el ID del usuario que desea buscar:");

    if (busqueda !== null && busqueda.trim() !== "") {
        $.ajax({
            type: "POST",
            url: "../src/controlador/user_search.php", // Reemplaza con la URL de tu archivo PHP
            data: { busqueda: busqueda },
            success: function (data) {
                $("#resultado").html(data);
            },
            error: function () {
                $("#resultado").html("Error en la solicitud AJAX.");
            }
        });
    } else {
        $("#resultado").html("Ingrese un valor de búsqueda válido.");
    }
}


function closePopupSearch() { //Mismo aca, cambiar nombre de la funcion y getElementById.
    var popup = document.getElementById("searchu");
    popup.style.display = "none";
}

function showModUser() {
    var popup = document.getElementById("modus");
    popup.style.display = "block";
}
function closePopupMod() {
    var popup = document.getElementById("modus");
    popup.style.display = "none";
}

function showDelUser() {
    var popup = document.getElementById("delus");
    popup.style.display = "block";
}
function closePopupDel() {
    var popup = document.getElementById("delus");
    popup.style.display = "none";
}
function showAddUser() {
    var popup = document.getElementById("addus");
    popup.style.display = "block";
}
function closePopupAdd() {
    var popup = document.getElementById("addus");
    popup.style.display = "none";
}

function showFileSettings() {
    var popup = document.getElementById("filesetting");
    popup.style.display = "block";
}
function closePopupFileSettings() {
    var popup = document.getElementById("filesetting");
    popup.style.display = "none";
}

// POPUP LINEA


function showSearchLine() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("searchline");
    popup.style.display = "block";
}
function closePopupSearchLine() {
    let popup = document.getElementById("searchline");
    popup.style.display = "none";
}
function showAddLine() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("addLine");
    popup.style.display = "block";
}
function closePopupAddLine() {
    let popup = document.getElementById("addLine");
    popup.style.display = "none";
}
function showDelLine() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("delLine");
    popup.style.display = "block";
}
function closePopupDelLine() {
    let popup = document.getElementById("delLine");
    popup.style.display = "none";
}
function showModLine() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("modLine");
    popup.style.display = "block";
}
function closePopupModLine() {
    let popup = document.getElementById("modLine");
    popup.style.display = "none";
}

//POPUP BUS

function showSearchBus() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("searchBus");
    popup.style.display = "block";
}
function closePopupSearchBus() {
    let popup = document.getElementById("searchBus");
    popup.style.display = "none";
}

function showAddBus() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("addBus");
    popup.style.display = "block";
}
function closePopupAddBus() {
    let popup = document.getElementById("addBus");
    popup.style.display = "none";
}
function showDelBus() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("delBus");
    popup.style.display = "block";
}
function closePopupDelBus() {
    let popup = document.getElementById("delBus");
    popup.style.display = "none";
}
function showModBus() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("modBus");
    popup.style.display = "block";
}

function closePopupModBus() {
    let popup = document.getElementById("modBus");
    popup.style.display = "none";
}

//POPUP PARADA

function showSearchParada() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("searchParada");
    popup.style.display = "block";
}
function closePopupSearchParada() {
    let popup = document.getElementById("searchParada");
    popup.style.display = "none";
}
function showAddParada() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("addParada");
    popup.style.display = "block";
}
function closePopupAddParada() {
    let popup = document.getElementById("addParada");
    popup.style.display = "none";
}
function showDelParada() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("delParada");
    popup.style.display = "block";
}
function closePopupDelParada() {
    let popup = document.getElementById("delParada");
    popup.style.display = "none";
}
function showModParada() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("modParada");
    popup.style.display = "block";
}

function closePopupModParada() {
    let popup = document.getElementById("modParada");
    popup.style.display = "none";
}

//POPUP TARIFA

function showSearchTarifa() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("searchTarifa");
    popup.style.display = "block";
}
function closePopupSearchTarifa() {
    let popup = document.getElementById("searchTarifa");
    popup.style.display = "none";
}
function showAddTarifa() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("addTarifa");
    popup.style.display = "block";
}
function closePopupAddTarifa() {
    let popup = document.getElementById("addTarifa");
    popup.style.display = "none";
}
function showDelTarifa() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("delTarifa");
    popup.style.display = "block";
}
function closePopupDelTarifa() {
    let popup = document.getElementById("delTarifa");
    popup.style.display = "none";
}
function showModTarifa() { //Para crear otro popup, crear una funcion nueva, cambiandole el nombre y el getElementById
    let popup = document.getElementById("modTarifa");
    popup.style.display = "block";
}
function closePopupModTarifa() {
    let popup = document.getElementById("modTarifa");
    popup.style.display = "none";
}

//POPUP CIUDAD

function showSearchCiudad() {
    let popup = document.getElementById("searchCiudad");
    popup.style.display = "block";
}
function closePopupSearchCiudad() {
    let popup = document.getElementById("searchCiudad");
    popup.style.display = "none";
}
function showAddCiudad() {
    let popup = document.getElementById("addCiudad");
    popup.style.display = "block";
}
function closePopupAddCiudad() {
    let popup = document.getElementById("addCiudad");
    popup.style.display = "none";
}
function showDelCiudad() {
    let popup = document.getElementById("delCiudad");
    popup.style.display = "block";
}
function closePopupDelCiudad() {
    let popup = document.getElementById("delCiudad");
    popup.style.display = "none";
}
function showModCiudad() {
    let popup = document.getElementById("modCiudad");
    popup.style.display = "block";
}
function closePopupModCiudad() {
    let popup = document.getElementById("modCiudad");
    popup.style.display = "none";
}

//POPUP HORARIO

function showAddHorario() {
    let popup = document.getElementById("addHorario");
    popup.style.display = "block";
}
function closePopupAddHorario() {
    let popup = document.getElementById("addHorario");
    popup.style.display = "none";
}
function showDelHorario() {
    let popup = document.getElementById("delHorario");
    popup.style.display = "block";
}
function closePopupDelHorario() {
    let popup = document.getElementById("delHorario");
    popup.style.display = "none";
}
function showModHorario() {
    let popup = document.getElementById("modHorario");
    popup.style.display = "block";
}
function closePopupModHorario() {
    let popup = document.getElementById("modHorario");
    popup.style.display = "none";
}


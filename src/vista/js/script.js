function toggleMenu() {
    var menuItems = document.getElementById("menuItems");
    menuItems.classList.toggle("menu-open");
}

window.addEventListener("click", function (event) {
    var menuIcon = document.querySelector(".menu-icon");
    if (!menuIcon.contains(event.target)) {
        var menuItems = document.getElementById("menuItems");
        menuItems.classList.remove("menu-open");
    }
});

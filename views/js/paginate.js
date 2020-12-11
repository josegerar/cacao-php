/* global serverURL */

function paginacion(pagina, atributos) {
    atributos && $("#content-main").load(serverURL + "ajax/views.php", {'view': pagina, 'data': atributos});
    !atributos && $("#content-main").load(serverURL + "ajax/views.php", {'view': pagina});
}

$(document).on("click", ".registro-caso-estudio", function (event) {
    paginacion("caso_estudio");
    document.title = "Almacenar casos de estudio";
});

$(document).on("click", ".lista-casos-estudio", function (event) {
    paginacion("casos_estudio");
    document.title = "Lista de casos de estudio";
});

$(document).on("click", ".home-dashboard", function (event) {
    paginacion("home");
    document.title = "Siembra de cacao";
});

$(document).on("click", ".login-cacao", function (event) {
    paginacion("login");
    document.title = "Login";
});


/* global serverURL */

function paginacion(pagina, atributos) {
    const contentDiv = document.getElementById("content-main");
//console.log(contentDiv);
    //atributos & $("#content-main").load(serverURL + "ajax/views.php", {'view': 'caso_estudio', 'data': atributos});
    //$( "#content-main" ).load(serverURL +  "prueba.html" );
    $("#content-main").load(serverURL + "ajax/views.php", {'view': 'caso_estudio'}, function (response, status, xhr) {
        if (status == "error") {
            var msg = "Sorry but there was an error: ";
            //$("#error").html(msg + xhr.status + " " + xhr.statusText);
            console.log("error");
        }
        //console.log("error");
    });
    //console.log(serverURL + "ajax/views.php");
}

function get_view_caso_estudio(element, event) {
    paginacion("caso_estudio");
    document.title = "Almacenar casos de estudio";
}

$(document).on("click", ".registro-caso-estudio", function (event) {
    get_view_caso_estudio(this, event);
});


$(document).ready(function () {
    cargador();
});

$('#busqueda').keyup(function (e) {
    e.preventDefault();
    busca();
});

$('.bus').submit(function (e) { 
    e.preventDefault();
    busca();
});


function cargador(){
    $.ajax({
        type: "GET",
        url: "../recursos/php/componentes/empresas.php",
        success: function (response) {
            $('.emprecitas').empty();
            $('.emprecitas').append(response);
        }
    });
}
function busca(){
    var valor = $('#busqueda').val();
    if(valor.length > 2){
        $.ajax({
            type: "POST",
            url: "../recursos/php/componentes/empresas.php",
            data: {valor},
            success: function (response) {
                $('.emprecitas').empty();
                $('.emprecitas').append(response);
            }
        });
    }else{
        cargador();
    }
}
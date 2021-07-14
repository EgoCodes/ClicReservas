$(document).ready(function () {
    x();

    $.ajax({
        type: "GET",
        url: "../recursos/php/componentes/ventas.php",
        success: function (response) {
            $('#vents').append(response);
        }
    });
    $.ajax({
        type: "GET",
        url: "../recursos/php/componentes/horas.php",
        success: function (response) {
            $('#hor').append(response);
        }
    });
    d();
});


$(document).on('click', '#minVen', function () {
    var resta = parseInt($('#informacion').val())
    $.ajax({
        type: "post",
        url: "../recursos/php/verificaciones/quitarVen.php",
        data: {resta},
        success: function (response) {
            if(response.length > 5){
                $("#ulMen").empty();
                $("#ulMen").append(response);
            }else{
                x();
            }
        }
    });
});

$(document).on('click', '#maxVen', function () {
    var d = $('#informacion').val()
    var suma = parseInt(d) + 1;
    if(suma > 15){
        suma = suma - 1;
        $("#ulMen").empty();
        $("#ulMen").append('No puede agregar mas de 15 ventanillas/oficinas');
    }else{
        console.log(suma)
        $.ajax({
            type: "post",
            url: "../recursos/php/verificaciones/agregarVen.php",
            data: {suma},
            success: function (response) {
                x();
            }
        });
    }
   
});

$(document).on('click', '#btnE', function () {
    var d = $(this).attr('idVen');
    var h = $(this).attr('idHor');
    console.log(h)
    $.ajax({
        type: "POST",
        data: { d },
        url: "../recursos/php/componentes/vents.php",
        success: function (response) {
            $('#vent').append(response);
        }
    });

    $.ajax({
        type: "POST",
        data: { h },
        url: "../recursos/php/componentes/hors.php",
        success: function (response) {
            $('.editarForm #hor').append(response);
        }
    });

    $('#price').val($(this).attr('price'));
    $('#ids').val($(this).attr('idEmps'));
});

$(document).on('submit', '.editarForm', function (e) {
    e.preventDefault();
    var pre = valiNum($('#price').val(), '#price');
    if (pre !== null) {
        var id = $('#ids').val();

        var horas = $('#hor').val();
        var ven = $('#vent').val();
        $.ajax({
            type: "POST",
            url: "../recursos/php/verificaciones/tur.php",
            data: { horas, ven, pre },
            success: function (response) {
                if (response == 1) {
                    $('.msgg').empty();
                    $('.msgg').append('<p style="color: red; font-weithg: 300; font-size: 15px;">Ya se encuantra registrado este turno</p>');
                } else {
                    $('.msgg').empty();
                    $.ajax({
                        type: "POST",
                        url: "../recursos/php/verificaciones/turs.php",
                        data: { pre, horas, ven, id },
                        success: function () {
                            d();
                            $('#btn-cierreE').click();
                        }
                    });
                }
            }
        });
    }

});

$(document).on('click', '#btnD', function () {
    $('#btnDel').attr('info', $(this).attr('idEmps'));

});

$(document).on('click', '#btnDel', function (e,) {
    e.preventDefault();
    var ida = $(this).attr('info');
    $.ajax({
        type: "POST",
        url: "../recursos/php/verificaciones/delTur.php",
        data: { ida },
        success: function () {
            d();
            x();
            $('#btn-cierre').click();
        }
    });
});

$(document).on('submit', '.crearForm', function (e) {
    e.preventDefault();
    var price = valiNum($('#price').val(), '#price');
    if (price !== null) {
        var hour = $('#hor').val();
        var win = $('#vents').val();
        console.log(price+hour+win)
        $.ajax({
            type: "POST",
            url: "../recursos/php/verificaciones/crearTur.php",
            data: { price, hour, win },
            success: function (res) {
                alert(res)
                if (res == 1) {
                    $('.msg').empty();
                    $('#price').val(0);
                    $('#hor').val(0);
                    $('#vents').val(0);
                    d();
                    $('#btn-cierreE').click();
                } else {
                    $('.msg').empty();
                    $('.msg').append('<p style="color: red; font-weithg: 300; font-size: 15px;">Ya se encuantra registrado este turno</p>');
                }
            }
        });

    }


});

function valiNum(valor, clase) {
    if (valor < 0) {
        $(clase).addClass('is-invalid');
        return null;
    }
    else {
        $(clase).removeClass('is-invalid');
        return valor;
    }
}

function d() {
    $.ajax({
        type: "GET",
        url: "../recursos/php/componentes/tablaTurnos.php",
        success: function (response) {
            $('.tablas').empty();
            $('.tablas').append(response);
        }
    });
}

function x(){
    $.ajax({
        type: "GET",
        url: "../recursos/php/componentes/x.php",
        success: function (response) {
            $('.ventanitas').empty();
            $('.ventanitas').append(response);
        }
    });
}
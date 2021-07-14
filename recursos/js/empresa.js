$(document).ready(function () {
    carga($('.active').attr('aria-controls'));
});

$(document).on('click', 'li a', function(e){
    e.preventDefault();
    var d = elemento(e);
    d = $(d).attr('aria-controls');
    id = '#V'+d;
    $.ajax({
        type: "POST",
        url: "../recursos/php/componentes/turnos.php",
        data: {d},
        success: function (response) {
            $('.turnos').empty();
            $('.turnos').append(response);
        }
    });
});

$(document).on('click', '#pagar', function (e) { 
    e.preventDefault();
    var d = elemento(e);
    d = d.parentElement;
    var ids = $(d).attr('idtur');
    var std = $(d).attr('sesion');
    $.ajax({
        type: "POST",
        url: "../recursos/php/componentes/modal.php",
        data: {ids, std},
        success: function (response) {
            $('.modal-body').empty();
            $('.modal-body').append(response);
        }
    });
    
});

$(document).on('click', '#final', function (e) {
    var d = elemento(e);
    d = d.parentElement;
    var ids = $(d).attr('idtur');
    var std = 3;
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "../recursos/php/componentes/modal.php",
        data: {ids, std},
        success: function (response) {
            carga(response);
            $('#btn-cierre').click();
        }
    });
});

$(document).on('submit', '.formulariol', function (e) { 
    e.preventDefault();
    var usuario = $.trim($('#usuario_L').val());
    var clave = $.trim($('#clave_L').val());
    $.ajax({
        type: "POST",
        url: "../recursos/php/verificaciones/login.php",
        data: {usuario, clave},
        success: function (response) {
            if(response == 1){
                location.reload();
            }else{
                $('#ss').empty();
                $('#ss').append('<span class="mns">Revise si la información es correcta.</span>');
            }
        }
    });
});

function veriUsu (users, clase){
    if(users !== null && users.length > 5){
        $.ajax({
            type: "POST",
            url: "../../recursos/php/verificaciones/user.php",
            data: {users},
            success: function (res) {
                if(res == 1){
                    $(clase).addClass('is-invalid');
                    $('.msggs').empty();
                    $('.msggs').append('<label style="font-weight: 300; font-size: 15px; color: red;">Ya se encuentra un usuario registrado como '+users+' </label>');
                }else{
                    $('.msggs').empty();
                    $(clase).removeClass('is-invalid');
                }
            }
        });
    }else{
        $(clase).addClass('is-invalid');
        $('.msggs').empty();
        $('.msggs').append('<label style="font-weight: 300; font-size: 15px; color: red;">El nombre de usuario debe tener mínimo 6 caracteres </label>');
    }
    return users;
}

function veriPass (pass, clase){
    if(pass !== null && pass.length > 7){
        $(clase).removeClass('is-invalid');
        return pass;
    }else{
        $(clase).addClass('is-invalid');
        $('.msgg').empty();
        $('.msgg').append('<label style="font-weight: 300; font-size: 15px; color: red;">La contraseña debe de tener mínimo 8 caracteres</label>');
        return null;
    }
    
}

function elemento(e){
    if (e.srcElement)
        tag = e.srcElement;
    else if (e.target)
          tag = e.target;
    
    return tag;
}
function carga(d){
    $.ajax({
        type: "POST",
        url: "../recursos/php/componentes/turnos.php",
        data: {d},
        success: function (response) {
            $('.turnos').empty();
            $('.turnos').append(response);
        }
    });
}
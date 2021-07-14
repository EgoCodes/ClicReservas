$(document).ready(function () {
    var op = 0;
    $.ajax({
        type: "POST",
        url: "../../recursos/php/componentes/perfilCargador.php",
        data: {op},
        success: function (response) {
            $('.perfil').append(response);
        }
    });
    op = op + 1;
    $.ajax({
        type: "POST",
        url: "../../recursos/php/componentes/perfilCargador.php",
        data: {op},
        success: function (response) {
            $('.p2').append(response);
        }
    });
    op = op + 1;
    $.ajax({
        type: "POST",
        url: "../../recursos/php/componentes/perfilCargador.php",
        data: {op},
        success: function (response) {
            if(response.length === 0){
                $('.reserv').append('<li class="list-group-item"> No se han realizado compras</li>');
            }else{
                $('.reserv').append(response);
                
            }
        }
    });

    var forms = $('#formularioImg');
    forms.bind('submit', function(){
        var fdata = new FormData;
        fdata.append('img', $('input[name=img]')[0].files[0]);
        $.ajax({
            url: forms.attr('action'),
            type: forms.attr('method'),
            data: fdata,
            processData: false,
            contentType: false,
            cache: false,
            success: function (response) {
                if(response == 1){
                    $('.ms').empty();
                    $('.ms').append('<p>* La imagen debe ser cuadrada</p>');
                }else{
                    window.location.reload();
                }
            }
        });
        return false;
    });

});

$('.contraForm').submit(function (e) { 
    e.preventDefault();
    var vieja = $.trim($('#passV').val());
    var nueva = $.trim($('#passN').val());
    var conNueva = $.trim($('#passC').val());
    var opcion = 1;
    if(vieja.length > 7 && nueva.length > 7 && conNueva.length > 7 && nueva == conNueva){
        $('#mensaje').empty();
        $('#passN').removeClass('is-invalid');
        $('#passV').removeClass('is-invalid');
        $('#passC').removeClass('is-invalid');
        $.ajax({
            type: "POST",
            url: "../../recursos/php/verificaciones/password.php",
            data: {opcion, vieja},
            success: function (response) {
                if(response == 1){
                    opcion = 2;
                    $.ajax({
                        type: "POST",
                        url: "../../recursos/php/verificaciones/password.php",
                        data: {opcion, nueva},
                        success: function () {
                            $('#passN').val('');
                            $('#passV').val('');
                            $('#passC').val('');
                            $('#btn-cierre').click();
                        }
                    });
                }else{
                    $('#mensaje').empty();
                    $('#mensaje').append('<p class="texto">Revise su contraseña</p>');
                    $('#passV').addClass('is-invalid');
                }
            }
        });
        
    }else if(nueva !== conNueva){
        $('#mensaje').empty();
        $('#mensaje').append('<p class="texto">Deben de ser identicas.</p>');
        $('#passN').addClass('is-invalid');
        $('#passC').addClass('is-invalid');
    }else{
        $('#passN').addClass('is-invalid');
        $('#passC').addClass('is-invalid');
        $('#passV').addClass('is-invalid');
        $('#mensaje').empty();
        $('#mensaje').append('<p class="texto">Recuerde que la contraseña debe contener mínimo 8 caracteres</p>');
    }
});

$('.userForm').submit(function (e) { 
    e.preventDefault();
    var nUser = $.trim($('#userN').val());
    var users = $.trim($('#userV').val());
    if(nUser.length > 5 && nUser != users){
        $.ajax({
            type: "POST",
            url: "../../recursos/php/verificaciones/user.php",
            data: {users},
            success: function (res) {
                if(res == 1){
                    $('#userN').removeClass('is-invalid');
                    $('#mensaj').empty();
                    $.ajax({
                        type: "POST",
                        url: "../../recursos/php/verificaciones/upUser.php",
                        data: {nUser, users},
                        success: function (res) {
                            if(res == 1){
                                $('#mensaj').empty();
                                $('#userN').addClass('is-invalid');
                                $('#mensaj').append('<label style="font-weight: 300; font-size: 15px; color: red;">El nombre de usuario ya se encuentra registrado </label>');
                            }else{
                                location.reload();
                            }
                        }
                    });
                }
            }
        });
    }else{
        $('#userN').addClass('is-invalid');
        $('#mensaj').empty();
        $('#mensaj').append('<label style="font-weight: 300; font-size: 15px; color: red;">El nombre de usuario debe tener mínimo 6 caracteres y ser diferente al usuario actual </label>');
    }
});

$(document).on('click', '#nom', function (e) {
    e.preventDefault();
    var d = elemento(e);
    d = d.parentElement.parentElement.parentElement.childNodes[3].firstChild.data;
    $('#name').val(d);
});

$(document).on('click', '#ccs', function (e) {
    e.preventDefault();
    var d = elemento(e);
    d = d.parentElement.parentElement.parentElement.childNodes[3].firstChild.data
    $('#dni').val(d);
});

$(document).on('click', '#dir', function (e) {
    e.preventDefault();
    var d = elemento(e);
    d = d.parentElement.parentElement.parentElement.childNodes[3].firstChild.data;
    var info = d.split('#');
    var carrera = info[0];
    var nums = info[1].split('-');
    var n1 = nums[0];
    var n2 = nums[1];
    $('#kra').val(carrera);
    $('#numero').val(n1);
    $('#numero2').val(n2);
});

$(document).on('click', '#sel', function (e) {
    $.ajax({
        type: "GET",
        url: "../../recursos/php/componentes/barrios.php",
        success: function (response) {
            $('#barrios').append(response);
        }
    });
});

$(document).on('click', '#mob', function (e) {
    e.preventDefault();
    var d = elemento(e);
    d = d.parentElement.parentElement.parentElement.childNodes[3].firstChild.data;
    $('#tel').val(d);
});

$(document).on('click', '#cor', function (e) {
    e.preventDefault();
    var d = elemento(e);
    d = d.parentElement.parentElement.parentElement.childNodes[3].firstChild.data;
    $('#mail').val(d);
});

function veriName (numero, clase){
    if(numero.length > 6){
        $('.mN').empty();
        $(clase).removeClass('is-invalid');
        return numero;
    }else{
        $('.mN').append('<p style="color:red; font-size:15px;">El numero de identificación debe de tener mínimo 7 caracteres</p>');
        $(clase).addClass('is-invalid');
        return null;
    }
}

function veriDni(numero, clase){
    if(numero > 0 && numero.length > 7){
        $('.mC').empty();
        $(clase).removeClass('is-invalid');
        return numero;
    }else{
        $('.mC').append('<p style="color:red; font-size:15px;">El nombre debe de tener mínimo 7 caracteres</p>');
        $(clase).addClass('is-invalid');    
        return null;
    }
}

function veriMobile (numero, clase){
    if(numero > 0 && numero.length > 6){
        $(clase).removeClass('is-invalid');
        return numero;
    }else{
        $(clase).addClass('is-invalid');
        return null;
    }
}

function veriMail (mail, clase){
    if(mail !== null){
        $.ajax({
            type: "POST",
            url: "../recursos/php/verificaciones/mail.php",
            data: {mail},
            success: function (res) {
                if(res == 1){
                    $(clase).addClass('is-invalid');
                    $('.msggc').empty();
                    $('.msggc').append('<label style="font-weight: 300; font-size: 15px; color: red;">Ya se encuentra un usuario registrado con '+mail+' </label>');
                }else{
                    $('.msggc').empty();
                    $(clase).removeClass('is-invalid');
                }
            }
        });
    }else{
        $(clase).addClass('is-invalid');
        $('.msggc').empty();
        $('.msggc').append('<label style="font-weight: 300; font-size: 15px; color: red;">El nombre de usuario debe tener mínimo 6 caracteres </label>');
    }
    return mail;
}

function veriAddress1 (n1, clase){
    if(n1 !== null && n1 > 0){
        $(clase).removeClass('is-invalid');
        return n1;
    }else{
        $(clase).addClass('is-invalid');
        return null;
    }
}

function veriAddress2 (n2, clase){
    if(n2 !== null &&  n2 > 0){
        $(clase).removeClass('is-invalid');
        return n2;
    }else{
        $(clase).addClass('is-invalid');
        return null;
    }
}

function veriBarrio (barrio, te, clase){
    if(barrio != 0 && barrio != te){
        $(clase).removeClass('is-invalid');
        $('.mB').empty();
        return barrio;
    }else{
        $('.mB').empty();
        $('.mB').append('<p style="color:red; font-size:15px;">Seleccione un barrio</p>');
        $(clase).addClass('is-invalid');
        return null;
    }
}

$(document).on('submit' ,'.formN', function (e) {
    e.preventDefault();
    var opcion = 1;
    var uNombre = veriName($.trim($('#name').val()), '#name');
    if(uNombre != null ){
        $.ajax({
            type: "POST",
            url: "../../recursos/php/componentes/perfilUp.php",
            data: {uNombre, opcion},
            success: function (response) {
                location.reload();
            }
        });
    }
});

$(document).on('submit' ,'.formC', function (e) {
    e.preventDefault();
    var opcion = 2;
    var uCc = veriDni($.trim($('#dni').val()), '#dni');
    if(uCc != null){
        $.ajax({
            type: "POST",
            url: "../../recursos/php/componentes/perfilUp.php",
            data: {uCc, opcion},
            success: function (response) {
                location.reload();
            }
        });
    }
});

$(document).on('submit' ,'.formA', function (e) {
    e.preventDefault();
    var opcion = 3;
    var uDirecc = $.trim($('#kra').val())+" # "+veriAddress1($.trim($('#numero').val()),'#numero')+" - "+veriAddress2($.trim($('#numero2').val()), '#numero2');
    if(uDirecc != null){
        $.ajax({
            type: "POST",
            url: "../../recursos/php/componentes/perfilUp.php",
            data: {uDirecc, opcion},
            success: function (response) {
                location.reload();
            }
        });
    }
});

$(document).on('submit' ,'.formB', function (e) {
    e.preventDefault();
    var opcion = 6;
    var uIdBar = veriBarrio($.trim($('#barrios').val()), '#barrios');
    if(uIdBar != null){
        $.ajax({
            type: "POST",
            url: "../../recursos/php/componentes/perfilUp.php",
            data: {uIdBar, opcion},
            success: function (response) {
                location.reload();
            }
        });
    }
});

$(document).on('submit' ,'.formTe', function (e) {
    e.preventDefault();
    var opcion = 4;
    var uTele = veriMobile($.trim($('#tel').val()), '#tel');
    if(uTele != null){
        $.ajax({
            type: "POST",
            url: "../../recursos/php/componentes/perfilUp.php",
            data: {uTele, opcion},
            success: function (response) {
                location.reload();
            }
        });
    }
});

$(document).on('submit' ,'.formCorr', function (e) {
    e.preventDefault();
    var opcion = 5;
    var uCorreo = veriMail($.trim($('#mail').val()), '#mail');
    if(uCorreo != null){
        $.ajax({
            type: "POST",
            url: "../../recursos/php/componentes/perfilUp.php",
            data: {uCorreo, opcion},
            success: function (response) {
                location.reload();
            }
        });
    }
});

function elemento(e){
    if (e.srcElement)
        tag = e.srcElement;
    else if (e.target)
          tag = e.target;
    
    return tag;
}
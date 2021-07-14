$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "../recursos/php/componentes/barrios.php",
        success: function (response) {
            $('#barrios').append(response);
        }
    });
});

$('.formulariol').submit(function (e) { 
    e.preventDefault();
    var usuario = $.trim($('#usuario_L').val());
    var clave = $.trim($('#clave_L').val());
    $.ajax({
        type: "POST",
        url: "../recursos/php/verificaciones/loginEmp.php",
        data: {usuario, clave},
        success: function (response) {
            if(response == 1){
                    window.location="../emp/turnos";
            }else{
                $('#ss').empty();
                $('#ss').append('<span class="mns">Revise si la información es correcta.</span>');
            }
            
        }
    });
});

function veriDni(numero, clase){
    if(numero > 0 && numero.length > 7){
        $(clase).removeClass('is-invalid');
        return numero;
    }else{
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

function veriUsu (users, clase){
    if(users !== null && users.length > 5){
        $.ajax({
            type: "POST",
            url: "../recursos/php/verificaciones/userEmp.php",
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

function veriMail (mail, clase){
    if(mail !== null){
        $.ajax({
            type: "POST",
            url: "../recursos/php/verificaciones/mailEmp.php",
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

function veriBarrio (barrio, clase){
    if(barrio != 0){
        $(clase).removeClass('is-invalid');
        return barrio;
    }else{
        $(clase).addClass('is-invalid');
        return null;
    }
}


$('.formularior').submit(function (e) { 
    e.preventDefault();
    var nombre = $.trim($('#name').val());
    var dni = veriDni($.trim($('#dni').val()), '#dni');
    var direccion = $.trim($('#kra').val())+" # "+veriAddress1($.trim($('#numero').val()),'#numero')+" - "+veriAddress2($.trim($('#numero2').val()), '#numero2');
    var barrio = veriBarrio($.trim($('#barrios').val()), '#barrios');
    var mobile = veriMobile($.trim($('#tel').val()), '#tel');
    var correo = veriMail($.trim($('#mail').val()), '#mail');
    var usuario = veriUsu($.trim($('#user').val()), '#user');
    var clave = veriPass($.trim($('#pass').val()), '#pass');

    if(nombre != null && dni != null && direccion != null && barrio != null && mobile != null && correo != null && usuario != null && clave != null){
        // alert(nombre+"   "+dni+"   "+direccion+"   "+barrio+"   "+mobile+"   "+correo+"   "+usuario+"   "+clave)
        $.ajax({
            type: "POST",
            url: "../recursos/php/verificaciones/registroEmp.php",
            data: {nombre, dni, direccion, barrio, mobile, correo, usuario, clave},
            success: function (response) {
                if(response == 1){
                    window.location="../emp/perfil";
                }else{
                    console.log(response)
                }
            }
        });
    }
});

$('.olvidadiso').submit(function (e) { 
    e.preventDefault();
    var correo = $.trim($('#correo_r').val());
    $.ajax({
        type: "POST",
        url: "../recursos/php/verificaciones/olvideEmp.php",
        data: {correo},
        success: function (response) {
            if(response == 0){
                $('#sms').empty();
                $('#sms').append('<span class="mns">Esta dirección de correo no se encuentra registrada en ClicReservas</span>');
                // console.log(response)
            }else{
                $('#sms').empty();
                $('#sms').append('<span class="mns">Te enviamos un correo de recuperación.</span>');
                // console.log(response)
            }
            
        }
    });
});
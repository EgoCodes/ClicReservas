$(document).ready(function () {
    
    $.ajax({
        type: "GET",
        url: "../recursos/php/verificaciones/inforusuario.php",
        success: function (response) {
            var json = JSON.parse(response);
            $('#name').val(json['Nombre']);
            $('#dni').val(json['Nit']);
            var b = json['Barrio'];
            var temp = json['Address'].split("#");
            var kra = temp[0];
            temp = temp[1].split('-');
            var n1 = temp[0];
            var n2 = temp[1];
            $('#kra').val(kra);
            $('#numero').val(n1);
            $('#numero2').val(n2);
            $.ajax({
                type: "post",
                data: {b},
                url: "../recursos/php/componentes/barriosE.php",
                success: function (re) {
                    $('#barrios').append(re);
                }
            });
            $('#tel').val(json['Telefono']);
            $('#mail').val(json['Correo']);
        }
    });

    var ops = 1;
    $.ajax({
        type: "post",
        url: "../recursos/php/verificaciones/perfilEmpUp.php",
        data: {ops},
        success: function (response) {
            var json = JSON.parse(response);
            var i = 'https://via.placeholder.com/2560x1440/454545/FFFFFF?text='+json['img'];
            $('.card-img-top').attr('src', i);
            $('#imgNomd').val(json['img'])
            $('#descripBreve').val(json['descrip'])
            $('.card-text').empty();
            $('.card-text').append(json['descrip']);
        }
    });
    ops = 2;
    $.ajax({
        type: "post",
        url: "../recursos/php/verificaciones/perfilEmpUp.php",
        data: {ops},
        success: function (response) {
            $('#descripLarga').val(response)
        }
    });
});

$('#descripBreve').keyup(function (e) { 
    e.preventDefault();
    var s = descp($('#descripBreve').val(), '#descripBreve');
    $('.card-text').empty();
    $('.card-text').append($('#descripBreve').val());
});

$('#imgNomd').keyup(function (e) { 
    e.preventDefault();
    var s = caracter($('#imgNomd').val(), '#imgNomd');
    $('.card-img-top').empty();
    var img = 'https://via.placeholder.com/2560x1440/454545/FFFFFF?text='+$('#imgNomd').val();
    $('.card-img-top').attr('src', img);
});

$('.tarjetaForm').submit(function (e) { 
    $('.mensaj').empty();
    e.preventDefault();
    var i = caracter($('#imgNomd').val(), '#imgNomd');
    var d = descp($('#descripBreve').val(), '#descripBreve');
    if(i !== null && d !== null){
        $.ajax({
            type: "post",
            url: "../recursos/php/verificaciones/vistaEmp.php",
            data: {i, d},
            success: function (response) {
                $('.mensaj').empty();
                $('.mensaj').append('<span style="color:green; font-weight:300; font-size:15px;">Guardadito c:</span><br>');
            }
        });
    }
});

$('.desForm').submit(function (e) { 
    $('.mensajs').empty();
    e.preventDefault();
    var d = $('#descripLarga').val()
    ops = 3;
    if(d !== null){
        $.ajax({
            type: "post",
            url: "../recursos/php/verificaciones/perfilEmpUp.php",
            data: {ops, d},
            success: function (response) {
                $('.mensajs').empty();
                $('.mensajs').append('<span style="color:green; font-weight:300; font-size:15px;">Guardadito c:</span><br>');
            }
        });
    }
});

$('.usuariosForm').submit(function (e) { 
    e.preventDefault();
    $('.mensajss').empty();
    var user = veriUsu($.trim($('#user').val()), '#user');
    var de =  $('.mensajss').attr('ver');
    
    ops = 4;
    $.ajax({
        type: "post",
        url: "../recursos/php/verificaciones/perfilEmpUp.php",
        data: {ops, user},
        success: function (sd) {
            if(de == 0){
                window.location.reload();
            }
        }
    })
});

$('.passForm').submit(function (e) { 
    e.preventDefault();
    $('.mensajP').empty();
    var clave = veriPass($.trim($('#pass').val()), '#pass', $.trim($('#passc').val()), '#passc');
    if(clave != null){
        ops = 5;
        $.ajax({
            type: "post",
            url: "../recursos/php/verificaciones/perfilEmpUp.php",
            data: {ops, clave},
            success: function (response) {
                $('.mensajP').empty();
                $('.mensajP').append('<span style="color:green; font-weight:300; font-size:15px;">Guardadito c:</span><br>');
            }
        });
    }
});

$('.editarInfoForm').submit(function (e) { 
    e.preventDefault();
    var nombre = $.trim($('#name').val());
    var dni = veriDni($.trim($('#dni').val()), '#dni');
    var direccion = $.trim($('#kra').val())+" # "+veriAddress1($.trim($('#numero').val()),'#numero')+" - "+veriAddress2($.trim($('#numero2').val()), '#numero2');
    var barrio = $.trim($('#barrios').val());
    var mobile = veriMobile($.trim($('#tel').val()), '#tel');
    if(nombre != null && dni != null && direccion != null && mobile != null){
        ops = 6;
        $.ajax({
            type: "post",
            url: "../recursos/php/verificaciones/perfilEmpUp.php",
            data: {ops, nombre, dni, direccion, barrio, mobile},
            success: function (sd) {
                if(sd=='ok'){
                    window.location.reload();
                }
            }
        })
    }
});

$('.correoInfoForm').submit(function (e) { 
    e.preventDefault();
    var correo = veriMail($.trim($('#mail').val()), '#mail');
    if(correo != null){
        ops = 7;
        $.ajax({
            type: "post",
            url: "../recursos/php/verificaciones/perfilEmpUp.php",
            data: {ops, correo},
            success: function (sd) {
                if(sd == 'ok'){
                    window.location.reload();
                }
            }
        })
    }
});

function caracter(nom, clase){
    if(nom.length > 20){
        $(clase).addClass('is-invalid');
        $('.mensaje').empty();
        $('.mensaje').append('<span style="color:red; font-weight:300; font-size:15px;">El nombre que tomará como imagen debe de tener maximo 20 caractereas.</span><br>');
        return null;
    }else{
        $(clase).removeClass('is-invalid');
        $('.mensaje').empty();
        return nom;
    }
}

function descp(nom, clase){
    if(nom.length > 155){
        $(clase).addClass('is-invalid');
        $('.mensaj').empty();
        $('.mensaj').append('<span style="color:red; font-weight:300; font-size:15px;">Has excedido el número maximo de caracteres permitidos.</span><br>');
        return null;
    }else{
        $('.mensaje').empty();
        $(clase).removeClass('is-invalid');
        return nom;
    }
}

function veriPass (pass, clase, pass2, clase2){
    if(pass !== null && pass.length > 7 && pass == pass2 && pass2.length > 7){
        $(clase).removeClass('is-invalid');
        $(clase2).removeClass('is-invalid');
        return pass;
    }else{
        $(clase).addClass('is-invalid');
        $(clase2).addClass('is-invalid');
        $('.mensajP').empty();
        $('.mensajP').append('<span style="font-weight: 300; font-size: 15px; color: red;">La contraseña deben de tener mínimo 8 caracteres y ser iguales</span>');
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
                    $('.mensajss').attr('ver', '1');
                    $('.mensajss').empty();
                    $('.mensajss').append('<span style="font-weight: 300; font-size: 15px; color: red;">Ya se encuentra un usuario registrado como '+users+' </span>');
                }else{
                    $('.mensajss').attr('ver', '0');
                    $('.mensajss').empty();
                    $(clase).removeClass('is-invalid');
                }
            }
        });
    }else{
        $(clase).addClass('is-invalid');
        $('.mensajss').attr('ver', '1');
        $('.mensajss').empty();
        $('.mensajss').append('<span style="font-weight: 300; font-size: 15px; color: red;">El nombre de usuario debe tener mínimo 6 caracteres </span>');
    }
    return users;
}

function veriDni(numero, clase){
    if(numero > 0 && numero.length > 6){
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
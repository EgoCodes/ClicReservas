$('#contactos').submit(function (e) { 
    e.preventDefault();
    var nombre = $.trim($('#nombre').val());
    var asunto = $.trim($('#asunto').val());
    var correo = $.trim($('#correo').val());
    var veri = 1;
    // console.log(nombre+" "+asunto+" "+correo);
    $.ajax({
        type: "POST",
        url: "recursos/php/contactos.php",
        data: {nombre, asunto, correo},
        success: function (response) {
            $('#contactos')[0].reset();
        }
    });
});

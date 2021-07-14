<?php
    session_start();
    
    if(isset($_SESSION['usuario'])){
        header('Location: ../perfil');
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClicReservas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/css/general.css">
    <link rel="stylesheet" href="../../recursos/css/cuenta.css">
</head>

<body>
    <div class="informacion">
        <div class="row">
            <div class="col-12">
                <h1 class="titulo">
                    <a href="../../" class="logo">CLICRESERVAS</a>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="mensaje">Hola, que bueno que hayas vuelto. inicia sesión y vive la experiencia
                    ClicReserva.</p>

                <form  method="post" class="formulariol">
                    <div class="form-row">
                        <div class="col-12 gr">
                            <label for="usuario_L" class="col-sr-2 col-form-label info">Usuario</label>
                            <input type="text" class="form-control texto" id="usuario_L" name="usuario_L" placeholder="pepito_09" required>
                        </div>

                        <div class="col-12 gr">
                            <label for="clave_L" class="col-sr-2 col-form-label info">Contraseña</label>
                            <input type="password" class="form-control texto" id="clave_L" name="clave_L" placeholder="••••••••" required>
                        </div>
                        <div class="col-12 gr" id="ss">

                            </div>
                        <div class="col-12 gr">
                            <button class="btn-olvide" type="button" data-toggle="modal" data-target="#ayuda">Necesito
                                ayuda para iniciar sesión</button>
                        </div>

                        <div class="col-6 gr">
                            <a class="btn-reg" href="../registrar/">Registrarme</a>
                        </div>

                        <div class="col-6 gr log">
                            <input class="btn-general" id="boton_L" type="submit" value="Entrar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ayuda" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="ayudaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label for="btn-cierre" class=" titulito">Servicio de ayuda</label>
                    <button type="button" id="btn-cierre" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="olvidadiso">
                        <div class="form-row">
                            <div class="col-12 gr">
                                <label for="correo_r" class="col-sr-2 col-form-label info">Ingrese el correo con el cual
                                    registró su cuenta y recibirá las instrucciones de recuperación en el mismo</label>
                                <input type="text" class="form-control texto" id="correo_r" name="correo_r" placeholder="ejemplo@mail.com"
                                    required>
                            </div>
                            <div class="col-12 gr" id="sms">

                            </div>
                            <div class="col-12 gr log">
                                <hr>
                                <input class="btn-general" type="submit" value="Enviar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../../recursos/js/jquery-3.4.1.min.js"></script>
    <script src="../../recursos/js/popper.min.js"></script>
    <script src="../../recursos/js/bootstrap.js"></script>
    <script src="../../recursos/js/sesion.js"></script>
</body>
</html>
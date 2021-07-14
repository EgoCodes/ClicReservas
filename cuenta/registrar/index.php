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
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,300;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/css/general.css">
    <link rel="stylesheet" href="../../recursos/css/cuenta.css">
</head>

<body>
    <div class="informacionR">
        <div class="row">
            <div class="col-12">
                <h1 class="titulo">
                    <a href="../../" class="logo">CLICRESERVAS</a>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                    <p class="mensaje">Registrate y vive la experiencia
                    ClicReserva. Esperamos verte muy seguido</p>
                
                <form method="POST" class="formularior">
                    <div class="form-group gr">
                        <label for="name" class="col-sr-2 col-form-label info">Nombre completo</label>
                        <input type="text" class="form-control info" id="name" placeholder="Pepito Perez" required>
                    </div>

                    <div class="form-group gr">
                        <label for="dni" class="col-sr-2 col-form-label info">Número de identificación</label>
                        <input type="text" class="form-control info" id="dni" placeholder="1234567890" required>
                    </div>

                    <div class="form-group gr">
                        <label for="address" class="col-sr-2 col-form-label info">Dirección</label>
                        <div class="form-row gr" id="address">
                            <div class="form-group col-md-6 gr">
                                <input type="text" class="form-control info" id="kra" placeholder="Carrera 15E" required>
                            </div>
                            <div class="form-group col-md-1 gr">
                                <div class="input-group">
                                    <label for="numero" class="adicional info">#</label>
                                </div>
                            </div>
                            <div class="form-group col-md-2 gr">
                                <input type="text" class="form-control info" id="numero" placeholder="5" required>
                            </div>
                            <div class="form-group col-md-1 gr">
                                <div class="input-group">
                                    <label for="numero2" class="adicional info">--</label>
                                </div>
                            </div>
                            <div class="form-group col-md-2 gr">
                                <input type="text" class="form-control info" id="numero2" placeholder="51" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group gr">
                        <label for="barrios" class="col-sr-2 col-form-label info">Barrio</label>
                        <select class="custom-select info" id="barrios" required>
                            <option value="0"selected>Seleccione un barrio</option>
                        </select>
                    </div>

                    <div class="form-group gr">
                        <label for="tel" class="col-sr-2 col-form-label info">Teléfono</label>
                        <input type="text" class="form-control info" id="tel" placeholder="3152014578"  required>
                    </div>

                    <div class="form-group gr">
                        <label for="mail" class="col-sr-2 col-form-label info">Correo</label>
                        <input type="email" class="form-control info" id="mail" placeholder="elputas@mail.com"  required>
                        <div class="form-group gr msggc">
                        
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6 gr">
                            <label for="user" class="col-sr-2 col-form-label info">Usuario</label>
                            <input type="text" class="form-control info" id="user" placeholder="ElPutas09" required>
                        </div>

                        <div class="form-group col-md-6 gr">
                            <label for="pass" class="col-sr-2 col-form-label info">Contraseña</label>
                            <input type="password" class="form-control info" id="pass" placeholder="••••••••" required>
                        </div>
                    </div>
                    <div class="form-group gr msggs">
                        
                    </div>
                    <div class="form-group gr msgg">
                        
                    </div>
                    <div class="form-group ini">
                        <a class="btn-olvide" href="../inicio-sesion/">Ya tengo una cuenta</a>
                    </div>
                    <div class="form-group gr">
                        <input class="btn-general btn-block" type="submit" value="Registrarme">
                    </div>
                </form>
                <br>
            </div>
        </div>


        <script src="../../recursos/js/jquery-3.4.1.min.js"></script>
        <script src="../../recursos/js/popper.min.js"></script>
        <script src="../../recursos/js/bootstrap.js"></script>
        <script src="../../recursos/js/sesion.js"></script>
</body>
</html>
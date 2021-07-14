<?php

session_start();

if (!isset($_SESSION['empresa'])) {
    header('Location: ../emp/');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClicEmpresas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="../recursos/css/generalEmp.css">
    <link rel="stylesheet" href="../recursos/css/emp.css">
    <link rel="stylesheet" href="../recursos/css/perEmp.css">
</head>

<body>
    <div class="soy">
        <div class="container-lg container-md container-sm">
            <div class="row">
                <div class="col-12">
                    <a href="../" class="antehead">Persona natural</a>
                    <a href="../emp/turnos" class="antehead">Empresa</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-lg container-md container-sm">
        <header>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 logito ">
                    <a href="turnos" class="logo">CLICEMPRESAS</a>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-end">
                    <nav class="menuInicio">
                        <a href="turnos" class="btn-menu">TURNOS</a>
                        <?php
                        echo '<a href="perfil" class="ln-cuenta">' . $_SESSION['empresa'] . '</a>&nbsp;<a href="../recursos/php/verificaciones/cerrar.php" ><img class="btn-cerrar" src="../recursos/img/outEmpresa.svg"
                            alt="cerrar"></a>';
                        ?>
                    </nav>
                </div>
            </div>
        </header>
        <main class="contenido">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6 col-xs-12">
                    <h2 style="font-weight: 500; text-transform: uppercase; font-size: 16px;text-align: center;margin-bottom: 12px;">Editor de tarjeta</h2>
                    <form class="tarjetaForm">
                        <div class="form-group">
                            <label class="lblEmp" for="imgNomd">Imagen de la empresa</label>
                            <input type="text" class="form-control" id="imgNomd" required>
                            <small id="imgNomd" class="form-text text-muted">El valor ingresado emulará una imagen</small>
                            <div class="mensaje">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="lblEmp" for="descripBreve">Descripción breve</label>
                            <textarea class="form-control form-control-sm" id="descripBreve" rows="3" required></textarea>
                            <div class="mensaj">

                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn-general" id="guardar" value="Actualizar">
                        </div>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <h3 style="font-weight: 500; text-transform: uppercase; font-size: 16px;text-align: center;margin-bottom: 12px;">Vista previa</h3>
                    <div class="card">
                        <img src="https://via.placeholder.com/2560x1440/454545/FFFFFF?text=" class="card-img-top algo">
                        <div class="card-body">
                            <h2 class="card-title"></h2>
                            <p class="card-text"></p>
                            <a class="btn btn-general btn-md btn-block" href="#">PERFIL</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 style="font-weight: 500; text-transform: uppercase; font-size: 16px;text-align: center;margin-bottom: 12px;">Editor de descripción de la empresa</h4>
                    <form class="desForm">
                        <div class="form-group">
                            <label class="lblEmp" for="descripLarga">Descripción de tu empresa</label>
                            <textarea class="form-control form-control-sm" id="descripLarga" rows="3" required></textarea>
                            <div class="mensajs">

                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn-general" id="guardar" value="Actualizar">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h5 style="font-weight: 500; text-transform: uppercase; font-size: 16px;text-align: center;margin-bottom: 12px; margin-top:20px;">Actualizar de usuario</h5>
                    <form class="usuariosForm">
                        <div class="form-group gr">
                            <label for="user" class="col-sr-2 col-form-label info">Usuario </label>
                            <input type="text" class="form-control info" id="user" placeholder="ElPutas09" value="<?php echo $_SESSION['empresa']; ?>" required>
                        </div>
                        <div class="form-group gr">
                            <button type="submit" class="btn-general btn-block" id="guardar">Actualizar información</button>
                        </div>
                        <div class="form-group gr mensajss">

                        </div>
                    </form>
                    <form class="passForm">
                        <div class="form-row">
                            <div class="form-group col-md-6 gr">
                                <label for="pass" class="col-sr-2 col-form-label info">Contraseña</label>
                                <input type="password" class="form-control info" id="pass" placeholder="••••••••" required>
                            </div>

                            <div class="form-group col-md-6 gr">
                                <label for="passc" class="col-sr-2 col-form-label info">Confirmar contraseña</label>
                                <input type="password" class="form-control info" id="passc" placeholder="••••••••" required>
                            </div>
                        </div>
                        <div class="form-group gr">
                            <button type="submit" class="btn-general btn-block" id="guardar">Actualizar información</button>
                        </div>

                        <div class="col">
                            <div class="mensajP">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h6 style="font-weight: 500; text-transform: uppercase; font-size: 16px;text-align: center;margin-bottom: 12px; margin-top:20px;">Actualizar información de la empresa</h6>
                </div>
                <div class="col-12">
                    <form method="POST" class="editarInfoForm">
                        <div class="form-group gr">
                            <label for="name" class="col-sr-2 col-form-label info">Nombre tu empresa</label>
                            <input type="text" class="form-control info" id="name" placeholder="Carnitas pepe" required>
                        </div>

                        <div class="form-group gr">
                            <label for="dni" class="col-sr-2 col-form-label info">Número de identificación de tu empresa</label>
                            <input type="text" class="form-control info" id="dni" placeholder="1234567890" required>
                        </div>

                        <div class="form-group gr">
                            <label for="address" class="col-sr-2 col-form-label info">Ubicación de tu empresa</label>
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
                            </select>
                        </div>

                        <div class="form-group gr">
                            <label for="tel" class="col-sr-2 col-form-label info">Teléfono</label>
                            <input type="text" class="form-control info" id="tel" placeholder="3152014578" required>
                        </div>


                        <div class="form-group gr msggs">

                        </div>
                        <div class="form-group gr msgg">

                        </div>
                        <div class="form-group gr">
                            <button type="submit" class="btn-general btn-block" id="guardar">Actualizar información</button>
                        </div>
                    </form>
                    <form method="POST" class="correoInfoForm">
                        <div class="form-group gr">
                            <label for="mail" class="col-sr-2 col-form-label info">Correo</label>
                            <input type="email" class="form-control info" id="mail" placeholder="elputas@mail.com" required>
                            <div class="form-group gr msggc" style="color:#454545;">

                            </div>
                        </div>
                        <div class="form-group gr">
                            <button type="submit" class="btn-general btn-block" id="guardar">Actualizar información</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

    </div>
    <script src="../recursos/js/jquery-3.4.1.min.js"></script>
    <script src="../recursos/js/bootstrap.js"></script>
    <script src="../recursos/js/perfilEmp.js"></script>
</body>

</html>
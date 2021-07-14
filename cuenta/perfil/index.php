<?php
require_once '../../recursos/php/conexion.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../inicio-sesion');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
            

            $stmt = $mysqli->prepare("SELECT c.cliNombre FROM perfil_cli pc INNER JOIN cliente c ON c.idPerfilR = pc.idPerfilCli WHERE perUsuario = ?");
            $stmt->bind_param('s', $user);
            $user = $_SESSION['usuario'];
            $stmt->execute();
            $stmt->bind_result($nombre);
            while ($stmt->fetch()) {
                echo $nombre;
            }
            $stmt->close();
            $mysqli->close();
            ?> | ClicReservas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,900;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/css/general.css">
    <link rel="stylesheet" href="../../recursos/css/perfil.css">
</head>

<body>
<div class="soy">
        <div class="container-lg container-md container-sm">
            <div class="row">
                <div class="col-12">
                    <a href="../../" class="antehead">Persona natural</a>
                    <a href="../../emp" class="antehead">Empresa</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-lg container-md container-sm">
        <header>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 logito ">
                    <a href="../../" class="logo">CLICRESERVAS</a>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-end">
                    <nav class="menuInicio">
                        <a href="../../" class="btn-menu">INICIO</a>
                        <a href="../../reservar/" class="btn-menu">RESERVAR</a>
                        <?php
                        echo '<a href="../../cuenta/perfil/" class="ln-cuenta">' . $_SESSION['usuario'] . '</a>&nbsp;<a href="../../recursos/php/verificaciones/cerrar.php" ><img class="btn-cerrar" src="../../recursos/img/cerrar.svg"
                            alt="cerrar"></a>';
                        ?>
                    </nav>
                </div>
            </div>
        </header>
        <main class="contenido">
            <div class="row">
                <div class="col-12">
                    <div class="card perfil">

                    </div>
                </div>
                <div class="col-12">
                    <div class="div-general">
                        <div class="row">
                            <div class="col-12">
                                <section class="personal p2">
                                    
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="div-general">
                        <section class="reservas">
                            <div class="titulo">
                                <h2 class="r-titulo">Mis reservas</h2>
                            </div>
                            <div class="card" style="width: auto;">
                                <ul class="list-group list-group-flush reserv">

                                </ul>
                            </div>
                        </section>
                        <div class="indicacion">
                            <p class="indi activa">Vigentes</p>
                            <p class="indi vencida">Vencidas</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 in">
                    <p class="copy">ClicReservas &copy; 2020</p>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-end">
                    <nav class="nav op-ft">
                        <a href="#" class="info-ft">b</a>
                        <a href="#" class="info-ft">a</a>
                        <a href="#" class="info-ft">f</a>
                    </nav>
                </div>
            </div>
        </footer>

        <div class="modal fade" id="changeImg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="btn-cierre" class="col-sm-10 col-form-label">Cambiar imagen de perfil</label>
                        <button type="button" id="btn-cierre" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formularioImg" action="../../recursos/php/verificaciones/img.php" role="form" method="POST" enctype="multipart/form-data">
                            <p>* Recuerda que debe ser un imagen de dimensión cuadrada</p>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="img" id="img" require>
                                </div>
                            </div>
                            <br>
                            <button class="btn-block btn-general" id="envio" type="submit">enviar</button>
                            <div class="ms"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="changePass" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="btn-cierre" class="col-sm-10 col-form-label">Cambiar contraseña</label>
                        <button type="button" id="btn-cierre" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body cpass">
                        <form class="contraForm">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="passV">Ingrese su contraseña</label>
                                <input type="password" class="form-control" id="passV" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;">
                            </div>

                            <div class="form-group mx-sm-3 mb-2">
                                <label for="passN">Ingrese su nueva contraseña</label>
                                <input type="password" class="form-control" id="passN" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;">
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="passC">Confirme su nueva contraseña</label>
                                <input type="password" class="form-control" id="passC" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;">
                            </div>
                            <div class="form-group mx-sm-3 mb-2" id="mensaje">

                            </div>
                            <hr>
                            <button type="submit" class="btn btn-general btn-block mb-2" id="btnPass">nueva contraseña</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="changeUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="btn-cierre" class="col-sm-10 col-form-label">Cambiar nombre de usuarioa</label>
                        <button type="button" id="btn-cierre" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form class="userForm">
                            <div class="form-group mx-sm-3 mb-2">
                                <p>Su nombre de usuario actual es <?php echo $_SESSION['usuario'];?></p>
                                <input type="hidden" class="form-control" id="userV" value="<?php echo $_SESSION['usuario'];?>">
                            </div>

                            <div class="form-group mx-sm-3 mb-2">
                                <label for="passN">Ingrese su nuevo nombre de usuario</label>
                                <input type="text" class="form-control" id="userN" placeholder="ElPutas99">
                            </div>
                            <div class="form-group mx-sm-3 mb-2" id="mensaj">

                            </div>
                            <hr>
                            <button type="submit" class="btn btn-general btn-block mb-2" id="btnPass">Cambiar usuario</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- informacion personal -->
        <div class="modal fade" id="nombreUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="btn-cierre" class="col-sm-10 col-form-label">Actualizar información personal</label>
                        <button type="button" id="btn-cierre" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="formN">
                            <div class="form-group gr">
                                <label for="name" class="col-sr-2 col-form-label info">Nombre completo</label>
                                <input type="text" class="form-control info" id="name" placeholder="Pepito Perez" required>
                            </div>
                            <div class="form-group gr mN"></div>
                            <div class="form-group gr">
                                <input class="btn-general btn-block" type="submit" value="Actualizar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ccUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="btn-cierre" class="col-sm-10 col-form-label">Actualizar información personal</label>
                        <button type="button" id="btn-cierre" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="formC">
                            <div class="form-group gr">
                                <label for="dni" class="col-sr-2 col-form-label info">Número de identificación</label>
                                <input type="text" class="form-control info" id="dni" placeholder="1234567890" required>
                            </div>
                            <div class="form-group gr mC"></div>
                            <div class="form-group gr">
                                <input class="btn-general btn-block" type="submit" value="Actualizar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addressUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="btn-cierre" class="col-sm-10 col-form-label">Actualizar información personal</label>
                        <button type="button" id="btn-cierre" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="formA">
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
                                <input class="btn-general btn-block" type="submit" value="Actualizar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="barrioUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="btn-cierre" class="col-sm-10 col-form-label">Actualizar información personal</label>
                        <button type="button" id="btn-cierre" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="formB">
                            <div class="form-group gr">
                                <label for="barrios" class="col-sr-2 col-form-label info">Barrio</label>
                                <select class="custom-select info" id="barrios" required>
                                    <option value="0"selected>Seleccione un barrio</option>
                                </select>
                            </div>
                            <div class="form-group gr">
                                <input class="btn-general btn-block" type="submit" value="Actualizar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="mobileUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="btn-cierre" class="col-sm-10 col-form-label">Actualizar información personal</label>
                        <button type="button" id="btn-cierre" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="formTe">
                            <div class="form-group gr">
                                <label for="tel" class="col-sr-2 col-form-label info">Teléfono</label>
                                <input type="text" class="form-control info" id="tel" placeholder="3152014578"  required>
                            </div>
                            <div class="form-group gr">
                                <input class="btn-general btn-block" type="submit" value="Actualizar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="mailUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="btn-cierre" class="col-sm-10 col-form-label">Actualizar información personal</label>
                        <button type="button" id="btn-cierre" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="formCorr">
                            <div class="form-group gr">
                                <label for="mail" class="col-sr-2 col-form-label info">Correo</label>
                                <input type="email" class="form-control info" id="mail" placeholder="elputas@mail.com"  required>
                            </div>
                            <div class="form-group gr mCorr"></div>
                            <div class="form-group gr">
                                <input class="btn-general btn-block" type="submit" value="Actualizar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- informacion personal -->
    </div>
    <script src="../../recursos/js/jquery-3.4.1.min.js"></script>
    <script src="../../recursos/js/popper.min.js"></script>
    <script src="../../recursos/js/bootstrap.js"></script>
    <script src="../../recursos/js/perfil.js"></script>
</body>

</html>
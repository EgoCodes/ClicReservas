<?php

    session_start();

    if (!isset($_SESSION['empresa'])) {
        header('Location: ../emp/');
    }

    $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $stmt = $mysqli->prepare("SELECT DISTINCT eh.idEmpHorario, h.hora FROM emp_horario eh
        INNER JOIN hora h on h.idHora = eh.idHoraR
        INNER JOIN cant_vent cv 
        INNER JOIN empresa e on e.idEmpresa = cv.idEmpresaR
        WHERE e.idEmpresa = ? ");
    $stmt->bind_param('i', $id);
    $id = $_SESSION['idEmpresa'];
    $stmt->execute();
    $stmt->bind_result($idEm, $hor);
    while ($stmt->fetch()) {
        aux($idEm, $hor);
    }
    $stmt->close();
    $mysqli->close();

    function aux($ids, $hs)
    {
        $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $st = $mysqli->prepare("SELECT cc.idCompCli, cc.idEmpHorarioR, cc.fechaCompra FROM compras_cli cc");
        $st->execute();
        $st->bind_result($comId, $idREm, $fech);
        while ($st->fetch()) {
            $diff = diffHora($hs);
            if ($ids == $idREm && $fech != fechaActual()) {
                aux2($comId, $idREm);
            } elseif ($ids == $idREm && $fech == fechaActual() && $diff == 0) {
                aux2($comId, $idREm);
            }
        }
        $mysqli->close();
    }

    function aux2($cId, $id)
    {
        $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $c = $mysqli->prepare("UPDATE `compras_cli` SET `estado` = '1', `updated_at` = now() WHERE `compras_cli`.`idCompCli` = ?");
        $c->bind_param('i', $cId);
        $c->execute();
        $res = $c->get_result();

        $c = $mysqli->prepare("UPDATE emp_horario SET erEstado = '0', `updated_at` = now() WHERE idEmpHorario = ?");
        $c->bind_param('i', $id);
        $c->execute();
        $res = $c->get_result();
        $mysqli->close();
    }

    function fechaActual()
    {
        $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $stmt = $mysqli->prepare("SELECT CURDATE()");
        $stmt->execute();
        $stmt->bind_result($fecha);
        while ($stmt->fetch()) {
            return $fecha;
        }
        $stmt->close();
        $mysqli->close();
    }

    function horaActual()
    {
        $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $stmt = $mysqli->prepare("SELECT now()");
        $stmt->execute();
        $stmt->bind_result($hora);
        while ($stmt->fetch()) {
            return $hora;
        }
        $stmt->close();
        $mysqli->close();
    }
    function diffHora($h)
    {
        $horaAc = new DateTime(horaActual());
        $horaTur = new DateTime($h);
        $com1 = $horaAc->format('%H%i%s');
        $com2 = $horaTur->format('%H%i%s');
        if ($com1 < $com2) {
            return 1;
        } else {
            return 0;
        }
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
    <link rel="stylesheet" href="../recursos/css/gestor.css">
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
                    <a href="" class="logo">CLICEMPRESAS</a>
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
        <div class="contenido">
            <div class="row">
                <div class="col-12 compras alert alert-dark" role="alert">
                    <?php
                        $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
                        if ($mysqli->connect_errno) {
                            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                        }

                        $stmt = $mysqli->prepare("SELECT COUNT(cc.idCompCli), SUM(eh.erPrecio) FROM cant_vent cv
                        INNER JOIN emp_horario eh on eh.idEmpVent = cv.idCantVent
                        INNER JOIN compras_cli cc on cc.idEmpHorarioR = eh.idEmpHorario
                        WHERE cv.idEmpresaR = ? ");
                        $stmt->bind_param('i', $id);
                        $id = $_SESSION['idEmpresa'];
                        $stmt->execute();
                        $stmt->bind_result($ventas, $ganancias);
                        while ($stmt->fetch()) {
                            echo '
                                <span>Se han vendido '.$ventas.' turnos</span><br>
                                <span>Se ha obtenido una ganacia de $'.$ganancias.' COP</span>
                            ';
                        }
                        $stmt->close();
                        $mysqli->close();
                    
                    ?>
                </div>
                
                <div class="col-12 ventanitas alert alert-secondary">
                
                </div>
                <div class="col-12">
                    <form class="crearForm">
                        <div class="form-group gr">
                            <label for="barrios" class="col-sr-2 col-form-label info">Ventanilla</label>
                            <select class="custom-select info" id="vents" required>
                                <option value="0"selected>Seleccione una ventanilla</option>
                            </select>

                            <div class="form-group gr">
                                <label for="barrios" class="col-sr-2 col-form-label info">Hora</label>
                                <select class="custom-select info" id="hor" required>
                                    <option value="0"selected>Seleccione una hora</option>
                                </select>
                            </div>

                            <div class="form-group gr">
                                <label for="tel" class="col-sr-2 col-form-label info">Precio</label>
                                <input type="number" class="form-control info" id="price" placeholder="2000" required>
                            </div>                                
                            <div class="form-group gr msg">

                            </div>
                            <div class="form-group gr">
                                <button type="submit" class="btn-general btn-block" id="guardar">Crear</button>
                            </div>
                    </form>
                </div>
                <hr>
                <div class="col-12 tablas">

                </div>
                
            </div>
        </div>
        <div class="modal fade" id="delect" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h1 class="cofirmT">Para realizar esta acción se necesita una confirmación</h1>
                        <div class="botonera">
                            <button type="button" id="btnDel" class="btnConfirm btn-success">
                                Borrar
                            </button>
                            <button type="button" id="btn-cierre" class="btnConfirm btn-danger" data-dismiss="modal" aria-label="Close">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="btn-cierre" class="col-sm-10 col-form-label">Editar turno</label>
                        <button type="button" id="btn-cierreE" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="editarForm">
                            <div class="form-group gr">
                                <label for="barrios" class="col-sr-2 col-form-label info">Ventanilla</label>
                                <select class="custom-select info" id="vent" required>
                                </select>

                                <div class="form-group gr">
                                    <label for="barrios" class="col-sr-2 col-form-label info">Hora</label>
                                    <select class="custom-select info" id="hor" required>
                                    </select>
                                </div>

                                <div class="form-group gr">
                                    <label for="tel" class="col-sr-2 col-form-label info">Precio</label>
                                    <input type="number" class="form-control info" id="price" placeholder="2000" required>
                                </div>
                                <input type="hidden"  id="ids">
                                    
                                <div class="form-group gr msgg">

                                </div>
                                <div class="form-group gr">
                                    <button type="submit" class="btn-general btn-block" id="guardar">Actualizar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../recursos/js/jquery-3.4.1.min.js"></script>
    <script src="../recursos/js/bootstrap.js"></script>
    <script src="../recursos/js/gestor.js"></script>
</body>

</html>
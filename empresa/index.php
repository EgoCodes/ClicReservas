<?php
    
    if(!isset($_GET['element']) || !is_numeric($_GET['element'])){
        header('Location: ../reservar');
        
    }elseif(isset($_GET['element']) && is_numeric($_GET['element'])){
    
        include_once '../recursos/php/conexion.php';

        $stmt = $mysqli->prepare("SELECT count(e.idEmpresa) FROM emp_horario eh INNER JOIN cant_vent cv on cv.idCantVent = eh.idEmpVent INNER JOIN empresa e ON e.idEmpresa = cv.idEmpresaR WHERE e.idEmpresa = ?");
        $stmt->bind_param('i', $_GET['element']);
        $stmt->execute();
        $stmt->bind_result($id);
        while ($stmt->fetch()) {
            if($id == 0){
                header('Location: ../reservar');
            }
        }
        $stmt->close();
        $mysqli->close();

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
    $id = $_GET['element'];
    $stmt->execute();
    $stmt->bind_result($idEm, $hor);
    while ($stmt->fetch()) {
        aux($idEm, $hor);
    }
    $stmt->close();
    $mysqli->close(); 

    function aux($ids, $hs){
        $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        } 
        $st = $mysqli->prepare("SELECT cc.idCompCli, cc.idEmpHorarioR, cc.fechaCompra FROM compras_cli cc");
        $st->execute();
        $st->bind_result($comId, $idREm, $fech);
        while ($st->fetch()) {
            $diff = diffHora($hs);
            if($ids == $idREm && $fech != fechaActual()){
                aux2($comId, $idREm);
            }elseif($ids == $idREm && $fech == fechaActual() && $diff == 0){
                aux2($comId, $idREm);
            }
        }
        $mysqli->close(); 
    }

    function aux2($cId, $id){
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

    function fechaActual(){
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

    function horaActual(){
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
    function diffHora($h){
        $horaAc = new DateTime(horaActual());
        $horaTur = new DateTime($h);
        $com1 = $horaAc->format('%H%i%s');
        $com2 = $horaTur->format('%H%i%s');
        if($com1 < $com2){
            return 1;
        }else{
            return 0;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php
        include_once '../recursos/php/componentes/empConsultas.php';
        titulo($_GET['element']);
    ?> | ClicReservas</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,900;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="../recursos/css/general.css">
    <link rel="stylesheet" href="../recursos/css/cuenta.css">
    <link rel="stylesheet" href="../recursos/css/emp.css">
</head>

<body>
    <input type="hidden" value="<?php ids($_GET['element']); ?>" id="idcita">
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
    <div class="container-md" style=" font-family: Roboto;">
        <header>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 logito">
                    <a href="../" class="logo">CLICRESERVAS</a>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-end">
                    <nav class="menuInicio">
                        <a href="../" class="btn-menu">INICIO</a>
                        <a href="../reservar/" class="btn-menu">RESERVAR</a>
                        <?php 
                            session_start();
    
                            if(isset($_SESSION['usuario'])){
                                echo '<a href="../cuenta/perfil/" class="ln-cuenta">'.$_SESSION['usuario'].'</a>&nbsp;<a href="../recursos/php/verificaciones/cerrar.php" ><img class="btn-cerrar" src="../recursos/img/cerrar.svg"
                            alt="cerrar"></a>';
                            }else{
                                echo '<a href="../cuenta/inicio-sesion/" class="btn-cuenta">CUENTA</a>';
                            }
                        ?>
                        
                    </nav>
                </div>
            </div>
        </header>
        <main class="contenido">
            <div class="row">
                <div class="col-12">
                    <section class="empresa-info">
                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <a href="../reservar/" class="btn-atras"><img src="../recursos/img/back.svg"
                                        alt="Atras"></a>
                                <h2 class="titulo-emp"> <?php
                                    include_once '../recursos/php/componentes/empConsultas.php';
                                    titulo($_GET['element']);
                                ?></h2>
                            </div>
                        </div>
                        <p class="descrip-emp"> <?php
                            include_once '../recursos/php/componentes/empConsultas.php';
                            decri($_GET['element']);
                        ?></p>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php
                            $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
                            if ($mysqli->connect_errno) {
                                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                            }
                    
                            $stmt = $mysqli->prepare("SELECT DISTINCT v.VenNumero, cv.idCantVent FROM emp_horario eh
                            INNER JOIN ventanillas v
                            INNER JOIN cant_vent cv on cv.idVentR = v.idVentanillas and cv.idCantVent = eh.idEmpVent
                            INNER JOIN empresa e on e.idEmpresa = cv.idEmpresaR
                            WHERE e.idEmpresa = ? ORDER BY v.VenNumero");
                            $stmt->bind_param('i', $id);
                            $id = $_GET['element'];
                            $stmt->execute();
                            $stmt->bind_result($ventanilla, $idv);
                            $temp = '';
                            $conta = 0;
                            while ($stmt->fetch()) {
                                if($conta == 0){
                                    $temp = $temp.'<li class="nav-item" role="presentation">
                                    <a class="nav-link active txts" id="'.$idv.'-tab" data-toggle="tab" href="#V'.$ventanilla.'"
                                        role="tab" aria-controls="'.$idv.'" aria-selected="true">V'.$ventanilla.'</a>
                                        
                                        </li>';
                                $conta = 1;
                                }else{
                                    $temp = $temp.'<li class="nav-item" role="presentation">
                                    <a class="nav-link txts" id="'.$idv.'-tab" data-toggle="tab" href="#V'.$ventanilla.'"
                                        role="tab" aria-controls="'.$idv.'" aria-selected="true">V'.$ventanilla.'</a>
                                        
                                        </li>';
                                }
                            }
                            echo $temp;
                            $stmt->close();
                            $mysqli->close();     
                        ?>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <?php
                            $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
                            if ($mysqli->connect_errno) {
                                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                            }
                    
                            $stmt = $mysqli->prepare("SELECT DISTINCT v.VenNumero FROM emp_horario eh
                            INNER JOIN ventanillas v
                            INNER JOIN cant_vent cv on cv.idVentR = v.idVentanillas and cv.idCantVent = eh.idEmpVent
                            INNER JOIN empresa e on e.idEmpresa = cv.idEmpresaR
                            WHERE e.idEmpresa = ? ORDER BY v.VenNumero");
                            $stmt->bind_param('i', $id);
                            $id = $_GET['element'];
                            $stmt->execute();
                            $stmt->bind_result($ventanilla);
                            $temp = '';
                            $conta = 0;
                            while ($stmt->fetch()) {
                                if($conta == 0){
                                    $temp = $temp.'<div class="tab-pane fade show active" id="V'.$ventanilla.'" role="tabpanel"
                                    aria-labelledby="'.$ventanilla.'-tab">
                                    <div class="row turnos"></div>
                                    </div>';
                                $conta = 1;
                                }else{
                                    $temp = $temp.'<div class="tab-pane fade show " id="V'.$ventanilla.'" role="tabpanel"
                                    aria-labelledby="'.$ventanilla.'-tab">
                                    <div class="row turnos"></div>
                                    </div>';
                                }
                            }
                            echo $temp;
                            $stmt->close();
                            $mysqli->close();  

                             
                        ?>
                        
                    </div>
                    <div class="opciones">
                        <div class="row">
                            <div class="col-12">
                                <p class="adicional-info">* Tienes a su disposición distintas ventanillas en las cuales usted puede realizar sus reservas.</p>
                            </div>
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


        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="btn-cierre" class="col-sm-10 col-form-label titulito">Factura de compra</label>
                        <button type="button" id="btn-cierre" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../recursos/js/jquery-3.4.1.min.js"></script>
    <script src="../recursos/js/popper.min.js"></script>
    <script src="../recursos/js/bootstrap.js"></script>
    <script src="../recursos/js/empresa.js"></script>
</body>
</html>
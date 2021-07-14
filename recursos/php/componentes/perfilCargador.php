<?php

    require_once '../../../recursos/php/conexion.php';
    session_start();

    $op = $_POST['op'];

    switch ($op) {
        case 0: 
                $stmt = $mysqli->prepare("SELECT pc.perImg, c.cliNombre FROM cliente c INNER JOIN perfil_cli pc on c.idPerfilR = pc.idPerfilCli INNER JOIN barrio b on b.idBarrio = c.idBarRe WHERE pc.perUsuario = ?");
                $stmt->bind_param('s', $usuario);
                $usuario = $_SESSION['usuario'];
                $stmt->execute();
                $stmt->bind_result($img, $nombre);
                $template = "";
                while ($stmt->fetch()) {
                    if($img == null){
                        $template = $template.'<img src="https://via.placeholder.com/500x500?text=IMG" class="card-img-top t-img" alt="'.$nombre.'">';
                    }else{
                        $template = $template.'<img src="../../'.$img.'" class="card-img-top t-img" alt="'.$nombre.'">';
                    }
                    $template = $template.'<div class="card-body">
                        <h1 class="card-text">'.$nombre.' <button class="btn-contra" type="button" data-toggle="modal" data-target="#changeImg"><img class="btn-cerrar" src="../../recursos/img/IMG.svg"
                        alt="USUARIO"></button></h1>
                        <div style="text-align: center;"><button class="btn-contra" type="button" data-toggle="modal" data-target="#changePass">Cambiar contraseña</button><br>
                        <button class="btn-contra" type="button" data-toggle="modal" data-target="#changeUser">Cambiar usuario</button></div>
                    </div>';
                }
                echo $template;
                $stmt->close();
                $mysqli->close();
                break;
        case 1: 
                $stmt = $mysqli->prepare("SELECT  c.cliNombre, c.cliCc, c.cliDireccion, b.bNombre, b.idBarrio, c.cliTelefono, c.cliMail FROM cliente c INNER JOIN perfil_cli pc on c.idPerfilR = pc.idPerfilCli INNER JOIN barrio b on b.idBarrio = c.idBarRe WHERE pc.perUsuario = ?");
                $stmt->bind_param('s', $usuario);
                $usuario = $_SESSION['usuario'];
                $stmt->execute();
                $stmt->bind_result($nombre, $cedula, $direccion, $barrio, $idbarrio, $telefono, $correo);
                $template = "";
                while ($stmt->fetch()) {
                    $template = $template.'
                <div class="grupo">
                    <label for="info">Nombre <button class="btn-contra" id="nom"  type="button" data-toggle="modal" data-target="#nombreUser"><img class="btn-cerrar" src="../../recursos/img/edit.svg"
                    alt="editar"></button></label>
                    <p class="texto nomb">'.$nombre.'</p>
                </div>
                <div class="grupo">
                    <label for="info"># identiificación <button class="btn-contra" id="ccs" type="button" data-toggle="modal" data-target="#ccUser"><img class="btn-cerrar" src="../../recursos/img/edit.svg"
                    alt="editar"></button></label>
                    <p class="texto cedu">'.$cedula.'</p>
                </div>
                <div class="grupo">
                    <label for="info">Dirección <button class="btn-contra" id="dir" type="button" data-toggle="modal" data-target="#addressUser"><img class="btn-cerrar" src="../../recursos/img/edit.svg"
                    alt="editar"></button></label>
                    <p class="texto dirr">'.$direccion.'</p>
                </div>
                <div class="grupo">
                    <label for="bars">Barrio <button class="btn-contra" id="sel" type="button" data-toggle="modal" data-target="#barrioUser"><img class="btn-cerrar" src="../../recursos/img/edit.svg"
                    alt="editar"></button></label>
                    <p class="texto" id="bars" idb="'.$idbarrio.'">'.$barrio.'</p>
                </div>
                <div class="grupo">
                    <label for="info">Teléfono <button class="btn-contra" id="mob" type="button" data-toggle="modal" data-target="#mobileUser"><img class="btn-cerrar" src="../../recursos/img/edit.svg"
                    alt="editar"></button></label>
                    <p class="texto tele">'.$telefono.'</p>
                </div>
                <div class="grupo">
                    <label for="info">Correo <button class="btn-contra" id="cor" type="button" data-toggle="modal" data-target="#mailUser"><img class="btn-cerrar" src="../../recursos/img/edit.svg"
                    alt="editar"></button></label>
                    <p class="texto mailss">'.$correo.'</p>
                </div>';
                }
                echo $template;
                $stmt->close();
                $mysqli->close();
                break;
        case 2: 
                $stmt = $mysqli->prepare("SELECT eh.idEmpHorario, cc.idCompCli, cc.estado, e.empNombre, h.hora, cc.fechaCompra FROM compras_cli cc
                INNER JOIN cliente c ON c.idCliente = cc.idClienteR
                INNER JOIN perfil_cli pc on c.idPerfilR = pc.idPerfilCli
                INNER JOIN emp_horario eh on eh.idEmpHorario = cc.idEmpHorarioR
                INNER JOIN cant_vent cv on eh.idEmpVent = cv.idCantVent
                INNER JOIN empresa e on e.idEmpresa = cv.idEmpresaR
                INNER JOIN hora h on h.idHora = eh.idHoraR
                WHERE pc.perUsuario = ?");
                $stmt->bind_param('s', $usuario);
                $usuario = $_SESSION['usuario'];
                $stmt->execute();
                $stmt->bind_result($idEmp, $idcompra, $estado, $empresa, $hora, $fecha);
                $template = "";
                while ($stmt->fetch()) {
                    if($estado == 0 && $fecha == fechaActual() ){
                        $horaAc = new DateTime(horaActual());
                        $horaTur = new DateTime($hora);
                        $com1 = $horaAc->format('%H%i%s');
                        $com2 = $horaTur->format('%H%i%s');
                        if($com1 > $com2){
                            estados($idcompra, $idEmp);
                        }else{
                            $template = $template.'<li class="list-group-item activa" idCom="'.$idcompra.'">'.$empresa.' | '.$hora.' | '.diffHora($hora).'</li>';
                        }
                    }elseif($estado == 1 || $fecha != fechaActual() ){
                        $template = $template.'<li class="list-group-item vencida" idCom="'.$idcompra.'">'.$empresa.' | '.$hora.' | '.$fecha.'</li>';
                    }
                }
                echo $template;
                $stmt->close();
                $mysqli->close();
                break;
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
        if($com1 < $com2 ){
            $fd = $horaAc->diff($horaTur);
            return 'Tiempo restante '.$fd->format('%H:%i:%s');
        }
    }

    function estados($idC, $idE){
        //UPDATE `compras_cli` SET `estado` = '0' WHERE `compras_cli`.`idCompCli` = 1
        $db = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($db->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        }

        $sql = "UPDATE `compras_cli` SET `estado` = '1', `updated_at` = now() WHERE `compras_cli`.`idCompCli` = ?";
        $c = $db->prepare($sql);
        $c->bind_param('i', $idC);
        $c->execute();
        $res = $c->get_result();

        $sql = "UPDATE emp_horario SET erEstado = '0', `updated_at` = now() WHERE idEmpHorario = ?";
        $c = $db->prepare($sql);
        $c->bind_param('i', $idE);
        $c->execute();
        $res = $c->get_result();

        $c->close();
        $db->close();

    }
?>
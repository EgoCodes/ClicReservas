<?php

    require_once '../conexion.php';
    session_start();


    $d = $_POST['resta'];

    $stmt = $mysqli->prepare("SELECT count(*) from cant_vent cv
    INNER JOIN emp_horario eh on eh.idEmpVent = cv.idCantVent
    WHERE cv.idEmpresaR = ? AND cv.idVentR = ?");
    $stmt->bind_param('ii', $_SESSION['idEmpresa'], $d);
    $stmt->execute();
    $stmt->bind_result($con);
    while ($stmt->fetch()) {
        if($con > 0){
            echo 'Existen turnos en esta ventana/oficina, por favor eliminelos para poder realizar la acción';
        }else{
            inse($d);
        }
    }
    $stmt->close();
    $mysqli->close();

    function inse($info){

        $db = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($db->connect_errno) {
            return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        }
        $stmt2 = $db->prepare("SELECT cv.idCantVent from cant_vent cv
        WHERE cv.idEmpresaR = ? AND cv.idVentR = ?");
        $stmt2->bind_param('ii', $_SESSION['idEmpresa'], $info);
        $stmt2->execute();
        $stmt2->bind_result($r);
        while ($stmt2->fetch()) {
            x($r);
        }
        $stmt2->close();
        $db->close();
    }

    function x($if){
        $db = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($db->connect_errno) {
            return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        }
        $stmt1= $db->prepare("DELETE FROM `cant_vent` WHERE idCantVent = ?");
        $stmt1->bind_param('i', $if);
        $stmt1->execute();
        $stmt1->close();
    }

?>
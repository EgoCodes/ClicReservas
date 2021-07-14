<?php

    require_once '../conexion.php';
    session_start();

    $stmt = $mysqli->prepare("SELECT count(*) FROM `emp_horario` WHERE idHoraR = ? AND idEmpVent = ? ");
    $stmt->bind_param('ii', $_POST['hour'], $_POST['win']);
    $stmt->execute();
    $stmt->bind_result($con);
    while ($stmt->fetch()) {
        if($con > 0){
            echo 2;
        }else{
            inse();
            echo 1;
        }
    }
    $stmt->close();
    $mysqli->close();

    function inse(){

        $db = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($db->connect_errno) {
            return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        }
        
        $stmt = $db->prepare("INSERT INTO `emp_horario` (`idEmpHorario`, `erPrecio`, `erEstado`, `idHoraR`, `idEmpVent`, `created_at`, `updated_at`) VALUES (NULL, ?, NULL, ?, ?, '', '')");
        $stmt->bind_param('iii', $_POST['price'], $_POST['hour'], $_POST['win']);
        $stmt->execute();
        $stmt->close();
        $db->close();
    
    }

?>
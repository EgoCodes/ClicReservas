<?php

    require_once '../../../recursos/php/conexion.php';
    session_start();


    $stmt = $mysqli->prepare("SELECT count(*) FROM `emp_horario` WHERE idHoraR = ? AND idEmpVent = ? AND erPrecio = ?");
    $stmt->bind_param('iii', $_POST['horas'], $_POST['ven'], $_POST['pre']);
    $stmt->execute();
    $stmt->bind_result($con);
    while ($stmt->fetch()) {
        if($con > 0){
            echo 1;
        }else{
            echo 2;
        }
    }
    $stmt->close();
    $mysqli->close();

?>

<?php

    require_once '../../../recursos/php/conexion.php';
    session_start();

    $stmt = $mysqli->prepare("UPDATE emp_horario SET erPrecio = ?, idHoraR = ?, idEmpVent = ?, updated_at = now() WHERE emp_horario.idEmpHorario = ?");
    $stmt->bind_param('iiii', $_POST['pre'], $_POST['horas'], $_POST['ven'], $_POST['id']);
    $stmt->execute();
    while ($stmt->fetch()) {
        echo $res;
    }
    $stmt->close();
    $mysqli->close();

?>
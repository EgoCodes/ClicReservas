<?php
    require_once '../conexion.php';

    $stmt = $mysqli->prepare("SELECT count(*) FROM emp_info WHERE correo = ?");
    $stmt->bind_param('s', $correo);
    $correo = $_POST['correo'];
    $stmt->execute();
    $stmt->bind_result($res);
    while ($stmt->fetch()) {
        echo $res;
    }
    $stmt->close();
    $mysqli->close();

?>
<?php
    require_once '../conexion.php';

    $stmt = $mysqli->prepare("SELECT count(*) FROM cliente WHERE cliMail = ?");
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
<?php
    require_once '../conexion.php';

    $mails = $_POST['mail'];

    $stmt = $mysqli->prepare("SELECT count(*) FROM emp_info WHERE correo = ?");
    $stmt->bind_param('s', $mails);
    $stmt->execute();
    $stmt->bind_result($res);
    while ($stmt->fetch()) {
        if($res > 0){
            echo 1;
        }else{
            echo 2;
        }
    }
    $stmt->close();
    $mysqli->close();
?>
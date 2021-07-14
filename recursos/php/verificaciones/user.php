<?php
    require_once '../conexion.php';

    $nombre = $_POST['users'];

    $stmt = $mysqli->prepare("SELECT count(*) FROM perfil_cli WHERE perUsuario = ?");
    $stmt->bind_param('s', $nombre);
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
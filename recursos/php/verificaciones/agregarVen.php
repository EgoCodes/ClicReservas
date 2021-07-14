<?php

    require_once '../conexion.php';
    session_start();
    $d = $_POST['suma'];
    $stmt = $mysqli->prepare("INSERT INTO `cant_vent`(`idCantVent`, `idEmpresaR`, `idVentR`, `created_at`, `updated_at`) VALUES (null, ?, ?,'','')");
    $stmt->bind_param('ii', $_SESSION['idEmpresa'], $d);
    $stmt->execute();
    echo $d;
    $res = $stmt->get_result();
    $stmt->close();
    $mysqli->close();
    
    

?>
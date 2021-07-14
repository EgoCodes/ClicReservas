<?php

    require_once '../conexion.php';
    session_start();

    $stmt = $mysqli->prepare("SELECT empNombre, empNit, empDireccion, empTelefono, idBarrioR, ei.correo FROM empresa e
    INNER JOIN emp_info ei on ei.idEmpInfo = e.idInfoR
    WHERE idEmpresa = ?");
    $stmt->bind_param('i', $_SESSION['idEmpresa']);
    $stmt->execute();
    $stmt->bind_result($nom, $nit, $direccion, $tele, $bar, $correo);
    while ($stmt->fetch()) {
        $json = array(
            "Nit" =>"$nit",
            "Nombre" => "$nom",
            "Address" => "$direccion",
            "Telefono" =>"$tele",
            "Barrio" => "$bar",
            "Correo" => "$correo"
        );
    }
    
    echo json_encode($json);
    $stmt->close();
    $mysqli->close();

?>
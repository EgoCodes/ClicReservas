<?php

    require_once '../../../recursos/php/conexion.php';
    session_start();


    $stmt = $mysqli->prepare("SELECT cv.idCantVent, v.VenNumero FROM cant_vent cv
    INNER JOIN ventanillas v on v.idVentanillas = cv.idVentR
    WHERE idEmpresaR = ? ORDER BY VenNumero");
    $stmt->bind_param('i', $_SESSION['idEmpresa']);
    $stmt->execute();
    $stmt->bind_result($id, $numero);
    $template = "";
    while ($stmt->fetch()) {
        $template = $template.'<option value="'.$id.'">'.$numero.'</option>';
    }
    
    echo $template;
    $stmt->close();
    $mysqli->close();

?>
<?php

    require_once '../../../recursos/php/conexion.php';
    session_start();


    $stmt = $mysqli->prepare("SELECT v.idVentanillas, v.VenNumero FROM cant_vent cv
    INNER JOIN ventanillas v on v.idVentanillas = cv.idVentR
    INNER JOIN empresa e ON e.idEmpresa = cv.idEmpresaR
    WHERE  e.idEmpresa =  ? ORDER BY idVentR");
    $stmt->bind_param('i', $_SESSION['idEmpresa']);
    $stmt->execute();
    $stmt->bind_result($id, $numero);
    $template = "";
    while ($stmt->fetch()) {
        $template = $template.'<option value="'.$id.'" '.selec($id).'>'.$numero.'</option>';
    }
    
    echo $template;
    $stmt->close();
    $mysqli->close();

    function selec($d){
        if($d == $_POST['d']){
            return 'selected';
        }
    }
?>

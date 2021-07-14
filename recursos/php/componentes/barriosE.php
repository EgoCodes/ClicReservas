<?php

    require_once '../../../recursos/php/conexion.php';

    $stmt = $mysqli->prepare("SELECT `idBarrio`, `bNombre`  FROM `barrio` ORDER BY `bNombre`");
    $stmt->execute();
    $stmt->bind_result($id, $nombre);
    $template = "";
    while ($stmt->fetch()) {
        $template = $template.'<option value="'.$id.'" '.selec($id).'>'.$nombre.'</option>';
    }
    
    echo $template;
    $stmt->close();
    $mysqli->close();

    function selec($d){
        if($d == $_POST['b']){
            return 'selected';
        }
    }
?>
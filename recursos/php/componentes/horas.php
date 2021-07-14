<?php

    require_once '../../../recursos/php/conexion.php';

    $stmt = $mysqli->prepare("SELECT `idHora`, `hora` FROM `hora` ORDER by hora");
    $stmt->execute();
    $stmt->bind_result($id, $h);
    $template = "";
    while ($stmt->fetch()) {
        $template = $template.'<option value="'.$id.'" >'.$h.'</option>';
    }
    
    echo $template;
    $stmt->close();
    $mysqli->close();

?>
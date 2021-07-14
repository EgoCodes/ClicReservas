<?php

    require_once '../conexion.php';
    session_start();
    
    $stmt = $mysqli->prepare("SELECT count(*), ei.empUsuario, e.idEmpresa FROM emp_info ei
    INNER JOIN empresa e ON e.idInfoR = ei.idEmpInfo
    WHERE ei.empUsuario = ? AND ei.empClave = PASSWORD(?)");
    $stmt->bind_param('ss', $usuario, $clave);
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $stmt->execute();
    $stmt->bind_result($count, $perUsuario, $idE);
    while ($stmt->fetch()) {
        if($count > 0){
            $_SESSION['empresa'] = $perUsuario;
            $_SESSION['idEmpresa'] = $idE;
            echo $count;
        }else{
            echo $count;
        }
    }
    $stmt->close();
    $mysqli->close();

?>
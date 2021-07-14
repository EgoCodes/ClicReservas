<?php

    require_once '../conexion.php';
    session_start();
    
    $stmt = $mysqli->prepare("SELECT count(*), perUsuario FROM perfil_cli WHERE perUsuario = ? AND perClave = PASSWORD(?)");
    $stmt->bind_param('ss', $usuario, $clave);
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $stmt->execute();
    $stmt->bind_result($count, $perUsuario);
    while ($stmt->fetch()) {
        if($count > 0){
            $_SESSION['usuario'] = $perUsuario;
            $_SESSION['id'] = id($perUsuario);
            echo $count;
        }else{
            echo $count;
        }
    }
    $stmt->close();
    $mysqli->close();

    function id($info){
        $db = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($db->connect_errno) {
            return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        }
        
        $stmt = $db->prepare("SELECT c.idCliente FROM cliente c 
        INNER JOIN perfil_cli pc on pc.idPerfilCli = c.idPerfilR
        WHERE pc.perUsuario = ?");
        $stmt->bind_param('s', $info);
        $stmt->execute();
        $stmt->bind_result($res);
        while ($stmt->fetch()) {
            return $res;
        }
        $stmt->close();
        $db->close();
    }
?>
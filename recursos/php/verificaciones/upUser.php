<?php
    require_once '../../../recursos/php/conexion.php';

    session_start();

    $stmt = $mysqli->prepare("SELECT count(*) FROM perfil_cli WHERE perUsuario = ?");
    $stmt->bind_param('s', $_POST['nUser']);
    $stmt->execute();
    $stmt->bind_result($res);
    while ($stmt->fetch()) {
        if($res > 0){
            echo 1;
        }else{
            up();
        }
    }
    $stmt->close();
    $mysqli->close();

    function up(){

        $db = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($db->connect_errno) {
            return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        }
        
        $stmt = $db->prepare("UPDATE `perfil_cli` SET `perUsuario` = ?, `updated_at` = now() WHERE `perfil_cli`.`perUsuario` = ?");
        $stmt->bind_param('ss', $_POST['nUser'], $_POST['users']);
        $stmt->execute();
        $res = $stmt->get_result();
        $_SESSION['usuario'] = $_POST['nUser'];
        $stmt->close();
        $db->close();
    }
?>
<?php 
    require_once '../../../recursos/php/conexion.php';

    session_start();
    $op = $_POST['opcion'];

    switch ($op) {
        case 1: 
                $stmt = $mysqli->prepare("SELECT DISTINCT COUNT(*) FROM perfil_cli pc WHERE pc.perUsuario = ? AND pc.perClave = PASSWORD(?)");
                $stmt->bind_param('ss', $user, $pass);
                $user = $_SESSION['usuario'];
                $pass = $_POST['vieja'];
                $stmt->execute();
                $stmt->bind_result($valor);
                while ($stmt->fetch()) {
                    if($valor == 1){
                        echo 1;
                    }else{
                        echo 2;
                    }
                }
                $stmt->close();
                $mysqli->close();
                break;
        case 2: 
                $stmt = $mysqli->prepare("UPDATE perfil_cli SET perClave = ?, `updated_at` = now() WHERE perfil_cli.perUsuario = ?");
                $stmt->bind_param('ss', $pass, $user);
                $user = $_SESSION['usuario'];
                $pass = $_POST['nueva'];
                $stmt->execute();
                $res = $stmt->get_result();
                $stmt->close();
                $mysqli->close();
                break;
    }
?>
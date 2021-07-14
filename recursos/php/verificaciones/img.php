<?php
    require_once '../conexion.php';
    session_start();

    $imagen = getimagesize($_FILES['img']['tmp_name']);
    $ancho = $imagen[0];
    $alto = $imagen[1]; 
    if($ancho == $alto){
        $ruta = "../../../recursos/img/user";
        // $img = $_FILES['img']['name'];
        $img = $_SESSION['usuario'].'-'.rand(2, 99).'.'.extImg($imagen[2]);
        $imagens = $_FILES['img']['tmp_name'];
        $ruta = $ruta.'/'.$img;
        $r2 = 'recursos/img/user/'.$img;

        move_uploaded_file($imagens, $ruta);

        $sql = "UPDATE perfil_cli SET perImg = ?, `updated_at` = now() WHERE perfil_cli.perUsuario = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ss', $r2, $_SESSION['usuario']);
        $stmt->execute();
        $res = $stmt->get_result();
        $mysqli->close();
    }else{
        echo 1;
    }
    
    function extImg($st){
        if($st == 1){
            return 'gif';
        }elseif($st == 2){
            return 'jpg';
        }else{
            return 'png';
        }
    }
?>
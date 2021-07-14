<?php

    require_once '../../../recursos/php/conexion.php';

    if(isset($_POST['valor'])){
        $stmt = $mysqli->prepare("SELECT DISTINCT e.idEmpresa, e.empNombre, ei.empDescripBreve, ei.empImg FROM emp_horario eh INNER JOIN cant_vent cv INNER JOIN empresa e on cv.idCantVent = eh.idEmpVent and cv.idEmpresaR = e.idEmpresa INNER JOIN emp_info ei WHERE ei.idEmpInfo = e.idInfoR AND e.empNombre LIKE ?");
        $stmt->bind_param('s', $nom);
        $nom = "%".$_POST['valor']."%";
        $stmt->execute();
        $stmt->bind_result($id, $nombre, $descripcion, $img);
        $template = "";
        // <img src="../'.$img.'" class="card-img-top algo" alt="'.$nombre.'">
        while ($stmt->fetch()) {
            $template = $template.'
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                <img src="https://via.placeholder.com/2560x1440/00B0FF/FFFFFF?text='.$img.'" class="card-img-top algo" alt="'.$nombre.'">
                    <div class="card-body">
                        <h2 class="card-title">'.$nombre.'</h2>
                        <p class="card-text">'.$descripcion.'</p>
                        <a class="btn btn-general btn-md btn-block" href="'.$id.'">PERFIL</a>
                    </div>
                </div>
            </div>';
        
        }
        
        echo $template;
        $stmt->close();
        $mysqli->close();
    }else{

        $stmt = $mysqli->prepare("SELECT DISTINCT e.idEmpresa, e.empNombre, ei.empDescripBreve, ei.empImg FROM emp_horario eh INNER JOIN cant_vent cv INNER JOIN empresa e on cv.idCantVent = eh.idEmpVent and cv.idEmpresaR = e.idEmpresa INNER JOIN emp_info ei WHERE ei.idEmpInfo = e.idInfoR");
        $stmt->execute();
        $stmt->bind_result($id, $nombre, $descripcion, $img);
        $template = "";
        while ($stmt->fetch()) {
            $template = $template.'
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                <img src="https://via.placeholder.com/2560x1440/00B0FF/FFFFFF?text='.$img.'" class="card-img-top algo" alt="'.$nombre.'">
                    <div class="card-body">
                        <h2 class="card-title">'.$nombre.'</h2>
                        <p class="card-text">'.$descripcion.'</p>
                        <a class="btn btn-general btn-md btn-block" href="'.$id.'">PERFIL</a>
                    </div>
            </div>
        </div>';
        
        }
        
        echo $template;
        $stmt->close();
        $mysqli->close();
    }
?>
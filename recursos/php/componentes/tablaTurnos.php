<?php
    require_once '../conexion.php';
    session_start();

    $stmt = $mysqli->prepare('SELECT eh.idEmpHorario, h.hora, h.idHora, cv.idVentR, eh.erPrecio, eh.idEmpVent, eh.erEstado FROM empresa e
    JOIN cant_vent cv ON cv.idEmpresaR = e.idEmpresa
    JOIN emp_horario eh ON eh.idEmpVent = cv.idCantVent
    JOIN hora h ON h.idHora = eh.idHoraR
    WHERE e.idEmpresa = ? ORDER BY eh.idEmpVent, h.hora');
    $stmt->bind_param('i', $d);
    $d = $_SESSION['idEmpresa'];
    $stmt->execute();
    $stmt->bind_result($id, $hora, $idh, $idv, $precio, $ventana, $estado);
    $template = "";
    $tabla = '<table class="table">
    <thead class="thead-light">
        <tr>
        <th scope="col">Ventanilla</th>
        <th scope="col">Precio</th>
        <th scope="col">Hora</th>
        <th scope="col"></th>
        </tr>
        <tbody>
    </thead>';
    $finTabla = '</tbody></table>';
    while ($stmt->fetch()) {
            $template = $template.'
            <tr class="'.est($estado).'">
                <td>'.$idv.'</td>
                <td>'.$precio.'</td>
                <td scope="row">'.$hora.'</td>
                <td>
                    <button class="btn-tablas" id="btnE" idEmps="'.$id.'" idHor="'.$idh.'" idVen="'.$idv.'" price="'.$precio.'" type="button" data-toggle="modal" data-target="#edit">Editar</button>
                    <button class="btn-tablas" id="btnD" idEmps="'.$id.'" type="button" data-toggle="modal" data-target="#delect">Borrar</button>
                </td>
            </tr>';
    }
    if(!empty($id)){
        echo $tabla.$template.$finTabla;
    }else{
        echo '<p>Por el momento no tienes turnos registrados en la plataforma.</p>';
    }
    $stmt->close();
    $mysqli->close();

    function est($inf){
        if($inf == 0 ){
            return '';
        }else{
            return 'table-success';
        }
    }

?>
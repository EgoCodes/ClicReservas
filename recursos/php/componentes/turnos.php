<?php
    require_once '../../../recursos/php/conexion.php';
    session_start();

    $stmt = $mysqli->prepare("SELECT eh.idEmpHorario, h.hora, eh.erPrecio, eh.erEstado FROM emp_horario eh
    INNER JOIN cant_vent cv on cv.idCantVent = eh.idEmpVent
    INNER JOIN empresa e on cv.idEmpresaR = e.idEmpresa
    INNER JOIN hora h on h.idHora = eh.idHoraR
    WHERE eh.idEmpVent = ? ORDER BY h.hora");
    $stmt->bind_param('i', $d);
    $d = $_POST['d'];
    $stmt->execute();
    $stmt->bind_result($id, $hora, $precio, $estado);
    $temp = '';
    while ($stmt->fetch()) {
        if(diffHora($hora) == 1){
            $temp = $temp.'
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                <button class="btn-hora btn-block '.getE($estado).'" id="pagar" idtur="'.$id.'" sesion="'.sesion().'" type="button" data-toggle="modal"
                    data-target="#staticBackdrop" '.desactivar($estado).'>
                    <span class="rs">'.$hora.'</span>
                    <span class="rs">'.$precio.'</span>
                </button>
            </div>
            ';
        }else{
            $db = new mysqli('localhost', 'root', '', 'clicreservas');
            if ($db->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
            }
            //UPDATE `emp_horario` SET `erEstado` = '0' WHERE `emp_horario`.`idEmpHorario` = ?
            $sql = "UPDATE emp_horario SET erEstado = '0', `updated_at` = now() WHERE idEmpHorario = ?";
            $c = $db->prepare($sql);
            $c->bind_param('i', $id);
            $c->execute();
            $res = $c->get_result();
            $c->close();
            $db->close();
        }
        
    }
    if($temp == ''){
        $temp = '
            <p class="adicional-info centrado">* No hay turnos por el momento.</p>
        ';
    }
    echo $temp;
    $stmt->close();
    $mysqli->close();  

    function desactivar($std){
        if($std == 1){
            return 'disabled="true"';
        }else{
            return null;
        }
    }

    function getE($std){
        if($std == 1){
            return 'usada';
        }else{
            return null;
        }
    }
    
    function sesion(){
        if(isset($_SESSION['usuario'])){
            return 1;
        }else{
            return 2;
        }
    }

    function horaActual(){
        $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $stmt = $mysqli->prepare("SELECT now()");
        $stmt->execute();
        $stmt->bind_result($hora);
        while ($stmt->fetch()) {
            return $hora;
        }
        $stmt->close();
        $mysqli->close(); 
    }
    function diffHora($h){
        $horaAc = new DateTime(horaActual());
        $horaTur = new DateTime($h);
        $com1 = $horaAc->format('%H%i%s');
        $com2 = $horaTur->format('%H%i%s');
        if($com1 < $com2){
            return 1;
        }else{
            return 0;
        }
    }
?>
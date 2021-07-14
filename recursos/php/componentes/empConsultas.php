<?php

    
    function titulo($info){

        $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $stmt = $mysqli->prepare("SELECT DISTINCT e.empNombre FROM emp_horario eh
        INNER JOIN cant_vent cv
        INNER JOIN empresa e on cv.idCantVent = eh.idEmpVent and cv.idEmpresaR = e.idEmpresa
        INNER JOIN emp_info ei
        WHERE ei.idEmpInfo = e.idInfoR and e.idEmpresa = ?");
        $stmt->bind_param('i', $id);
        $id = $info;
        $stmt->execute();
        $stmt->bind_result($nombre);
        while ($stmt->fetch()) {
            echo $nombre;
    
        }
        $stmt->close();
        $mysqli->close(); 
    }

    function decri($info){

        $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $stmt = $mysqli->prepare("SELECT DISTINCT ei.empDescripLarga FROM emp_horario eh
        INNER JOIN cant_vent cv
        INNER JOIN empresa e on cv.idCantVent = eh.idEmpVent and cv.idEmpresaR = e.idEmpresa
        INNER JOIN emp_info ei
        WHERE ei.idEmpInfo = e.idInfoR and e.idEmpresa = ?");
        $stmt->bind_param('i', $id);
        $id = $info;
        $stmt->execute();
        $stmt->bind_result($nombre);
        while ($stmt->fetch()) {
            echo $nombre;
    
        }
        $stmt->close();
        $mysqli->close(); 
    }
     
    function ids($info){

        $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        $stmt = $mysqli->prepare("SELECT DISTINCT eh.idEmpVent FROM emp_horario eh
        INNER JOIN cant_vent cv on cv.idCantVent = eh.idEmpVent
        INNER JOIN empresa e on cv.idEmpresaR = e.idEmpresa
        INNER JOIN hora h on h.idHora = eh.idHoraR
        WHERE e.idEmpresa = ?");
        $stmt->bind_param('i', $id);
        $id = $info;
        $stmt->execute();
        $stmt->bind_result($nombre);
        while ($stmt->fetch()) {
            echo $nombre;
    
        }
        $stmt->close();
        $mysqli->close(); 
    }
?>
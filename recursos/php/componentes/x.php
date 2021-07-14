<?php

    require_once '../conexion.php';
    session_start();

    $stmt = $mysqli->prepare("SELECT max(cv.idVentR) FROM cant_vent cv
    INNER JOIN empresa e on e.idEmpresa = cv.idEmpresaR
    WHERE e.idEmpresa = ? ");
    $stmt->bind_param('i', $id);
    $id = $_SESSION['idEmpresa'];
    $stmt->execute();
    $stmt->bind_result($ventas);
    while ($stmt->fetch()) {
        if($ventas <= 1){
            echo '
            <span>Actualmente nuestra plataforma permite hasta 15 ventanillas u oficinas de una misma empresa</span><br>
            <span>Ventanillas en tu empresa</span>
            <div class="botones"><button class="btn btn-link" id="minVen" style="text-decoration:none; padding:0px 12px 0px 12px; font-size:22px; margin-top:-2px; color:Black;" disabled>-</button><input type="text" class="form-control-plaintext" value="'.$ventas.'" id="informacion" readonly><button class="btn btn-link" id="maxVen" style="text-decoration:none; padding:0px 12px 0px 12px; font-size:16px; color:Black;">+</button></div>
            <p id="ulMen"></p>
        ';
        }else{
            echo '
            <span>Actualmente nuestra plataforma permite hasta 15 ventanillas u oficinas de una misma empresa</span><br>
            <span>Ventanillas en tu empresa</span>
            <div class="botones">
                <button class="btn btn-link" id="minVen" style="text-decoration:none;  color: black">-</button>
                <input type="text" class="form-control-plaintext flex-order" value="'.$ventas.'" id="informacion" readonly>
                <button class="btn btn-link" id="maxVen" style="text-decoration:none;  color: black">+</button>
            </div>
            <p id="ulMen"></p>
        ';
        }
        
    }
    $stmt->close();
    $mysqli->close();
?>
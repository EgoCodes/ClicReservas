<?php
    require_once '../../../recursos/php/conexion.php';
    session_start();

    $op = $_POST['std'];

    switch($op){
        case 1: 
                $stmt = $mysqli->prepare("SELECT e.empNombre, h.hora, eh.erPrecio FROM emp_horario eh
                INNER JOIN hora h on h.idHora = eh.idHoraR
                INNER JOIN cant_vent cv on eh.idEmpVent = cv.idCantVent
                INNER JOIN empresa e on e.idEmpresa = cv.idEmpresaR
                WHERE eh.idEmpHorario = ?");
                $stmt->bind_param('i', $id);
                $id = $_POST['ids'];
                $stmt->execute();
                $stmt->bind_result($nom, $hora, $precio);
                $temp = '';
                while ($stmt->fetch()) {
                    $temp = $temp.'
                    <form class="pagarTurnos" idtur="'.$id.'">
                        <div class="form-group">
                            <p class="cositas">* Los turnos que compre estarán disponibles en su perfil en la zona de <span style="font-style: italic;">"mis reservas"</span></p>
                        </div>
                        <div class="form-group row">
                            <label for="nombres" class="col-sm-4 col-form-label titulito">Empresa</label>
                            <div class="col-sm-auto">
                                <input type="text" readonly class="form-control-plaintext cositas" id="nombres"
                                    value="'.$nom.'">
                            </div>
                            <label for="horas" class="col-sm-4 col-form-label titulito">Hora</label>
                            <div class="col-sm-auto">
                                <input type="text" readonly class="form-control-plaintext cositas" id="horas"
                                    value="'.$hora.'">
                            </div>
                            <label for="precios" class="col-sm-4 col-form-label titulito">Precio</label>
                            <div class="col-sm-auto">
                                <input type="text" readonly class="form-control-plaintext cositas" id="precios"
                                    value="'.$precio.'">
                            </div>
                        </div>
                        <button type="submit" id="final" class="btn btn-general btn-md btn-block">Pagar</button>
                    </form>
                    ';
                }
                echo $temp;
                $stmt->close();
                $mysqli->close();
                break;
        case 2: 
                echo '<form  method="post" class="formulariol">
                <div class="form-row">
                    <div class="col-12 gr">
                        <label for="usuario_L" class="col-sr-2 col-form-label info">Usuario</label>
                        <input type="text" class="form-control texto" id="usuario_L" name="usuario_L" placeholder="pepito_09" required>
                    </div>

                    <div class="col-12 gr">
                        <label for="clave_L" class="col-sr-2 col-form-label info">Contraseña</label>
                        <input type="password" class="form-control texto" id="clave_L" name="clave_L" placeholder="••••••••" required>
                    </div>
                    <div class="col-12 gr" id="ss">

                    </div>
                    <div class="col-6 gr">
                        <a class="btn-reg" href="../cuenta/registrar/">Registrarme</a>
                    </div>
                    <div class="col-6 gr log">
                        <input class="btn-general" id="boton_L" type="submit" value="Entrar">
                    </div>
                </div>
            </form>';
                break;
        case 3: 
                $idU = $_SESSION['id'];
                $id = $_POST['ids'];
                $stados = 0;
                $sql = "INSERT INTO `compras_cli` (`idCompCli`, `estado`, `idClienteR`, `idEmpHorarioR`, `fechaCompra`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, '', '') ";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('iiis', $stados, $idU, $id, $fecha);
                $fecha = fechas();
                $stmt->execute();
                $res = $stmt->get_result();

                $sql = "UPDATE `emp_horario` SET `erEstado` = '1', `updated_at` = now() WHERE `emp_horario`.`idEmpHorario` = ?; ";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('i', $id);
                $stmt->execute();
                $res = $stmt->get_result();

                $stmt = $mysqli->prepare("SELECT cv.idCantVent FROM emp_horario eh
                INNER JOIN hora h on h.idHora = eh.idHoraR
                INNER JOIN cant_vent cv on eh.idEmpVent = cv.idCantVent
                INNER JOIN empresa e on e.idEmpresa = cv.idEmpresaR
                WHERE eh.idEmpHorario = ?");
                $stmt->bind_param('i', $id);
                $id = $_POST['ids'];
                $stmt->execute();
                $stmt->bind_result($v);
                while ($stmt->fetch()) {
                    echo $v;
                }

                $mysqli->close();
                break;
    }

    function fechas(){
        $mysqli = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        
        $stmt = $mysqli->prepare("SELECT CURDATE()");
        $stmt->execute();
        $stmt->bind_result($res);
        while ($stmt->fetch()) {
            return $res;
        }
        $stmt->close();
        $mysqli->close();
    }

?>
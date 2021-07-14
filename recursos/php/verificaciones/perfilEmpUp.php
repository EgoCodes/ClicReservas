<?php


require_once '../conexion.php';
        session_start();

        $op = $_POST['ops'];
        switch($op){
        case 1: 
                $stmt = $mysqli->prepare("SELECT ei.empImg, ei.empDescripBreve FROM empresa e 
                INNER JOIN emp_info ei on e.idInfoR = ei.idEmpInfo
                WHERE e.idEmpresa = ?");
                $stmt->bind_param('i', $_SESSION['idEmpresa']);
                $json;
                $stmt->execute();
                $stmt->bind_result($img, $des);
                while ($stmt->fetch()) {
                    $json = array(
                        "img" => "$img",
                        "descrip" =>"$des"
                    );
                }
                echo json_encode($json);
                $mysqli->close();
                break;
        case 2: 
                $stmt = $mysqli->prepare("SELECT ei.empDescripLarga FROM empresa e 
                INNER JOIN emp_info ei on e.idInfoR = ei.idEmpInfo
                WHERE e.idEmpresa = ?");
                $stmt->bind_param('i', $_SESSION['idEmpresa']);
                $stmt->execute();
                $stmt->bind_result($des);
                while ($stmt->fetch()) {
                    echo $des;
                }
                $mysqli->close();
                break;
        case 3: 
                $stmt = $mysqli->prepare("UPDATE `emp_info` SET `empDescripLarga` = ? WHERE `emp_info`.`idEmpInfo` = ? ");
                $stmt->bind_param('si', $des, $id);
                $des = $_POST['d'];
                $id = idGet();
                $stmt->execute();
                while ($stmt->fetch()) {
                    return $res;
                }
                $stmt->close();
                $mysqli->close();
                break;
        case 4: 
                $stmt = $mysqli->prepare("SELECT count(*) FROM emp_info WHERE empUsuario = ?");
                $stmt->bind_param('s', $_POST['user']);
                $stmt->execute();
                $stmt->bind_result($res);
                while ($stmt->fetch()) {
                    if($res > 0){
                       
                    }else{
                    up($_POST['user'], idGet());
                       echo 1;
                    }
                }
                break;
        case 5: 
                $stmt = $mysqli->prepare("UPDATE `emp_info` SET `empClave` = ? WHERE `emp_info`.`idEmpInfo` = ? ");
                $stmt->bind_param('si', $clave, $id);
                $clave = $_POST['clave'];
                $id = idGet();
                $stmt->execute();
                while ($stmt->fetch()) {
                    return $res;
                }
                $stmt->close();
                $mysqli->close();
                break;
        case 6: 
                $stmt = $mysqli->prepare("UPDATE `empresa` SET `empNombre` = ?, `empNit` = ?, `empDireccion` = ?, `empTelefono` = ?, `idBarrioR` = ? WHERE `empresa`.`idEmpresa` = ? ");
                $stmt->bind_param('sisiii', $_POST['nombre'], $_POST['dni'], $_POST['direccion'], $_POST['mobile'], $_POST['barrio'], $_SESSION['idEmpresa']);
                $stmt->execute();
                echo 'ok';
                $stmt->close();
                $mysqli->close();
                break;
        case 7: 
                $stmt = $mysqli->prepare("SELECT count(*) FROM emp_info WHERE correo = ?");
                $stmt->bind_param('s', $_POST['correo']);
                $stmt->execute();
                $stmt->bind_result($res);
                while ($stmt->fetch()) {
                    if($res == 0){
                        up2($_POST['correo'], idGet());
                        echo 'ok';
                    }
                }
                
                $mysqli->close();
                break;
        }

        function idGet(){
            $db = new mysqli('localhost', 'root', '', 'clicreservas');
            if ($db->connect_errno) {
                return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
            }
    
            $stmt1 = $db->prepare("SELECT idInfoR FROM empresa WHERE idEmpresa = ?");
            $stmt1->bind_param('i', $id);
            $id = $_SESSION['idEmpresa'];
            $stmt1->execute();
            $stmt1->bind_result($res);
            while ($stmt1->fetch()) {
                return $res;
            }
            $stmt1->close();
            $db->close();
        }
        
        function up($usu, $id){

            $db = new mysqli('localhost', 'root', '', 'clicreservas');
            if ($db->connect_errno) {
                return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
            }
            
            $stmt = $db->prepare("UPDATE `emp_info` SET `empUsuario` = ? WHERE `emp_info`.`idEmpInfo` = ?");
            $stmt->bind_param('si', $usu, $id);
            $stmt->execute();
            $stmt->bind_result($res);
            $_SESSION['empresa'] = $usu;
            $stmt->close();
            $db->close();
        }

        function up2($correo, $id){

            $db = new mysqli('localhost', 'root', '', 'clicreservas');
            if ($db->connect_errno) {
                return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
            }
            
            $stmt = $db->prepare("UPDATE `emp_info` SET `correo` = ? WHERE `emp_info`.`idEmpInfo` = ?");
            $stmt->bind_param('si', $correo, $id);
            $stmt->execute();
            // $stmt->bind_result($res);
            $stmt->close();
            $db->close();
        }
?>
<?php
        require_once '../../../recursos/php/conexion.php';
        session_start();

        $op = $_POST['opcion'];
        switch($op){
        case 1: 
                $sql = "UPDATE cliente c SET c.cliNombre = ?, `updated_at` = now() WHERE c.idCliente = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('si', $_POST['uNombre'], $user);
                $user = getid();
                $stmt->execute();
                $res = $stmt->get_result();
                $mysqli->close();
                break;
        case 2: 
                $sql = "UPDATE cliente c SET c.cliCc = ?, `updated_at` = now() WHERE c.idCliente = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('si', $_POST['uCc'], $user);
                $user = getid();
                $stmt->execute();
                $res = $stmt->get_result();
                $mysqli->close();
                break;
        case 3: 
                $sql = "UPDATE cliente c SET c.cliDireccion = ?, `updated_at` = now() WHERE c.idCliente = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('si', $_POST['uDirecc'], $user);
                $user = getid();
                $stmt->execute();
                $res = $stmt->get_result();
                $mysqli->close();
                break;
        case 4: 
                $sql = "UPDATE cliente c SET c.cliTelefono = ?, `updated_at` = now() WHERE c.idCliente = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('ii', $_POST['uTele'], $user);
                $user = getid();
                $stmt->execute();
                $res = $stmt->get_result();
                $mysqli->close();
                break;
        case 5: 
                $sql = "UPDATE cliente c SET c.cliMail = ?, `updated_at` = now() WHERE c.idCliente = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('si', $_POST['uCorreo'], $user);
                $user = getid();
                $stmt->execute();
                $res = $stmt->get_result();
                $mysqli->close();
                break;
        case 6: 
                $sql = "UPDATE cliente c SET c.idBarRe = ?, `updated_at` = now() WHERE c.idCliente = ?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('ii', $_POST['uIdBar'], $user);
                $user = getid();
                $stmt->execute();
                $res = $stmt->get_result();
                $mysqli->close();
                break;
        }

        function getid(){
                $db = new mysqli('localhost', 'root', '', 'clicreservas');
                if ($db->connect_errno) {
                        return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
                }

                $stmt = $db->prepare("SELECT c.idCliente FROM cliente c
                INNER JOIN perfil_cli pc on pc.idPerfilCli = c.idPerfilR
                WHERE pc.perUsuario = ?");
                $stmt->bind_param('s', $_SESSION['usuario']);
                $stmt->execute();
                $stmt->bind_result($res);
                while ($stmt->fetch()) {
                        return $res;
                }
                $stmt->close();
                $db->close();
        }
?>
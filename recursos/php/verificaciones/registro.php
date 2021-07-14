<?php

    require_once '../conexion.php';
    session_start();

    $nombre = $_POST['nombre'];
    $cc = $_POST['dni'];
    $direccion = $_POST['direccion'];
    $mobile = $_POST['mobile'];
    $correo = verificadorM();
    $idp = getPerfil();
    $idb = $_POST['barrio'];

    if($idp !== null && $correo !== 1){

        $sql = "INSERT INTO `cliente` (`idCliente`, `cliNombre`, `cliCc`, `cliDireccion`, `cliTelefono`, `cliMail`, `idPerfilR`, `idBarRe`, `created_at`, `updated_at`) VALUES (null, ?, ?, ?, ?, ?, ?, ?, '', '')";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sisisii', $nombre, $cc, $direccion, $mobile, $correo, $idp, $idb);
        $stmt->execute();
        $res = $stmt->get_result();
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['id'] = id($_POST['usuario']);
        $mysqli->close();

        echo 1;
    }else{
        echo 2;
    }
    
    function getPerfil(){

        $db = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($db->connect_errno) {
            return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        }
        
        $user = verificadorU();
        if($user !== 1){
            $stmt = $db->prepare("INSERT INTO perfil_cli VALUES (NULL, ?, PASSWORD(?), NULL, '', '')");
            $stmt->bind_param('ss', $user, $pass);
            $user = $_POST['usuario'];
            $pass = $_POST['clave'];
            $stmt->execute();
            $stmt->close();

            $stmt1 = $db->prepare("SELECT idPerfilCli FROM perfil_cli WHERE perUsuario = ?");
            $stmt1->bind_param('s', $usuario);
            $usuario = $_POST['usuario'];
            $stmt1->execute();
            $stmt1->bind_result($res);
            while ($stmt1->fetch()) {
                return $res;
            }
            $stmt1->close();
            $db->close();
        }
    }

    function verificadorM(){
        $db = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($db->connect_errno) {
            return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        }
        
        $stmt = $db->prepare("SELECT count(*) FROM cliente WHERE cliMail = ?");
        $stmt->bind_param('s', $mails);
        $mails = $_POST['correo'];
        $stmt->execute();
        $stmt->bind_result($res);
        while ($stmt->fetch()) {
            if($res > 0){
                return 1;
            }else{
                return $mails;
            }
        }
        $stmt->close();
        $db->close();
    }

    function verificadorU(){
        $db = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($db->connect_errno) {
            return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        }
        
        $stmt1 = $db->prepare("SELECT count(*) FROM perfil_cli WHERE perUsuario = ?");
        $stmt1->bind_param('s', $usuario);
        $usuario = $_POST['usuario'];
        $stmt1->execute();
        $stmt1->bind_result($res);
        while ($stmt1->fetch()) {
            if($res > 0){
                return 1;
            }else{
                return $usuario;
            }
        }
        $stmt1->close();
        $db->close();
    }

    function id($info){
        $db = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($db->connect_errno) {
            return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        }
        
        $stmt = $db->prepare("SELECT c.idCliente FROM cliente c 
        INNER JOIN perfil_cli pc on pc.idPerfilCli = c.idPerfilR
        WHERE pc.perUsuario = ?");
        $stmt->bind_param('s', $info);
        $stmt->execute();
        $stmt->bind_result($res);
        while ($stmt->fetch()) {
            return $res;
        }
        $stmt->close();
        $db->close();
    }
?>
<?php

    require_once '../conexion.php';
    session_start();

    $nombre = $_POST['nombre'];
    $cc = $_POST['dni'];
    $direccion = $_POST['direccion'];
    $mobile = $_POST['mobile'];
    $idp = getPerfil();
    $idb = $_POST['barrio'];

    if($idp !== null){
        
        $sql = "INSERT INTO `empresa` (`idEmpresa`, `empNombre`, `empNit`, `empDireccion`, `empTelefono`, `idBarrioR`, `idInfoR`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, ?, ?, ?, '', '')";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sisiii', $nombre, $cc, $direccion, $mobile, $idb, $idp);
        $stmt->execute();
        $res = $stmt->get_result();
        $_SESSION['empresa'] = $_POST['usuario'];
        $_SESSION['idEmpresa'] = retorno($_POST['usuario']);
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
            $stmt = $db->prepare("INSERT INTO `emp_info` (`idEmpInfo`, `empUsuario`, `empClave`, `correo`, `empImg`, `empDescripBreve`, `empDescripLarga`, `estado`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, '', '', '', '', '', '') ");
            $stmt->bind_param('sss', $user, $pass, $correo);
            
            $pass = $_POST['clave'];
            $correo = verificadorM();
            $stmt->execute();
            $stmt->close();

            $stmt1 = $db->prepare("SELECT idEmpInfo FROM emp_info WHERE empUsuario = ?");
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
        
        $stmt = $db->prepare("SELECT count(*) FROM emp_info WHERE correo = ?");
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
        
        $stmt1 = $db->prepare("SELECT count(*) FROM emp_info WHERE empUsuario = ?");
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

    function retorno($informa){
        $db = new mysqli('localhost', 'root', '', 'clicreservas');
        if ($db->connect_errno) {
            return "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
        }

        $stmt1 = $db->prepare("SELECT idEmpresa FROM emp_info INNER JOIN empresa ON idInfoR = idEmpInfo WHERE empUsuario = ?");
            $stmt1->bind_param('s', $informa);
            $stmt1->execute();
            $stmt1->bind_result($res);
            while ($stmt1->fetch()) {
                return $res;
            }
            $stmt1->close();
            $db->close();
    }

?>
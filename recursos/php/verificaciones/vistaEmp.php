<?php
    require_once '../conexion.php';
    session_start();

    $stmt = $mysqli->prepare("UPDATE `emp_info` SET `empImg` = ?, `empDescripBreve` = ? WHERE `emp_info`.`idEmpInfo` = ? ");
    $stmt->bind_param('ssi', $img, $des, $id);
    $img = $_POST['i'];
    $des = $_POST['d'];
    $id = idGet();
    $stmt->execute();
    while ($stmt1->fetch()) {
        return $res;
    }
    $stmt->close();
    $mysqli->close();

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
?>
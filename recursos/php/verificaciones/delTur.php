
<?php

require_once '../../../recursos/php/conexion.php';
session_start();

$stmt1 = $mysqli->prepare("DELETE FROM `emp_horario` WHERE `emp_horario`.`idEmpHorario` = ?");
$stmt1->bind_param('i', $_POST['ida']);
$stmt1->execute();
$stmt1->close();

$mysqli->close();

?>
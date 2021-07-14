<?php
    require_once 'conexion.php';

    $nom = $_POST['nombre'];
    $asun = $_POST['asunto'];
    $mail = $_POST['correo'];

    $sql = "INSERT INTO `contact` (`idContact`, `conNombre`, `conAsunto`, `conMail`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, ?, '', '')";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('sss', $nom, $asun, $mail);
    $stmt->execute();
    $res = $stmt->get_result();
    $mysqli->close();

    echo 1;
?>
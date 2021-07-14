<?php
    if(isset($_SESSION['usuario'])){
        header('Location: ./perfil');
    }else{
        header('Location: ./inicio-sesion');
    }
?>
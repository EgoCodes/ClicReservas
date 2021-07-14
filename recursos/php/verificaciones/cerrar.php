<?php
    session_start();
    session_destroy();
    header('Location: cuenta/perfil');
?>
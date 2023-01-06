<?php
    session_start();
    // Destruye sesión
    if(session_destroy()) {
        // Redirige a página de login
        header("Location: login.php");
    }
?>
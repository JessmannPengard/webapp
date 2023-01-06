<?php
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Go to login page
        header("Location: login.php");
    }
?>
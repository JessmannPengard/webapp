<?php
// Include in Login required pages
// If user not logged, redirects to login page
session_start();

if (!isset($_SESSION["id_user"])) {
    header("Location: " . URL_PATH . "/login.php");
    exit();
}
?>
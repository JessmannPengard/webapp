<?php
// Include in Login required pages
// If user not logged, redirects to login page
if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

if (!isset($_SESSION["id_user"])) {
    header("Location: " . URL_PATH . "/login");
    exit();
}
?>
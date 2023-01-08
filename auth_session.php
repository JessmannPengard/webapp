<?php
// Include in Login required pages
// If user not logged, redirects to login page
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>
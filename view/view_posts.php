<?php
include("users.php");
$posts = getPosts(0, 0, 0, 0);
for ($i = 0; $i < count($posts); $i++) {
    showPost($posts[$i]["id_user"], $posts[$i]["post"], $posts[$i]["post_create_datetime"]);
}

?>
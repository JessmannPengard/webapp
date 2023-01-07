<?php

$posts = getPosts(0, 0, 0, 0);
for ($i = 0; $i < count($posts); $i++) {
    echo "<p>" . $posts[$i]["post"] . "</p>";
}

?>
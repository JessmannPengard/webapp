<?php

// Get posts
$posts = getPosts(0, 0, 0, 0);

echo "
    <div class='div-posts'>";
// Show posts
for ($i = 0; $i < count($posts); $i++) {
    // Format datetime
    $date = date_create($posts[$i]["post_create_datetime"]);
    $date = date_format($date, "d-m-Y H:i:s");

    echo "
        <div class='view-post'>
            <div class='post-header'>
                <h3 class='user-comment'>" . getUsername($posts[$i]["id_user"]) . "</h3>
                <div class='post-icons'>";
    // Post icons (edit, delete)
    if (isset($_SESSION["user_id"]) and $_SESSION["user_id"] == $posts[$i]["id_user"]) {
        echo "<a href='' title='Edit'><i class='fa-solid fa-pen-to-square post-icon'></i></a>";
        echo "<a href='' title='Delete'><i class='fa-solid fa-trash-can post-icon'></i></a>";
    }

    echo "
                </div>
            </div>
            
            <p class='post-datetime'>" . $date . "</p>
            <p class='post-id'>#" . $posts[$i]["id_post"] . "</p>
            
            <textarea class='text-post' readonly>" . $posts[$i]["post"] . "</textarea>
            
            <div class='post-footer'>";
    if (isset($_SESSION["user_id"])) {
        echo "
                <input type='submit' value='Comment' class='comment-post'>
                ";
    }
    // Get number of comments
    $comments = getComments($posts[$i]["id_post"]);
    $num_comments = count($comments);
    if ($num_comments > 0) {
        echo "
                <a href='' title='View comments' class='num-comments'>#" . $num_comments . " comments</a>";
    } else {
        echo "
                <span class='num-comments'>No comments yet</span>";
    }
        echo "
            </div>
        </div>";
}
echo "
    </div>";

?>
<?php

include(dirname(__FILE__, 2).'/posts.php');

if (isset($_POST['post-text'])) {
    $user_id = $_SESSION['user_id'];
    $post = $_POST['post-text'];
    $postDatetime = date('Y-m-d H:i:s');
    // Publish post
    if (publishPost($user_id, $post, 0, $postDatetime)) {
        // Publish successful
        header('Location: index.php');
    } else {
        // Error publishing
        echo 'No se ha podido realizar la publicación. Inténtelo de nuevo más tarde.';
    }
}

echo "
    <div class='div-send-post'>
        <form action='' method='post' class='send-post'>
            <textarea name='post-text' id='' maxlength='255' class='input-post'></textarea>
            <input type='submit' value='Publicar' class='submit-post'>
        </form>
    </div>
";

?>
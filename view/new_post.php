<?php

// Post publish on POST submit
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
        echo 'Error publishing. Try again later';
    }
}

// New post form
echo "
    <div class='div-send-post'>
        <form action='' method='post' class='send-post'>
            <textarea name='post-text' id='' maxlength='255' class='input-post' placeholder='Write something here...' required></textarea>
            <input type='submit' value='Publish' class='submit-post'>
        </form>
    </div>
";

?>
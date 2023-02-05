<?php

// Edit post form
echo "
    <h1>You are going to delete your post, are you sure?</h1>
    <div class='div-send-post'>
        <form action='' method='post' class='send-post'>
            <div class='mb-3'>
                <textarea name='post-text' id='' maxlength='255' class='input-post' readonly>" . $parameters["post"] . "</textarea>
            </div>
            <div class='mb-3'>
                <button type='submit' class='btn btn-primary'>Delete</button>
                <a href='" . URL_PATH . "/home' class='btn btn-danger'>Cancel</a>
            </div>
        </form>
    </div>
";

?>
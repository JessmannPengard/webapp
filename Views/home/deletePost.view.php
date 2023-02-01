<?php

// Edit post form
echo "
    <h1>You are going to delete your post, are you sure?</h1>
    <div class='div-send-post'>
        <form action='' method='post' class='send-post'>
            <div class='mb-3'>
                <textarea name='post-text' id='' maxlength='255' class='input-post' readonly>" . $parameters["post"] . "</textarea>
            </div>
            <input type='submit' value='Delete' class='submit-post'>
            <a href='" . URL_PATH . "/home' class='discard-post'>Cancel</a>
        </form>
    </div>
";

?>
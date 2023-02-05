<?php

// Edit post form
echo "
    <div class='div-send-post'>
        <form action='' method='post' class='send-post'>
            <div class='mb-3'>
                <textarea name='post-text' id='' maxlength='255' class='input-post' required autofocus>" . $parameters["post"] . "</textarea>
            </div>
            <div class='mb-3'>
                <button type='submit' class='btn btn-primary'>Publish</button>
                <a href='" . URL_PATH . "/home' class='btn btn-danger'>Discard</a>
            </div>
        </form>
    </div>
";

?>
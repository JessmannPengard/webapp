<?php

// Edit post form
echo "
    <div class='div-send-post'>
        <form action='' method='post' class='send-post'>
            <div class='mb-3'>
                <textarea name='post-text' id='' maxlength='255' class='input-post' required autofocus>" . $parameters["post"] . "</textarea>
            </div>
            <input type='submit' value='Publish' class='submit-post'>
            <a href='" . URL_PATH . "/home' class='discard-post'>Discard</a>
        </form>
    </div>
";

?>
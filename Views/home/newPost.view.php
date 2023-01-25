<?php

// New post form
echo "
    <div class='div-send-post'>
        <form action='' method='post' class='send-post'>
            <div class='mb-3'>
                <textarea name='post-text' id='' maxlength='255' class='input-post' placeholder='Write something here...' required></textarea>
            </div>
            <input type='submit' value='Publish' class='submit-post'>
        </form>
    </div>
";

?>
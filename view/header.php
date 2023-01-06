<?php

echo "

    <header class='site-header'>
        <img src='img/logo.png' alt='' class='logo'>
        <h1 class='site-title'>Jessmann</h1>
        <div class='session'>
            <span class='username'>".$_SESSION['user_name']."</span>
            <a href='logout.php' class='a-logout'><i class='fa-solid fa-right-from-bracket logout'></i></a>
        </div>
        
    </header>

";

?>
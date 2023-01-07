<?php

echo "

    <header class='site-header'>
        <nav class='site-nav'>
            <div class='session'>";

if (isset($_SESSION['user_name'])) {
    echo "
                <span class='username'>" . $_SESSION['user_name'] . "</span>
                <a href='logout.php' class='a-session'><i class='fa-solid fa-right-from-bracket i-session'></i></a>
    ";
} else {
    echo "
                <a href='login.php' class='a-session'>Login<i class='fa-solid fa-right-to-bracket i-session'></i></a>
                <a href='register.php' class='a-session'>Register<i class='fa-solid fa-user-pen i-session'></i></a>
    ";
}

echo "      </div>
        </nav>
        
        <h1 class='site-title'>Jessmann</h1>
        
        
    </header>

";

?>
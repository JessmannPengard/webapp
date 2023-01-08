<?php

echo "

    <header class='site-header'>
        <nav class='site-nav'>
            <a href='index.php' class='a-session' title='Home'><i class='fa-solid fa-house i-session'></i></a>
            <h1 class='site-title'>Jessmann</h1>
            <div class='session'>";
// If logged show Logout else show Login and Register
if (isset($_SESSION['user_name'])) {
    echo "
                <span class='username'>" . $_SESSION['user_name'] . "</span>
                <a href='logout.php' class='a-session' title='Logout'><i class='fa-solid fa-right-from-bracket i-session'></i></a>
    ";
} else {
    echo "
                <a href='login.php' class='a-session' title='Login'>Login<i class='fa-solid fa-right-to-bracket i-session'></i></a>
                <a href='register.php' class='a-session' title='Register'>Register<i class='fa-solid fa-user-pen i-session'></i></a>
    ";
}

echo "      </div>
        </nav>
    </header>

";

?>
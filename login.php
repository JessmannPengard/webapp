<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reg_log.css">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login</title>
</head>

<body>

    <?php
    // Includes
    include("users.php");

    // Session start
    session_start();

    // Header view
    include(__DIR__ . "/view/header.php");

    // Check credentials on POST submit
    if (isset($_POST["user_name"])) {
        $username = $_POST["user_name"];
        $password = $_POST["user_password"];
        $user_id = authUser($username, $password);
        if ($user_id > 0) {
            // Authorized user
            $_SESSION['user_name'] = $username;
            $_SESSION['user_id'] = $user_id;
            header("Location: index.php");
        } else {
            // Wrong user/password combination
            $msg = "Username and/or password not valid";
        }
    }
    ?>

    <!-- Login form -->
    <form class="form" method="post" name="login">
        <h2 class="login-title">Login</h2>
        <input type="text" class="login-input" name="user_name" placeholder="Username" autofocus="true" required />
        <input type="password" class="login-input" name="user_password" placeholder="Password" required />
        <input type="submit" value="Login" name="submit" class="login-button" />
        <p class="login-link"><a href="register.php" class="login-text-link">Register</a></p>
    </form>

    <?php
    // Error message if wrong user/password combination
    echo "<p class='msg'>" . (isset($msg) ? $msg : "") . "</p>";

    // Footer view
    include(__DIR__ . "/view/footer.php");
    ?>
</body>

</html>
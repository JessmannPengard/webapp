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
    <title>Register</title>
</head>

<body class="login-body">

    <?php
    include("users.php");

    if (isset($_POST["user_name"])) {
        $username = $_POST["user_name"];
        $email = $_POST["user_email"];
        $password = $_POST["user_password"];
        $date_time = date("Y-m-d H:i:s");
        if (!existUsername($username)) {
            if (!existEmail($email)) {
                if (validPassword($password)) {
                    if (userRegister($username, $email, $password, $date_time)) {
                        // Register successful
                        $msg = "Register was successful. You can now log into your account";
                    } else {
                        //Error registering
                        $msg = "An error ocurred during register process. Try again later";
                    }
                } else {
                    // Weak password
                    $msg = "Too weak Password. It must comply the specified requirements";
                }
            } else {
                // Existing email
                $msg = "There is a registered user using this Email";
            }
        } else {
            // Existing username
            $msg = "Ther is a registered user using this Username";
        }
    }

    ?>

    <form class="form" action="" method="post">
        <h2 class="login-title">Register</h2>
        <input type="text" class="login-input" name="user_name" maxlength="100" placeholder="Username" required
            autofocus="true" />
        <input type="text" class="login-input" name="user_email" maxlength="100" placeholder="Email" required>
        <input type="password" class="login-input" name="user_password" maxlength="100" placeholder="Password*"
            required>
        <p class="info">* Password should be at least 8 characters in length and should include at least one upper and
            one lower case letter, one number, and one special character.</p>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="login-link"><a href="login.php" class="login-text-link">Login</a></p>
    </form>
    <?php echo "<p class='msg'>" . (isset($msg) ? $msg : "") . "</p>" ?>

    <?php include(__DIR__ . "/view/footer.php") ?>
</body>

</html>
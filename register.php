<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reg_log.css">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Registro</title>
</head>

<body class="login-body">

    <?php
    require("users.php");
    if (isset($_POST["user_name"])) {
        $username = $_POST["user_name"];
        $email = $_POST["user_email"];
        $password = $_POST["user_password"];
        $date_time = date("Y-m-d H:i:s");
        if (!existUser($username)) {
            if (!existEmail($email)) {
                if (validPassword($password)) {
                    if (userRegister($username, $email, $password, $date_time)) {
                        // Register successful
                        $msg = "El registro se ha realizado con éxito. Ya puede iniciar sesión en su cuenta";
                    } else {
                        //Error registering
                        $msg = "Se ha producido un error durante el proceso de registro. Inténtelo de nuevo más tarde";
                    }
                } else {
                    // Weak password
                    $msg = "Contraseña demasiado débil. Debe cumplir los requisitos especificados";
                }
            } else {
                // Existing email
                $msg = "Ya existe un usuario con este email";
            }
        } else {
            // Existing username
            $msg = "Ya existe un usuario con este nombre";
        }
    }

    ?>

    <form class="form" action="" method="post">
        <h2 class="login-title">Registro</h2>
        <input type="text" class="login-input" name="user_name" placeholder="Nombre de usuario" required autofocus="true"/>
        <input type="text" class="login-input" name="user_email" placeholder="Email" required>
        <input type="password" class="login-input" name="user_password" placeholder="Contraseña*" required>
        <p class="info">* La contraseña debe contener mayúsculas, minúsculas, números y algún caracter especial</p>
        <input type="submit" name="submit" value="Registrarse" class="login-button">
        <p class="login-link"><a href="login.php" class="login-text-link">Iniciar sesión</a></p>
    </form>
    <?php echo "<p class='msg'>".(isset($msg)?$msg:"")."</p>" ?>

    <?php include(__DIR__."/view/footer.php")?>
</body>

</html>
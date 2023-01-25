<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="<?= URL_PATH ?>/assets/css/home.layout.css">
    <!-- Page title -->
    <title>Jessmann</title>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="nav fixed-top nav-h align-items-center">
            <!-- User menu button -->
            <div class="nav-link left-nav">
                <a class="text-white" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                    aria-controls="offcanvasWithBothOptions">
                    <i class="fa-solid fa-bars fa-xl"></i>
                </a>
            </div>

            <!-- Logo -->
            <div class="nav-link">
                <img src="<?= URL_PATH ?>/assets/img/logo.png" alt="" srcset="" class="logo">
            </div>

            <!-- Future right menu -->
            <div class="nav-link">

            </div>

            <!-- User menu -->
            <div class="offcanvas offcanvas-start offcanvas-size-sm" data-bs-scroll="true" tabindex="-1"
                id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <?php
                if (isset($_SESSION["user_name"])) {
                    echo "<div class='offcanvas-header'>
                            <h5 class='offcanvas-title' id='offcanvasWithBothOptionsLabel'>" . $_SESSION["user_name"] . "</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                        </div>
                        <div class='offcanvas-body'>
                            <a class='btn btn-primary' href='" . URL_PATH . "/user' role='button'><i class='fa-solid fa-gear'></i>  Manage your account</a>
                            <a class='btn btn-primary' href='" . URL_PATH . "/login/logout' role='button'><i class='fa-solid fa-right-from-bracket'></i>  Logout</a>
                        </div>";
                } else {
                    echo "<div class='offcanvas-header'>
                            <h5 class='offcanvas-title' id='offcanvasWithBothOptionsLabel'>User options</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='offcanvas' aria-label='Close'></button>
                        </div>
                        <div class='offcanvas-body'>
                            <a class='btn btn-primary' href='" . URL_PATH . "/login' role='button'>Login</a>
                            <a class='btn btn-primary' href='" . URL_PATH . "/login/register' role='button'>Register</a>
                        </div>";
                }
                ?>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <div class="container">
        <!-- Sign in message -->
        <?php
        if (!isset($_SESSION["user_name"])) {
            echo "
                    <p class='login-message'>
                        <a href='" . URL_PATH . "/login' class='a-session'>Login</a> or 
                        <a href='" . URL_PATH . "/login/register' class='a-session'>Register</a> so you can publish or comment.
                    </p>";
        }
        ?>
        <div class="row">
            <?php echo $content; ?>
        </div>
    </div>

    <!-- Footer -->
    <?php
    require_once(__DIR__ . "/../../../Views/layout/footer.layout.php");
    ?>

</body>

</html>
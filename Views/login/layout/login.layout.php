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
    <link rel="stylesheet" href="<?= URL_PATH ?>/assets/css/login.layout.css">
    <script src="<?= URL_PATH ?>/assets/js/register.js"></script>
    <!-- Page title -->
    <title>Jessmann</title>
</head>

<body>

    <!-- Header -->
    <header>
        <nav class="nav nav-fill fixed-top nav-h align-items-center">
            <!-- Logo -->
            <div class="nav-link">
                <a href="<?= URL_PATH ?>/home"><img src="<?= URL_PATH ?>/assets/img/logo.png" alt="" srcset=""
                        class="logo"></a>
            </div>
        </nav>
    </header>

    <!-- Content -->
    <div class="container">
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
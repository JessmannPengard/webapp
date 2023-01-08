<?php
//include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/posts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Jessmann</title>
</head>

<body>

    <?php
    // Includes
    include(__DIR__ . '/posts.php');
    include(__DIR__ . '/users.php');

    // Session start
    session_start();

    // Header view
    include(__DIR__ . "/view/header.php");

    // Check for session to alow publishing
    if (isset($_SESSION['user_id'])) {
        include(__DIR__ . "/view/new_post.php");
    } else {
        include(__DIR__ . "/view/unregistered_message.php");
    }

    // Posts view
    include(__DIR__ . "/view/view_posts.php");

    // Footer view
    include(__DIR__ . "/view/footer.php");
    ?>

</body>

</html>
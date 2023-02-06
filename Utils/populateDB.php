<?php
// Script for populate the Database from some APIs with some fake users, posts and comments

// Requires
require_once(__DIR__ . '/../Config/config.php');
require_once(__DIR__ . '/../Models/db.php');
require_once(__DIR__ . '/../Models/orm.php');
require_once(__DIR__ . '/../Models/user.php');


// Function to register new users from randomuser API
function registerUsers($qty)
{
    $user = json_decode(file_get_contents('https://randomuser.me/api/?results=' . $qty . '&inc=login,email'), true);

    foreach ($user['results'] as $key => $arrays) {
        $email = "";
        $username = "";
        $password = "";
        foreach ($arrays as $innerkey => $innervalue) {
            if (gettype($innervalue) != "array") {
                switch ($innerkey) {
                    case "email":
                        $email = $innervalue;
                        break;
                }
            } else {
                foreach ($innervalue as $key => $value) {
                    switch ($key) {
                        case "username":
                            $username = $value;
                            break;
                        case "password":
                            $password = $value;
                            break;
                    }
                }
            }
        }
        //Insert user into DB
        $db = new Database;
        $user = new User($db->getConnection());
        $result = $user->register($username, $password, $email);
        if ($result["result"]) {
            echo $username . ", " . $password . ", " . $email . " -> Registered succesfully";
        } else {
            echo $username . ", " . $password . ", " . $email . " -> Failed!";
        }

        echo "<br>";
    }
}

// Function to create new posts from baconIpsun API
function publishPosts($qty)
{
    $db = new Database;
    $user = new User($db->getConnection());
    $result = $user->getAll();

    foreach ($result as $key => $value) {
        $post = json_decode(file_get_contents('https://baconipsum.com/api/?type=all-meat&sentences=1'), true);
        echo $post[0];
        echo "<br>";
    }
}

//registerUsers(20);
publishPosts(10);

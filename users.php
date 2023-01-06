<?php

function userRegister($userName, $userEmail, $userPassword, $dateTime)
{
    include("db.php");

    // Prepare
    $stmt = $conn->prepare("INSERT INTO users (user_name,user_password,user_email,user_create_datetime) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $userName, $userEmail, $userPassword, $dateTime);

    // Execute
    $stmt->execute();

    // Close connection
    $stmt->close();
    mysqli_close($conn);

    // True if execute was succesfully, else False
    return $stmt;
}

function authUser($userName, $userPassword)
{
    include("db.php");

    // Prepare
    $stmt = $conn->prepare("SELECT id_user FROM users WHERE user_name = ? AND user_password = ?");
    $stmt->bind_param("ss", $userName, $userPassword);

    // Execute
    $stmt->execute();
    $stmt->store_result();

    // True if combination user/password exists, else False
    $result = $stmt->num_rows() > 0;

    // Close connection
    $stmt->close();
    mysqli_close($conn);

    // Return result
    return $result;
}

function existsUser($userName)
{
    include("db.php");

    // Prepare
    $stmt = $conn->prepare("SELECT id_user FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $stmt->store_result();

    // True if username already exists, else False
    $result = $stmt->num_rows() > 0;

    // Close connection
    $stmt->close();
    mysqli_close($conn);

    // Return result
    return $result;
}

function existsEmail($userEmail)
{
    include("db.php");

    // Prepare
    $stmt = $conn->prepare("SELECT id_user FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $userEmail);

    // Execute
    $stmt->execute();
    $stmt->store_result();

    // True if user email already exists, else False
    $result = $stmt->num_rows() > 0;

    // Close connection
    $stmt->close();
    mysqli_close($conn);

    // Return result
    return $result;
}

function validPassword($userPassword)
{
    // Validate password strength:
    // Password should be at least 8 characters in length and 
    // should include at least one upper case letter, one number, 
    // and one special character.

    $uppercase = preg_match('@[A-Z]@', $userPassword);
    $lowercase = preg_match('@[a-z]@', $userPassword);
    $number = preg_match('@[0-9]@', $userPassword);
    $specialChars = preg_match('@[^\w]@', $userPassword);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($userPassword) < 8) {
        return false;
    } else {
        return true;
    }
}

?>
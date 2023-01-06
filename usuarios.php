<?php

function registrarUsuario($usuario, $email, $passW, $fechaHora)
{
    include("db.php");

    // Preparar
    $stmt = $conn->prepare("INSERT INTO users (username,email,password,create_datetime) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $usuario, $email, $passW, $fechaHora);

    // Ejecutar
    $stmt->execute();

    //Cerrar conexión
    $stmt->close();
    mysqli_close($conn);

    return $stmt;
}

function autorizarUsuario($usuario, $passW)
{
    include("db.php");

    // Preparar
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $usuario, $passW);
    $stmt->execute();
    $stmt->store_result();

    $result = $stmt->num_rows()>0;

    //Cerrar conexión
    $stmt->close();
    mysqli_close($conn);

    return $result;
}

function existeUsuario($usuario){
    include("db.php");

    // Preparar
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    $result = $stmt->num_rows()>0;

    //Cerrar conexión
    $stmt->close();
    mysqli_close($conn);

    return $result;
}

function existeEmail($email){
    include("db.php");

    // Preparar
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    $result = $stmt->num_rows()>0;

    //Cerrar conexión
    $stmt->close();
    mysqli_close($conn);

    return $result;
}

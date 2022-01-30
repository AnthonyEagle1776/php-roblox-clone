<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once '../config/db.php';

    if (EmptyInputLogin($username, $password) !== false) {
        header("location: ../login?error=Please fill in all fields!");
        exit();
    }
    LoginUser($conn, $username, $password);
} else {
    header('location: ../signup?error=Access Denied!');
}

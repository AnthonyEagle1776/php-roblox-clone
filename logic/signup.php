<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    require_once '../config/db.php';

    /*if (emptyInputSignup() !== false) {
        header("location: ../signup?error=emptyinput");
        exit();
    }*/
} else {
    header('location: ../signup');
}

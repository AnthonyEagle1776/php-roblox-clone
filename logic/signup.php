<?php

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = $_POST["username"];
    $passwordRepeat = $_POST["pwdrepeat"];
} else {
    header('location: ../signup');
}

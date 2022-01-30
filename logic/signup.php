<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordRepeat"];

    require_once '../config/db.php';

    if (EmptyInputSignup($username, $email, $password, $passwordRepeat) !== false) {
        header("location: ../signup?error=Please fill in all fields!");
        exit();
    }
    if (InvalidUsername($username) !== false) {
        header("location: ../signup?error=Username contains forbidden characters.");
        exit();
    }
    if (InvalidEmail($email) !== false) {
        header("location: ../signup?error=Email is invalid!");
        exit();
    }
    if (InvalidPasswordMatch($password, $passwordRepeat) !== false) {
        header("location: ../signup?error=Your passwords do not match!");
        exit();
    }
    if (UsernameExists($conn, $username) !== false) {
        header("location: ../signup?error=Username taken! Try a different name!");
        exit();
    }

    CreateUser($conn, $username, $email, $password);
} else {
    header('location: ../signup?error=Access Denied!');
}

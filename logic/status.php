<?php
session_start();
if (isset($_POST["submit"])) {
    $Status = $_POST["status"];

    require_once '../config/db.php';

    if (EmptyStatus($Status) !== false) {
        header("location: ../dashboard?error=Please fill in all fields!");
        exit();
    }
    UpdateStatus($conn, $Status, $_SESSION['UserID']);
} else {
    header('location: ../dashboard?error=Access Denied!');
}

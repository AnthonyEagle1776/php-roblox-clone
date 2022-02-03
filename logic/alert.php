<?php
if (isset($_POST["submit"])) {
    $Alert = $_POST["AlertEnabled"];
    $AlertMessage = $_POST["AlertMessage"];
    $AlertColor = $_POST["AlertColor"];

    require_once '../config/db.php';

    if (EmptyAlert($Alert) !== false) {
        header('location: ../admin/settings/?error=Access Denied!');
        exit();
    }
    UpdateAlert($conn, $Alert, $AlertMessage, $AlertColor);
} else {
    header('location: ../admin/settings/?error=Access Denied!');
}

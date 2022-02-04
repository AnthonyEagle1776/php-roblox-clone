<?php
if (isset($_POST["submit"])) {
    $Enabled = $_POST["AlertEnabled"];
    $Message = $_POST["AlertMessage"];
    $Color = $_POST["AlertColor"];

    $AlertColor;

    if ($Color == 0) {
        $AlertColor = 'info';
    } else if ($Color == 1) {
        $AlertColor = 'warning';
    } else if ($Color == 2) {
        $AlertColor = 'secondary';
    } else if ($Color == 3) {
        $AlertColor = 'primary';
    } else if ($Color == 4) {
        $AlertColor = 'danger';
    } else if ($Color == 5) {
        $AlertColor = 'success';
    } else {
        header('location: http://localhost/dashboard/');
        exit();
    }


    require_once '../config/db.php';

    if (EmptyAlert($Message) !== false) {
        header('location: ../admin/settings/?error=Please enter an alert message.');
        exit();
    }
    UpdateAlert($conn, $Enabled, $Message, $AlertColor);
} else {
    header('location: http://localhost/dashboard/');
    exit();
}

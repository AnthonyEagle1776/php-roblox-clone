<?php
if (isset($_POST["submit"])) {
    require_once '../config/db.php';
    UpdateMaintenance($conn, true);
} else {
    header('location: http://localhost/dashboard/');
    exit();
}

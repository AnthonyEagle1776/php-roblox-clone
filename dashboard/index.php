<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/authchecks.php');
$title = 'Dashboard';
$childView = "../views/auth/home/_dashboard.php";
include('../layout.php');
RequireAuth();

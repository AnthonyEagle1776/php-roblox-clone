<?php
include('../config/authchecks.php');
RequireAuth();
$title = 'Dashboard';
$childView = "../views/auth/home/_dashboard.php";
include('../layout.php');

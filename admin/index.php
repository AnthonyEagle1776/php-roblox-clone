<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/authchecks.php');
RequireAuth();
$title = 'Admin Panel';
$childView = "../views/auth/_admin.php";
include('../layout.php');

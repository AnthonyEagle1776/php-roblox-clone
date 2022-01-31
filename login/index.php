<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/authchecks.php');
RequireGuest();
$title = 'Login';
$childView = $_SERVER['DOCUMENT_ROOT'] . "/views/guest/_login.php";
include($_SERVER['DOCUMENT_ROOT'] . '/layout.php');

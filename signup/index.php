<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/authchecks.php');
RequireGuest();
$title = 'Sign-up';
$childView = $_SERVER['DOCUMENT_ROOT'] . "/views/guest/_signup.php";
include($_SERVER['DOCUMENT_ROOT'] . '/layout.php');

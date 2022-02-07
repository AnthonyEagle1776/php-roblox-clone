<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/authchecks.php');
RequireGuest();
$css = '<style>this is a test</style>';
$title = 'Welcome';
$childView = $_SERVER['DOCUMENT_ROOT'] . "/views/_index.php";
include($_SERVER['DOCUMENT_ROOT'] . '/layout.php');

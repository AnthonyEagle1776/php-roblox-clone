<?php
include('config/authchecks.php');
RequireGuest();
$css = '<style>this is a test</style>';
$title = 'Welcome';
$childView = "views/_index.php";
include('layout.php');

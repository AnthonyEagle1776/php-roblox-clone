<?php
$css = '
<style>

::placeholder {
    color: inherit!important;
}

h5 {
    margin: 0!important;
}
</style>';
include($_SERVER['DOCUMENT_ROOT'] . '/config/authchecks.php');
RequireAuth();
$title = 'Dashboard';
$childView = "../views/auth/home/_dashboard.php";
include('../layout.php');

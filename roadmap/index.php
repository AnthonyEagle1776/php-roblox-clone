<?php
$css = '
<style>
    ::placeholder {
        color: inherit !important;
    }

    h5 {
        margin: 0 !important;
    }
    .card i {
        margin-right: 2.5px;
    }
</style>';
include($_SERVER['DOCUMENT_ROOT'] . '/config/authchecks.php');
RequireAuth();
$title = 'Roadmap';
$childView = "../views/auth/_roadmap.php";
include('../layout.php');

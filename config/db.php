<?php
include('env.php');
include('functions.php');
date_default_timezone_set('America/New_York');
try {
    $conn = OpenConnection($DATABASE_HOST, $DATABASE_USERNAME, $DATABASE_PASSWORD, $DATABASE);
} catch (mysqli_sql_exception $e) {
    include($_SERVER['DOCUMENT_ROOT'] . '/views/error/500.html');
    exit();
}

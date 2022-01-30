<?php
session_start();
include('env.php');
include('functions.php');

$conn = OpenConnection($DATABASE_HOST, $DATABASE_USERNAME, $DATABASE_PASSWORD, $DATABASE);

<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/authchecks.php');
RequireAuth();
RequireAdmin();
$title = 'Admin Panel';
$childView = $_SERVER['DOCUMENT_ROOT'] . '/views/auth/admin/_maintenance.php';
include($_SERVER['DOCUMENT_ROOT'] . '/layout.php');

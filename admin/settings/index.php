<?php
include($_SERVER['DOCUMENT_ROOT'] . '/config/authchecks.php');
RequireAuth();
RequireAdmin();
$title = 'Admin Panel';
$childView = $_SERVER['DOCUMENT_ROOT'] . '/views/auth/admin/_settings.php';
include($_SERVER['DOCUMENT_ROOT'] . '/layout.php');

<?php
include('../config/authchecks.php');
RequireAuth();
session_start();
session_unset();
session_destroy();

header("location: ../index.php");
exit();

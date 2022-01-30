<?php
session_start();
function UserIsAuthenticated()
{
    $session = @$_SESSION["UserAuthenticated"];
    if ($session === "true") {
        return true;
    } else {
        return false;
    }
}
function RequireAuth()
{
    if (!UserIsAuthenticated()) {
        header("location: ../login?error=You are not signed in!");
    }
}

function RequireGuest()
{
    if (UserIsAuthenticated()) {
        header('location: ../dashboard');
    }
}

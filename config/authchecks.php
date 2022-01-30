<?php

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
        header("location: ../login");
    }
}

function RequireGuest()
{
    if (UserIsAuthenticated()) {
        header('location: ../dashboard');
    }
}

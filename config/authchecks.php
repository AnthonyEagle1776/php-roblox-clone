<?php
session_start();
// getters
function GetUsername()
{
    return @$_SESSION["Username"];
}
function GetUserID()
{
    return @$_SESSION["UserID"];
}
function GetUserEmail()
{
    return @$_SESSION["UserEmail"];
}
function GetUserAdmin()
{
    return @$_SESSION["UserAdmin"];
}
function GetAuthentication()
{
    return @$_SESSION["UserAuthenticated"];
}
function UserIsAuthenticated()
{
    $session = GetAuthentication();
    if ($session === "true") {
        return true;
    } else {
        return false;
    }
}
function UserIsAdmin()
{
    $session = GetUserAdmin();
    if ($session === "true") {
        return true;
    } else {
        return false;
    }
}
function RequireAuth()
{
    if (!UserIsAuthenticated()) {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/login?error=You are not logged in!');
    }
}

function RequireGuest()
{
    if (UserIsAuthenticated()) {
        header('location: http://' . $_SERVER['HTTP_HOST'] . '/dashboard');
    }
}

function IsAdmin($admin_tinyint)
{
    if ($admin_tinyint === 0) {
        return false;
    } else if ($admin_tinyint === 1 || $admin_tinyint === 2) {
        return true;
    }
}

function IsSuperAdmin($admin_tinyint)
{
    if ($admin_tinyint !== 2) {
        return false;
    } else {
        return true;
    }
}

function RequireAdmin()
{
    if (!IsAdmin(GetUserAdmin())) {
        if (UserIsAuthenticated()) {
            header('location: http://' . $_SERVER['HTTP_HOST'] . '/dashboard');
        }
    }
}

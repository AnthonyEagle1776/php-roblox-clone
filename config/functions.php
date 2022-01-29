<?php
// functions file
// all site functions will be held here

// db functions
function OpenConnection($db_host, $db_username, $db_password, $db)
{
    $conn = mysqli_connect($db_host, $db_username, $db_password);
    // select database
    try {
        // declare database if it exists
        // if it does not exist the catch block will be ran
        $db_selected = mysqli_select_db($conn, $db);
    } catch (Exception $e) {
        // variable e wont be used due to the problem being present
        unset($e);
        // create the database
        $sql = 'CREATE DATABASE ' . $db;

        if (mysqli_query($conn, $sql)) {
            return $conn;
        } else {
            echo 'Error creating database: ' . $conn->error . "\n";
        }
    } finally {
        // return $conn after the database is created
        return $conn;
    }
}

function CloseConnection($database_connection)
{
    $database_connection->close();
}

// site helpers

// this function is one of those functions that can be written shorter but it is for ease of readability
function IsVariableSet($variable)
{
    if (isset($variable)) {
        return true;
    } else {
        return false;
    }
}
// check if SQL boolean types (0 or 1) are enabled and if so return true or false.
function IsSqlVarEnabled($variable)
{
    if ($variable = 1) {
        return true;
    } else {
        return false;
    }
}

// check if alert is enabled
function IsAlertEnabled($boolean)
{
    if ($boolean == 0) {
        $AlertEnabled = false;
    } else {
        $AlertEnabled = true;
    }
}

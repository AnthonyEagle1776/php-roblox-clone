<?php
// functions file
// all site functions will be held here
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
// check if variable is enabled
function IsEnabled($boolean)
{
    if ($boolean == 0) {
        $Enabled = false;
    } else {
        $Enabled = true;
    }
    return $Enabled;
}

// Authentication Functions
$result;
function EmptyInputSignup($username, $email, $password, $passwordRepeat)
{
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function InvalidUsername($username)
{
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function InvalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function InvalidPasswordMatch($password, $passwordRepeat)
{
    if ($password !== $passwordRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function UsernameExists($conn, $username)
{
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup/?error=databasefailure");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $Data = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($Data)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function CreateUser($conn, $username, $email, $password)
{
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=databasefailure");
        exit();
    }

    // hash password
    $HashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $HashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    // NOTE change all code below to login user instead of redirect/
    $UsernameExists = UsernameExists($conn, $username, $username);
    session_start();
    $_SESSION["UserAuthenticated"] = "true";
    $_SESSION["UserID"] = $UsernameExists["id"];
    $_SESSION["Username"] = $UsernameExists["username"];
    $_SESSION["UserEmail"] = $UsernameExists["email"];
    $_SESSION["UserAdmin"] = $UsernameExists["admin"];
    header("location: ../dashboard/?note=Successfully signed up!");
    exit();
}

function EmptyInputLogin($username, $password)
{
    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function LoginUser($conn, $Username, $Password)
{
    $UsernameExists = UsernameExists($conn, $Username, $Username);

    if ($UsernameExists === false) {
        header("location: ../login/?error=Wrong username or password!");
    }

    $PasswordHashed = $UsernameExists["password"];
    $CheckPassword = password_verify($Password, $PasswordHashed);

    if ($CheckPassword === false) {
        header("location: ../login/?error=Wrong username or password!");
    } else if ($CheckPassword === true) {
        session_start();
        $_SESSION["UserAuthenticated"] = "true";
        $_SESSION["UserID"] = $UsernameExists["id"];
        $_SESSION["Username"] = $UsernameExists["username"];
        $_SESSION["UserEmail"] = $UsernameExists["email"];
        $_SESSION["UserAdmin"] = $UsernameExists["admin"];
        header("location: ../dashboard/?note=Successfully logged in!");
        exit();
    }
}

function GetUsername()
{
    return $_SESSION["Username"];
}
// this function is run everytime the user clicks on a page.
// this will be used to tell if the user is online or not.
function UpdateUser($conn)
{
    $User = $_SESSION["UserID"];

    $sql = "UPDATE users SET updated_at = now() WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ?error=Database Failed!");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $User);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function UpdateStatus($conn, $Status, $uID)
{
    $User = $_SESSION["UserID"];
    $sql = "UPDATE users SET status = ? WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ?error=Database Failed!");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $Status, $User);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../dashboard/?note=Status successfully updated.");
    exit();
}

function EmptyStatus($Status)
{
    if (empty($Status)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function GetAllStatus($conn)
{
    $sql = "SELECT username, id, updated_at, status FROM users";
    $result = mysqli_query($conn, $sql);

    return $result;
}

function DisplayStatus($result)
{
    $User = $_SESSION["UserID"];
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            // NOTE fix this empty() hack()
            // cheaty way of checking if the status is not empty because i apparently didn't null out the status in db
            if ($row['status'] !== NULL) {
                if ($row['id'] != $User) {
                    echo '<h5>' . $row['username'] . ' says...</h5>';
                    echo '<p>' . $row['status'] . '</p>';
                    echo '<hr>';
                } else {
                    echo '<h5>Nothing to show.</h5>';
                }
            }
        }
    } else {
        echo "0 results";
    }
}

function DisplayUser($result)
{
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            // NOTE fix this empty() hack()
            // cheaty way of checking if the status is not empty because i apparently didn't null out the status in db
            if (!empty($row['status'])) {
                echo '<a class="fs-5 text-white" href="/profile?id=' . $row['id'] . '">' . $row['username'] . '</a>';
                if (IfIsOnline($row['updated_at'])) {
                    echo '<span class="badge bg-info fw-normal" style="margin-left: 2.5px;">Online</span>';
                }
                echo '<p>' . $row['status'] . '</p>';
                echo '<hr>';
            } else {
                echo '<a class="fs-5 text-white" href="/profile?id=' . $row['id'] . '">' . $row['username'] . '</a>';
                if (IfIsOnline($row['updated_at'])) {
                    echo '<span class="badge bg-info fw-normal" style="margin-left: 2.5px;">Online</span>';
                }
                echo '<hr>';
            }
        }
    } else {
        echo "0 users. Signup today!";
    }
}

function IfIsOnline($updated_at_timestamp)
{
    $now = date_create(date('Y-m-d H:i:s'));
    $updated = date_create($updated_at_timestamp);

    $now_format = date_format($now, 'Y-m-d H:i:s');
    $updated_format =  date_format($updated, 'Y-m-d H:i:s');

    $test1 = strtotime($now_format);
    $test2 = strtotime($updated_format);
    $hour = abs($test1 - $test2) / (1 * 1);

    if ($hour < 90) {
        return true;
    } else {
        return false;
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

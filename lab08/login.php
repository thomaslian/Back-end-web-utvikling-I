<?php
include 'functions.php';

session_start();

$connection = connect();

if (isset($_SESSION['isloggedin'])) {
    session_regenerate_id();
    echo "User logged in";
    echo "<a href='./profile.php'>Go to profile</a>";
} else {
    echo displayLoginForm();
    $user = loginUser();
    if ($user) {
        $_SESSION['username'] = $user["username"];
        $_SESSION['name'] = $user["name"];
        $_SESSION['surname'] = $user["surname"];
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];
        $_SESSION['isloggedin'] = TRUE;

        setcookie($user["username"], "test", time() + 60, "/",
            "localhost", "false", "httponly");

        // once user is logged in
        // regenerate the session id
        if (isset($_SESSION['isloggedin'])) {
            session_regenerate_id();
            header("Location:login.php");
        }
    }
}


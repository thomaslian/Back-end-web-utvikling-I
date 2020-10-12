<?php
session_start();

unset($_SESSION["username"]);
unset($_SESSION["name"]);
unset($_SESSION["surname"]);
unset($_SESSION["isloggedin"]);

$_SESSION = array();


if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}


// Finally, destroy the session.
session_destroy();

header("Location:login.php");

?>
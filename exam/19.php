<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
</head>
<body>

<?php

/**
 * PART 1
 */

function connect()
{
    $host = 'hgws00.win.bookstore.com';
    $username = "admin";
    $password = "admin";
    $database = 'booklist';

    return mysqli_connect($host, $username, $password, $database);
}

$connection = connect();

// Update address
$addressQuery = "UPDATE customers SET address = '7 Foxcot Ave. Birmingham' WHERE username = 'Edwin'";
$addressResult = mysqli_query($connection, $addressQuery);

// Customers from USA
$usaQuery = "SELECT * FROM customers WHERE country = 'USA'";
$usaResult = mysqli_query($connection, $usaQuery);

$deleteQuery = "DELETE FROM customers WHERE username = 'Spiderman' OR username = 'TheHulk'";
$deleteResult = mysqli_query($connection, $deleteQuery);


// (c) mysqli_query() is used to execute a query
// (d) fetch_assoc() is used to extract the result of a query into an associative array


/**
 * PART 2
 */

$hashed_password = "fgnrioegFGFDHegruiwp453463h9ffnweoi";

if (isset($_POST['login'])) {
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

    if (password_verify($password, $hashed_password)) {
        echo "Password is correct";
    } else {
        echo "Password is incorrect";
    }
}

// Function to sanitize input. Used to protect against HTML and MySQL injection
function sanitizeInput($data)
{
    global $connection;
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlentities($data);
    $data = mysqli_real_escape_string($connection, $data);
    return $data;
}

?>

<form method="post">
    Username : <input type="text" name="username" value=""> <br>
    Password : <input type="password" name="password" value=""><br>
    <input type="submit" name="login" value="Login">
</form>


</body>

</html>
<?php
// helper functions
function connect()
{
    // login to database

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'mysite';

    $connection = mysqli_connect($host, $username, $password, $database);

    if ($connection) {
        //echo "We are connected!<br>";
    } else {
        die ("Database connection failed");
    }
    return $connection;
}

function disconnect($connection)
{
    mysqli_close($connection);
}

function validateInput($entry)
{
    // $entry takes in the whole $_GET array
    //echo "In Validate Input!<br>";
    $areFieldsEmpty = FALSE;
    $isDataOK = FALSE;

    //check if form was submitted
    if (array_key_exists('username', $entry)) {
        foreach ($entry as $key => $value) {
            $length = strlen($value);
            if ($length == 0) {
                $areFieldsEmpty = TRUE;
                break;
            }
        }

        if ($areFieldsEmpty == TRUE) {
            echo "Fields cannot be empty!<br>";
        } else {
            echo "Data is OK!<br>";
            $isDataOK = TRUE;

        }

    } else {
        echo "Array Empty!<br>";
    }

    return $isDataOK;

}

function displayLoginForm()
{

    echo <<<END
        <h2>Login</h2>
			<form action="login.php" method="post">
				<table>
					<tr>
						<td>User name:</td>
						<td>
						<input type="text" name="username">
						</td>
					</tr>
					<tr>
						<td>Password:</td>
						<td>
						<input type="password" name="password">
						</td>
					</tr>
					<tr>
						<td colspan="2">
						<input type="submit" name="login" value="Login">
						</td>
					</tr>
				</table>
			</form>
END;
}

//create function for createUser
function createUser($username, $firstname, $lastname, $gender, $password)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $connection = connect();
    $query = "INSERT INTO users (username, name, surname, gender, password) VALUES ('$username', '$firstname', '$lastname', '$gender', '$hashedPassword')";
    $result = mysqli_query($connection, $query);

    checkIfQueryFailed($result);
}

function updateUser($username, $firstname, $lastname, $gender, $hashedPassword)
{
    global $connection;
    $query = "UPDATE users SET name = '$firstname', surname = '$lastname', gender = '$gender', password = '$hashedPassword WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    checkIfQueryFailed($result);
}

function getUserDetails($username)
{
    global $connection;
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    checkIfQueryFailed($result);

    foreach ($result as $user) {
        return $user;
    }
}

function checkIfQueryFailed($result)
{
    if (!$result) {
        global $connection;
        die("Query failed: " . mysqli_error($connection));
    }
}

//create function for loginUser
function loginUser()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = sanitizeInput($_POST["username"]);
        $password = sanitizeInput($_POST["password"]);

        if (getUserDetails($username)) {
            $user = getUserDetails($username);
            if (password_verify($password, $user["password"])) {
                echo "Password is correct";
                return $user;
            } else {
                echo "Password is incorrect";
                return false;
            }
        } else {
            echo "User is not found";
            return false;
        }
    }
    return false;
}

// create function to sanitizeInput
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
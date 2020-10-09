<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form {
            display: flex;
            flex-direction: column;
            max-width: 300px;
        }

        form label {
            margin-bottom: 10px;
        }

        .error {
            color: red;
        }
    </style>
</head>

<?php
include 'functions.php';

$connection = connect();

// define variables and set to empty values
$usernameErr = $firstnameErr = $lastnameErr = $genderErr = $passwordErr = "";
$username = $firstname = $lastname = $gender = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } elseif (empty($_POST["firstname"])) {
        $firstnameErr = "Firstname is required";
    } elseif (empty($_POST["lastname"])) {
        $lastnameErr = "Lastname is required";
    } elseif (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } elseif (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $username = sanitizeInput($_POST["username"]);
        $firstname = sanitizeInput($_POST["firstname"]);
        $lastname = sanitizeInput($_POST["lastname"]);
        $gender = sanitizeInput($_POST["gender"]);
        $password = sanitizeInput($_POST["password"]);
        createUser($username, $firstname, $lastname, $gender, $password);
    }
}


?>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>
        Username: <input type="text" name="username">
        <span class="error">* <?php echo $usernameErr; ?></span>
    </label>
    <label>
        Firstname: <input type="text" name="firstname">
        <span class="error">* <?php echo $firstnameErr; ?></span>
    </label>
    <label>
        Lastname: <input type="text" name="lastname">
        <span class="error">* <?php echo $lastnameErr; ?></span>
    </label>
    <label>
        Password: <input type="password" name="password">
        <span class="error">* <?php echo $passwordErr; ?></span>
    </label>
    <label>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="other">Other
        <span class="error">* <?php echo $genderErr; ?></span>
    </label>
    <input type="submit" name="submit" value="Register">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $username;
echo "<br>";
echo $firstname;
echo "<br>";
echo $lastname;
echo "<br>";
echo $password;
echo "<br>";
echo $gender;

?>

</body>
</html>
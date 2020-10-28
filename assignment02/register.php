<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
        }

        .wrap {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 200px;
        }

        form input {
            margin-bottom: 10px;
        }

        form button {
            min-width: 200px;
            min-height: 42px;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
<?php //Registration Page.
/*
Here you should create a form for user registration : which is basically just updating their password from a defaulted value to their custom one.
*/

/*
Step 2 : 40% of the Grade
Validation :
1. Should check that no fields are left empty.
2. 'New Password' and 'Confirm Password' fields should match.
3. Check if this username exists in the 'users' table in the database.
    Add a method to the User class to check if the input username exists.
    If the username does not exist, display a message telling the user:
    "The entered username does not exist on the system. Contact the administrator."
4. ONLY IF the username exists in the 'users' table in the database, then update the user entry on the database, with the new password.
   Add another method to the User class to do this. You may call it, updateUserPassword.
*/

include "classes/class_User.php";

// Define variables and set to empty values
$username = "";
$password = "";
$errorMsg = "";
$successMsg = "";

// Check if the user have clicked the register button
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if any of the input fields are empty, and display an error if they are
    if (empty($_POST["username"])) {
        $errorMsg = "Username is required";
    } elseif (empty($_POST["password"])) {
        $errorMsg = "Password is required";
    } elseif (strlen(($_POST["password"])) < 8) { // Check if password is less than 8
        $errorMsg = "Password needs to be a minimum of 8 characters";
    } elseif (empty($_POST["conf-password"])) {
        $errorMsg = "Please confirm your password";
    } elseif ($_POST["conf-password"] != $_POST["password"]) { // Check if both passwords match
        $errorMsg = "Passwords does not match!";
    } else {
        // Create a new user with the User if no errors are found
        $user = new User($_POST["username"], $_POST["password"]);
        // Check if the username in the database
        if ($user->checkIfUsernameUnique()) {
            // If not in the database, display an error
            $errorMsg = "The entered username does not exist on the system. Contact the administrator.";
        } else {
            // If user is in database, update the user password
            if ($user->updateUserPassword()) {
                /*
                 Step 3 : 20% of the Grade
                    If the validation check is passed, the form should disappear, in its place display:
                    1. A status message to alert the user that the step was successful
                    2. A link that redirects the user to the login page, where they can login to their profile page.
                    The profile page should retrieve this specific user's username automatically. So they only have to enter their new password to login.

                    HINT : check how to append data to URL using the HTTP GET.
                    Show that this particular steps works, by echoing the correct username on the Login page.
                 */

                // Hide the form
                echo "
                <style>
                    form {
                        visibility: hidden;
                    }
                </style>
                ";
                // Show a success message that the password change was successful
                $successMsg = "Password change was successfully!";
                // Start a session, this will include the username in the session
                $user->startSession();
                // Go to the login page
                header("Location:login.php");
            } else {
                // Display an error if updating the password fails
                $errorMsg = "There was an error updating your password. Contact the administrator.";
            }
        }


    }
}
?>

<!--
Step 1 : 20% of the Grade
The form should have 3 input fields and 1 button :
1. username // note that a user that is allowed to register on the system will already have a predefined username that
is generated when their details are added to the database by the admin.

2. New password // their new password, check that the length of the input password is at least 8 characters long.

3. Confirm password // the user should type the same password in here. The new password will be updated only if the
input password field and confirm password field matches.

4. A register button. Upon click, should send the data to the backend for validation and updating the user details.
-->
<div class="wrap">
    <p><?php echo $successMsg;?></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label for="username">Username: <span class="error">*</span></label>
        <input type="text" name="username" id="username">

        <label for="password">New password (min 8 char): <span class="error">*</span></label>
        <input type="password" name="password" id="password">

        <label for="conf-password">Confirm password: <span class="error">*</span></label>
        <input type="password" name="conf-password" id="conf-password">

        <p class="error"><?php echo $errorMsg; ?></p>

        <button type="submit" name="submit" value="Register">Register</button>
    </form>
</div>

<!--
Step 4 : 10 % of the Grade
The relevant security steps should be taken:
1. user input sanitization on the username -- Sanitation is done in the User class
2. password hashing for the password.  -- Password hashing is done in the User class
-->

</body>
</html>

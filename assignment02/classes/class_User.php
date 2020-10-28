<?php

require_once "class_Database.php";

class User extends Database
{

    //initial properties
    protected $username;
    protected $role;
    private $password;

    function __construct($username, $password)
    {
        $connection = parent::connect();
        $this->username = parent::cleanVar($username, $connection);
        $this->password = parent::cleanVar($password, $connection);
        parent::disconnect($connection);
    }

    // create User methods
    protected function createUser($name, $surname)
    {
        echo "User : In createUser<br>";

        $this->generateUsername($name, $surname);
        $this->generateDefaultPassword($name, $surname);

        $classType = get_class($this);
        if ($classType == "Employee") {
            $this->role = 1;
        } elseif ($classType == "Student") {
            $this->role = 2;
        }

        echo "username : $this->username <br>";
        echo "role : $this->role<br>";
        echo "password : $this->password <br>";

        $this->addUserEntryinDB();
    }

    protected function generateUsername($name, $surname)
    {
        echo "User : In generateUsername<br>";
        $str1 = substr($name, 0, 2); // first 2 letters of firstname
        $str1 .= substr($surname, 0, 3); // first 3 letters of lastname
        $string = strtolower($str1); // making lowercase

        $isUsernameUnique = FALSE;
        $idx = 0;
        while ($isUsernameUnique == FALSE) {
            $username = $string . rand(0, 9); // appending a random digit.
            $username .= rand(0, 9); // appending a random digit.

            $isUsernameUnique = $this->checkIfUsernameUnique($username);
            $idx++;

            if ($idx > 100) {
                echo "No unique username could be generated!";
                break;
            }
        }

        $this->username = $username;

    }

    function checkIfUsernameUnique()
    {
        $isUsernameUnique = TRUE;
        $usersArray = $this->readFromTable("users");

        if ($usersArray) {
            foreach ($usersArray as $item) {
                if ($this->username == $item['username']) {
                    $isUsernameUnique = FALSE;
                }
            }
        }
        return $isUsernameUnique;
    }

    protected function generateDefaultPassword($name, $surname)
    {
        $this->password = $name . $surname;
    }

    // Database methods
    protected function addUserEntryinDB()
    {
        $connection = $this->connect();

        //hash password
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);

        //query the database
        $query = "INSERT INTO users(username,role,password)";
        $query .= "VALUES ('$this->username','$this->role','$password_hashed')";

        $result = mysqli_query($connection, $query);

        // printing error message in case of query failure
        if (!$result) {
            die('User Creation failed!' . mysqli_error($connection));
        } else {
            echo "New User Created!<br>";
        }

        $this->disconnect($connection);
    }

    // Registration Methods
    function updateUserPassword()
    {
        $connection = parent::connect();
        $username = $this->username;
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $query = "UPDATE users ";
        $query .= "SET password = ('$hashedPassword') ";
        $query .= "WHERE username = ('$username');";

        $result = mysqli_query($connection, $query);

        parent::disconnect($connection);
        if (!$result) {
            return false;
        }

        return true;
    }

    function startSession() {
        session_start();
        $_SESSION['username'] = $this->username;
    }


}//end class


?>
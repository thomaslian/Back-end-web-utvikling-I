<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online bookshop database system</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<h1>Online bookshop system</h1>
<?php

$host = 'localhost';
$username = "root";
$database = 'booklist';

$connection = mysqli_connect($host, $username, "", $database);

if ($connection) {
    echo "We are connected!";
} else {
    die("Database connection failed");
}

if (isset($_POST['customer'])) {
    createCustomer($_POST["username"], $_POST["firstname"], $_POST["lastname"], $_POST["address"]);
    newOrder($_POST["isbn"], $_POST["username"], $_POST["quantity"]);
}

/**
 * @param $tableName - Name of the table that we are getting the data from
 * @return array|mysqli_result - Array with table data
 */
function getTableData($tableName)
{
    global $connection;
    $query = "Select * FROM $tableName";
    $result = mysqli_query($connection, $query);

    checkIfQueryFailed($result);

    return $result;
}


function createCustomer($username, $firstname, $lastname, $address)
{
    $customer[] = getCustomerDetails($username);
    if (!$customer) {
        global $connection;
        $query = "INSERT INTO customers (customer_id, username, firstname, lastname, address) VALUES (NULL, '$username', '$firstname', '$lastname', '$address')";
        $result = mysqli_query($connection, $query);

        checkIfQueryFailed($result);
    } else {
        $id = $customer[0]["customer_id"];
        updateCustomer($id, $firstname, $lastname, $address);
    }
}

function updateCustomer($id, $firstname, $lastname, $address)
{
    global $connection;
    $query = "UPDATE customers SET firstname = '$firstname', lastname = '$lastname', address = '$address' WHERE customer_id = '$id'";
    $result = mysqli_query($connection, $query);

    checkIfQueryFailed($result);
}

function getCustomerDetails($username)
{
    global $connection;
    $query = "SELECT * FROM customers WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    checkIfQueryFailed($result);

    foreach ($result as $user) {
        return $user;
    }
}

function getBookDetails($isbn)
{
    global $connection;
    $query = "SELECT * FROM books WHERE isbn = $isbn";
    $result = mysqli_query($connection, $query);

    checkIfQueryFailed($result);

    return $result;
}

function newOrder($isbn, $username, $quantity)
{
    global $connection;
    $query = "INSERT INTO orders(isbn, username, quantity) VALUES ('$isbn', '$username', '$quantity')";
    $result = mysqli_query($connection, $query);

    checkIfQueryFailed($result);
}

function deleteOrder($orderId)
{
    global $connection;
    $query = "DELETE FROM orders WHERE order_id = $orderId";
    $result = mysqli_query($connection, $query);

    checkIfQueryFailed($result);
}


function checkIfQueryFailed($result)
{
    if (!$result) {
        global $connection;
        die("Query failed: " . mysqli_error($connection));
    }
}

?>

<table style="width:100%">
    <tr>
        <th>Order ID</th>
        <th>Customer ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Address</th>
        <th>ISBN</th>
        <th>Book</th>
        <th>Publisher</th>
        <th>Quantity</th>
    </tr>

    <?php
    $orders = getTableData("orders");
    $customers = getTableData("customers");
    $books = getTableData("books");
    foreach ($orders as $order) {
        $orderId = $order["order_id"];
        $orderQuantity = $order["quantity"];
        echo "<tr>";
        echo "<td>$orderId</td>";
        foreach ($customers as $customer) {
            if ($order["username"] == $customer["username"]) {
                $customerId = $customer["customer_id"];
                $customerFirstName = $customer["firstname"];
                $customerLastName = $customer["lastname"];
                $customerAddress = $customer["address"];
                echo "<td>$customerId</td>";
                echo "<td>$customerFirstName</td>";
                echo "<td>$customerLastName</td>";
                echo "<td>$customerAddress</td>";
            }
        }
        foreach ($books as $book) {
            if ($order["isbn"] == $book["isbn"]) {
                $bookIsbn = $book["isbn"];
                $bookTitle = $book["title"];
                $bookAuthor = $book["author"];
                echo "<td>$bookIsbn</td>";
                echo "<td>$bookTitle</td>";
                echo "<td>$bookAuthor</td>";
            }
        }
        echo "<td>$orderQuantity</td>";
        echo "</tr>";
    }
    ?>
</table>

<form action="index.php" method="post">
    <h2>Add order:</h2>
    <label>
        Username:
        <input type="text" name="username">
    </label>
    <label>
        First name:
        <input type="text" name="firstname">
    </label>
    <label>
        Last name:
        <input type="text" name="lastname">
    </label>
    <label>
        Address:
        <input type="text" name="address">
    </label>
    <label>
        ISBN:
        <input type="text" name="isbn">
    </label>
    <label>
        Quantity:
        <input type="text" name="quantity">
    </label>
    <input type="submit" value="click" name="customer">
</form>


</body>
</html>
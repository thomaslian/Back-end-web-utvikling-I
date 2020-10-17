<?php

try {
    $db = new PDO("sqlite:" . __DIR__ . "/database.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Unable to connect to the database: ";
    echo $e->getMessage();
    exit;
}

try {
    $results = $db->query("SELECT title, category FROM Media");
    echo "Retrieved results";
} catch (Exception $e) {
    echo "Unable to retrieve results: ";
    echo $e->getMessage();
    exit;
}
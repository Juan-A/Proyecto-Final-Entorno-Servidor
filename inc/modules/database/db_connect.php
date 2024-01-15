<?php

function db()
{
    $db_user = "root";
    $db_password = "nerja123";
    $db_host = "db";
    $db_name = "proyecto";
    $pdo_string = "mysql:dbname=$db_name;host=$db_host";

    try {
        //Create the connection
        return new PDO($pdo_string, $db_user, $db_password);
    } catch (PDOException $e) {
        //If it enters here, we had an error.
        echo "<div class='error'>Error on the database connection. :( </div><br> ";
        echo "Details: " . $e->getMessage();
    }
}
